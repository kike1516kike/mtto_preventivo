@extends('layouts.app')

@section('title', 'Crear Perfil')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Perfil</h1>
        <form action="{{ route('perfiles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cod_empleado">Codigo de Empleado:</label>
                <input type="text" class="form-control" id="cod_empleado" name="cod_empleado"
                    value="{{ old('cod_empleado') }}">
                @error('cod_empleado')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="nombres_perfil">Nombres del Usuario:</label>
                <input type="text" class="form-control" id="nombres_perfil" name="nombres_perfil"
                    value="{{ old('nombres_perfil') }}">
                @error('nombres_perfil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="apellidos_perfil">Apellidos del Usuario:</label>
                <input type="text" class="form-control" id="apellidos_perfil" name="apellidos_perfil"
                    value="{{ old('apellidos_perfil') }}">
                @error('apellidos_perfil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="cargo_perfil">Cargo del Usuario:</label>
                <input type="text" class="form-control" id="cargo_perfil" name="cargo_perfil"
                    value="{{ old('cargo_perfil') }}">
                @error('cargo_perfil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="estado_perfil">Usuario Deshabilitado:</label>
                <input type="checkbox" class="form-check-input" id="estado_perfil" name="estado_perfil"
                    {{ old('estado_perfil') ? 'checked' : '' }}>
                @error('estado_perfil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="observacion_perfil">Observaciones del usuario:</label>
                <textarea class="form-control" id="observacion_perfil" name="observacion_perfil" rows="5">{{ old('observacion_perfil') }}</textarea>
                @error('observacion_perfil')
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
                <a href="{{ route('perfiles.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </di @endsection
