<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
