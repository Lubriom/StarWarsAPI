<?php

namespace App\Http\Controllers;
use App\Http\Requests\BuscarPeliculaRequest;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{
    public function index(){
        $response = Http::get('https://swapi.dev/api/films/');
        $peliculas = $response->json();

        return view("cliente.main")->with("peliculas", $peliculas['results']);
    }

    public function personaje(BuscarPeliculaRequest $request){
        $request->validated();
        $pelicula = Http::get("https://swapi.dev/api/films/{$request->pelicula}/")->json();
        $responses = Http::pool(fn($pool) => array_map(fn($url) => $pool->get($url), $pelicula['characters']));

        $personajes = array_map(fn($response) => $response->json(), $responses);
        return view('cliente.personaje')->with("personajes", $personajes)->with("pelicula", $pelicula);
    }
    public function detalleVehiculo($id)
    {
        $vehiculo = Http::get("https://swapi.dev/api/vehicles/{$id}/")->json();

        return view('cliente.vehiculo')->with("vehiculo", $vehiculo);
    }
}
