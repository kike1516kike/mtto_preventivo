@extends('layouts.app')

@section('title', 'Editar Observacion')

@section('content')
    <div class="container">
        <h1>Editar Observacion</h1>
        <form action="{{ route('observaciones.update', $observacion) }}" method="POST">
            @csrf
            @method('PUT')

{{--
            <div class="form-group">

                <label for="id_periferico">Periferico:</label>

                <input type="text" id="id_periferico" name="id_periferico" class="form-control" list="perifericos_list"
                    value="{{ $nombre_periferico_actual }}">

                <datalist id="perifericos_list">
                    @foreach ($perifericos as $periferico)
                        <option value="{{ $periferico->id_periferico }}"> {{ $periferico->nombre_periferico }}</option>
                    @endforeach
                </datalist>
            </div> --}}

            <div class="form-group">
                <label for="id_periferico">Periferico:</label>

                <input type="hidden" id="id_periferico_hidden" name="id_periferico"
                    value="{{ $observacion->id_periferico }}">

                <input type="text" id="id_periferico_display" class="form-control"
                    value="{{ $nombre_periferico_actual }}" disabled>

                <datalist id="perifericos_list">
                    @foreach ($perifericos as $periferico)
                        <option value="{{ $periferico->id_periferico }}"> {{ $periferico->nombre_periferico }}</option>
                    @endforeach
                </datalist>
            </div>


            <div class="form-group">
                <label for="descripcion_evento">Descripcion del Evento:</label>
                <input type="text" class="form-control @error('descripcion_evento') is-invalid @enderror"
                    id="descripcion_evento" name="descripcion_evento"
                    value="{{ old('descripcion_evento', $observacion->descripcion_evento) }}">
                @error('descripcion_evento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- Agrega más campos según sea necesario -->
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('observaciones.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
