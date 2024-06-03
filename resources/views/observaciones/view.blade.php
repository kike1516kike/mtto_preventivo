@extends('layouts.app')

@section('title', 'Ver Detalles de la Observacion')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        Detalles de la Observacion
                    </div>
                    <div class="card-body">
                        <table class="table tablaview">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-md-right">ID:</th>
                                    <td>{{ $observacion->id_observacion }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Periferico:</th>
                                    <td>{{ $nombre_periferico_actual }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Descripcion de la Observacion:</th>
                                    <td>{{ $observacion->descripcion_evento }}</td>
                                </tr>
                                <!-- Agrega más campos según sea necesario -->
                            </tbody>
                        </table>
                        <div class="form-group row mb-0">
                            <div class="">
                                <a href="{{ route('observaciones.index') }}" class="btn btn-success">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
