@extends('layouts.app')

@section('title', 'Marcas')

@section('content')
    <div class="container">

        <h1>Listado de Marcas</h1>
        <a href="" class="btn btn-primary mb-3">Crear Nueva Marca</a>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Marca de Equipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                        <tr>
                            <td scope="row" class="text-center">{{ $marca->id_marca }}</td>
                            <td class="text-center">{{ $marca->nombre_marca }}</td>
                            <td class="text-center">
                                <a href="" class="btn btn-primary btn-sm">Editar</a>
                                <a href="" class="btn btn-info btn-sm">Ver</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirDeleteModal">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
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

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        
    </div>



@endsection
