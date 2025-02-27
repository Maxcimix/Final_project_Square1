<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrdersController;
use App\Livewire\Shop\Cart;
use App\Livewire\CartComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', HomeController::class)->name('home');

// Rutas del carrito
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

// Category routes
Route::get('/women', [CategoryController::class, 'women'])->name('women');
Route::get('/men', [CategoryController::class, 'men'])->name('men');
Route::get('/kids', [CategoryController::class, 'kids'])->name('kids');
Route::get('/accessories', [CategoryController::class, 'accessories'])->name('accessories');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Cart route
Route::get('/cart', Cart::class)->name('cart');

// Order routes
Route::get('/orders', OrdersController::class)->name('orders');

// Static pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/support', [PageController::class, 'support'])->name('support');
Route::get('/invoicing', [PageController::class, 'invoicing'])->name('invoicing');
Route::get('/contract', [PageController::class, 'contract'])->name('contract');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Auth routes
Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';