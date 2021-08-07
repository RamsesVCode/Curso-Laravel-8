<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPaymentController;
use App\Http\Controllers\ProductCartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [MainController::class,'index']);



Route::resource('carts',CartController::class)
->only('index');

Route::resource('products.carts',ProductCartController::class)
->only('store','destroy');

Route::resource('orders',OrderController::class)->only(['create','store']);

Route::resource('orders.payments',OrderPaymentController::class)->only(['create','store']);
Auth::routes([
    'verify'=>true,
]);

Route::get('/profile/edit',[ProfileController::class,'edit'])
->name('profile.edit');
Route::put('/profile/update',[ProfileController::class,'update'])
->name('profile.update');


// Route::resource('products',[ProductController::class]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
