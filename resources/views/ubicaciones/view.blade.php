@extends('layouts.app')

@section('title', 'Ver Detalles de Ubicacion')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    Detalles de la Ubicacion de equipo
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-md-right">ID:</th>
                                <td>{{ $ubicacion->id_ubicacion }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-md-right">Nombre de la Ubicacion:</th>
                                <td>{{ $ubicacion->nombre_ubicacion }}</td>
                            </tr>
                            <!-- Agrega más campos según sea necesario -->
                        </tbody>
                    </table>
                    <div class="form-group row mb-0">
                        <div class="">
                            <a href="{{ route('ubicaciones.index') }}" class="btn btn-success">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
