@extends('layouts.app')

@section('title', 'Perifericos')

@section('content')
    <div class="container">

        <h1>Listado de Perifericos</h1>
        <a href="{{ route('perifericos.create') }}" class="btn btn-success mb-3">Crear Nuevo Registro</a>
        <div class="table-responsive">
            <table class="table table-WHITE table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Tipo Periferico</th>
                        <th scope="col">Nombre del Periferico</th>
                        {{-- <th scope="col">Usuario asignado</th> --}}
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($perifericos as $periferico)
                        <tr>
                            <td scope="row" class="text-center">{{ $periferico->id_periferico }}</td>
                            <td class="text-center">{{ $periferico->tipo_periferico }}</td>
                            <td class="text-center">{{ $periferico->nombre_periferico }}</td>
                            {{-- <td class="text-center">{{ $nombre_perfil }}</td> --}}
                            <td class="text-center">
                                <a href="{{ route('perifericos.edit', $periferico) }}"
                                    class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('perifericos.show', $periferico) }}" class="btn btn-info btn-sm">Ver</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $periferico->id_periferico }}">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay Perifericos registrados.</td>
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
                        @if ($perifericos->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $perifericos->previousPageUrl() }}"
                                    tabindex="-1">Anterior</a>
                            </li>
                        @endif

                        @foreach ($perifericos->getUrlRange(max(1, $perifericos->currentPage() - 2), min($perifericos->lastPage(), $perifericos->currentPage() + 2)) as $page => $url)
                            <li class="page-item {{ $page == $perifericos->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($perifericos->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $perifericos->nextPageUrl() }}">Siguiente</a>
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
    @foreach ($perifericos as $periferico)
        <div class="modal fade" id="confirmDeleteModal{{ $periferico->id_periferico }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $periferico->id_periferico }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $periferico->id_periferico }}">
                            Eliminar Periferico</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Estás seguro de que deseas eliminar este periferico?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Form for deletion -->
                        <form action="{{ route('perifericos.destroy', $periferico->id_periferico) }}" method="post"
                            id="deleteForm{{ $periferico->id_periferico }}" class="frmDelete">
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
