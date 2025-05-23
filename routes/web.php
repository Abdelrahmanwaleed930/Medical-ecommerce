<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order-confirmation', [CheckoutController::class, 'confirmation'])->name('order.confirmation');

// Admin routes (Breeze auth required)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
    Route::get('admin/products/{product}/logs', [AdminProductController::class, 'logs'])->name('products.logs');
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show']);
});

require __DIR__.'/auth.php';
