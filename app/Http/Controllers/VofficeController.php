<?php

namespace App\Http\Controllers;

use App\Models\Voffice;
use Illuminate\Http\Request;

class VofficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voffices = Voffice::paginate(10);
        return view('voffices.index', compact('voffices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('voffices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_office' => 'required|string|max:255',
        ]);

        Voffice::create([
            'nombre_office' => $request->nombre_office,
        ]);

        return redirect()->route('voffices.index')->with('success', 'Version de Office creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voffice $voffice)
    {
        return view('voffices.view', compact('voffice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voffice $voffice)
    {
        return view('voffices.edit', compact('voffice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voffice $voffice)
    {
        // $ubicacion = Ubicacion::find($ubicacion);

        $request->validate([
            'nombre_office' => 'required|string|max:255',
            // Agrega más validaciones según sea necesario
        ]);

        $voffice->update([
            'nombre_office' => $request->nombre_office,
            // Actualiza otros campos aquí según sea necesario
        ]);

        return redirect()->route('voffices.index')->with('success', 'Version de Offices actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_office)
    {
        $voffice = Voffice::find($id_office);
        $voffice->delete();

        return redirect()->route('voffices.index')->with('success', 'Version de Office eliminada correctamente');
    }
}
