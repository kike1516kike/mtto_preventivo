@extends('layouts.app')

@section('title', 'Detalles de la Revisión')

@section('content')
    <div class="container">
        <h1>Detalles de la Revisión</h1>
        <p><strong>ID de la Revisión:</strong> {{ $revision->id_revision }}</p>
        <p><strong>Trimestre:</strong> {{ $revision->trimestre_revision }}</p>
        <p><strong>Fecha de Creación:</strong> {{ $revision->fecha_creacion }}</p>
        <a href="{{ route('revisiones.index') }}" class="btn btn-primary">Volver</a>
        <!-- Otros detalles de la revisión según sea necesario -->

        <h2>Registros de Mantenimiento</h2>
        @if ($registros->isEmpty())
            <p>No hay registros de mantenimiento asociados a esta revisión.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha de Mantenimiento</th>
                        <th>Trimestre de Mantenimiento</th>
                        <th>Código de Empleado</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->fecha_mantenimiento }}</td>
                            <td>{{ $registro->trimestre_mantenimiento }}</td>
                            <td>{{ $registro->cod_empleado_mtto }}</td>
                            <td>{{ $registro->observacion_mtto }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination links --}}
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <nav arial-label="Page navegation example">
                        <ul class="pagination">
                            @if ($registros->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $registros->previousPageUrl() }}"
                                        tabindex="-1">Anterior</a>
                                </li>
                            @endif

                            @foreach ($registros->getUrlRange(1, $registros->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $registros->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($registros->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $registros->nextPageUrl() }}">Siguiente</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Siguiente</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
    </div>

    @endif

@endsection
