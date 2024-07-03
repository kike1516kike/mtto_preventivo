@extends('layouts.app')

@section('title', 'Crear Usuarios')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger notificacion">
                {{ session('error') }}
            </div>
        @endif
        <h1>Crear Nuevo Usuario</h1>
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_perfil">Colaborador asignado:</label>
                <select class="form-control" id="id_perfil" name="id_perfil">
                    <option value="">Selecciona Colaborador</option>
                    @foreach ($perfiles as $perfil)
                        <option value="{{ $perfil->id_perfil }}" {{ old('id_perfil') == $perfil->id_perfil ? 'selected' : '' }}>
                            {{ $perfil->nombres_perfil . ' ' . $perfil->apellidos_perfil }}
                        </option>
                    @endforeach
                </select>
                @error('id_perfil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario"
                    oninput="this.value = this.value.toUpperCase()" value="{{ old('usuario') }}">
                @error('usuario')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="rol">Rol:</label>
                <input type="number" class="form-control" id="rol" name="rol" value="{{ old('rol') }}">
                @error('rol')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="form-group">
                <label for="rol">Nivel:</label>
                <select class="form-control" id="rol" name="rol">
                    <option value="1" {{ old('rol') == '1' ? 'selected' : '' }}>Administrador</option>
                    <option value="2" {{ old('rol') == '2' ? 'selected' : '' }}>Estándar</option>
                    <option value="3" {{ old('rol') == '3' ? 'selected' : '' }}>Básico</option>
                </select>
                @error('rol')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>


            <div class="form-group">
                <button type="submit" id="btnGuardar" class="btn btn-primary" onclick="mostrarLoading()">Guardar</button>
                <button class="btn btn-primary d-none" type="button" id="btnLoading" disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection


@section('scripts')

    <script>
        function mostrarLoading() {
            $('#btnLoading').removeClass('d-none');
            $('#btnGuardar').addClass('d-none');
        }
    </script>
@endsection
