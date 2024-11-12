<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
Route::post('/product/save/{id?}', [ProductController::class, 'save'])->name('product.save');

