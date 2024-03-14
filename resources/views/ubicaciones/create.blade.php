@extends('layouts.app')

@section('title', 'Crear Ubicacion')

@section('content')
<div class="container">
    <h1>Crear Nueva Ubicacion</h1>
    <form action="{{ route('ubicaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_ubicacion">Ubicacion:</label>
            <input type="text" class="form-control" id="nombre_ubicacion" name="nombre_ubicacion" value="{{ old('nombre_ubicacion') }}">
            @error('nombre_ubicacion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('ubicaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</di
@endsection
