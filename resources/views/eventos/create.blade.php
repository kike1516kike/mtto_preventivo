@extends('layouts.app')

@section('title', 'Crear Evento')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Evento</h1>
        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf


            <div class="form-group">
                <label for="id_equipo">Equipo:</label>
                <input type="text" id="id_equipo_input" class="form-control" list="equipos_list" placeholder="Selecciona un equipo">
                <datalist id="equipos_list">
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->nombre_equipo }}">{{ $equipo->nombre_equipo }}</option>
                    @endforeach
                </datalist>
                <select style="display: none;" id="id_equipo" name="id_equipo">
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id_equipo }}">{{ $equipo->nombre_equipo }}</option>
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
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('#id_equipo_input').select2({
            theme: 'bootstrap-5',
            placeholder: 'Selecciona un equipo',
            allowClear: true, // Permite borrar la selección
        }).on('select2:select', function (e) {
            var data = e.params.data;
            $('#id_equipo').val(data.id).trigger('change');
        }).on('select2:unselect', function (e) {
            $('#id_equipo').val('').trigger('change');
        });

        // Obtener el nombre del equipo seleccionado y mostrarlo en el campo de entrada
        var nombreEquipoSeleccionado = $('#id_equipo option:selected').text();
        $('#id_equipo_input').val(nombreEquipoSeleccionado);
    });
</script>

