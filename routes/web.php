<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CategoryController;
// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\BannerController;
use App\Http\Controllers\Admin\CouponCodeController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;


Auth::routes();
Route::controller(LoginController::class)->group(function(){
    Route::get('/admin-login',   'showAdminLoginForm');
    // Route::post('/admin-login',  'postAdminLoginForm');
    Route::get('/logout',        'logout');
});

Route::get('/',             [PageController::class, 'showHomePage'])->name('frontend.home');
Route::get('/product-list', [PageController::class, 'showProductListPage'])->name('frontend.product-list');
Route::get('/contact',      [PageController::class, 'showContactUsPage'])->name('frontend.contact-us');
Route::post('/contact',     [PageController::class, 'submitContactUsPage'])->name('frontend.contact-us.submit');
Route::get('/blog',         [PageController::class, 'showBlogPage'])->name('frontend.blog');
Route::get('/blog/{id}',    [PageController::class, 'showBlogDetailsPage'])->name('frontend.blog-details');
Route::get('/about',        [PageController::class, 'showAboutPage'])->name('frontend.about');
Route::get('/order-history/{code?}', [PageController::class, 'showOrderHistory'])->name('frontend.order-history');
Route::get('/product/{id}/share',    [PageController::class,'productShare'])->name('product.share');


Route::controller(CartController::class)->group(function(){
    Route::get('get-cart-list',    'getCartList')->name('cart.list');
    Route::post('add-to-cart',     'addToCart')->name('cart.add');
    Route::get('clear-cart',       'clearCart')->name('cart.clear');
    Route::get('remove-cart/{id}', 'removeCart')->name('cart.remove');
    Route::post('update-cart',     'updateCart')->name('cart.update');
});

Route::controller(CheckoutController::class)->group(function(){
    Route::get('/checkout',  'showCheckoutPage')->name('checkout.show');
    Route::post('/checkout', 'submitCheckoutPage')->name('checkout.submit');
});

Route::controller(WishlistController::class)->group(function(){
    Route::get('/wishlist',                  'showWishlistPage')->name('wishlist.show');
    Route::post('/wishlist',                 'submitWishlistPage')->name('wishlist.submit');
    Route::get('/remove-wishlist-item/{id}', 'removeWishlistItem')->name('wishlist.remove');
});

Route::group(['as'=>'admin.', 'prefix'=>'admin', 'middleware'=>['web', 'admin']], function(){
    # Dashboard
    // Route::get('/',[DashboardController::class, 'dashboard'])->name('dashboard')
    Route::redirect('/', 'admin/banner');

    # Brand Module
    Route::resource('brand', BrandController::class);

    # Category Module
    Route::resource('category', CategoryController::class);

    # Product Module
    Route::resource('product', ProductController::class);
    Route::post('update-product-status', [ProductController::class, 'updateProductStatus']);

    # Order Module
    Route::resource('order', OrderController::class)->only(['index', 'show', 'destroy']);
    Route::post('update-order-status', [OrderController::class, 'updateOrderStatus']);

    # User Module
    Route::resource('user', UserController::class);

    # Blog Module
    Route::resource('blog', BlogController::class);

    # Coupon Code Module
    Route::resource('coupon',CouponCodeController::class);

    # Web Banner Module
    Route::resource('banner',BannerController::class);

    # Message Module
    Route::resource('message', MessageController::class)->only(['index', 'destroy']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::redirect('/admin','/admin/banner')->middleware(['web','admin']);
