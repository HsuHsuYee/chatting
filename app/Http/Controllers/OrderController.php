<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('admin.order', compact('orders'));
    }

    public function orderList()
    {
        $orders = Order::where('user_id', Auth::id())->where('status', 'accepted')->get();
        foreach ($orders as $order) {
            $oneMonthAgo = Carbon::now()->subMonth()->startOfMonth();
            $order->whereDate('created_at', $oneMonthAgo->format('Y-m-d'))->delete();
        }
        return view('user.order', compact('orders'));
    }

    public function acceptOrder(Request $request)
    {
        $order = Order::find($request->id);
        if ($order && $order->status == 'pending') {
            $order->status = 'accepted';
            $order->save();
        }

        return redirect()->route('admin.orders');
    }
}
