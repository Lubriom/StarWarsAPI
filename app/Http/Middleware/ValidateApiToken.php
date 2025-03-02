<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateApiToken
{
    public function handle(Request $request, Closure $next): Response
    {
        // Obtiene el token del header Authorization
        $token = $request->header('Authorization');

        // Token válido de prueba (puedes cambiarlo)
        $tokenValido = 'Bearer tu_token_valido';

        // Validación del token
        if (!$token || $token !== $tokenValido) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
