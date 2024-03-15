@extends('layouts.app')

@section('title', 'Marcas')

@section('content')
    <div class="container">

        <h1>Listado de Marcas</h1>
        <a href="{{ route('marcas.create') }}" class="btn btn-success mb-3">Crear Nueva Marca</a>
        <div class="table-responsive">
            <table class="table table-WHITE table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Marca de Equipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($marcas as $marca)
                        <tr>
                            <td scope="row" class="text-center">{{ $marca->id_marca }}</td>
                            <td class="text-center">{{ $marca->nombre_marca }}</td>
                            <td class="text-center">
                                <a href="{{ route('marcas.edit', $marca) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('marcas.show', $marca) }}" class="btn btn-info btn-sm">Ver</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $marca->id_marca }}">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No hay marcas registradas.</td>
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
                        @if ($marcas->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $marcas->previousPageUrl() }}" tabindex="-1">Anterior</a>
                            </li>
                        @endif

                        @foreach ($marcas->getUrlRange(1, $marcas->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $marcas->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($marcas->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $marcas->nextPageUrl() }}">Siguiente</a>
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
    @foreach ($marcas as $marca)
    <div class="modal fade" id="confirmDeleteModal{{ $marca->id_marca }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $marca->id_marca }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $marca->id_marca }}">Eliminar Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    ¿Estás seguro de que deseas eliminar esta marca?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Form for deletion -->
                    <form action="{{ route('marcas.destroy', $marca) }}" method="post" id="deleteForm{{ $marca->id_marca }}" class="frmDelete">
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
