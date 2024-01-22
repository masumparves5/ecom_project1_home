<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopGridController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [ShopGridController::class, 'index']) ->name('home');
Route::get('/product-category', [ShopGridController::class, 'category']) ->name('product.category');
Route::get('/product-detail', [ShopGridController::class, 'product']) ->name('product.detail');
Route::get('/card-show', [CardController::class, 'index']) ->name('card.show');
Route::get('/checkout', [CheckoutController::class, 'index']) ->name('checkout');
Route::get('/customer/login', [CustomerAuthController::class, 'login']) ->name('customer.login');
Route::get('/customer/register', [CustomerAuthController::class, 'login']) ->name('customer.register');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
