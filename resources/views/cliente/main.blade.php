@extends('layouts.master')
@section('titulo','Peliculas Star Wars')
@section('header')
    <h2 class="mx-auto text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono justify-self-center">Consultar personajes
        de
        peliculas</h2>
@endsection
@section('content')
    @isset($peliculas)
        <form action="{{route('cliente.personajes')}}" method="POST">
            @csrf
            <div class="flex flex-row items-center bg-black/90 rounded-full px-7 py-3">
                <div>
                    <label for="pelicula">Escoja una pelicula de la que desea saber los personajes</label>
                    <select id="pelicula" name="pelicula" class="p-2 bg-white text-black rounded-lg mx-4">
                        @foreach($peliculas as $pelicula)
                            <option value="{{$pelicula['episode_id']}}">{{$pelicula['title']}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-white text-black px-5 py-2 rounded-full">Consultar</button>
                </div>
                <div>
                    @error('pelicula')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form>
    @endisset
@endsection
