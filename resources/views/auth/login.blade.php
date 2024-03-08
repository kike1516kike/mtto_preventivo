@extends('layouts.guest')

@section('title', 'Inicio de Sesión')

@section('content')

<h1>Login Cofasa</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" >
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
