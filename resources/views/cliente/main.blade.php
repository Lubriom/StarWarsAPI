@extends('layouts.master')
@section('titulo','Peliculas Star Wars')
@section('header')
    <h2 class="mx-auto mt-6 text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono text-center underline underline-offset-8">Consultar personajes
        de
        peliculas</h2>
@endsection
@section('content')
    @isset($peliculas)
        <form action="{{route('cliente.personajes')}}" method="POST">
            @csrf
            <div class="flex flex-row items-center bg-black/90 rounded-full px-7 py-3">
                <div>
                    <label for="pelicula">Escoja una pelicula de Star Wars para saber los personajes</label>
                    <select id="pelicula" name="pelicula" class="p-2 bg-white text-black rounded-lg mx-4">
                        @foreach($peliculas as $pelicula)
                            <option value="{{$pelicula['episode_id']}}">{{$pelicula['title']}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-white border border-yellow-500 active:border-yellow-900 active:bg-gray-500 text-black px-5 py-2 rounded-full">Consultar</button>
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
