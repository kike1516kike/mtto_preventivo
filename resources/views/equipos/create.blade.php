@extends('layouts.app')

@section('title', 'Crear Equipo')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Equipo</h1>
        <form action="{{ route('equipos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre_equipo">Nombre del Equipo:</label>
                <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo"
                    value="{{ old('nombre_equipo') }}">
                @error('nombre_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="fecha_ingreso_equipo">Fecha de ingreso del equipo:</label>
                <input type="date" class="form-control" id="fecha_ingreso_equipo" name="fecha_ingreso_equipo"
                       value="{{ old('fecha_ingreso_equipo', now()->format('Y-m-d')) }}">
                @error('fecha_ingreso_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <br>
            <div class="form-group">
                <label for="id_perfil">Colaborador asignado:</label>
                <select class="form-control" id="id_perfil" name="id_perfil">
                    <option value="">Selecciona Colaborador</option>
                    @foreach ($perfiles as $perfil)
                        <option value="{{ $perfil->id_perfil }}">{{ $perfil->nombres_perfil . ' ' . $perfil->apellidos_perfil }}
                        </option>
                    @endforeach
                </select>
                @error('id_perfil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="id_ubicacion">Ubicacion del equipo:</label>
                <select class="form-control" id="id_ubicacion" name="id_ubicacion">
                    <option value="">Selecciona Ubicacion</option>
                    @foreach ($ubicaciones as $ubicacion)
                        <option value="{{ $ubicacion->id_ubicacion }}">{{ $ubicacion->nombre_ubicacion }}</option>
                    @endforeach
                </select>
                @error('id_ubicacion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="cod_act_fijo_equipo">Codigo de activo Fijo:</label>
                <input type="text" class="form-control" id="cod_act_fijo_equipo" name="cod_act_fijo_equipo"
                    value="{{ old('cod_act_fijo_equipo') }}">
                @error('cod_act_fijo_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="tipo_equipo">Tipo de Equipo:</label>
                <select class="form-control" id="tipo_equipo" name="tipo_equipo">
                    <option value="Laptop">Laptop</option>
                    <option value="Escritorio">Escritorio</option>
                </select>
                @error('tipo_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="id_marca">Marca:</label>
                <select class="form-control" id="id_marca" name="id_marca">
                    <option value="">Selecciona una marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id_marca }}">{{ $marca->nombre_marca }}</option>
                    @endforeach
                </select>
                @error('id_marca')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="modelo_equipo">Modelo de Equipo:</label>
                <input type="text" class="form-control" id="modelo_equipo" name="modelo_equipo"
                    value="{{ old('modelo_equipo') }}">
                @error('modelo_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="sistema_operativo_equipo">Sistema Operativo:</label>
                <input type="text" class="form-control" id="sistema_operativo_equipo" name="sistema_operativo_equipo"
                    value="{{ old('sistema_operativo_equipo') }}">
                @error('sistema_operativo_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="id_office">Version de Office:</label>
                <select class="form-control" id="id_office" name="id_office">
                    <option value="">Selecciona una version de office</option>
                    @foreach ($voffices as $voffice)
                        <option value="{{ $voffice->id_office }}">{{ $voffice->nombre_office }}</option>
                    @endforeach
                </select>
                @error('id_office')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="ram_equipo">RAM:</label>
                <input type="number" class="form-control" id="ram_equipo" name="ram_equipo"
                    value="{{ old('ram_equipo') }}">
                @error('ram_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="procesador_equipo">Procesador:</label>
                <input type="text" class="form-control" id="procesador_equipo" name="procesador_equipo"
                    value="{{ old('procesador_equipo') }}">
                @error('procesador_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div><br>
            <div class="form-group">
                <label for="disco_equipo">Disco Duro:</label>
                <input type="text" class="form-control" id="disco_equipo" name="disco_equipo"
                    value="{{ old('disco_equipo') }}">
                @error('disco_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="ip_equipo">Ip del Equipo:</label>
                <input type="number" class="form-control" id="ip_equipo" name="ip_equipo" placelholder="128.100.1.?"
                    value="{{ old('ip_equipo') }}">
                @error('ip_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="estado_equipo">Equipo Deshabilitado:</label>
                <input type="checkbox" class="form-check-input" id="estado_perfil" name="estado_equipo"
                    {{ old('estado_equipo') ? 'checked' : '' }}>
                @error('estado_equipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="id_evento">Id evento:</label>
                <input type="number" class="form-control" id="id_evento" name="id_evento" placelholder="128.100.1.?"
                    value="{{ old('id_evento') }}">
                @error('id_evento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
