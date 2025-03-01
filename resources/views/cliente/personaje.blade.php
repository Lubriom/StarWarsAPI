@extends('layouts.master')
@section('titulo','Peliculas Star Wars')
@section('header')
    @isset($pelicula)
        <h2 class="mx-auto mt-6 text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono justify-self-center">Personajes de: {{$pelicula['title']}}</h2>
    @endisset
@endsection
@section('content')
@isset($pelicula, $personajes)
    @foreach($personajes as $personaje)
        <div class="p-2 bg-white text-black flex flex-col">
            @foreach($personaje as $clave => $valor)
                <p>{{ucfirst(strtoupper($clave))}}: {{print_r($valor)}}</p>
            @endforeach
        </div>
        <br>
    @endforeach
@endisset

@endsection
