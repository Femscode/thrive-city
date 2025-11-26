<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/our-portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/our-blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/our-blogs/{slug}', [FrontendController::class, 'blogDetails'])->name('blogs.details');
Route::get('/place-order', [FrontendController::class, 'placeOrder'])->name('place-order');
Route::post('/place-order', [FrontendController::class, 'submitOrder'])->name('submit-order');
// Stripe payment routes
Route::post('/payment/checkout', [PaymentController::class, 'createCheckoutSession'])->name('payment.checkout');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
// Preview thank-you page without Stripe (useful for UI review)
Route::get('/payment/thank-you', [PaymentController::class, 'thankYou'])->name('payment.thankyou');
Route::any('/api/webhook', [PaymentController::class, 'webhook'])->name('payment.webhook');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact-us');

// Marketplace & Cart
Route::get('/marketplace', [FrontendController::class, 'marketplace'])->name('marketplace');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');


Route::get('/dashboard', [OrderController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Order management routes
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/api/orders-data', [OrderController::class, 'getOrdersData'])->name('orders.data');

    // Blog management (admin)
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/admin/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/admin/blog/{slug}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/admin/blog/{slug}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/admin/blog/{slug}', [BlogController::class, 'destroy'])->name('blog.destroy');
});

// Public blog details
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

require __DIR__ . '/auth.php';

// Admin: Categories and Products management
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::patch('products/{product}/toggle-active', [ProductController::class, 'toggleActive'])->name('products.toggle-active');
    Route::get('orders', [OrderController::class, 'list'])->name('orders.index');
    Route::get('analytics', [AnalyticsController::class, 'index'])->name('admin.analytics');
    Route::get('payments', [PaymentController::class, 'index'])->name('admin.payments');
    // Delivery price management
    Route::get('delivery', [DeliveryController::class, 'index'])->name('admin.delivery');
    Route::post('delivery', [DeliveryController::class, 'update'])->name('admin.delivery.update');
});
