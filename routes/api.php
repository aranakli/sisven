<?php

use App\Http\Controllers\api\ProductController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products',[ProductController::class, 'index']) ->name('products');

