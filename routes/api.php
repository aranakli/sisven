<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategorieController;
use Illuminate\Http\Request;
use App\Http\Controllers\api\PaymodeController;
use App\Http\Controllers\api\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//rutas de productos
Route::get('/products', [ProductController::class, 'index'])->name('products');
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


//rutas pay_modes
Route::get('/pay_modes', [PaymodeController::class, 'index'])->name('pay_modes');
Route::post('/pay_modes', [PaymodeController::class, 'store'])->name('pay_modes.store');
Route::delete('/pay_modes/{pay_mode}', [PaymodeController::class, 'destroy'])->name('pay_modes.destroy');
Route::put('/pay_modes/{pay_mode}', [PaymodeController::class, 'update'])->name('pay_modes.update');
Route::get('/pay_modes/{pay_mode}', [PaymodeController::class, 'show'])->name('pay_modes.show');

//rutas de categories
Route::get('/categories', [CategorieController::class, 'index'])->name('categories');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
