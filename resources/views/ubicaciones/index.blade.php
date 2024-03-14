@extends('layouts.app')

@section('title', 'Ubicaciones')

@section('content')
<div class="container">

    <h1>Listado de Ubicaciones</h1>
    <a href="{{ route('ubicaciones.create') }}" class="btn btn-success mb-3">Crear Nueva Ubicacion</a>
    <div class="table-responsive">
        <table class="table table-WHITE table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Ubicacion de Equipo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ubicaciones as $ubicacion)
                    <tr>
                        <td scope="row" class="text-center">{{ $ubicacion->id_ubicacion }}</td>
                        <td class="text-center">{{ $ubicacion->nombre_ubicacion }}</td>
                        <td class="text-center">
                            <a href="{{ route('ubicaciones.edit', $ubicacion) }}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="{{ route('ubicaciones.show', $ubicacion) }}" class="btn btn-info btn-sm">Ver</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $ubicacion->id_ubicacion }}">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay ubicaciones registradas.</td>
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
                    @if ($ubicaciones->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $ubicaciones->previousPageUrl() }}" tabindex="-1">Anterior</a>
                        </li>
                    @endif

                    @foreach ($ubicaciones->getUrlRange(1, $ubicaciones->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $ubicaciones->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($ubicaciones->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $ubicaciones->nextPageUrl() }}">Siguiente</a>
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
@foreach ($ubicaciones as $ubicacion)
<div class="modal fade" id="confirmDeleteModal{{ $ubicacion->id_ubicacion }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $ubicacion->id_ubicacion }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $ubicacion->id_ubicacion }}">Eliminar Marca</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                ¿Estás seguro de que deseas eliminar esta ubicacion?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <!-- Form for deletion -->
                <form action="{{ route('ubicaciones.destroy', $ubicacion) }}" method="post" id="deleteForm{{ $ubicacion->id_ubicacion }}" class="frmDelete">
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
