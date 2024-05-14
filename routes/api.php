<?php

use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\api\PaymodeController;
use App\Http\Controllers\api\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products',[ProductController::class, 'index']) ->name('products');


Route::get('/paymode', [PaymodeController::class, 'index'])->name('paymode');
Route::post('/paymode', [PaymodeController::class, 'store'])->name('paymode.store');
Route::delete('/paymode/{pay_mode}', [PaymodeController::class, 'destroy'])->name('paymode.destroy');
Route::put('/paymode/{pay_mode}', [PaymodeController::class, 'update'])->name('paymode.update');
Route::get('/paymode/{pay_mode}', [PaymodeController::class, 'show'])->name('paymode.show');
