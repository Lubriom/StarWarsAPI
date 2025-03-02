@extends('layouts.master')
@section('titulo','Crear Personaje')
@section('header')
    <h2 class="mx-auto text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono justify-self-center">Crear un nuevo personaje</h2>
@endsection
@section('content')
    <form action="{{ route('personajes.store') }}" method="POST" class="bg-black/90 p-6 rounded-xl">
        @csrf
        <div class="flex flex-col space-y-4">
            <label for="nombre" class="text-white">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="p-2 bg-white text-black rounded-lg" required>

            <label for="descripcion" class="text-white">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="p-2 bg-white text-black rounded-lg" required>{{ old('descripcion') }}</textarea>

            <label for="vida_maxima" class="text-white">Vida Máxima:</label>
            <input type="number" name="vida_maxima" id="vida_maxima" value="{{ old('vida_maxima') }}" class="p-2 bg-white text-black rounded-lg" required>

            <label for="danio" class="text-white">Daño:</label>
            <input type="number" name="danio" id="danio" value="{{ old('danio') }}" class="p-2 bg-white text-black rounded-lg" required>

            <label for="velocidad" class="text-white">Velocidad:</label>
            <input type="number" name="velocidad" id="velocidad" value="{{ old('velocidad') }}" class="p-2 bg-white text-black rounded-lg" required>

            <button type="submit" class="bg-white text-black px-6 py-2 rounded-full">Crear Personaje</button>
        </div>
    </form>
@endsection
