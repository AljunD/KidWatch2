<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\GuardianController;

Route::prefix('/v1')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Guardian Authentication
    |--------------------------------------------------------------------------
    */
    Route::post('/guardian/login', [AuthController::class, 'login']);

    /*
    |--------------------------------------------------------------------------
    | Guardian Protected Endpoints
    |--------------------------------------------------------------------------
    | All routes here require a valid Sanctum token.
    */
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/guardian/logout', [AuthController::class, 'logout']);
        Route::get('/guardian/profile', [GuardianController::class, 'profile']);
        Route::get('/guardian/views', [GuardianController::class, 'views']);
        Route::get('/guardian/children', [GuardianController::class, 'children']);
        Route::get('/guardian/children/{id}', [GuardianController::class, 'showChild']);
    });
});
