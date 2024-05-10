<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PlaceController;
use Illuminate\Support\Facades\Route;

/* auth routes */
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

/* categories routes */
Route::resource('/categories', CategoryController::class)
    ->only(['index', 'show']);

Route::resource('/categories', CategoryController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware('auth:sanctum');

/* places routes */
Route::resource('/places', PlaceController::class)
    ->only(['index', 'show']);

Route::resource('/places', PlaceController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware('auth:sanctum');

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
