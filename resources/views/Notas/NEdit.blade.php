@extends('Plantilla')

@section('titulo', 'Editar Nota')

@section('contenido')

    <br><br>
    <form method="POST" action="{{ route('nota.update', [$notas->id]) }}" class="needs-validation">
        @method('PUT')
        @csrf

        <div class="container" style="max-width: 500px;">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Editar Nota</h4>
                    <div>
                        <b>Categoria:</b>
                        <select id="categoria" name="categoria" required>
                            @forelse($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @empty
                                <option>No existe  ninguna categoría</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <div class="card-title" style="font-weight: bold;">TITULO:
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                id="titulo" placeholder="Ingrese el nuevo Titulo"
                                value="{{ old('titulo') ?? $notas->titulo }}" required>

                            @error('titulo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        <div class="card-title" style="font-weight: bold;">Contenido:
                            <textarea class="form-control @error('titulo') is-invalid @enderror" placeholder="Ingrese el nuevo Contenido"
                                id="contenido" name="contenido" rows="4" value="{{ old('contenido') ?? $notas->contenido }}" required></textarea>

                            @error('contenido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        <div class="card-title" style="font-weight: bold;">Fecha:
                            <input type="text" class="form-control @error('fecha') is-invalid @enderror" name="fecha"
                                id="fecha" placeholder="Ingrese la nueva Fecha"
                                value="{{ old('fecha') ?? $notas->fecha }}" required>

                            @error('fecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        
                <div class="card-body">
                    <div class="mb-3">
                        <label for="etiqueta" class="form-label">etiqueta:</label>
                        <input type="etiqueta" class="form-control @error('etiqueta') is-invalid @enderror" name="etiqueta"
                            id="etiqueta" placeholder="Ingrese la etiqueta" value="{{  old('etiqueta') ?? $notas->etiqueta }}" required>
                        @error('etiqueta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    </div>
                    <div class="card-body">
                     <div class="mb-3">
                        <label for="color" class="form-label">Ingrese el color  para la nota:</label>
                        <input type="color" class="form-control @error('color') is-invalid @enderror" name="color"
                            id="color" placeholder="Ingrese el color  para la nota " value="{{ old('color') ?? $notas->color}}" required>
                        @error('color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-custom-primary">Editar</button>
                            <a href="{{ route('nota.index') }}" class="btn btn-custom-success">Regresar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <style>
        .btn-custom-primary {
            background-color: #257580; 
            color: white;
        }

        .btn-custom-success {
            background-color: #2196F3; 
            color: white;
        }
    </style>

@endsection
