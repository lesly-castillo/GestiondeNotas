@extends('Plantilla')

@section('titulo', 'Notas')

@section('contenido')

    @if (session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-4">
        <div class="row">
            @forelse($notas as $nota)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header  text-black" style="background: {{ $nota->color }};">
                            
                            {{ $nota->titulo }}
                        </div>
                        <div class="card-body">
                            <p class="card-text font-weight-bold">Categoría: {{ $nota->categoria }}</p>
                            <p class="card-text font-weight-bold">Etiqueta: {{ $nota->etiqueta }}</p>
                            <p class="card-text">{{ $nota->contenido }}</p>
                            <p class="card-text"><small class="text-muted">Fecha: {{ $nota->fecha }}</small></p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('nota.show', ['id' => $nota->id]) }}" class="btn btn-success">Ver</a>
                                <a href="{{ route('nota.editar', ['id' => $nota->id]) }}" class="btn btn-warning">Editar</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $nota->id }}">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-{{ $nota->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Dato</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Quiere que se elimine permanentemente este dato?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-bs-dismisS="modal">No</button>
                                <form method="post" action="{{ route('nota.borrar', [$nota->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-dark">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <p class="col-12">No se encuentran las notas disponibles.</p>
            @endforelse
        </div>
    </div>

    <div class="container mt-3">
        {{ $notas->render('pagination::bootstrap-4') }}
    </div>

@endsection
