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
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('voffices.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</di
@endsection
