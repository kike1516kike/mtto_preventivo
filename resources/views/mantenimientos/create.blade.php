{{-- @extends('layouts.app')

@section('title', 'Crear Mantenimiento')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Mantenimiento</h1>
        <form action="{{ route('mantenimientos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="fecha_mantenimiento">Fecha de Mantenimiento:</label>
                <input type="date" class="form-control" id="fecha_mantenimiento" name="fecha_mantenimiento"
                    value="{{ old('fecha_mantenimiento') }}">
                @error('fecha_mantenimiento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <br>
            <div class="form-group">
                <label for="cod_empleado_mtto">Codigo de empleado:</label>
                <input type="number" class="form-control" id="cod_empleado_mtto" name="cod_empleado_mtto"
                    value="{{ old('cod_empleado_mtto') }}">
                @error('cod_empleado_mtto')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <label for="observacion_mtto">Observaciones:</label>
                <textarea class="form-control" id="observacion_mtto" name="observacion_mtto" rows="5">{{ old('observacion_mtto') }}</textarea>
                @error('observacion_mtto')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection --}}
