<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/orders', \App\Http\Controllers\OrdersController::class)->name('orders');
Route::get('/product', \App\Http\Controllers\ProductController::class)->name('product');

Route::get('/women', [CategoryController::class, 'women'])->name('women');
Route::get('/men', [CategoryController::class, 'men'])->name('men');
Route::get('/kids', [CategoryController::class, 'kids'])->name('kids');
Route::get('/accessories', [CategoryController::class, 'accessories'])->name('accessories');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/support', [PageController::class, 'support'])->name('support');
Route::get('/invoicing', [PageController::class, 'invoicing'])->name('invoicing');
Route::get('/contract', [PageController::class, 'contract'])->name('contract');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
