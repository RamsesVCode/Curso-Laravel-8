<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\PanelController;

Route::get('products/index', [ProductController::class,'index'])->name('products.index');

Route::get('products/create', [ProductController::class,'create'])->name('products.create');

Route::post('products', [ProductController::class,'store'])->name('products.store');

Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');

Route::get('products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');

Route::match(['put', 'patch'], 'products/{product}', [ProductController::class,'update'])->name('products.update');

Route::delete('products/{product}', [ProductController::class,'destroy'])->name('products.destroy');

Route::get('/',[PanelController::class,'index'])->name('panel');