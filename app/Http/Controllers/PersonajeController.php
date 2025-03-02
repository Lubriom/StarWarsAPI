<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;
use Illuminate\Support\Facades\Validator;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personajes = Personaje::all();
        return response()->json([
            'success' => true,
            'data' => $personajes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'vida_maxima' => 'required|integer',
            'danio' => 'required|integer',
            'velocidad' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $personaje = Personaje::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $personaje,
            'message' => 'Personaje creado con éxito'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personaje = Personaje::find($id);

        if (!$personaje) {
            return response()->json([
                'success' => false,
                'message' => 'Personaje no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $personaje
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personaje = Personaje::find($id);

        if (!$personaje) {
            return response()->json([
                'success' => false,
                'message' => 'Personaje no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'vida_maxima' => 'required|integer',
            'danio' => 'required|integer',
            'velocidad' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $personaje->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $personaje,
            'message' => 'Personaje actualizado con éxito'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \Log::info("Intentando eliminar personaje con ID: {$id}");  // Añadir un log

        $personaje = Personaje::find($id);

        if (!$personaje) {
            \Log::error("Personaje no encontrado con ID: {$id}");  // Añadir log de error
            return response()->json([
                'success' => false,
                'message' => 'Personaje no encontrado'
            ], 404);
        }

        $personaje->delete();

        \Log::info("Personaje con ID {$id} eliminado con éxito");  // Log de éxito

        return response()->json([
            'success' => true,
            'message' => 'Personaje eliminado con éxito'
        ]);
    }


    /**
     * Search for characters by name or description.
     */
    public function search(Request $request, $query)
    {
        $personajes = Personaje::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('descripcion', 'LIKE', "%{$query}%")
            ->get();

        if ($personajes->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron personajes con ese criterio'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $personajes
        ]);
    }
}
