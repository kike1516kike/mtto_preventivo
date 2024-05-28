@extends('layouts.guest')

@section('title', 'Inicio de Sesión')

@section('content')


{{-- AQUI SE MUESTRA EL ERROR DE CREDENCIALES INCORRECTAS --}}
    @if ($errors->any())
        <div class="alert alert-danger notificacion">

            <div>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        </div>
    @endif

    <div class="loginbox">
        <img src="{{ asset('img/logomtto.jpg') }}" alt="" class="avatar">
        <h1>L C</h1>
        <h6>Mantenimiento Preventivo IT</h6>
        <form method="POST">

            @csrf
            <p>Usuario</p>
            <input name="usuario" type="text" required autofocus value="{{ old('usuario') }}" placeholder="usuario">
            <p>Contraseña</p>
            <input name="password" type="password" required placeholder="contraseña">

            <input type="submit" value="Login">
            <a href="#">Lost your password</a>
            <a href="#">Don't have an account? </a>
        </form>
    </div>


@endsection
