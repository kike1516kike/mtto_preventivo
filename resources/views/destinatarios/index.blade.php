@extends('layouts.app')

@section('title', 'Usuario')

@section('content')
    <div class=" container" style="">
        <div class="row " style=" margin-top:5%;">
            <h1 class="text-center" style="margin-bottom: 15px;">¡Bienvenid@, <?= Auth::user()->usuario ?>! Aquí tienes tu
                registro.</h1>
            <hr style="border: solid 2px #fff;">
            <table class="table table-light table-striped ">
                <tbody>
                    <tr>
                        <th scope="row" class="text-dark">Código de Empleado:</th>
                        <td class="text-dark">{{ $perfil->cod_empleado ?? '' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-dark">Nombres:</th>
                        <td class="text-dark">{{ $perfil->nombres_perfil ?? '' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-dark">Apellidos:</th>
                        <td class="text-dark">{{ $perfil->apellidos_perfil ?? '' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-dark">Cargo:</th>
                        <td class="text-dark">{{ $perfil->cargo_perfil ?? '' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-dark">Última fecha de Modificación:</th>
                        <td class="text-dark">{{ $perfil->created_at ?? '' }}</td>
                    </tr>
                </tbody>
            </table>
            <hr style="border: solid 2px #fff;">
            <h2 class="text-light text-center">Equipo/s</h2>
            @forelse ($equipos as $equipo)
                @if ($loop->count == 1)
                    <div class="col-12 ">
                    @else
                        <div class="col-lg-6 col-md-12">
                @endif
                <table class="table table-light table-striped ">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-dark">Nombre de Equipo:</th>
                            <td class="text-dark">{{ $equipo->nombre_equipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Ubicación del Equipo:</th>
                            <td class="text-dark">(id){{ $equipo->id_ubicacion }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Fecha de ingreso:</th>
                            <td class="text-dark">{{ $equipo->fecha_ingreso_equipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Cod. Activo Fijo:</th>
                            <td class="text-dark">{{ $equipo->cod_act_fijo_equipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Tipo de Equipo:</th>
                            <td class="text-dark">{{ $equipo->tipo_equipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Modelo:</th>
                            <td class="text-dark">{{ $equipo->modelo_equipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Marca:</th>
                            <td class="text-dark">(id){{ $equipo->id_marca }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Sistema Operativo:</th>
                            <td class="text-dark">{{ $equipo->sistema_operativo_equipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Version de Office:</th>
                            <td class="text-dark">(id){{ $equipo->id_office }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">RAM:</th>
                            <td class="text-dark">{{ $equipo->ram_equipo }} GB</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Procesador:</th>
                            <td class="text-dark">{{ $equipo->procesador_equipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Capacidad del Disco de alamacenamiento:</th>
                            <td class="text-dark">{{ $equipo->disco_equipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">Estado del equipo:</th>
                            @if ($equipo->estado_equipo == true)
                                <td class="text-dark">Equipo Desabilitado</td>
                            @else
                                <td class="text-dark">Equipo Habilitado</td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row" class="text-dark">IP:</th>
                            <td class="text-dark">{{ $equipo->ip_equipo }}</td>
                        </tr>

                    </tbody>
                </table>

        </div>

    @empty
        <p class="text-center"><b>No hay Equipos registrados.</b></p>
        @endforelse

        <hr style="border: solid 2px #fff;">
        <h2 class="text-light text-center">Periferico/s</h2>
        @forelse ($perifericos as $periferico)
            @if ($loop->count == 1)
                <div class="col-12">
                @else
                    <div class="col-lg-6 col-md-12">
            @endif

            <table class="table table-light table-striped ">
                <tbody>
                    <tr>
                        <th scope="row" class="text-dark">Tipo de Perifeico:</th>
                        <td class="text-dark">{{ $periferico->tipo_periferico }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-dark">Nombre del Periferico:</th>
                        <td class="text-dark">{{ $periferico->nombre_periferico }}</td>
                    </tr>

                </tbody>
            </table>

    </div>
@empty
    <p class="text-center"><b>No hay Perifericos registrados.</b></p>
    @endforelse

    <hr style="border: solid 2px #fff;">

    <h1 class="text-center">Listado de Mantenimientos</h1>
    <div class="table-responsive">
        <table class="table table-WHITE table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">Fecha</th>
                    {{-- <th scope="col">Trimestre</th> --}}
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mantenimientos as $mantenimiento)
                    <tr>
                        <td scope="row" class="text-center">{{ $mantenimiento->id_mantenimiento }}</td>
                        <td scope="row" class="text-center">{{ $mantenimiento->id_equipo }}</td>
                        <td class="text-center">{{ $mantenimiento->fecha_mantenimiento }}</td>

                        @if ($mantenimiento->finalizado == true)
                            <td class="text-center">Finalizado</td>
                        @else
                            <td class="text-center">En Proceso</td>
                        @endif
                        <td class="text-center">
                            <div class="dropdown">

                                <img class=" dropdown-toggle bg-light "
                                    id="dropdownMenuButton{{ $mantenimiento->id_mantenimiento }}"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    src="{{ asset('iconos/tres_puntos.ico') }}" width="15" title="Menu Desplegable">



                                <ul class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton{{ $mantenimiento->id_mantenimiento }}">

                                    <li><a class="dropdown-item text-center"
                                            href="{{ route('destinatarios.show', $mantenimiento->id_mantenimiento) }}">Ver</a>
                                    </li>

                                    @if ($mantenimiento->cod_usuario_firma == null)
                                        <button class="dropdown-item btn btn-danger btn-sm text-center" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirmSaveModal{{ $mantenimiento->id_mantenimiento }}">
                                            Firma de Usuario
                                        </button>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay mantenimientos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>




    @foreach ($mantenimientos as $mantenimiento)
    <div class="modal fade" id="confirmSaveModal{{ $mantenimiento->id_mantenimiento }}" tabindex="-1"
        aria-labelledby="confirmSaveModalLabel{{ $mantenimiento->id_mantenimiento }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="confirmSaveModalLabel{{ $mantenimiento->id_mantenimiento }}">
                        FIRMA DE USUARIO</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ route('destinatarios.firma_usuario', $mantenimiento->id_mantenimiento) }}"
                        method="POST" id="saveForm{{ $mantenimiento->id_mantenimiento }}" class="frmSave">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="cod_usuario_firma" class="form-label">Código de Empleado</label>
                            <input type="text" class="form-control" id="cod_usuario_firma" name="cod_usuario_firma"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_usuario_firma" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="nombre_usuario_firma"
                                name="nombre_usuario_firma" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_usuario_firma" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password_usuario_firma"
                                name="password_usuario_firma" required>
                        </div>
                        <!-- Agrega aquí tus validaciones -->
                        <button type="submit" class="btn btn-primary btn-sm">Firmar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


    <hr style="border: solid 2px #fff;">
    <br>

    </div>
    </div>
@endsection
