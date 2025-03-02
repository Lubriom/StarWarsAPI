@extends('layouts.master')

@section('titulo', 'Detalles del Vehículo')

@section('header')
    <h2 class="mx-auto mt-6 text-2xl text-yellow-500 drop-shadow-lg font-bold font-mono text-center underline underline-offset-8">
        Detalles del Vehículo
    </h2>
@endsection

@section('content')
    <div class="p-4 bg-indigo-950 text-white border border-yellow-500 rounded-lg shadow-lg mx-auto">
        <h3 class="text-lg font-semibold text-yellow-500">{{ $vehiculo['name'] ?? 'Desconocido' }}</h3>
        <p><strong>Modelo:</strong> {{ $vehiculo['model'] ?? 'Desconocido' }}</p>
        <p><strong>Fabricante:</strong> {{ $vehiculo['manufacturer'] ?? 'Desconocido' }}</p>
        <p><strong>Costo:</strong> {{ $vehiculo['cost_in_credits'] ?? 'N/A' }} créditos</p>
        <p><strong>Longitud:</strong> {{ $vehiculo['length'] ?? 'Desconocida' }}</p>
        <p><strong>Capacidad de carga:</strong> {{ $vehiculo['cargo_capacity'] ?? 'Desconocida' }}</p>
        <p><strong>Pasajeros:</strong> {{ $vehiculo['passengers'] ?? 'Desconocido' }}</p>
    </div>
@endsection
