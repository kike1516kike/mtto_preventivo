@extends('layouts.app')

@section('title', 'Crear Evento')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Evento</h1>
        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="descripcion_evento">Descripción del Evento:</label>
                <input type="text" class="form-control" id="descripcion_evento" name="descripcion_evento"
                    value="{{ old('descripcion_evento') }}">
                @error('descripcion_evento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
