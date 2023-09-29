<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


//AUTH
Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([

    'middleware' => 'auth:api',

], function () {

    //AUTH
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

    //PET
    Route::prefix('pet')->group([base_path('Routes/api-pets.php')]);

    //USER
    Route::prefix('user')->group([base_path('Routes/api-users.php')]);

});
