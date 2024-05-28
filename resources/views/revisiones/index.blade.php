@extends('layouts.app')

@section('title', 'Revisiones')

@section('content')

    {{-- @include('revisiones.modals') --}}

    <div class="container ">
        @if (session('success'))
            <div class="alert alert-success notificacion">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger notificacion">
                {{ session('error') }}
            </div>
        @endif
        <h1>Listado de Revisiones</h1>
        <a href="{{ route('revisiones.create') }}" class="btn btn-success mb-3">Crear Nuevo Registro</a>

        <div class="table-responsive">
            <table class="table table-WHITE table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Mantenimiento</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de MTTO</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($revisiones as $revision)
                        <tr>
                            <td scope="row" class="text-center">{{ $revision->id_revision }}</td>
                            <td scope="row" class="text-center">{{ $revision->trimestre_revision }}</td>
                            @if ($revision->estado_revision == true)
                                <td class="text-center">Revisado</td>
                            @else
                                <td class="text-center">Pendiente</td>
                            @endif
                            <td class="text-center">{{ $revision->fecha_creacion }}</td>
                            <td class="text-center">
                                <div class="dropdown">

                                    <img class=" dropdown-toggle" id="dropdownMenuButton{{ $revision->id_revision }}"
                                        data-bs-toggle="dropdown" aria-expanded="false"
                                        src="{{ asset('iconos/tres_puntos.ico') }}" width="15" title="Menu Desplegable">



                                    <ul class="dropdown-menu"
                                        aria-labelledby="dropdownMenuButton{{ $revision->id_revision }}">
                                        <li><a class="dropdown-item"
                                                href="{{ route('revisiones.show', $revision) }}">View</a></li>
                                        @if ($revision->cod_jefe_firma == null)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('revisiones.edit', $revision) }}">Editar</a></li>

                                            <button class="dropdown-item btn btn-danger btn-sm" type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#firmaSaveJefe{{ $revision->id_revision }}">
                                                Firma del Jefe
                                            </button>
                                        @endif


                                        <li><button class="dropdown-item btn btn-danger btn-sm" type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $revision->id_revision }}">Eliminar</button>
                                        </li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay revisiones registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination links --}}
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if ($revisiones->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $revisiones->previousPageUrl() }}"
                                    tabindex="-1">Anterior</a>
                            </li>
                        @endif

                        @foreach ($revisiones->getUrlRange(max(1, $revisiones->currentPage() - 2), min($revisiones->lastPage(), $revisiones->currentPage() + 2)) as $page => $url)
                            <li class="page-item {{ $page == $revisiones->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($revisiones->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $revisiones->nextPageUrl() }}">Siguiente</a>
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


<!-- Modal de eliminar -->
@foreach ($revisiones as $revision)
    <div class="modal fade" id="confirmDeleteModal{{ $revision->id_revision }}" tabindex="-1"
        aria-labelledby="confirmDeleteModalLabel{{ $revision->id_revision }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $revision->id_revision }}">
                        Eliminar Revision</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    ¿Estás seguro de que deseas eliminar esta Revision?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Form for deletion -->
                    <form action="{{ route('revisiones.destroy', $revision->id_revision) }}" method="post"
                        id="deleteForm{{ $revision->id_revision }}" class="frmDelete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach







@foreach ($revisiones as $revision)
    <div class="modal fade" id="firmaSaveJefe{{ $revision->id_revision }}" tabindex="-1"
        aria-labelledby="firmaSaveJefeModalLabel{{ $revision->id_revision }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="firmaSaveJefeModalLabel{{ $revision->id_revision }}">
                        FIRMA DE USUARIO</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ route('revisiones.firma_jefe', $revision->id_revision) }}" method="POST"
                        id="saveForm{{ $revision->id_revision }}" class="frmSave">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="cod_jefe_firma" class="form-label">Código del Jefe</label>
                            <input type="text" class="form-control" id="cod_jefe_firma" name="cod_jefe_firma"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_jefe_firma" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="nombre_jefe_firma"
                                name="nombre_jefe_firma" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_jefe_firma" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password_jefe_firma"
                                name="password_jefe_firma" required>
                        </div>
                        <!-- Agrega aquí tus validaciones -->
                        <button type="submit" class="btn btn-primary btn-sm">Firmar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


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
