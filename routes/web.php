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
Route::get('admin', [App\Http\Controllers\ProductsController::class, 'index'])->name('admin.home')->middleware('is_admin');

// CRUD routes
Route::resource('products', 'App\Http\Controllers\ProductsController');
Route::resource('{user}/orders', 'App\Http\Controllers\OrdersController');
Route::resource('{user}/cart', 'App\Http\Controllers\CartController');

// Profile routes
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit')->middleware('is_admin');;
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update')->middleware('is_admin');;

// Order routes
Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders')->middleware('is_admin');
Route::get('{user}/orders', [App\Http\Controllers\OrdersController::class, 'indexByUser'])->name('orders.index');

//Route::get('{user}/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders.index');
//Route::get('{user}/orders/create', [App\Http\Controllers\OrdersController::class, 'create'])->name('orders.create');
//Route::get('{user}/orders/{order}', [App\Http\Controllers\OrdersController::class, 'show'])->name('orders.show');
//Route::post('{user}/orders', [App\Http\Controllers\OrdersController::class, 'store'])->name('orders.store');
//Route::put('{user}/orders/{order}', [App\Http\Controllers\OrdersController::class, 'update'])->name('orders.update')->middleware('is_admin');
//Route::delete('{user}/orders/{order}', [App\Http\Controllers\OrdersController::class, 'destroy'])->name('orders.destroy')->middleware('is_admin');