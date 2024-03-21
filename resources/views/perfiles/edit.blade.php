@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')

    <div class="container">
        <h1>Editar Perfil de Usuario</h1>
        <form action="{{ route('perfiles.update', $perfil) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cod_empleado">Codigo de Empleado:</label>
                <input type="text" class="form-control @error('cod_empleado') is-invalid @enderror" id="cod_empleado"
                    name="cod_empleado" value="{{ old('cod_empleado', $perfil->cod_empleado) }}">
                @error('cod_empleado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nombres_perfil">Nombres del Usuario:</label>
                <input type="text" class="form-control @error('nombres_perfil') is-invalid @enderror" id="nombres_perfil"
                    name="nombres_perfil" value="{{ old('nombres_perfil', $perfil->nombres_perfil) }}">
                @error('nombres_perfil')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="apellidos_perfil">Apellidos del Usuario:</label>
                <input type="text" class="form-control @error('apellidos_perfil') is-invalid @enderror"
                    id="apellidos_perfil" name="apellidos_perfil"
                    value="{{ old('apellidos_perfil', $perfil->apellidos_perfil) }}">
                @error('apellidos_perfil')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cargo_perfil">Cargo del Usuario:</label>
                <input type="text" class="form-control @error('cargo_perfil') is-invalid @enderror" id="cargo_perfil"
                    name="cargo_perfil" value="{{ old('cargo_perfil', $perfil->cargo_perfil) }}">
                @error('cargo_perfil')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="estado_perfil">Usuario Deshabilitado:</label>
                <input type="checkbox" class="form-check-input" id="estado_perfil" name="estado_perfil"
                    {{ old('estado_perfil', $perfil->estado_perfil) ? 'checked' : '' }}>
                @error('estado_perfil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="observacion_perfil">Observaciones del Usuario:</label>
                <textarea class="form-control @error('observacion_perfil') is-invalid @enderror" id="observacion_perfil"
                    name="observacion_perfil" rows="5">{{ old('observacion_perfil', $perfil->observacion_perfil) }}</textarea>
                @error('observacion_perfil')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Agrega más campos según sea necesario -->
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('perfiles.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
