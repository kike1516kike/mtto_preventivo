@extends('layouts.app')

@section('title', 'Mantenimiento')

@section('content')

    @include('mantenimientos.modals')

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1>Listado de Mantenimientos</h1>
        <a href="{{ route('mantenimientos.create') }}" class="btn btn-success mb-3">Crear Nuevo Registro</a>

        <div class="table-responsive">
            <table class="table table-WHITE table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Colaborador</th>
                        <th scope="col">Fecha</th>
                        {{-- <th scope="col">Trimestre</th> --}}
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mantenimientos as $mantenimiento)
                        <tr>
                            <td scope="row" class="text-center">{{ $mantenimiento->id_mantenimiento }}</td>
                            <td scope="row" class="text-center">{{ $mantenimiento->cod_empleado_mtto }}</td>
                            <td class="text-center">{{ $mantenimiento->fecha_mantenimiento }}</td>

                            @if ($mantenimiento->finalizado == true)
                                <td class="text-center">Finalizado</td>
                            @else
                                <td class="text-center">En Proceso</td>
                            @endif
                            <td class="text-center">
                                <div class="dropdown">

                                    <img class=" dropdown-toggle"
                                        id="dropdownMenuButton{{ $mantenimiento->id_mantenimiento }}"
                                        data-bs-toggle="dropdown" aria-expanded="false"
                                        src="{{ asset('iconos/tres_puntos.ico') }}" width="15" title="Menu Desplegable">



                                    <ul class="dropdown-menu"
                                        aria-labelledby="dropdownMenuButton{{ $mantenimiento->id_mantenimiento }}">

                                        <li><a class="dropdown-item"
                                                href="{{ route('mantenimientos.edit', $mantenimiento) }}">Editar</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('mantenimientos.criterio', $mantenimiento) }}">Criterios</a>
                                        </li>
                                        <button class="dropdown-item btn btn-danger btn-sm" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#firmaSaveUaxiliar{{ $mantenimiento->id_mantenimiento }}">
                                            Firma del Jefe
                                        </button>

                                        <li><button class="dropdown-item btn btn-danger btn-sm" type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $mantenimiento->id_mantenimiento }}">Eliminar</button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            {{-- <td class="text-center">
                            <a href="{{ route('mantenimientos.edit', $mantenimiento) }}" class="btn btn-primary btn-sm">Editar</a>
                            {{-- <a href="{{ route('mantenimientos.show', $mantenimiento) }}" class="btn btn-info btn-sm">Ver</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $mantenimiento->id_mantenimiento }}">Eliminar</button>
                        </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay mantenimientos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination links --}}
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <nav arial-label="Page navegation example">
                    <ul class="pagination">
                        @if ($mantenimientos->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $mantenimientos->previousPageUrl() }}"
                                    tabindex="-1">Anterior</a>
                            </li>
                        @endif

                        @foreach ($mantenimientos->getUrlRange(1, $mantenimientos->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $mantenimientos->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($mantenimientos->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $mantenimientos->nextPageUrl() }}">Siguiente</a>
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



@endsection

@section('scripts')
    <script>
        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var route = button.getAttribute('data-route');
            var form = confirmDeleteModal.querySelector('#deleteForm');
            form.action = route;
        });
    </script>


@endsection
