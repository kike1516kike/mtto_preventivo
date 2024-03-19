@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <div class="container">
        <h1>Editar Equipo</h1>
        <form action="{{ route('equipos.update', $equipo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre_equipo">Nombre del Equipo:</label>
                <input type="text" class="form-control @error('nombre_equipo') is-invalid @enderror" id="nombre_equipo"
                    name="nombre_equipo" value="{{ old('nombre_equipo', $equipo->nombre_equipo) }}">
                @error('nombre_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fecha_ingreso_equipo">Fecha de ingreso del equipo:</label>
                <input type="date" class="form-control @error('fecha_ingreso_equipo') is-invalid @enderror"
                    id="fecha_ingreso_equipo" name="fecha_ingreso_equipo"
                    value="{{ old('fecha_ingreso_equipo', $equipo->fecha_ingreso_equipo ? \Carbon\Carbon::parse($equipo->fecha_ingreso_equipo)->format('Y-m-d') : '') }}">
                @error('fecha_ingreso_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="cod_act_fijo_equipo">Código de activo fijo:</label>
                <input type="text" class="form-control @error('cod_act_fijo_equipo') is-invalid @enderror"
                    id="cod_act_fijo_equipo" name="cod_act_fijo_equipo"
                    value="{{ old('cod_act_fijo_equipo', $equipo->cod_act_fijo_equipo) }}">
                @error('cod_act_fijo_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tipo_equipo">Tipo de Equipo:</label>
                <input type="text" class="form-control @error('tipo_equipo') is-invalid @enderror" id="tipo_equipo"
                    name="tipo_equipo" value="{{ old('tipo_equipo', $equipo->tipo_equipo) }}">
                @error('tipo_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="modelo_equipo">Modelo de Equipo:</label>
                <input type="text" class="form-control @error('modelo_equipo') is-invalid @enderror" id="modelo_equipo"
                    name="modelo_equipo" value="{{ old('modelo_equipo', $equipo->modelo_equipo) }}">
                @error('modelo_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sistema_operativo_equipo">Sistema Operativo:</label>
                <input type="text" class="form-control @error('sistema_operativo_equipo') is-invalid @enderror"
                    id="sistema_operativo_equipo" name="sistema_operativo_equipo"
                    value="{{ old('sistema_operativo_equipo', $equipo->sistema_operativo_equipo) }}">
                @error('sistema_operativo_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ram_equipo">RAM:</label>
                <input type="number" class="form-control @error('ram_equipo') is-invalid @enderror" id="ram_equipo"
                    name="ram_equipo" value="{{ old('ram_equipo', $equipo->ram_equipo) }}">
                @error('ram_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="procesador_equipo">Procesador:</label>
                <input type="text" class="form-control @error('procesador_equipo') is-invalid @enderror"
                    id="procesador_equipo" name="procesador_equipo"
                    value="{{ old('procesador_equipo', $equipo->procesador_equipo) }}">
                @error('procesador_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="disco_equipo">Disco Duro:</label>
                <input type="text" class="form-control @error('disco_equipo') is-invalid @enderror" id="disco_equipo"
                    name="disco_equipo" value="{{ old('disco_equipo', $equipo->disco_equipo) }}">
                @error('disco_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ip_equipo">IP del Equipo:</label>
                <input type="text" class="form-control @error('ip_equipo') is-invalid @enderror" id="ip_equipo"
                    name="ip_equipo" placeholder="128.100.1.?" value="{{ old('ip_equipo', $equipo->ip_equipo) }}">
                @error('ip_equipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado_equipo">Equipo Deshabilitado:</label>
                <input type="checkbox" class="form-check-input" id="estado_equipo" name="estado_equipo"
                    {{ old('estado_equipo', $equipo->estado_equipo) ? 'checked' : '' }}>
                @error('estado_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Agrega más campos según sea necesario -->
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
