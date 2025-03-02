@extends('layouts.master')
@section('titulo','Personajes Star Wars')
@section('header')
    <h2 class="mx-auto text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono justify-self-center">Lista de Personajes</h2>
@endsection
@section('content')
    <!-- Formulario de búsqueda -->
    <div class="mb-6">
        <form action="{{ route('personajes.search') }}" method="GET" class="flex gap-2">
            <input type="text" name="query" placeholder="Buscar personaje..."
                   class="px-4 py-2 rounded-lg border border-gray-700 bg-black/50 text-white flex-grow"
                   value="{{ request('query') }}">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Buscar
            </button>
        </form>
    </div>

    <!-- Sección para mostrar los detalles del personaje si se encontró -->
    @if(isset($personajeEncontrado))
        <div class="bg-black/80 rounded-lg p-6 mb-6 border border-yellow-500">
            <h3 class="text-xl text-yellow-500 mb-4">Detalles del Personaje</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-white"><span class="font-bold">Nombre:</span> {{ $personajeEncontrado->nombre }}</p>
                    <p class="text-white"><span class="font-bold">Descripción:</span> {{ $personajeEncontrado->descripcion }}</p>
                    <p class="text-white"><span class="font-bold">Vida Máxima:</span> {{ $personajeEncontrado->vida_maxima }}</p>
                </div>
                <div>
                    <p class="text-white"><span class="font-bold">Daño:</span> {{ $personajeEncontrado->danio }}</p>
                    <p class="text-white"><span class="font-bold">Velocidad:</span> {{ $personajeEncontrado->velocidad }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('personajes.edit', $personajeEncontrado) }}" class="bg-yellow-500 text-black px-4 py-2 rounded-full inline-block mr-2">Editar</a>
                <a href="{{ route('personajes.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-full inline-block">Volver a la lista</a>
            </div>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-600/30 border border-green-500 text-green-100 px-4 py-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-600/30 border border-red-500 text-red-100 px-4 py-2 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

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
                    <a href="{{ route('personajes.show', $personaje) }}" class="bg-blue-500 text-white px-4 py-2 rounded-full inline-block mb-2">Ver</a>
                    <a href="{{ route('personajes.edit', $personaje) }}" class="bg-yellow-500 text-black px-4 py-2 rounded-full inline-block mb-2">Editar</a>

                    <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 shadow-md"
                                onclick="return confirm('¿Estás seguro de que quieres eliminar este personaje?');">
                            Borrar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
