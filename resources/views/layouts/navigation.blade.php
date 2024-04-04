<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('home') }}">MTTO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                {{-- <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}">Inicio</a>
                </li> --}}
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Gestión
                    </a>
                    <ul class="dropdown-menu bg-dark">
                        <li class="nav-item">
                            <a class="dropdown-item text-white negro" href="{{ route('usuarios.index') }}">Usuarios</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item text-white negro" href="{{ route('marcas.index') }}">Marcas</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item text-white negro"
                                href="{{ route('ubicaciones.index') }}">Ubicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item text-white negro" href="{{ route('voffices.index') }}">V.Office</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item text-white negro" href="{{ route('perfiles.index') }}">Perfiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item text-white negro" href="{{ route('equipos.index') }}">Equipos</a>
                        </li>
                        <li class="nav-item negro">
                            <a class="dropdown-item text-white" href="{{ route('perifericos.index') }}">Perifericos</a>
                        </li>
                        <li class="nav-item negro">
                            <a class="dropdown-item text-white" href="{{ route('eventos.index') }}">Eventos</a>
                        </li>
                        <li class="nav-item negro">
                            <a class="dropdown-item text-white" href="{{ route('mantenimientos.index') }}">Mantenimientos</a>
                        </li>
                        <li class="nav-item negro">
                            <a class="dropdown-item text-white" href="{{ route('mantenimientos.revision') }}">Revisión</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">

                    <form style="display: inline;" action="/logout" method="POST" id="logoutForm">
                        @csrf
                        <a class="nav-link text-white" href="#" onclick="logout()">Logout</a>
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
