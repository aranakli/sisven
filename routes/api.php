<?php

use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\api\PaymodeController;
use App\Http\Controllers\api\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//rutas de productos
Route::get('/products',[ProductController::class, 'index']) ->name('products');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

//rutas de customers
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');


//rutas paymode
Route::get('/paymode', [PaymodeController::class, 'index'])->name('paymode');
Route::post('/paymode', [PaymodeController::class, 'store'])->name('paymode.store');
Route::delete('/paymode/{pay_mode}', [PaymodeController::class, 'destroy'])->name('paymode.destroy');
Route::put('/paymode/{pay_mode}', [PaymodeController::class, 'update'])->name('paymode.update');
Route::get('/paymode/{pay_mode}', [PaymodeController::class, 'show'])->name('paymode.show');