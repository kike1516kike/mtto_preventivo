@extends('layouts.app')

@section('title', 'Crear Marcas de equipo')

@section('content')
<div class="container">
    <h1>Crear Nuevo Marca</h1>
    <form action="{{ route('marcas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_marca">Marca:</label>
            <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" value="{{ old('nombre_marca') }}">
            @error('nombre_marca')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <button type="submit" id="btnGuardar" class="btn btn-primary" onclick="mostrarLoading()">Guardar</button>
                <button class="btn btn-primary d-none" type="button" id="btnLoading" disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>
            <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
