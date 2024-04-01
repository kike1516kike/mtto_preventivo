@extends('layouts.app')

@section('title', 'criterios')

@section('content')
    <div class="container">
        <h1>Criterios del mantenimiento</h1>
        <form action="{{ route('mantenimientos.update_criterios', $mantenimiento->id_mantenimiento) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                @if ($detalles_mtto->isEmpty())
                    <p>No hay criterios disponibles.</p>
                @else
                    <h2>Software</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles_mtto->where('software_detalle_mtto', true) as $detalle)
                                <tr>
                                    <td>{{ $detalle->id_detalle_mtto }}</td>
                                    <td>{{ $detalle->criterio_detalle_mtto }}</td>
                                    <td>
                                        <input type="checkbox" name="criterios[]" value="{{ $detalle->id_detalle_mtto }}" @if ($detalle->selecciona_criterio_mtto) checked @endif>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h2>Hardware</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles_mtto->where('software_detalle_mtto', false) as $detalle)
                                <tr>
                                    <td>{{ $detalle->id_detalle_mtto }}</td>
                                    <td>{{ $detalle->criterio_detalle_mtto }}</td>
                                    <td>
                                        <input type="checkbox" name="criterios[]" value="{{ $detalle->id_detalle_mtto }}" @if ($detalle->selecciona_criterio_mtto) checked @endif>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
