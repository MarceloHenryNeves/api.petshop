<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


//AUTH
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([

    'middleware' => 'auth:api',

], function () {

    //AUTH
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

    //PET
    //Route::prefix('pet')->group([base_path('Routes/api-pets.php')]);

    //USER
    //Route::prefix('user')->group([base_path('Routes/api-users.php')]);

});
Route::prefix('/services')->group(function () {
    Route::get('/all', [ServiceController::class, 'all']);
});
Route::get('/pets/all', [PetController::class, 'all']);
