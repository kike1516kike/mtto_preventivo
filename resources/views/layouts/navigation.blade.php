<nav class="navbar navbar-expand-lg navbar-dark bg-light ">
    <div class="container-fluid">
        <a class="navbar-brand text-dark" href="{{ route('home') }}">MTTO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
        style="border-color: black; background-color: black; color: white;">
<span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
</button>





        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                {{-- <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}">Inicio</a>
                </li> --}}
            </ul>

            <ul class="navbar-nav ml-auto">
                {{-- @if (Auth::check() && Auth::user()->name == 'Administrador') --}}
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Gestión
                        </a>
                        <ul class="dropdown-menu bg-light">
                            <li class="nav-item">
                                <a class="dropdown-item text-dark "
                                    href="{{ route('usuarios.index') }}">Usuarios</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item text-dark " href="{{ route('marcas.index') }}">Marcas</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item text-dark "
                                    href="{{ route('ubicaciones.index') }}">Ubicaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item text-dark "
                                    href="{{ route('voffices.index') }}">V.Office</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item text-dark "
                                    href="{{ route('perfiles.index') }}">Perfiles</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item text-dark "
                                    href="{{ route('equipos.index') }}">Equipos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="dropdown-item text-dark "
                                    href="{{ route('perifericos.index') }}">Perifericos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="dropdown-item text-dark" href="{{ route('eventos.index') }}">Eventos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="dropdown-item text-dark"
                                    href="{{ route('mantenimientos.index') }}">Mantenimientos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="dropdown-item text-dark"
                                    href="{{ route('revisiones.index') }}">Revisiones</a>
                            </li>

                        </ul>
                    </li>
                {{-- @else
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Gestión
                        </a>
                        <ul class="dropdown-menu bg-dark">

                            <li class="nav-item negro">
                                <a class="dropdown-item text-white"
                                    href="{{ route('mantenimientos.index') }}">Mantenimientos</a>
                            </li>

                        </ul>
                    </li>
                @endif --}}
                <li class="nav-item">

                    <form style="display: inline;" action="logout" method="POST" id="logoutForm">
                        @csrf
                        <a class="nav-link text-dark" href="#" onclick="logout()">Logout</a>
                    </form>
                </li>

            </ul>




        </div>
    </div>
</nav>


<script>
    function logout() {
        event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
        document.getElementById('logoutForm').submit(); // Enviar el formulario
    }
</script>
