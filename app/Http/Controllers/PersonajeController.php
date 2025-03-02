<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;
class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personajes = Personaje::all();
        return view('personajes.index', compact('personajes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'vida_maxima' => 'required|integer',
            'danio' => 'required|integer',
            'velocidad' => 'required|integer',
        ]);

        Personaje::create($request->all()); // Crear el nuevo personaje

        return redirect()->route('personajes.index')->with('success', 'Personaje creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personaje $personaje)
    {
        return view('personajes.show', compact('personaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personaje $personaje)
    {
        return view('personajes.edit', compact('personaje'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Personaje $personaje)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'vida_maxima' => 'required|integer',
            'danio' => 'required|integer',
            'velocidad' => 'required|integer',
        ]);

        $personaje->update($request->all()); // Actualizar el personaje

        return redirect()->route('personajes.index')->with('success', 'Personaje actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personaje $personaje)
    {
        $personaje->delete(); // Eliminar el personaje

        return redirect()->route('personajes.index')->with('success', 'Personaje eliminado con éxito');
    }
}
