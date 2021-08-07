<?php

use App\Http\Controllers\Panel\PanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\ProductController;

Route::get('/products/index',[ProductController::class,'index'])
->name('product.index');
Route::get('/products/create',[ProductController::class,'create'])
->name('product.create');
Route::post('/products/store',[ProductController::class,'store'])
->name('product.store');
Route::get('/products/{id}/show',[ProductController::class,'show'])
->name('product.show');
Route::get('/products/{id}/edit',[ProductController::class,'edit'])
->name('product.edit');
Route::match(['put','patch'],'/product/{product}/update',[ProductController::class,'update'])
->name('product.update');
Route::delete('/products/{product}/destroy',[ProductController::class,'destroy'])
->name('product.destroy');

Route::get('/',[PanelController::class,'index'])->name('panel.index');
?>