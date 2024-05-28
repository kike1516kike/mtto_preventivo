@extends('layouts.app')

@section('title', 'Versiones de Offices')

@section('content')
    <div class="container">

        <h1>Listado de Versiones de Offices</h1>
        <a href="{{ route('voffices.create') }}" class="btn btn-success mb-3">Crear Nueva Version de Office</a>
        <div class="table-responsive">
            <table class="table table-WHITE table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Version de Office</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($voffices as $voffice)
                        <tr>
                            <td scope="row" class="text-center">{{ $voffice->id_office }}</td>
                            <td class="text-center">{{ $voffice->nombre_office }}</td>
                            <td class="text-center">
                                <a href="{{ route('voffices.edit', $voffice) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('voffices.show', $voffice) }}" class="btn btn-info btn-sm">Ver</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $voffice->id_office }}">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No hay V.Offices registradas.</td>
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
                        @if ($voffices->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $voffices->previousPageUrl() }}" tabindex="-1">Anterior</a>
                            </li>
                        @endif

                        @foreach ($voffices->getUrlRange(max(1, $voffices->currentPage() - 2), min($voffices->lastPage(), $voffices->currentPage() + 2)) as $page => $url)
                            <li class="page-item {{ $page == $voffices->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($voffices->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $voffices->nextPageUrl() }}">Siguiente</a>
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
    @foreach ($voffices as $voffice)
        <div class="modal fade" id="confirmDeleteModal{{ $voffice->id_office }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $voffice->id_office }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $voffice->id_office }}">Eliminar
                            Office</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Estás seguro de que deseas eliminar esta Version de Office?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Form for deletion -->
                        <form action="{{ route('voffices.destroy', $voffice) }}" method="post"
                            id="deleteForm{{ $voffice->id_office }}" class="frmDelete">
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
