@extends('layouts.app')

@section('title', 'Crear Version de Offices')

@section('content')
<div class="container">
    <h1>Crear Nueva Version de Offices</h1>
    <form action="{{ route('voffices.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_office">Version de Office:</label>
            <input type="text" class="form-control" id="nombre_office" name="nombre_office" value="{{ old('nombre_office') }}">
            @error('nombre_office')
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
            <a href="{{ route('voffices.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</di
@endsection
