<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Registrar middleware globales (se aplican a todas las solicitudes)
        $middleware->append(\App\Http\Middleware\ValidateApiToken::class);

        // Registrar alias para middlewares de ruta
        $middleware->alias([
            'validate.token' => \App\Http\Middleware\ValidateApiToken::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
