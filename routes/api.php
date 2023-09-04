<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;


//AUTH
Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([

    'middleware' => 'auth:api',

], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

    Route::post('/pet/store', [PetController::class, 'store']);
});
