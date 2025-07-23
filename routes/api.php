<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    
    Route::apiResource('products', ProductController::class);
    //Route::apiResource('products', ProductController::class);
    //Route::get('/categories', [ProductController::class, 'categories']); // Новый маршрут для категорий
});