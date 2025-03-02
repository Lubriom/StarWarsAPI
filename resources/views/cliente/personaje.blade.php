@extends('layouts.master')

@section('titulo', 'Películas Star Wars')

@section('header')
    @isset($pelicula)
        <h2 class="mx-auto mt-6 text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono text-center underline underline-offset-8">
            Personajes de: {{ $pelicula['title'] }}
        </h2>
    @endisset
@endsection
@section('content')
    @isset($pelicula, $personajes)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach($personajes as $personaje)
                <div class="p-4 bg-indigo-950 text-white border border-yellow-500 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-yellow-500">{{ $personaje['name'] ?? 'Desconocido' }}</h3>

                    <p><strong>Género:</strong> {{ $personaje['gender'] ?? 'No especificado' }}</p>
                    <p><strong>Altura:</strong> {{ $personaje['height'] ?? 'Desconocida' }} cm</p>
                    <p><strong>Peso:</strong> {{ $personaje['mass'] ?? 'Desconocido' }} kg</p>
                    <p><strong>Cabello:</strong> {{ $personaje['hair_color'] ?? 'Desconocido' }}</p>
                    <p><strong>Ojos:</strong> {{ $personaje['eye_color'] ?? 'Desconocido' }}</p>

                    @if(isset($personaje['vehicles']) && count($personaje['vehicles']) > 0)
                        <p class="mt-2 text-white-200 font-semibold">Vehículos:</p>
                        <ul class="list-decimal list-inside text-white-300 text-sm">
                            @foreach($personaje['vehicles'] as $index => $vehiculoUrl)
                                <li>
                                    Vehiculo:
                                    <a href="{{ route('vehiculo.detalle', ['id' => basename($vehiculoUrl)]) }}"
                                       class="text-yellow-500 hover:underline">
                                        Ver detalles del vehículo
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
    @endisset
@endsection
