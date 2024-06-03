@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

    <div class="container">
        <h1>Lista de Usuarios</h1>
        <a href="{{ route('usuarios.create') }}" class="btn btn-success mb-3">Crear Nuevo Usuario</a>
        <div class="table-responsive">
            <table class="table table-white table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <th scope="row" class="text-center">{{ $usuario->id }}</th>
                            <td class="text-center">{{ $usuario->usuario }}</td>
                            @if ( $usuario->rol == 2)
                                    <td class="text-center">Estandar</td>
                                @else
                                    <td class="text-center">Administrador</td>
                                @endif
                            {{-- <td class="text-center">{{ $usuario->rol }}</td> --}}
                            <td class="text-center">
                                <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('usuarios.show', $usuario) }}" class="btn btn-info btn-sm">Ver</a>

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $usuario->id }}">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination links -->
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if ($usuarios->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $usuarios->previousPageUrl() }}" tabindex="-1">Anterior</a>
                            </li>
                        @endif

                        @foreach ($usuarios->getUrlRange(max(1, $usuarios->currentPage() - 2), min($usuarios->lastPage(), $usuarios->currentPage() + 2)) as $page => $url)
                            <li class="page-item {{ $page == $usuarios->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($usuarios->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $usuarios->nextPageUrl() }}">Siguiente</a>
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
    @foreach ($usuarios as $usuario)
        <div class="modal fade" id="confirmDeleteModal{{ $usuario->id }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $usuario->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="confirmDeleteModalLabel{{ $usuario->id }}">
                            Eliminar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Estás seguro de que deseas eliminar esta usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Form for deletion -->
                        <form action="{{ route('usuarios.destroy', $usuario) }}" method="post"
                            id="deleteForm{{ $usuario->id }}" class="frmDelete">
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
