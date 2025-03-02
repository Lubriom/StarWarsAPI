@extends('layouts.master')
@section('titulo','Personajes Star Wars')
@section('header')
    <h2 class="mx-auto text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono justify-self-center">Lista de Personajes</h2>
@endsection
@section('content')


    <a href="{{ route('personajes.create') }}" class="bg-white text-black px-6 py-2 rounded-full mb-4 inline-block">Crear Nuevo Personaje</a>

    <table class="w-full bg-black/90 rounded-lg shadow-lg">
        <thead>
        <tr>
            <th class="p-4 text-left text-white">Nombre</th>
            <th class="p-4 text-left text-white">Descripción</th>
            <th class="p-4 text-left text-white">Vida Máxima</th>
            <th class="p-4 text-left text-white">Daño</th>
            <th class="p-4 text-left text-white">Velocidad</th>
            <th class="p-4 text-left text-white">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($personajes as $personaje)
            <tr class="border-b border-gray-700">
                <td class="p-4 text-white">{{ $personaje->nombre }}</td>
                <td class="p-4 text-white">{{ $personaje->descripcion }}</td>
                <td class="p-4 text-white">{{ $personaje->vida_maxima }}</td>
                <td class="p-4 text-white">{{ $personaje->danio }}</td>
                <td class="p-4 text-white">{{ $personaje->velocidad }}</td>
                <td class="p-4 text-white">
                    <a href="{{ route('personajes.edit', $personaje) }}" class="bg-yellow-500 text-black px-4 py-2 rounded-full">Editar</a>

                    <!-- Formulario para eliminar personaje con confirmación -->
                    <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <!-- Aquí usamos confirm() para la confirmación -->
                        <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 shadow-md"
                                onclick="return confirm('¿Estás seguro de que quieres eliminar este personaje?');">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
