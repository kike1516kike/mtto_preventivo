<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    private function validar(Request $request)
    {
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'fecha_ingreso_equipo' => 'required|max:255',
            'cod_act_fijo_equipo' => 'required|string|max:255',
            'tipo_equipo' => 'required|string|max:255',
            'modelo_equipo' => 'required|string|max:255',
            'sistema_operativo_equipo' => 'required|string|max:255',
            'ram_equipo' => 'required|integer|max:255',
            'procesador_equipo' => 'required|string|max:255',
            'disco_equipo' => 'required|string|max:255',
            'estado_equipo',
            'ip_equipo' => 'required|integer|max:255',

        ]);
    }

    /**
     * Get the brand data from the request.
     */
    private function getEquipoData(Request $request)
    {
        return $request->only([
            'nombre_equipo',
            'fecha_ingreso_equipo',
            'cod_act_fijo_equipo',
            'tipo_equipo',
            'modelo_equipo',
            'sistema_operativo_equipo',
            'ram_equipo',
            'procesador_equipo',
            'disco_equipo',
            'estado_equipo',
            'ip_equipo',
            // Agrega más campos según sea necesario
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::paginate(10);
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        $EquipoData = $this->getEquipoData($request);

        Equipo::create($EquipoData);

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        return view('equipos.view', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo)
    {
        $this->validar($request);

        $equipoData = $this->getEquipoData($request);

        $equipo->update($equipoData);

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        $equipo = Equipo::find($id_equipo);
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
    }
}
