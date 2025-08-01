<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ReviewImageController;



Route::apiResource('category', CategoryController::class);

Route::apiResource('products', ProductController::class);

Route::apiResource('product-images', ProductImageController::class);

Route::apiResource('review-images', ReviewImageController::class);

Route::apiResource('reviews', ReviewController::class);

Route::apiResource('carts', CartController::class);

Route::apiResource('users', UserController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
