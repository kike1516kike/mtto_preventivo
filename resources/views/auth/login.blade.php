@extends('layouts.guest')

@section('title', 'Inicio de Sesión')

@section('content')


    <form action=""  method="POST" class="text-black">
        @csrf
        <div class="mb-3 text-white">
            <label for="formGroupExampleInput" class="form-label">user</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="user" placeholder="Example input placeholder">
          </div>
          <div class="mb-3 text-white">
            <label for="formGroupExampleInput2" class="form-label">pass</label>
            <input type="password" class="form-control" id="formGroupExampleInput2" name="password" placeholder="Another input placeholder">
          </div>

          <button type="submit" class="btn btn-success">Iniciar Sesiion</button>
    </form>


{{--
    <div class="container ">
        <div class="row col-12 mx-auto">
            <div class="col-6 mx-auto ">
                <form action="" method="POST" class="text-black centrado_login ">
                    @csrf
                    <h2 class="text-white text-center mb-5 display-4 ">Login</h2>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="usuario" placeholder="name@example.com">
                        <label for="usuario">Usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="pass" placeholder="Password">
                        <label for="pass">Contraseña</label>
                    </div>
                    <button type="submit" class="btn btn-light">Iniciar Sesión</button>
                </form>


            </div>
        </div>
    </div> --}}

@endsection
