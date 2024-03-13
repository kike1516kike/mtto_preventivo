@extends('layouts.guest')

@section('title', 'Inicio de Sesión')

@section('content')



    <form method="POST" class="centrado_login col-md-6 mx-auto">
        <h1>Login Cofasa</h1>
        <h6>Mantenimiento Preventivo IT</h6>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @csrf
        <label for="">
            <input name="usuario" type="text" required autofocus value="{{ old('usuario') }}" placeholder="usuario">
        </label>
        <label for="">
            <input name="password" type="password" required placeholder="contraseña">
        </label>
        <button type="submit">Login</button>
    </form>



@endsection
