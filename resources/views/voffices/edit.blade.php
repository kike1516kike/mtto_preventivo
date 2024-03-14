@extends('layouts.app')

@section('title', 'Editar Version de Office')

@section('content')

<div class="container">
    <h1>Editar Version de Office</h1>
    <form action="{{ route('voffices.update', $voffice) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre_office">Versio de office:</label>
            <input type="text" class="form-control @error('nombre_office') is-invalid @enderror" id="nombre_office" name="nombre_office" value="{{ old('nombre_office', $voffice->nombre_office) }}">
            @error('nombre_office')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Agrega más campos según sea necesario -->
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('voffices.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
