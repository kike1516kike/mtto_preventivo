@extends('layouts.app')

@section('title','Editar Marca de Equipo')

@section('content')

    <div class="container">
        <h1>Editar Marca de Equipo</h1>
        <form action="{{ route('marcas.update', $marca) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_marca">Marca:</label>
                <input type="text" class="form-control @error('nombre_marca') is-invalid @enderror" id="nombre_marca" name="nombre_marca" value="{{ old('nombre_marca', $marca->nombre_marca) }}">
                @error('nombre_marca')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Agrega más campos según sea necesario -->
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
