<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;
Route::get('/', [MainController::class, 'index'])->name('home');

Route::prefix('cliente')->group( function () {
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::post('/pelicula/personajes', [ClienteController::class, 'personaje'])->name('cliente.personajes');
    Route::get('/vehiculo/{id}', [ClienteController::class, 'detalleVehiculo'])->name('vehiculo.detalle');
});
Route::prefix('api')->group(function () {
    // Rutas protegidas por el middleware 'validate.token'
    Route::middleware('validate.token')->group(function () {
        Route::get('personajes', [PersonajeController::class, 'index']);
        Route::post('personajes/create', [PersonajeController::class, 'store']);
        Route::get('personajes/{id}', [PersonajeController::class, 'show']);
        Route::put('personajes/update/{id}', [PersonajeController::class, 'update']);
        Route::get('personajes/delete/{id}', [PersonajeController::class, 'destroy']);   });

});
