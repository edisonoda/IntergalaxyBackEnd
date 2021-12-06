<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// Homepages
Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('home');

// Profile routes
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

// Product routes
Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/products/show/{product}', [App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');

// Cart routes
Route::get('/{user}/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/{user}/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::delete('/{user}/cart/{cart}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

// Order routes
Route::get('/orders/{user}', [App\Http\Controllers\OrdersController::class, 'indexByUser'])->name('orders.index');
Route::post('/orders', [App\Http\Controllers\OrdersController::class, 'store'])->name('orders.store');
Route::delete('/orders/{order}', [App\Http\Controllers\OrdersController::class, 'destroy'])->name('orders.destroy');

Route::middleware(['is_admin'])->group(function (){
    Route::get('/admin', [App\Http\Controllers\ProductsController::class, 'index'])->name('admin.home');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('products.create');
    Route::delete('/products/{product}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
    Route::get('/products/{product}/edit', [App\Http\Controllers\ProductsController::class, 'edit'])->name('products.edit');
    Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders');
    Route::put('/orders/{order}', [App\Http\Controllers\OrdersController::class, 'update'])->name('orders.update');
});