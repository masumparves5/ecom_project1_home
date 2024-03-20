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
Route::get('/product-category/{id}', [ShopGridController::class, 'category']) ->name('product.category');
Route::get('/product-sub-category/{id}', [ShopGridController::class, 'subCategory']) ->name('product.subCategory');
Route::get('/product-detail/{id}', [ShopGridController::class, 'product']) ->name('single.product');

Route::post('/card-add/{id}', [CardController::class, 'addCart']) ->name('card.add');
Route::get('/card-show', [CardController::class, 'index']) ->name('card.show');
Route::post('/cart-update/{row_id}', [CardController::class, 'cartUpdate']) ->name('cart.update');
Route::get('/cart-delete/{row_id}', [CardController::class, 'cartDelete']) ->name('cart.delete');

Route::get('/checkout', [CheckoutController::class, 'index']) ->name('checkout');

Route::post('/new/order', [CheckoutController::class, 'newOrder']) ->name('newOrder');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder']) ->name('complete.order');

Route::get('/customer/login', [CustomerAuthController::class, 'login']) ->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'loginCheck']) ->name('customer.login');
Route::get('/customer/register', [CustomerAuthController::class, 'register']) ->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'CustomerRegister']) ->name('customer.register');

Route::middleware(['customer'])->group(function (){
    Route::get('/customer-dashboard', [CustomerAuthController::class, 'dashboard']) ->name('customer.dashboard');
    Route::get('/customer/logout', [CustomerAuthController::class, 'logout']) ->name('customer.logout');
});




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
    Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');


    Route::get('/product/manage', [ProductController::class, 'index'])->name('product.manage');
    Route::get('/product/add', [ProductController::class, 'create'])->name('product.add');
    Route::get('/get-sub-category-by-category-id', [ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category-id');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/manage/order', [OrderController::class, 'index'])->name('manage.order');
    Route::get('/order/detail/{id}', [OrderController::class, 'orderDetail'])->name('order.detail');
    Route::get('/order/invoice/{id}', [OrderController::class, 'orderInvoice'])->name('order.invoice');
    Route::get('/order/invoice1/{id}', [OrderController::class, 'orderInvoice1'])->name('order.invoice1');
    Route::get('/order/edit/{id}', [OrderController::class, 'orderEdit'])->name('order.edit');
    Route::post('/order/update', [OrderController::class, 'orderUpdate'])->name('order.update');


    Route::get('/user/manage', [UserController::class, 'index'])->name('user.manage');
    Route::get('/user/add', [UserController::class, 'create'])->name('user.add');

});
