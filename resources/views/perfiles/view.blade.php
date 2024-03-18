@extends('layouts.app')

@section('title', 'Ver Detalles del Perfil')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        Detalles del Perfil
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-md-right">ID:</th>
                                    <td>{{ $perfil->id_perfil }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Codigo de Empleado:</th>
                                    <td>{{ $perfil->cod_empleado }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Nombres del Usuario:</th>
                                    <td>{{ $perfil->nombres_perfil }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Apellidos del Usuario:</th>
                                    <td>{{ $perfil->apellidos_perfil }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Cargo del Usuario:</th>
                                    <td>{{ $perfil->cargo_perfil }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Estado del Usuario:</th>
                                    @if ($perfil->estado_perfil == true)
                                        <td>{{ $perfil->estado_perfil }}</td>}
                                    @else
                                        <td>Habilitado</td>
                                    @endif

                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Observaciones:</th>
                                    <td>{{ $perfil->observacion_perfil }}</td>
                                </tr>
                                <!-- Agrega más campos según sea necesario -->
                            </tbody>
                        </table>
                        <div class="form-group row mb-0">
                            <div class="">
                                <a href="{{ route('perfiles.index') }}" class="btn btn-success">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
