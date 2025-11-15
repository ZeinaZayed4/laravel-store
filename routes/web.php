<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;

require __DIR__.'/auth.php';
require_once __DIR__.'/dashboard.php';

Route::get('', [HomeController::class, 'index'])->name('home');

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
