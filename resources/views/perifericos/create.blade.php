@extends('layouts.app')

@section('title', 'Crear Periferico')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Periferico</h1>
        <form action="{{ route('perifericos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="tipo_periferico">Tipo Periferico:</label>
                <input type="text" class="form-control" id="tipo_periferico" name="tipo_periferico"
                    value="{{ old('tipo_periferico') }}">
                @error('tipo_periferico')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <label for="nombre_periferico">Nombre del periferico:</label>
                <input type="text" class="form-control" id="nombre_periferico" name="nombre_periferico"
                    value="{{ old('nombre_periferico') }}">
                @error('nombre_periferico')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <label for="id_perfil">Colaborador asignado:</label>
                <select class="form-control" id="id_perfil" name="id_perfil">
                    <option value="">Selecciona Colaborador</option>
                    @foreach ($perfiles as $perfil)
                        <option value="{{ $perfil->id_perfil }}">{{ $perfil->nombres_perfil . ' ' . $perfil->apellidos_perfil }}
                        </option>
                    @endforeach
                </select>
                @error('id_perfil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            {{-- <div class="form-group">
                <label for="id_evento">Id Evento:</label>
                <input type="number" class="form-control" id="id_evento" name="id_evento"
                    value="{{ old('id_evento') }}">
                @error('id_evento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="form-group" id="botones">
                <button type="submit" id="btnGuardar" class="btn btn-primary" onclick="mostrarLoading()">Guardar</button>
                <button class="btn btn-primary d-none" type="button" id="btnLoading" disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>
                <a href="{{ route('perifericos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection


{{-- <script>
    function mostrarLoading() {
        // Ocultar botón de guardar
        document.getElementById('btnGuardar').classList.add('d-none');
        // Mostrar botón de loading
        document.getElementById('btnLoading').classList.remove('d-none');
    }
</script> --}}
