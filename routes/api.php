<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;


Route::apiResource('products', ProductController::class);

Route::apiResource('reviews', ReviewController::class);

Route::apiResource('carts', CartController::class);

Route::apiResource('users', CartController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
