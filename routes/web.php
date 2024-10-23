<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('customer', CustomerController::class);

Route::resource('sales', SaleController::class);

Route::resource('products', ProductController::class);

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');



