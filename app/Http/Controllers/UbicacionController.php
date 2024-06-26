<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    /**
     * Validate the incoming request.
     */
    private function validar(Request $request)
    {
        $request->validate([
            'nombre_ubicacion' => 'required|string|max:255',
            // Agrega más validaciones según sea necesario
        ]);
    }

    /**
     * Get the location data from the request.
     */
    private function getUbicacionData(Request $request)
    {
        return $request->only([
            'nombre_ubicacion',
            // Agrega más campos según sea necesario
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ubicaciones = Ubicacion::paginate(10);
        return view('ubicaciones.index', compact('ubicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ubicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        $ubicacionData = $this->getUbicacionData($request);

        Ubicacion::create($ubicacionData);

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ubicacion $ubicacion)
    {
        return view('ubicaciones.view', compact('ubicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ubicacion $ubicacion)
    {
        return view('ubicaciones.edit', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        $this->validar($request);

        $ubicacionData = $this->getUbicacionData($request);

        $ubicacion->update($ubicacionData);

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_ubicacion)
    {
        $ubicacion = Ubicacion::find($id_ubicacion);
        $ubicacion->delete();

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación eliminada correctamente');
    }
}
