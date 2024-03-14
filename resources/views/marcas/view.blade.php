@extends('layouts.app')

@section('title', 'Detalle de la Marca de equipo')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        Detalles de la Marca de equipo
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-md-right">ID:</th>
                                    <td>{{ $marca->id_marca }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-md-right">Nombre de la Marca:</th>
                                    <td>{{ $marca->nombre_marca }}</td>
                                </tr>
                                <!-- Agrega más campos según sea necesario -->
                            </tbody>
                        </table>
                        <div class="form-group row mb-0">
                            <div class="">
                                <a href="{{ route('marcas.index') }}" class="btn btn-success">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
