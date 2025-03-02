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
        // Validación de los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'vida_maxima' => 'required|integer',
            'danio' => 'required|integer',
            'velocidad' => 'required|integer',
        ]);

        // Si hay errores en la validación, devuelve una respuesta con los errores
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Creación del personaje utilizando solo los campos necesarios
            $personaje = Personaje::create($request->only(['nombre', 'descripcion', 'vida_maxima', 'danio', 'velocidad']));

            // Respuesta de éxito con el nuevo personaje
            return response()->json([
                'success' => true,
                'data' => $personaje,
                'message' => 'Personaje creado con éxito'
            ], 201);
        } catch (\Exception $e) {
            // En caso de error en la base de datos, devuelve un error 500
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al crear el personaje',
                'error' => $e->getMessage(),
            ], 500);
        }
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
    public function destroy($id)
    {
        try {
            $personaje = Personaje::findOrFail($id);  // Usa findOrFail para obtener el personaje por ID
            $personaje->delete();

            return response()->json([
                'success' => true,
                'message' => 'Personaje eliminado con éxito'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Personaje no encontrado'
            ], 404);
        }
    }


}
