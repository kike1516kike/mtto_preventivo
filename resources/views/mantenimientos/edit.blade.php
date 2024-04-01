@extends('layouts.app')

@section('title', 'Editar Mantenimiento')

@section('content')
    <div class="container">
        <h1>Editar Equipo</h1>
        <form action="{{ route('mantenimientos.update', $mantenimiento) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="fecha_mantenimiento">Fecha de Mantenimiento:</label>
                <input type="date" class="form-control @error('fecha_mantenimiento') is-invalid @enderror"
                    id="fecha_mantenimiento" name="fecha_mantenimiento"
                    value="{{ old('fecha_mantenimiento', $mantenimiento->fecha_mantenimiento ? \Carbon\Carbon::parse($mantenimiento->fecha_mantenimiento)->format('Y-m-d') : '') }}">
                @error('fecha_mantenimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="form-group">
                <label for="trimestre_mantenimiento">Trimestre de mantenimiento:</label>
                <select class="form-control @error('trimestre_mantenimiento') is-invalid @enderror" id="trimestre_mantenimiento" name="trimestre_mantenimiento">
                    @foreach($opciones_tipo_equipo  as $tipo)
                        <option value="{{ $tipo }}" {{ old('trimestre_mantenimiento', $mantenimiento->trimestre_mantenimiento) == $tipo ? 'selected' : '' }}>
                            {{ $tipo }}
                        </option>
                    @endforeach
                </select>
                @error('trimestre_mantenimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="trimestre_mantenimiento">Trimestre de mantenimiento:</label>
                <select class="form-control @error('trimestre_mantenimiento') is-invalid @enderror" id="trimestre_mantenimiento" name="trimestre_mantenimiento">
                    @foreach(['1° Trimestre', '2° Trimestre', '3° Trimestre'] as $trimestre)
                        <option value="{{ $trimestre }}" {{ old('trimestre_mantenimiento', $mantenimiento->trimestre_mantenimiento) == $trimestre ? 'selected' : '' }}>
                            {{ $trimestre }}
                        </option>
                    @endforeach
                </select>
                @error('trimestre_mantenimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cod_empleado_mtto">Codigo de Empleado:</label>
                <input type="text" class="form-control @error('cod_empleado_mtto') is-invalid @enderror" id="cod_empleado_mtto"
                    name="cod_empleado_mtto" value="{{ old('cod_empleado_mtto', $mantenimiento->cod_empleado_mtto) }}">
                @error('cod_empleado_mtto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="observacion_mtto">Observaciones:</label>
                <textarea class="form-control @error('observacion_mtto') is-invalid @enderror" id="observacion_mtto"
                    name="observacion_mtto" rows="5">{{ old('observacion_mtto', $mantenimiento->observacion_mtto) }}</textarea>
                @error('observacion_mtto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Agrega más campos según sea necesario -->
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
