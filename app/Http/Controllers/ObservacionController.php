<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use App\Models\Periferico;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{
   /**
     * Validate the incoming request.
     */
    private function validar(Request $request)
    {
        $request->validate([
            'descripcion_evento' => 'required|string|max:255',
            'id_periferico' => 'required|integer',
            // Agrega más validaciones según sea necesario
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $primerPeriferico = Periferico::first(); // Obtiene el primer registro de la tabla de equipos
        $idPrimerPeriferico = $primerPeriferico ? $primerPeriferico->id_periferico : null; // Obtén el ID del primer equipo si existe

        $observaciones = Observacion::paginate(10);

        return view('observaciones.index', compact('observaciones', 'idPrimerPeriferico'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $perifericos = Periferico::all();
        $perifericoId =$_GET['id'];
        $periferico = Periferico::findOrFail($perifericoId);
        $nombrePeriferico = $periferico->nombre_periferico;
        // echo $equipoId;

        return view('observaciones.create', compact( 'perifericoId','perifericos', 'nombrePeriferico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        $observacion = new Observacion();
        $observacion->descripcion_evento = $request->input('descripcion_evento');

        $observacion->id_periferico = $request->input('id_periferico');
        $observacion->save();
        return redirect()->route('observaciones.index')->with('success', 'Observacion creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Observacion $observacion)
    {
        $perifericoUnico = Periferico::find($observacion->id_periferico);
        $nombre_periferico_actual = $perifericoUnico->nombre_periferico;

        return view('observaciones.view', compact('observacion','nombre_periferico_actual'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Observacion $observacion)
    {

        $perifericos = Periferico::all();
        $perifericoUnico = Periferico::find($observacion->id_periferico);
        $nombre_periferico_actual = $perifericoUnico->nombre_periferico;

        return view('observaciones.edit', compact('observacion', 'perifericos', 'nombre_periferico_actual'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $observacion)
    {
        // dd($request->input('id_periferico'));
        $this->validar($request);

        $observacion = Observacion::find($observacion);
        $observacion->descripcion_evento = $request->input('descripcion_evento');
        $observacion->id_periferico = $request->input('id_periferico');
        $observacion->save();

        return redirect()->route('observaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_observacion)
    {
        $observacion = Observacion::find($id_observacion);
        $observacion->delete();

        return redirect()->route('observaciones.index')->with('success', 'observacion eliminada correctamente');
    }
}
