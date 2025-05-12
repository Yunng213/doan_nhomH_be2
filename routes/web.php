<?php

use App\Http\Controllers\BookingControlle;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutControlle;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SoSanhControlle;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Register routes for your application.
|
*/

// Trang chủ
Route::get('/{page?}', [HomeController::class, 'index'])->name('home');

// Chi tiết sản phẩm
Route::get('/single-product/{product}', [HomeController::class, 'product'])->name('single.product');

// Sản phẩm theo danh mục
Route::get('/category-product/{categoryproducts}', [HomeController::class, 'categoryproducts'])->name('category.product');
Route::get('/product-category/{productcategory}', [HomeController::class, 'productcategory'])->name('product.category');
Route::get('/logo-product/{logoproduct}', [HomeController::class, 'logoproduct'])->name('logo.product');

// Top bán chạy
Route::get('/topsellers-product/{topselersproducts}', [HomeController::class, 'topselersproducts'])->name('topsellers.product');

// Tìm kiếm sản phẩm
Route::get('/search-product/{searchproduct}', [HomeController::class, 'searchproduct'])->name('search.product');

// Giỏ hàng
Route::post('/cart/{add}', [CartController::class, 'add'])->name('cart.add')->middleware('auth.check');
Route::get('/cart/{listproduct}', [CartController::class, 'listproduct'])->name('cart.product');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

// Thanh toán
Route::get('/pay/{checkout}', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/pay/{store}', [BookingControlle::class, 'store'])->name('pay');
Route::post('/vnpay_payment', [CheckoutControlle::class, 'vnpay_payment'])->name('vnpay.payment');

// Lọc sản phẩm
Route::get('/shop-product', [HomeController::class, 'locsanpham'])->name('products.arrange');
Route::get('/search-product/{locsanphamtimkiem}', [HomeController::class, 'locsanphamtimkiem'])->name('search.arrange');

// Hiển thị đơn đã đặt
Route::post('/store-product-info', [ProductController::class, 'storeProductInfo'])->name('store.product.info');
Route::get('/dashboard', [ProductController::class, 'showProducts'])->name('dashboard');

// So sánh sản phẩm
Route::post('/sosanh/{sosanh}', [SoSanhControlle::class, 'sosanh'])->name('sosanh.add');
Route::get('/sosanh/{listproduct}', [SoSanhControlle::class, 'listproduct'])->name('sosanh.product');
Route::get('/sosanh/removesosanh/{productId}', [SoSanhControlle::class, 'removesosanh'])->name('sosanh.remove');

// Middleware Authenticated (user đã đăng nhập)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Profile User
    Route::get('/profile_admin', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/profile_admin/update', [App\Http\Controllers\AuthController::class, 'update'])->name('profile.update');

    // CRUD Admin - Product
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products.index');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Phân quyền
Route::post('/admin_product', function () {
    return view('index');
})->middleware('phanquyen');

require __DIR__.'/auth.php';
