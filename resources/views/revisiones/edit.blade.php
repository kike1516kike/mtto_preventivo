@extends('layouts.app')

@section('title', 'Editar Revision')

@section('content')
    <div class="container">
        <h1>Editar Revision</h1>
        <form action="{{ route('revisiones.update', $revision) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="trimestre_revision">Mantenimiento N°:</label>
                <select class="form-control @error('trimestre_revision') is-invalid @enderror" id="trimestre_revision" name="trimestre_revision">
                    @foreach(['primer MTTO', 'segundo MTTO', 'tercer MTTO'] as $trimestre)
                        <option value="{{ $trimestre }}" {{ old('trimestre_revision', $revision->trimestre_revision) == $trimestre ? 'selected' : '' }}>
                            {{ $trimestre }}
                        </option>
                    @endforeach
                </select>
                @error('trimestre_revision')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
             <div class="form-group">
                <label for="fecha_creacion">Fecha de Revision:</label>
                <input type="date" class="form-control @error('fecha_creacion') is-invalid @enderror"
                    id="fecha_creacion" name="fecha_creacion"
                    value="{{ old('fecha_creacion', $revision->fecha_creacion ? \Carbon\Carbon::parse($revision->fecha_creacion)->format('Y-m-d') : '') }}">
                @error('fecha_creacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            {{-- <div class="form-group">
                <label for="cod_jefe_firma">Codigo de Jefe:</label>
                <input type="text" class="form-control @error('cod_jefe_firma') is-invalid @enderror" id="cod_jefe_firma"
                    name="cod_jefe_firma" value="{{ old('cod_jefe_firma', $revision->cod_jefe_firma) }}">
                @error('cod_jefe_firma')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}
            {{-- <div class="form-group">
                <label for="fecha_firma">Fecha de Firma:</label>
                <input type="date" class="form-control @error('fecha_firma') is-invalid @enderror"
                    id="fecha_firma" name="fecha_mantenimiento"
                    value="{{ old('fecha_firma', $revision->fecha_firma ? \Carbon\Carbon::parse($revision->fecha_firma)->format('Y-m-d') : '') }}">
                @error('fecha_firma')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

            <!-- Agrega más campos según sea necesario -->
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('revisiones.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
