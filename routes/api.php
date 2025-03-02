<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonajeController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('personajes', [PersonajeController::class, 'index']);
    Route::post('personajes', [PersonajeController::class, 'store']);
    Route::get('personajes/{id}', [PersonajeController::class, 'show']);
    Route::put('personajes/{id}', [PersonajeController::class, 'update']);
    Route::delete('personajes/delete/{id}', [PersonajeController::class, 'destroy']);
});
