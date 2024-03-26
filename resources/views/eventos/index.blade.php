@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
<div class="container">

    <h1>Listado de Eventos</h1>
    <a href="{{ route('eventos.create') }}" class="btn btn-success mb-3">Crear Nuevo Registro</a>
    <div class="table-responsive">
        <table class="table table-WHITE table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Descripcion de Evento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eventos as $evento)
                    <tr>
                        <td scope="row" class="text-center">{{ $evento->id_evento }}</td>
                        <td class="text-center">{{ $evento->descripcion_evento }}</td>
                        <td class="text-center">
                            <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="{{ route('eventos.show', $evento) }}" class="btn btn-info btn-sm">Ver</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $evento->id_evento }}">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay eventos registrados.</td>
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
                    @if ($eventos->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $eventos->previousPageUrl() }}" tabindex="-1">Anterior</a>
                        </li>
                    @endif

                    @foreach ($eventos->getUrlRange(1, $eventos->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $eventos->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($eventos->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $eventos->nextPageUrl() }}">Siguiente</a>
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
@foreach ($eventos as $evento)
<div class="modal fade" id="confirmDeleteModal{{ $evento->id_evento }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $evento->id_evento }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $evento->id_evento }}">Eliminar evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                ¿Estás seguro de que deseas eliminar este evento?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <!-- Form for deletion -->
                <form action="{{ route('eventos.destroy', $evento->id_evento) }}" method="post" id="deleteForm{{ $evento->id_evento }}" class="frmDelete">
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
