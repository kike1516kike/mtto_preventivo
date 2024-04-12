<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Validate the incoming request.
     */
    private function validar(Request $request)
    {
        $request->validate([
            'descripcion_evento' => 'required|string|max:255',
            'id_equipo' => 'required|integer',
            // Agrega más validaciones según sea necesario
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::paginate(10);
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('eventos.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        $evento = new Evento();
        $evento->descripcion_evento = $request->input('descripcion_evento');
        $evento->id_equipo = $request->input('id_equipo');
        $evento->save();
        return redirect()->route('eventos.index')->with('success', 'Evento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        $equipoUnico = Equipo::find($evento->id_equipo);
        $nombre_equipo_actual = $equipoUnico->nombre_equipo;

        return view('eventos.view', compact('evento','nombre_equipo_actual'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        $equipos = Equipo::all();
        $equipoUnico = Equipo::find($evento->id_equipo);
        $nombre_equipo_actual = $equipoUnico->nombre_equipo;

        return view('eventos.edit', compact('evento', 'equipos', 'nombre_equipo_actual'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $evento)
    {
        $this->validar($request);

        $evento = Evento::find($evento);
        $evento->descripcion_evento = $request->input('descripcion_evento');
        $evento->id_equipo = $request->input('id_equipo');
        $evento->save();

        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_evento)
    {
        $evento = Evento::find($id_evento);
        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento eliminado correctamente');
    }
}
