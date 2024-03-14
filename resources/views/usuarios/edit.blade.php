@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario" value="{{ old('usuario', $usuario->usuario) }}">
            @error('usuario')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rol">Rol:</label>
            <input type="number" class="form-control @error('rol') is-invalid @enderror" id="rol" name="rol" value="{{ old('rol', $usuario->rol) }}">
            @error('rol')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Agrega más campos según sea necesario -->
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
