@extends('Plantilla')

@section('titulo', 'Detalle de Nota')

@section('contenido')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detalle de Nota</h4>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <h5 class="card-title font-weight-bold">Título de Nota: {{ $nota->titulo }}</h5>
                </div>

                <div class="mb-3">
                    <p class="card-text"><b>Categoría:</b> {{ $nota->categoria }}</p>
                </div>

                <div class="mb-3">
                    <p class="card-text"><b>Contenido:</b><br>{{ $nota->contenido }}</p>
                </div>

                <div class="mb-3">
                    <p class="card-text"><b>Fecha:</b> {{ $nota->fecha }}</p>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ route('nota.index') }}" class="btn btn-dark">Volver</a>
                </div>
            </div>
        </div>
    </div>

@endsection
