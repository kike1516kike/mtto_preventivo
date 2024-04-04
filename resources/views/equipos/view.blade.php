@extends('layouts.app')

@section('title', 'Ver Detalles del Equipo')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        Detalles del Equipo
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-md-right">ID:</th>
                                    <td>{{ $equipo->id_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Fecha de ingreso:</th>
                                    <td>{{ $equipo->fecha_ingreso_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Codigo de activo fijo:</th>
                                    <td>{{ $equipo->cod_act_fijo_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Tipo de equipo:</th>
                                    <td>{{ $equipo->tipo_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Marca:</th>
                                    <td>{{ $nombre_marca }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Modelo:</th>
                                    <td>{{ $equipo->modelo_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Sistema Operativo:</th>
                                    <td>{{ $equipo->sistema_operativo_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">RAM:</th>
                                    <td>{{ $equipo->ram_equipo }}</td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-md-right">Procesador:</th>
                                    <td>{{ $equipo->procesador_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Disco:</th>
                                    <td>{{ $equipo->disco_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Estado del equipo:</th>
                                    @if ($equipo->estado_equipo == true)
                                        <td>Desabilitado</td>
                                    @else
                                        <td>Habilitado</td>
                                    @endif

                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">IP:</th>
                                    <td>{{ $equipo->ip_equipo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Version de Office:</th>
                                    <td>{{ $nombre_office }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Perfil:</th>
                                    <td>{{ $nombre_perfil }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Ubicacion:</th>
                                    <td>{{ $nombre_ubicacion }}</td>
                                </tr>
                                {{-- <tr>
                                    <th scope="row" class="text-md-right">Id Evento:</th>
                                    <td>{{ $id_evento }}</td>
                                </tr> --}}
                                <!-- Agrega más campos según sea necesario -->
                            </tbody>
                        </table>
                        <div class="form-group row mb-0">
                            <div class="">
                                <a href="{{ route('equipos.index') }}" class="btn btn-success">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
