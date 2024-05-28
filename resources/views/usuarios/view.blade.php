@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    Detalles del Usuario
                </div>
                <div class="card-body">
                    <table class="table tablaview">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-md-right">ID:</th>
                                <td>{{ $usuario->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-md-right">Colaborador:</th>
                                <td>{{ $nombre_perfil }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-md-right">Nombre de Usuario:</th>
                                <td>{{ $usuario->usuario }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-md-right">Rol:</th>
                                <td>{{ $usuario->rol }}</td>
                            </tr>
                            <!-- Agrega más campos según sea necesario -->
                        </tbody>
                    </table>
                    <div class="form-group row mb-0">
                        <div class="">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-success">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
