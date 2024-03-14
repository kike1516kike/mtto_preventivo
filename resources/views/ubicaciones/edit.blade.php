@extends('layouts.app')

@section('title', 'Editar Ubicacion')

@section('content')

<div class="container">
    <h1>Editar Ubicacion de Equipo</h1>
    <form action="{{ route('ubicaciones.update', $ubicacion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre_ubicacion">Ubicacion:</label>
            <input type="text" class="form-control @error('nombre_ubicacion') is-invalid @enderror" id="nombre_ubicacion" name="nombre_ubicacion" value="{{ old('nombre_ubicacion', $ubicacion->nombre_ubicacion) }}">
            @error('nombre_ubicacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Agrega más campos según sea necesario -->
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('ubicaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
