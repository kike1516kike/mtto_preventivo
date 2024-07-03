@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class=" container" style="">
        @if (session('error'))
            <div class="alert alert-danger notificacion">
                {{ session('error') }}
            </div>
        @endif
        <div class="row" style=" margin-top:5%;">


            <div class="col-8 ">
                <h1 class="d-flex align-items-center justify-content-center titulo1">Mantenimiento Preventivo de Software y
                    Hardware</h1>
            </div>

            <div class="col-4">
                <div class="row">

                    <h6 class="col-lg-4 col-md-12 d-flex align-items-center justify-content-center"
                        style="font-family: sans-serif; font-style: italic;"><b>Plan de MTTO</b></h6>

                    <a href="http://auxiliarinfo/mtto_preventivo/public/img/mtto.jpg"
                        class="d-flex justify-content-center col-lg-8 col-md-12" target="_bank"><img
                            src="{{ asset('img/mtto.jpg') }}" width="40%" title="Plan de MTTO"></a>

                </div>
            </div>

            <div style="margin-top:2%;">
                <hr>
            </div>
            <div class="col-lg-7 col-md-12 columna1">


                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/comidapc.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/limpiezapc.png') }}" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/objetopc.png') }}" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/emergenciapc.png') }}" class="d-block w-100" alt="...">

                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

<br>
                <p class="parrafoInicio">

                    El ordenador es vulnerable tanto al software como al ambiente físico en el que se encuentra. Para evitar
                    averías, es fundamental tomar precauciones con respecto al calor, el polvo, el magnetismo y los
                    líquidos. El calor generado por los circuitos debe disiparse adecuadamente mediante ventiladores,
                    especialmente en ambientes calurosos. El polvo, que actúa como un aislante térmico, debe limpiarse
                    regularmente con un pincel fino, un aspirador de sobremesa o aire comprimido.

                </p>
                <p class="parrafoInicio">
                    El magnetismo puede causar pérdida de datos en discos flexibles y duros, mientras que los líquidos
                    pueden dejar el ordenador fuera de servicio si se derraman sobre él. En caso de derrame, es necesario
                    desarmarlo y secarlo completamente para evitar cortocircuitos. La corrosión, causada por el sudor, la
                    humedad y ciertos gases, puede afectar los contactos electrónicos. Para prevenirla, es importante no
                    tocar los contactos con los dedos. Mantener estas precauciones prolongará la vida útil del ordenador y
                    evitará problemas.
                </p>

            </div>

            <div class="col-lg-4 col-md-12 columna2">
                <h6 class="tituloMandamiento">Consejos para mantener en buen estado tu PC</h6>
                <ol>
                    <li class="listMandamiento">Mantén al día las actualizaciones.</li>
                    <hr>
                    <li class="listMandamiento">Borra lo que no necesites.</li>
                    <hr>
                    <li class="listMandamiento"> Mantén seguro y protegido tu equipo.</li>
                    <hr>
                    <li class="listMandamiento">Reinicia la computadora.</li>
                    <hr>
                    <li class="listMandamiento"> Carga la batería solo lo necesario.</li>
                    <hr>
                    <li class="listMandamiento"> Evita el sobrecalentamiento del equipo.</li>
                    <hr>
                    <li class="listMandamiento"> Limpia el equipo.</li>
                    <hr>
                    <li class="listMandamiento">Evita situaciones que puedan poner en riesgo tu equipo.</li>
                    <hr>
                </ol>
            </div>


        </div>
    </div>

@endsection
