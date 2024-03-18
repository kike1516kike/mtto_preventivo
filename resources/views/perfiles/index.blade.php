@extends('layouts.app')

@section('title', 'Perfiles')

@section('content')
<div class="container">

    <h1>Listado de Perfiles</h1>
    <a href="{{ route('perfiles.create') }}" class="btn btn-success mb-3">Crear Nuevo Perfil</a>
    <div class="table-responsive">
        <table class="table table-WHITE table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Codigo de Empleado</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($perfiles as $perfil)
                    <tr>
                        <td scope="row" class="text-center">{{ $perfil->id_perfil }}</td>
                        <td class="text-center">{{ $perfil->cod_empleado }}</td>
                        <td class="text-center">{{ $perfil->nombres_perfil.$perfil->apellidos_perfil }}</td>
                        <td class="text-center">{{ $perfil->cargo_perfil }}</td>
                        <td class="text-center">
                            <a href="{{ route('perfiles.edit', $perfil) }}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="{{ route('perfiles.show', $perfil) }}" class="btn btn-info btn-sm">Ver</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $perfil->id_perfil }}">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay Perfiles registrados.</td>
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
                    @if ($perfiles->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $perfiles->previousPageUrl() }}" tabindex="-1">Anterior</a>
                        </li>
                    @endif

                    @foreach ($perfiles->getUrlRange(1, $perfiles->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $perfiles->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($perfiles->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $perfiles->nextPageUrl() }}">Siguiente</a>
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
@foreach ($perfiles as $perfil)
<div class="modal fade" id="confirmDeleteModal{{ $perfil->id_perfil }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $perfil->id_perfil }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $perfil->id_perfil }}">Eliminar Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                ¿Estás seguro de que deseas eliminar este Perfil?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <!-- Form for deletion -->
                <form action="{{ route('perfiles.destroy', $perfil) }}" method="post" id="deleteForm{{ $perfil->id_perfile }}" class="frmDelete">
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
