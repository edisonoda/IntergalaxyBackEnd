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
Route::get('/admin', [App\Http\Controllers\ProductsController::class, 'index'])->name('admin.home')->middleware('is_admin');

// Profile routes
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy')->middleware('is_admin');

// Product routes
Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/products/show/{product}', [App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('products.store')->middleware('is_admin');
Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('products.create')->middleware('is_admin');
Route::delete('/products/{product}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy')->middleware('is_admin');
Route::put('/products/{product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('products.update')->middleware('is_admin');
Route::get('/products/{product}/edit', [App\Http\Controllers\ProductsController::class, 'edit'])->name('products.edit')->middleware('is_admin');

// Cart routes
Route::get('/{user}/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/{user}/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::delete('/{user}/cart/{cart}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

// Order routes
Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders')->middleware('is_admin');
Route::get('/orders/{user}', [App\Http\Controllers\OrdersController::class, 'indexByUser'])->name('orders.index');
Route::post('/orders', [App\Http\Controllers\OrdersController::class, 'store'])->name('orders.store');
Route::put('/orders/{order}', [App\Http\Controllers\OrdersController::class, 'update'])->name('orders.update')->middleware('is_admin');
Route::delete('/orders/{order}', [App\Http\Controllers\OrdersController::class, 'destroy'])->name('orders.destroy');