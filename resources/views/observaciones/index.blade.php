@extends('layouts.app')

@section('title', 'Observaciones')

@section('content')
    <div class="container">

        <h1>Listado de Observaciones</h1>
        {{-- <a href="{{ route('equipos.create', ['id' =>  $idPrimerEquipo]) }}" class="btn btn-success mb-3">Crear Nuevo Registro</a> --}}
        <a href="{{ route('perifericos.index') }}" class="btn btn-success">IR A LISTADO DE PERIFERICOS</a>
        <div class="table-responsive">
            <table class="table table-WHITE table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Descripcion de Periferico</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($observaciones as $observacion)
                        <tr>
                            <td scope="row" class="text-center">{{ $observacion->id_observacion }}</td>
                            <td class="text-center">{{ $observacion->descripcion_evento }}</td>
                            <td class="text-center">
                                <a href="{{ route('observaciones.edit', $observacion) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('observaciones.show', $observacion) }}" class="btn btn-info btn-sm">Ver</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $observacion->id_observacion }}">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay observaciones registrados.</td>
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
                        @if ($observaciones->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $observaciones->previousPageUrl() }}" tabindex="-1">Anterior</a>
                            </li>
                        @endif

                        @foreach ($observaciones->getUrlRange(max(1, $observaciones->currentPage() - 2), min($observaciones->lastPage(), $observaciones->currentPage() + 2)) as $page => $url)
                            <li class="page-item {{ $page == $observaciones->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($observaciones->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $observaciones->nextPageUrl() }}">Siguiente</a>
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
    @foreach ($observaciones as $observacion)
        <div class="modal fade" id="confirmDeleteModal{{ $observacion->id_observacion }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $observacion->id_observacion }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $observacion->id_observacion }}">Eliminar
                            observacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Estás seguro de que deseas eliminar este observacion?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Form for deletion -->
                        <form action="{{ route('observaciones.destroy', $observacion->id_observacion) }}" method="post"
                            id="deleteForm{{ $observacion->id_observacion }}" class="frmDelete">
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
