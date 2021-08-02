<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPaymentController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [MainController::class,'index'])
->middleware(['auth'])->name('dashboard');

// Route::resource('products',"ProductController");

// Route::get('products/index', [ProductController::class,'index'])->name('products.index');

// Route::get('products/create', [ProductController::class,'create'])->name('products.create');

// Route::post('products', [ProductController::class,'store'])->name('products.store');

// Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');

// Route::get('products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');

// Route::match(['put', 'patch'], 'products/{product}', [ProductController::class,'update'])->name('products.update');

// Route::delete('products/{product}', [ProductController::class,'destroy'])->name('products.destroy');

Route::resource('products.carts',ProductCartController::class)
->only(['store','destroy']);

Route::resource('carts',CartController::class)->only(['index']);

Route::resource('orders',OrderController::class)
->only(['create','store'])
->middleware(['verified']);

Route::resource('orders.payments',OrderPaymentController::class)
->only(['create','store'])
->middleware(['verified']);
// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/home',[HomeController::class,'index'])->middleware(['auth'])->name('home.index');
// Auth::routes([
//     'verify'=>true,
//     'reset'=>false,
// ]);
require __DIR__.'/auth.php';
Route::get('/profile/edit',[ProfileController::class,'edit'])
->name('profile.edit');
Route::put('/profile/update',[ProfileController::class,'update'])
->name('profile.update');
