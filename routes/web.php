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

// CRUD routes
Route::resource('/products', 'App\Http\Controllers\ProductsController');
Route::resource('/{user}/cart', 'App\Http\Controllers\CartController');

// Profile routes
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy')->middleware('is_admin');

// Order routes
Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders')->middleware('is_admin');
Route::get('/orders/{user}', [App\Http\Controllers\OrdersController::class, 'indexByUser'])->name('orders.index');
Route::post('/orders', [App\Http\Controllers\OrdersController::class, 'store'])->name('orders.store');
Route::put('/orders/{order}', [App\Http\Controllers\OrdersController::class, 'update'])->name('orders.update')->middleware('is_admin');
Route::delete('/orders/{order}', [App\Http\Controllers\OrdersController::class, 'destroy'])->name('orders.destroy');