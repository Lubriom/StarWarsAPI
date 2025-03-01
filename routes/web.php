<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::prefix('cliente')->group( function () {
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::post('/pelicula/personajes', [ClienteController::class, 'personaje'])->name('cliente.personajes');
});
