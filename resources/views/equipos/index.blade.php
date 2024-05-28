@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
    <div class="container">

        <h1>Listado de Equipos</h1>
        <a href="{{ route('equipos.create') }}" class="btn btn-success" >Crear Nuevo Registro</a>
        <a href="{{ route('eventos.index') }}" class="btn btn-primary ">IR A LISTADO DE EVENTOS</a>

        <div class="table-responsive">
            <table class="table table-WHITE table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nombre de Equipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">IP</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($equipos as $equipo)
                        <tr>
                            <td scope="row" class="text-center">{{ $equipo->id_equipo }}</td>
                            <td class="text-center">{{ $equipo->nombre_equipo }}</td>
                            @if ($equipo->estado_equipo == true)
                                <td class="text-center">Desabilitado</td>
                            @else
                                <td class="text-center">Habilitado</td>
                            @endif
                            <td class="text-center">{{ $equipo->ip_equipo }}</td>
                            <td class="text-center">
                                <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('equipos.show', $equipo) }}" class="btn btn-info btn-sm">Ver</a>
                                {{-- <a href="{{ route('equipos.show', $equipo->id_equipo) }}" class="btn btn-dark btn-sm">Evento</a> --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $equipo->id_equipo }}">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay equipos registrados.</td>
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
                        @if ($equipos->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $equipos->previousPageUrl() }}" tabindex="-1">Anterior</a>
                            </li>
                        @endif

                        @foreach ($equipos->getUrlRange(max(1, $equipos->currentPage() - 2), min($equipos->lastPage(), $equipos->currentPage() + 2)) as $page => $url)
                            <li class="page-item {{ $page == $equipos->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($equipos->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $equipos->nextPageUrl() }}">Siguiente</a>
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
    <!-- Modal -->
    @foreach ($equipos as $equipo)
        <div class="modal fade" id="confirmDeleteModal{{ $equipo->id_equipo }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $equipo->id_equipo }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $equipo->id_equipo }}">Eliminar
                            equipo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Estás seguro de que deseas eliminar este equipo?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Form for deletion -->
                        <form action="{{ route('equipos.destroy', $equipo->id_equipo) }}" method="post"
                            id="deleteForm{{ $equipo->id_equipo }}" class="frmDelete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
