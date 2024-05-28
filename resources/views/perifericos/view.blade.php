@extends('layouts.app')

@section('title', 'Ver Detalles del Periferico')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        Detalles del Periferico
                    </div>
                    <div class="card-body">
                        <table class="table tablaview">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-md-right">ID:</th>
                                    <td>{{ $periferico->id_periferico }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Tipo de periferico:</th>
                                    <td>{{ $periferico->tipo_periferico }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Nombre del periferico:</th>
                                    <td>{{ $periferico->nombre_periferico }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">encargado:</th>
                                    <td>{{ $nombre_perfil }}</td>
                                </tr>
                                {{-- <tr>
                                    <th scope="row" class="text-md-right">Id Evento:</th>
                                    <td>{{ $periferico->id_evento }}</td>
                                </tr> --}}
                                <!-- Agrega más campos según sea necesario -->
                            </tbody>
                        </table>
                        <div class="form-group row mb-0">
                            <div class="">
                                <a href="{{ route('perifericos.index') }}" class="btn btn-success">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
