<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\CheckUserOrAdmin;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $categories = Category::with('subCategories')->get();
    $products = Product::with('subcategories')->get();
    return view('user.home', compact('products', 'categories'));
});

Route::middleware('admin')->group(function () {
    
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::post('orders/accept', [OrderController::class, 'acceptOrder'])->name('admin.orders.accept');
    // Route::post('/broadcast', [PusherController::class, 'broadcast'])->name('broadcast');
    // Route::post('/receive', [PusherController::class, 'receive'])->name('receive');
    //category
    Route::post('/categoryStore', [ProductController::class, 'categoryStore'])->name('categoryStore');
    Route::get('/categoryCreate', [ProductController::class, 'categoryCreate'])->name('categoryCreate');
    Route::get('/categoryList', [ProductController::class, 'categoryList'])->name('categoryList');
    Route::get('/categoryEdit/{id}', [ProductController::class, 'categoryEdit'])->name('categoryEdit');
    Route::post('/category/{id}', [ProductController::class, 'categoryUpdate'])->name('categoryUpdate');
    Route::get('/categoryDelete/{id}', [ProductController::class, 'categoryDestory'])->name('categoryDestory');

    //subCategory
    Route::post('/subcategoryStore', [ProductController::class, 'subcategoryStore'])->name('subcategoryStore');
    Route::get('/subcategoryCreate', [ProductController::class, 'subcategoryCreate'])->name('subcategoryCreate');
    Route::get('/subcategoryList', [ProductController::class, 'subcategoryList'])->name('subcategoryList');
    Route::get('/subcategoryEdit/{id}', [ProductController::class, 'subcategoryEdit'])->name('subcategoryEdit');
    Route::post('/subcategory/{id}', [ProductController::class, 'subcategoryUpdate'])->name('subcategoryUpdate');
    Route::get('/subcategoryDelete/{id}', [ProductController::class, 'subcategoryDestory'])->name('subcategoryDestory');
    Route::get('/get-subcategories/{categoryId}', [ProductController::class, 'getSubcategories']);

    

    //product
    Route::post('/productStore', [ProductController::class, 'store'])->name('productStore');
    Route::get('/store', [ProductController::class, 'create'])->name('productCreate');
    Route::get('/porductList', [ProductController::class, 'index'])->name('productList');
    Route::get('/productEdit/{id}', [ProductController::class, 'edit'])->name('productEdit');
    Route::post('/product/{id}', [ProductController::class, 'update'])->name('productUpdate');
    Route::get('/productDelete/{id}', [ProductController::class, 'productDelete'])->name('productDelete');
    Route::get('/product/{id}', [ProductController::class, 'show']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('place-order', [CartController::class, 'placeOrder'])->name('cart.placeOrder');
    Route::get('orderLists', [OrderController::class, 'orderList'])->name('orderList');
});
Route::get('/product', [ProductController::class, 'UserProduct'])->name('UserProduct');
    Route::get('/productDetail/{id}', [ProductController::class, 'UserProductDetail'])->name('UserProductDetail');
    Route::get('/about', [ProductController::class, 'about'])->name('about');
    Route::get('/contact', [ProductController::class, 'contact'])->name('contact');
    Route::get('/subcategoryShow/{id}', [ProductController::class, 'subcategoryShow'])->name('subcategoryShow');
    Route::get('/subcategoryAllShow/{id}', [ProductController::class, 'subcategoryAllShow'])->name('subcategoryAllShow');
    Route::post('/feedback', [ProductController::class, 'feedback'])->name('feedback.store');
    Route::get('search', [ProductController::class, 'search'])->name('search');
    Route::get('searchCat', [ProductController::class, 'searchCat'])->name('searchCat');
Route::middleware('user_admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
});

