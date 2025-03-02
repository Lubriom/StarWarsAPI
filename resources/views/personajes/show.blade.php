@extends('layouts.master')
@section('titulo','Ver Personaje')
@section('header')
    <h2 class="mx-auto text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono justify-self-center">Detalles del Personaje</h2>
@endsection
@section('content')
    <div class="bg-black/90 p-6 rounded-xl">
        <h3 class="text-white text-2xl">Nombre: {{ $personaje->nombre }}</h3>
        <p class="text-white">Descripción: {{ $personaje->descripcion }}</p>
        <p class="text-white">Vida Máxima: {{ $personaje->vida_maxima }}</p>
        <p class="text-white">Daño: {{ $personaje->danio }}</p>
        <p class="text-white">Velocidad: {{ $personaje->velocidad }}</p>

        <a href="{{ route('personajes.index') }}" class="bg-white text-black px-6 py-2 rounded-full mt-4">Volver a la Lista</a>
    </div>
@endsection
