<?php

namespace App\Http\Controllers;

use App\Models\Evento;
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
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        $evento = new Evento();
        $evento->descripcion_evento = $request->input('descripcion_evento');
        $evento->save();
        return redirect()->route('eventos.index')->with('success', 'Evento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        return view('eventos.view', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $evento)
    {
        $this->validar($request);

        $evento = Evento::find($evento);
        $evento->descripcion_evento = $request->input('descripcion_evento');
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
