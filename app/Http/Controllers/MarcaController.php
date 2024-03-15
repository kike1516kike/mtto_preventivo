<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Validate the incoming request.
     */
    private function validar(Request $request)
    {
        $request->validate([
            'nombre_marca' => 'required|string|max:255',
            // Agrega más validaciones según sea necesario
        ]);
    }

    /**
     * Get the brand data from the request.
     */
    private function getMarcaData(Request $request)
    {
        return $request->only([
            'nombre_marca',
            // Agrega más campos según sea necesario
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::paginate(10);
        return view('marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        $marcaData = $this->getMarcaData($request);

        Marca::create($marcaData);

        return redirect()->route('marcas.index')->with('success', 'Marca creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        return view('marcas.view', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        $this->validar($request);

        $marcaData = $this->getMarcaData($request);

        $marca->update($marcaData);

        return redirect()->route('marcas.index')->with('success', 'Marca actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_marca)
    {
        $marca = Marca::find($id_marca);
        $marca->delete();

        return redirect()->route('marcas.index')->with('success', 'Marca eliminada correctamente');
    }
}
