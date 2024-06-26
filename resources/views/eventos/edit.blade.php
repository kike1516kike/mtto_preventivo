@extends('layouts.app')

@section('title', 'Editar Evento')

@section('content')
    <div class="container">
        <h1>Editar Evento</h1>
        <form action="{{ route('eventos.update', $evento) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="id_equipo">Equipo:</label>
                <input type="text" id="id_equipo" name="id_equipo" class="form-control" list="equipos_list"
                   value="{{ $nombre_equipo_actual }}" >
                <datalist id="equipos_list">
                    @foreach ($equipos as $equipo)
                        <option value="{{  $equipo->id_equipo }}" > {{ $equipo->nombre_equipo }}</option>
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label for="descripcion_evento">Descripcion del Evento:</label>
                <input type="text" class="form-control @error('descripcion_evento') is-invalid @enderror"
                    id="descripcion_evento" name="descripcion_evento"
                    value="{{ old('descripcion_evento', $evento->descripcion_evento) }}">
                @error('descripcion_evento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- Agrega más campos según sea necesario -->
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
