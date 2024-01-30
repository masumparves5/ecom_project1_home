<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopGridController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;

Route::get('/', [ShopGridController::class, 'index']) ->name('home');
Route::get('/product-category', [ShopGridController::class, 'category']) ->name('product.category');
Route::get('/product-detail', [ShopGridController::class, 'product']) ->name('product.detail');
Route::get('/card-show', [CardController::class, 'index']) ->name('card.show');
Route::get('/checkout', [CheckoutController::class, 'index']) ->name('checkout');
Route::get('/customer/login', [CustomerAuthController::class, 'login']) ->name('customer.login');
Route::get('/customer/register', [CustomerAuthController::class, 'login']) ->name('customer.register');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/brand/manage', [BrandController::class, 'index'])->name('brand.manage');
    Route::get('/brand/add', [BrandController::class, 'create'])->name('brand.add');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');


    Route::get('/category/manage', [CategoryController::class, 'index'])->name('category.manage');
    Route::get('/category/add', [CategoryController::class, 'create'])->name('category.add');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');


    Route::get('/subCategory/manage', [SubCategoryController::class, 'index'])->name('subCategory.manage');
    Route::get('/subCategory/add', [SubCategoryController::class, 'create'])->name('subCategory.add');
    Route::post('/subCategory/store', [SubCategoryController::class, 'store'])->name('subCategory.store');
    Route::get('/subCategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subCategory.edit');
    Route::post('/subCategory/update/{id}', [SubCategoryController::class, 'update'])->name('subCategory.update');
    Route::get('/subCategory/delete/{id}', [SubCategoryController::class, 'delete'])->name('subCategory.delete');


    Route::get('/unit/manage', [UnitController::class, 'index'])->name('unit.manage');
    Route::get('/unit/add', [UnitController::class, 'create'])->name('unit.add');


    Route::get('/product/manage', [ProductController::class, 'index'])->name('product.manage');
    Route::get('/product/add', [ProductController::class, 'create'])->name('product.add');


    Route::get('/user/manage', [UserController::class, 'index'])->name('user.manage');
    Route::get('/user/add', [UserController::class, 'create'])->name('user.add');

});
