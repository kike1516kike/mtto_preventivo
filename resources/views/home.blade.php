@extends('layouts.app')

@section('title', 'Pagina de inicio')

@section('content')
    <div class=" container" style="">
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
                <h2>PRECAUCIONES</h2>
                <p class="parrafoInicio">
                    El ordenador es una máquina que está expuesta no solo al ambiente software de los programas que ejecuta,
                    sino también en el que está situado. Es por ello por lo que para evitar en lo posible las averías del
                    ordenador, aparte de tomas precauciones software, también hay que tomar ciertas precauciones físicas.
                    Los factores físicos que pueden dañar la salud del PC son:
                </p>
                <h4>CALOR</h4>
                <p class="parrafoInicio">
                    Los chips electrónicos producen dentro de sí el germen de su destrucción: el calor.
                    Todos os circuitos electrónicos funcionan con electricidad, y la electricidad al circular por cualquier
                    medio, aparte de otros efectos, produce calor. Este calor, si no se disipa de alguna forma, acaba
                    destruyendo el propio circuito. En el caso de los ordenadores, estos esta esquipados con un ventilador
                    que saca el calor del interior de la carcasa expulsándolo al exterior.
                    Si un PC trabaja en un ambiente más bien caluroso, se puede sustituir su ventilador por otro más
                    potente. Un buen ventilador puede llegar a bajar la temperatura interior del PC en más de 20 grados.
                </p>
                <h4>POLVO</h4>
                <p class="parrafoInicio">
                    Con el paso del tiempo, el polvo va cubriendo los circuitos del ordenador, actuando como un aislante
                    térmico. Este hecho hace que el circuito no desaloje todo el calor que debería y acabe fallando. El
                    polvo debe ser limpiado del interior del ordenador de forma periódica. La periodicidad de las
                    operaciones dependen del ambiente donde este situado el PC, pudiéndose dar al regla general el hacerlo
                    una o dos veces al año.
                    Aparte del polvo Térmico, el polvo puede depositarse en el interior de las unidades de disco de los
                    propios zócalos, produciendo problemas de suciedad y de aislamiento. Pero si en este sentido el polvo es
                    perjudicial, la ceniza del tabaco producida al fumar cerca del ordenador resulta también altamente
                    peligrosa.
                    Si a la hora de limpiar el ordenador de polvo se le ocurre soplar en el interior, posiblemente lo único
                    que lograra será mover el polvo de sitio, pero no sacarlo fuera. La mejor fórmula de limpiar el polvo de
                    un PC es mediante un pincel fino, un aspirador de sobremesa, o un bote de aire comprimido, que expulse
                    el polvo del ordenador hacia el exterior de la carcasa o un splay limpiador de placas de residuo cero
                    (este último es recomendable porque además se puede utilizar para limpiar contactos de las distintas
                    placas hardware)
                </p>
                <h4>MAGNETISMO</h4>
                <p class="parrafoInicio">
                    El magnetismo, tanto el producido por los imanes permanentes como los electroimanes, pueden producir
                    perdidas de datos tanto en los disco flexibles como discos duros. En nuestro entorno siempre nos resulta
                    fácil encontrarnos un campo magnético, un motor eléctrico, unos altavoces o cajas acústicas de un equipo
                    de música, una impresora, un televisor ect.
                </p>
                <h4>LOS LIQUIDOS Y LA CORROCION</h4>
                <p class="parrafoInicio">
                    Los líquidos son enemigos mortales de cualquier equipo electrónico. Derramar cualquier clase de líquido
                    sobre el teclado o el ordenador es dejarlo fuera de servicio. Si alguna vez le ocurre esto, la única es
                    desarmar completamente el ordenador y dejarlo secar algunos días en un ambiente seco. Los líquidos
                    pueden
                    introducirse en ranuras insospechadas y mantenerse allí sin secarse durante mucho tiempo. Mientras no
                    estén
                    todas las piezas bien secas existe el riesgo del cortocircuito.
                    El sudor, la humedad, ciertos gases o humos pueden depositarse en los contactos de los circuitos
                    electrónicos del ordenador produciéndose con el paso del tiempo una oxidación, esta corrosión de los
                    contactos puede que el ordenador falle esporádicamente. La mejor medida es no tocar nunca los contactos
                    con
                    los dedos.
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
