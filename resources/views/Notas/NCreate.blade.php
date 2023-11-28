@extends('Plantilla')

@section('titulo', 'Crear Nota')

@section('contenido')

    <div class="container mt-4">
        <form method="POST" action="{{ route('nota.store') }}" class="needs-validation" novalidate>
            @csrf
            <div class="card  border: 0px solid #dc3545;  border-radius: 0pxp-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Crear Nota</h4>
                    <div class="ms-2">
                        <label for="categoria" class="mb-0"><b>Categoría:</b></label>
                        <select id="categoria" name="categoria" class="form-select" required>
                            @forelse($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @empty
                                <option disabled>No existe ninguna categoría</option>
                            @endforelse
                        </select>
                    </div>
                </div>
 
                <div class="card-body">
                    <div class="mb-3">
                        <label for="etiqueta" class="form-label">etiqueta:</label>
                        <input type="etiqueta" class="form-control @error('etiqueta') is-invalid @enderror" name="etiqueta"
                            id="etiqueta" placeholder="Ingrese la etiqueta" value="{{ old('etiqueta') }}" required>
                        @error('etiqueta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    </div>
                    <div class="card-body">
                     <div class="mb-3">
                        <label for="color" class="form-label">Ingrese el color  para la nota:</label>
                        <input type="color" class="form-control @error('color') is-invalid @enderror" name="color"
                            id="color" placeholder="Ingrese el color  para la nota " value="{{ old('color') }}" required>
                        @error('color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                            id="titulo" placeholder="Ingrese el Título" value="{{ old('titulo') }}" required>
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido:</label>
                        <textarea class="form-control @error('contenido') is-invalid @enderror" placeholder="Ingrese el Contenido" id="contenido"
                            name="contenido" rows="4" required>{{ old('contenido') }}</textarea>
                        @error('contenido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="text" class="form-control @error('fecha') is-invalid @enderror" name="fecha"
                            id="fecha" placeholder="Ingrese la Fecha" value="{{ old('fecha') }}" required>
                        @error('fecha')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Crear Nota</button>
                        <a href="{{ route('nota.index') }}" class="btn btn-link">Regresar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        (function () {
            'use strict';

            var forms = document.querySelectorAll('.needs-validation');

            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>

@endsection

        