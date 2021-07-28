<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductController;


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

Route::get('/product/index',[ProductController::class,'index'])
->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])
->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])
->name('product.store');
Route::get('/product/{id}/show',[ProductController::class,'show'])
->name('product.show');
Route::get('/product/{id}/edit',[ProductController::class,'edit'])
->name('product.edit');
Route::match(['put','patch'],'/product/{product}/update',[ProductController::class,'update'])
->name('product.update');
Route::delete('/product/{product}/destroy',[ProductController::class,'destroy'])
->name('product.destroy');
Auth::routes();


// Route::resource('products',[ProductController::class]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
