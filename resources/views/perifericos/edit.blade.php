@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <div class="container">
        <h1>Editar Equipo</h1>
        <form action="{{ route('equipos.update', $periferico) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tipo_periferico">Tipo Periferico:</label>
                <input type="text" class="form-control @error('tipo_periferico') is-invalid @enderror" id="tipo_periferico"
                    name="tipo_periferico" value="{{ old('tipo_periferico', $periferico->tipo_periferico) }}">
                @error('tipo_periferico')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre_periferico">Nombre del Periferico:</label>
                <input type="text" class="form-control @error('nombre_periferico') is-invalid @enderror" id="nombre_periferico"
                    name="nombre_periferico" value="{{ old('nombre_periferico', $periferico->nombre_periferico) }}">
                @error('nombre_periferico')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_perfil">Colaborador asignado:</label>
                <select class="form-control @error('id_perfil') is-invalid @enderror" id="id_perfil" name="id_perfil">
                    <option value="">Selecciona Colaborador</option>
                    @foreach ($perfiles as $perfil)
                        <option value="{{ $perfil->id_perfil }}"
                            {{ old('id_perfil', $equipo->id_perfil) == $perfil->id_perfil ? 'selected' : '' }}>
                            {{ $perfil->nombres_perfil . ' ' . $perfil->apellidos_perfil }}
                        </option>
                    @endforeach
                </select>
                @error('id_perfil')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Agrega más campos según sea necesario -->
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('periferico.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
