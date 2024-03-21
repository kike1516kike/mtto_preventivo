<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Marca;
use App\Models\Voffice;
use App\Models\Perfil;
use App\Models\Ubicacion;
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
            'id_marca' => 'required',
            'id_ubicacion' => 'required',
            'id_perfil' => 'required',
            'id_office' => 'required',
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
    // private function getEquipoData(Request $request)
    // {
    //     $data = $request->only([
    //         'nombre_equipo',
    //         'fecha_ingreso_equipo',
    //         'cod_act_fijo_equipo',
    //         'tipo_equipo',
    //         'modelo_equipo',
    //         'sistema_operativo_equipo',
    //         'ram_equipo',
    //         'procesador_equipo',
    //         'disco_equipo',
    //         'estado_equipo',
    //         'ip_equipo',
    //         // Agrega más campos según sea necesario
    //     ]);

    //     // Agregar el campo 'id_marca' si está presente en la solicitud
    //     if ($request->has('id_marca')) {
    //         $data['id_marca'] = $request->input('id_marca');
    //     }

    //     return $data;
    // }

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
        $marcas = Marca::all();
        $voffices = Voffice::all();
        $perfiles = Perfil::all();
        $ubicaciones = Ubicacion::all();
        return view('equipos.create', compact('marcas', 'voffices', 'perfiles', 'ubicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validar($request);

        // $EquipoData = $this->getEquipoData($request);

        // Equipo::create($EquipoData);

        $equipo = new Equipo();

        $equipo->nombre_equipo = $request->input('nombre_equipo');
        $equipo->fecha_ingreso_equipo = $request->input('fecha_ingreso_equipo');
        $equipo->cod_act_fijo_equipo = $request->input('cod_act_fijo_equipo');
        $equipo->tipo_equipo = $request->input('tipo_equipo');
        $equipo->id_marca = $request->input('id_marca');
        $equipo->modelo_equipo = $request->input('modelo_equipo');
        $equipo->sistema_operativo_equipo = $request->input('sistema_operativo_equipo');
        $equipo->ram_equipo = $request->input('ram_equipo');
        $equipo->procesador_equipo = $request->input('procesador_equipo');
        $equipo->disco_equipo = $request->input('disco_equipo');
        $equipo->estado_equipo = $request->has('estado_equipo');
        $equipo->ip_equipo = $request->input('ip_equipo');
        $equipo->id_office = $request->input('id_office');
        $equipo->id_perfil = $request->input('id_perfil');
        $equipo->id_ubicacion = $request->input('id_ubicacion');

        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        $nombre_marca = Marca::where('id_marca', $equipo->id_marca)->value('nombre_marca');
        $nombre_office = Voffice::where('id_office', $equipo->id_office)->value('nombre_office');
        $perfil = Perfil::find($equipo->id_perfil);
        $nombre_perfil = $perfil->nombres_perfil . ' ' . $perfil->apellidos_perfil;
        $nombre_ubicacion = Ubicacion::where('id_ubicacion', $equipo->id_ubicacion)->value('nombre_ubicacion');
        return view('equipos.view', compact('equipo', 'nombre_marca', 'nombre_office', 'nombre_perfil', 'nombre_ubicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        $marcas = Marca::all();
        $voffices = Voffice::all();
        $perfiles = Perfil::all();
        $ubicaciones = Ubicacion::all();
        return view('equipos.edit', compact('equipo', 'marcas', 'voffices', 'perfiles', 'ubicaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $equipo)
    {
        $this->validar($request);

        $equipo = Equipo::find($equipo);

        $equipo->nombre_equipo = $request->input('nombre_equipo');
        $equipo->fecha_ingreso_equipo = $request->input('fecha_ingreso_equipo');
        $equipo->cod_act_fijo_equipo = $request->input('cod_act_fijo_equipo');
        $equipo->tipo_equipo = $request->input('tipo_equipo');
        $equipo->id_marca = $request->input('id_marca');
        $equipo->modelo_equipo = $request->input('modelo_equipo');
        $equipo->sistema_operativo_equipo = $request->input('sistema_operativo_equipo');
        $equipo->ram_equipo = $request->input('ram_equipo');
        $equipo->procesador_equipo = $request->input('procesador_equipo');
        $equipo->disco_equipo = $request->input('disco_equipo');
        $equipo->estado_equipo = $request->has('estado_equipo');
        $equipo->ip_equipo = $request->input('ip_equipo');
        $equipo->id_office = $request->input('id_office');
        $equipo->id_perfil = $request->input('id_perfil');
        $equipo->id_ubicacion = $request->input('id_ubicacion');

        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_equipo)
    {
        $equipo = Equipo::find($id_equipo);
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
    }
}
