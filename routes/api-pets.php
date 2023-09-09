<?php
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::post('/store', [PetController::class, 'store']);
Route::get('/all', [PetController::class, 'all']);
Route::get('/{id_pet}', [PetController::class, 'index']);
