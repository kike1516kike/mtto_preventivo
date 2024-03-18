<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Get the profile data from the request.
     */
    private function getPerfilData(Request $request)
    {
        return $request->only([
            'cod_empleado',
            'nombres_perfil',
            'apellidos_perfil',
            'cargo_perfil',
            'estado_perfil',
            'observacion_perfil',
        ]);
    }

    /**
     * Validate the incoming request.
     */
    private function validar(Request $request)
    {
        $request->validate([
            'cod_empleado' => 'required|int',
            'nombres_perfil' => 'required|string|max:100',
            'apellidos_perfil' => 'required|string|max:100',
            'cargo_perfil' => 'required|string|max:100',
            'estado_perfil' => 'boolean',
            'observacion_perfil' => 'required|string|max:255',
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfiles = Perfil::paginate(10);
        return view('perfiles.index', compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        $perfilData = $this->getPerfilData($request);

        Perfil::create($perfilData);

        return redirect()->route('perfiles.index')->with('success', 'Perfil creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perfil $perfil)
    {
        return view('perfiles.view', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perfil $perfil)
    {
        $this->validar($request);

        $perfilData = $this->getPerfilData($request);

        $perfil->update($perfilData);

        return redirect()->route('perfiles.index')->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_perfil)
    {
        $perfil = Perfil::find($id_perfil);
        $perfil->delete();

        return redirect()->route('perfiles.index')->with('success', 'Perfil eliminado correctamente');
    }
}
