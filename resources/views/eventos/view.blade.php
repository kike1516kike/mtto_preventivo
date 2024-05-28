@extends('layouts.app')

@section('title', 'Ver Detalles del Evento')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        Detalles del Evento
                    </div>
                    <div class="card-body">
                        <table class="table tablaview">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-md-right">ID:</th>
                                    <td>{{ $evento->id_evento }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Equipo:</th>
                                    <td>{{ $nombre_equipo_actual }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Descripcion de Evento:</th>
                                    <td>{{ $evento->descripcion_evento }}</td>
                                </tr>
                                <!-- Agrega más campos según sea necesario -->
                            </tbody>
                        </table>
                        <div class="form-group row mb-0">
                            <div class="">
                                <a href="{{ route('eventos.index') }}" class="btn btn-success">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
