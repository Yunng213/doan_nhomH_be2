<?php

use App\Helper\SoSanh;
use App\Http\Controllers\BookingControlle;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartLastController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutControlle;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SoSanhControlle;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\AdminMiddleware;
use App\Models\DonDaDatSession;
use App\Models\Product;
use App\Http\Controllers\UserController;


Paginator::useBootstrap();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Trang chu
Route::get('/{page?}', [HomeController::class, 'index']);

//Chi Tiet San Pham
Route::get('/single-product/{product}',[HomeController::class,'product'])->name('single.product');
//Route::get('/single-product/{id}', [ProductController::class, 'show'])->name('single.product');

//San pham theo danh muc
Route::get('/category-product/{categoryproducts}', [HomeController::class, 'categoryproducts'])->name('category');
Route::get('/product-category/{productcategory}', [HomeController::class, 'productcategory'])->name('product.category');
Route::get('/logo-product/{logoproduct}', [HomeController::class, 'logoproduct'])->name('logo.product');

//Top khuyen mai
Route::get('/topsellers-product/{topselersproducts}', [HomeController::class, 'topselersproducts'])->name('topsellers.product');

//Tim kiem san pham
Route::get('/search-product/{searchproduct}', [HomeController::class, 'searchproduct'])->name('timkiem.product');
//Route::get('/search', [ProductController::class, 'search'])->name('products.arrange');


//Gio Hang
Route::post('/cart/{add}', [CartController::class, 'add'])->name('cart.add')->middleware('auth.check');
Route::get('/cart/{listproduct}', [CartController::class, 'listproduct'])->name('cart.product');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

//Thanh Toan
Route::get('/pay/{checkout}', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/pay/{store}', [BookingControlle::class, 'store'])->name('pay');
Route::post('/vnpay_payment', [CheckoutControlle::class, 'vnpay_payment']);


//Loc san pham
Route::get('/products/arrange', [HomeController::class, 'locsanpham'])->name('products.arrange');
Route::get('/search-product/{locsanphamtimkiem}', [HomeController::class, 'locsanphamtimkiem'])->name('search.arrange');


//Hien thi don da dat
Route::post('/store-product-info', [ProductController::class, 'storeProductInfo']);
Route::get('/dashboard', [ProductController::class, 'showProducts']);

//So sanh san pham
Route::post('/sosanh/{sosanh}', [SoSanhControlle::class, 'sosanh'])->name('sosanh.add');
Route::get('/sosanh/{listproduct}', [SoSanhControlle::class, 'listproduct'])->name('sosanh.product');
Route::get('/sosanh/removesosanh/{productId}', [SoSanhControlle::class, 'removesosanh'])->name('sosanh.remove');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile_admin', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/profile_admin', [App\Http\Controllers\AuthController::class, 'update'])->name('profile_update');
    Route::post('/profile_admin', [ProfileController::class, 'update'])->name('profile_admin');



    //CRUD ADMIN
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        
        
    });
    //Route::delete('delete/{id}', 'destroy')->name('products.destroy');
    Route::get('/products/index', [ProductController::class, 'allProduct'])->name('products.allProduct');
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/statistics', [ProductController::class, 'statistics'])->name('products.statistics');
    Route::get('/monthly-revenue', [ProductController::class, 'monthlyRevenue'])->name('products.monthly-revenue');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Phan quyen
Route::post('/admin_product', function () {
    return view('index');
})->middleware('phanquyen');

Route::resource('users', UserController::class);
//curd user
Route::get('{page}', [HomeController::class, 'index']);

Route::get('/nhanvien', [HomeController::class, 'nhanvien_index'])->name('nhanvien.index');
Route::get('/nhanvien/create', [HomeController::class, 'nhanvien_create'])->name('nhanvien.create');
Route::post('/nhanvien', [HomeController::class, 'nhanvien_store'])->name('nhanvien.store');
Route::get('/nhanvien/{id}/edit', [HomeController::class, 'nhanvien_edit'])->name('nhanvien.edit');
Route::put('/nhanvien/{id}', [HomeController::class, 'nhanvien_update'])->name('nhanvien.update');
Route::delete('/nhanvien/{id}', [HomeController::class, 'nhanvien_destroy'])->name('nhanvien.destroy');


