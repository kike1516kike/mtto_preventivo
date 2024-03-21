<?php

namespace App\Http\Controllers;

use App\Models\Periferico;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerifericoController extends Controller
{
    private function validar(Request $request)
    {
        $request->validate([
            'tipo_periferico' => 'required|string|max:255',
            'id_perfil' => 'required',
            // Agrega más validaciones según sea necesario
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perifericos = Periferico::paginate(10);
        return view('perifericos.index', compact('perifericos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perfiles = Perfil::all();
        return view('perifericos.create', compact('perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        $periferico = new Periferico();

        $periferico->tipo_periferico = $request->input('tipo_periferico');
        $perifericos->id_perfil = $request->input('id_perfil');

        $periferico->save();
        return redirect()->route('perifericos.index')->with('sucess', 'Periferico creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periferico $periferico)
    {
        return view('perifericos.index', compact('periferico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periferico $periferico)
    {
        $perfiles = Perfil::all();
        return view('perifericos.edit', compact('perfiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $periferico)
    {
        $this->validar($request);

        $periferico->tipo_periferrico = $request->input('tipo_periferico');
        $periferico->tipo_periferico =$request->input('id_perfil');

        $periferico->save();

        return redirect()->route('perifericos.index')->with('success', 'Periferico Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_periferico)
    {
        $periferico = Periferico::find($id_periferico);
        $periferico->delete();

        return redirect()->route('perifericos.index')->with('success', 'Periferico eliminado correctamente');
    }
}
