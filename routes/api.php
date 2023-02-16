<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\EmpController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/




Route::post('login', [AuthController::class, 'signin']);
Route::post('registration', [AuthController::class, 'signup']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's
    // Route::post('register', [BlogController::class, 'store']);
    // Route::get('view', [BlogController::class, 'index']);
    // Route::get('view/{id}', [BlogController::class, 'show']);
    // Route::post('edit/{id}', [BlogController::class, 'update']);
    // Route::post('delete/{id}', [BlogController::class, 'destroy']);
    Route::post('register', [EmpController::class, 'store']);
    Route::get('view', [EmpController::class, 'index']);
    Route::get('search/{name}', [EmpController::class, 'search']);
    Route::post('edit/{id}', [EmpController::class, 'update']);
    Route::post('delete/{id}', [EmpController::class, 'destroy']);
});
Route::post('logins', [UserController::class, 'index']);