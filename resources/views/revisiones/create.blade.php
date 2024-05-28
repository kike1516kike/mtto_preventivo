@extends('layouts.app')

@section('title', 'Crear Mantenimiento')

@section('content')
    <div class="container">
        <h1>Crear Nueva Revisión</h1>
        <form action="{{ route('revisiones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="trimestre_revision">Mantenimeinto N°:</label>
                <select class="form-control" id="trimestre_revision" name="trimestre_revision">
                    <option value="primer MTTO">primer MTTO</option>
                    <option value="segundo MTTO">segundo MTTO</option>
                    <option value="tercer MTTO">tercer MTTO</option>
                </select>
                @error('trimestre_revision')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            {{-- <div class="form-group">
                <label for="fecha_creacion">Fecha de Creacion de Revisión:</label>
                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion"
                    value="{{ old('fecha_creacion') }}">
                @error('fecha_creacion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="form-group">
                <label for="fecha_creacion">Fecha de Creacion de Revisión:</label>
                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion"
                       value="{{ old('fecha_creacion', now()->format('Y-m-d')) }}">
                @error('fecha_creacion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            {{-- <div class="form-group">
                <label for="fecha_mantenimiento">Fecha de Mantenimiento:</label>
                <input type="date" class="form-control" id="fecha_mantenimiento" name="fecha_mantenimiento"
                    value="{{ old('fecha_mantenimiento') }}">
                @error('fecha_mantenimiento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}

            <br>



            <div class="form-group">
                <button type="submit" id="btnGuardar" class="btn btn-primary" onclick="mostrarLoading()">Guardar</button>
                <button class="btn btn-primary d-none" type="button" id="btnLoading" disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>
                <a href="{{ route('revisiones.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
