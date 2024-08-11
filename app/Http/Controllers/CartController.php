<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $grandTotal = $cartItems->sum('totalPrice');
        return view('user.cart', compact('cartItems', 'grandTotal'));
    }
    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $userId = Auth::id();

        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Update quantity if item already exists in the cart
            $cartItem->qty += $request->qty;
            $cartItem->totalPrice = $cartItem->qty * $product->price;
            $cartItem->save();
        } else {
            // Add new item to the cart
            Cart::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'price' => $product->price,
                'totalPrice' => $request->qty * $product->price,
                'carModel' => $product->carModel,
                'images' => json_encode($product->images), // Ensure images are JSON encoded
                'carBrand' => $product->carBrand,
                'madeIn' => $product->madeIn,
                'category_id' => $product->category_id,
                'sub_category_id' => $product->sub_category_id
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $grandTotal = $cartItems->sum('totalPrice');
        $payments = Payment::all();
        $isCheckout = true;
        return view('user.cart', compact('cartItems', 'grandTotal', 'payments', 'isCheckout'));
    }


    public function updateCart(Request $request)
    {
        $cartItem = Cart::find($request->id);

        if ($cartItem) {
            if ($request->qty > 0) {
                $cartItem->qty = $request->qty;
                $cartItem->totalPrice = $cartItem->qty * $cartItem->price;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
        }

        $totalPrice = $cartItem ? $cartItem->totalPrice : 0;

        return response()->json([
            'success' => true,
            'totalPrice' => $totalPrice
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $cartItem = Cart::find($request->id);

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index');
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'payment_screenshot' => 'nullable|image|mimes:jpeg,webp,png,jpg', // Adjust size and types as needed
            'phone' => 'required|string',
            'address' => 'required|string',
            'payment_id' => 'required|string',
        ]);
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $paymentScreenshotPath = null;

    if ($request->hasFile('payment_screenshot')) {
        $paymentScreenshot = $request->file('payment_screenshot');
        $paymentScreenshotPath = $paymentScreenshot->store('payment_screenshots', 'public'); // Store image in 'public/payment_screenshots'
    }
        foreach ($cartItems as $item) {
            Order::create([
                'user_id' => Auth::id(),
                'category_id' => $item->category_id,
                'sub_category_id' => $item->sub_category_id,
                'qty' => $item->qty,
                'carModel' => $item->carModel,
                'price' => $item->price,
                'payment_screenshot' => $paymentScreenshotPath,
                'carBrand' => $item->carBrand,
                'madeIn' => $item->madeIn,
                'totalPrice' => $item->totalPrice,
                'status' => 'pending',
                'payment_id' => $request->payment_id,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            $product = Product::where('id', $item->product_id)->first();
            $product->stock -= 1;
            $product->save();
            $item->delete();
        }

        return back()->with(['success', 'Order Success...']);
    }
}
