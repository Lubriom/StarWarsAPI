@extends('layouts.master')
@section('titulo', 'Detalles del Personaje')
@section('header')
    <h2 class="mx-auto text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono justify-self-center">Detalles del Personaje</h2>
@endsection
@section('content')
    <div class="bg-black/80 rounded-lg p-6 border border-yellow-500">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-xl text-yellow-500 mb-4">Información Básica</h3>
                <p class="text-white mb-2"><span class="font-bold">Nombre:</span> {{ $personaje->nombre }}</p>
                <p class="text-white mb-4"><span class="font-bold">Descripción:</span> {{ $personaje->descripcion }}</p>

                <h3 class="text-xl text-yellow-500 mb-4">Estadísticas</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-white mb-1"><span class="font-bold">Vida Máxima:</span></p>
                        <div class="w-full bg-gray-700 rounded-full h-4">
                            <div class="bg-green-600 h-4 rounded-full" style="width: {{ min(100, $personaje->vida_maxima/10) }}%"></div>
                        </div>
                        <p class="text-white text-right">{{ $personaje->vida_maxima }}</p>
                    </div>

                    <div>
                        <p class="text-white mb-1"><span class="font-bold">Daño:</span></p>
                        <div class="w-full bg-gray-700 rounded-full h-4">
                            <div class="bg-red-600 h-4 rounded-full" style="width: {{ min(100, $personaje->danio/5) }}%"></div>
                        </div>
                        <p class="text-white text-right">{{ $personaje->danio }}</p>
                    </div>

                    <div>
                        <p class="text-white mb-1"><span class="font-bold">Velocidad:</span></p>
                        <div class="w-full bg-gray-700 rounded-full h-4">
                            <div class="bg-blue-600 h-4 rounded-full" style="width: {{ min(100, $personaje->velocidad*10) }}%"></div>
                        </div>
                        <p class="text-white text-right">{{ $personaje->velocidad }}</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col space-y-4 items-start">
                <!-- Aquí puedes añadir más información o una imagen si el modelo lo permite -->
                <div class="bg-gray-800 p-4 rounded-lg w-full">
                    <h3 class="text-xl text-yellow-500 mb-4">Acciones</h3>
                    <div class="flex flex-col space-y-2">
                        <a href="{{ route('personajes.edit', $personaje) }}" class="bg-yellow-500 text-black px-4 py-2 rounded-full text-center">Editar Personaje</a>

                        <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-full hover:bg-red-700"
                                    onclick="return confirm('¿Estás seguro de que quieres eliminar este personaje?');">
                                Eliminar Personaje
                            </button>
                        </form>

                        <a href="{{ route('personajes.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-full text-center">Volver a la lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
