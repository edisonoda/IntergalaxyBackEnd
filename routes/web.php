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

Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('home');
Route::get('admin', [App\Http\Controllers\ProductsController::class, 'index'])->name('admin.home')->middleware('is_admin');

Route::resource('products', 'App\Http\Controllers\ProductsController');
Route::resource('{user}/orders', 'App\Http\Controllers\OrdersController');

Route::get('/profile/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('profile');
Route::get('/profile/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}/edit', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');