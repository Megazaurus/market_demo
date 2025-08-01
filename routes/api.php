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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', LogoutController::class);

Route::middleware('auth:sanctum')->apiResource('category', CategoryController::class);

Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);

Route::middleware('auth:sanctum')->apiResource('product-images', ProductImageController::class);

Route::middleware('auth:sanctum')->apiResource('review-images', ReviewImageController::class);

Route::middleware('auth:sanctum')->apiResource('reviews', ReviewController::class);

Route::middleware('auth:sanctum')->apiResource('carts', CartController::class);

Route::middleware('auth:sanctum')->apiResource('users', UserController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
