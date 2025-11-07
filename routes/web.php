<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/our-portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/our-blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/our-blogs/{slug}', [FrontendController::class, 'blogDetails'])->name('blogs.details');
Route::get('/place-order', [FrontendController::class, 'placeOrder'])->name('place-order');
Route::post('/place-order', [FrontendController::class, 'submitOrder'])->name('submit-order');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact-us');


Route::get('/dashboard', [OrderController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Order management routes
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
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
