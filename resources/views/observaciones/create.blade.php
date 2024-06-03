@extends('layouts.app')

@section('title', 'Crear Observacion')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Evento</h1>
        <form action="{{ route('observaciones.store') }}" method="POST">
            @csrf


   


            <div class="form-group">
                <label for="id_periferico">Periferico:</label>
                <input type="text" id="id_periferico_input" class="form-control" list="perifericos_list"
                    placeholder="Selecciona un periferico" value="{{ $nombrePeriferico }}">
                <datalist id="perifericos_list">
                    @foreach ($perifericos as $periferico)
                        <option value="{{ $periferico->nombre_periferico }}">{{ $periferico->nombre_periferico }}</option>
                    @endforeach
                </datalist>
                <select style="display: none;" id="id_periferico" name="id_periferico">
                    @foreach ($perifericos as $periferico)
                        @if ($periferico->nombre_periferico == $nombrePeriferico)
                            <option value="{{ $periferico->id_periferico }}" selected>{{ $periferico->nombre_periferico }}</option>
                        @else
                            <option value="{{ $periferico->id_periferico }}">{{ $periferico->nombre_periferico }}</option>
                        @endif
                    @endforeach
                </select>
            </div>




            <div class="form-group">
                <label for="descripcion_evento">Descripción del Evento:</label>
                <input type="text" class="form-control" id="descripcion_evento" name="descripcion_evento"
                    value="{{ old('descripcion_evento') }}">
                @error('descripcion_evento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <button type="submit" id="btnGuardar" class="btn btn-success" onclick="mostrarLoading()">Guardar</button>
                <button class="btn btn-primary d-none" type="button" id="btnLoading" disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>
                {{-- <a href="{{ route('equipos.index') }}" class="btn btn-primary">Regresar a Equipos</a> --}}
                <a href="{{ route('observaciones.index') }}" class="btn btn-secondary">Cancelar</a>

            </div>
        </form>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('#id_periferico_input').select2({
            theme: 'bootstrap-5',
            placeholder: 'Selecciona un perifeico',
            allowClear: true, // Permite borrar la selección
        }).on('select2:select', function(e) {
            var data = e.params.data;
            $('#id_periferico').val(data.id).trigger('change');
        }).on('select2:unselect', function(e) {
            $('#id_periferico').val('').trigger('change');
        });

        // Obtener el nombre del equipo seleccionado y mostrarlo en el campo de entrada
        var nombrePerifericoSeleccionado = $('#id_periferico option:selected').text();
        $('#id_periferico_input').val(nombrePerifericoSeleccionado);
    });


</script>
