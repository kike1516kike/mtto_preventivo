<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Perfil;
use App\Models\Detalle_mtto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mantenimientos = Mantenimiento::paginate(10);

        return view('mantenimientos.index', compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('mantenimientos.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {

    //     // $request->validate([
    //     //     'fecha_mantenimiento' => 'required',
    //     //     'cod_empleado_mtto' => 'required|integer',
    //     //     'observacion_mtto' => 'string',
    //     // ]);
    //     $mantenimiento = new Mantenimiento();
    //     //  throw

    //     $mantenimiento->fecha_mantenimiento = date('Y-m-d', strtotime($request->input('fecha_mantenimiento')));

    //     $mantenimiento->cod_empleado_mtto = $request->input('cod_empleado_mtto');
    //     $mantenimiento->observacion_mtto = $request->input('observacion_mtto') ?? '';
    //     $mantenimiento->finalizado_mtto = false;
    //     $mantenimiento->id_revision = NULL;

    //     $mantenimiento->save();

    //     return redirect()->route('mantenimientos.index')->with('success', 'Mantenimento creado correctamente');
    // }

    /**
     * Display the specified resource.
     */
    // public function show(Mantenimiento $mantenimiento)
    // {
    //     // $nombre_marca = Marca::where('id_marca', $equipo->id_marca)->value('nombre_marca');
    //     // $nombre_office = Voffice::where('id_office', $equipo->id_office)->value('nombre_office');
    //     // $perfil = Perfil::find($equipo->id_perfil);
    //     // $nombre_perfil = $perfil->nombres_perfil . ' ' . $perfil->apellidos_perfil;
    //     // $nombre_ubicacion = Ubicacion::where('id_ubicacion', $equipo->id_ubicacion)->value('nombre_ubicacion');
    //     return view('mantenimientos.view', compact('mantenimiento'));
    // }

    public function firma_usuario(Request $request, $id_mantenimiento)
    {
        // Validar los datos del formulario
        $request->validate([
            'cod_usuario_firma' => 'required',
            'nombre_usuario_firma' => 'required',
            'password_usuario_firma' => 'required',
        ]);

        $mantenimiento = Mantenimiento::findOrFail($id_mantenimiento);

        $user = User::where('usuario', $request->nombre_usuario_firma)->first();

        if ($user && Hash::check($request->password_usuario_firma, $user->password)) {
            $mantenimiento->cod_usuario_firma = $request->input('cod_usuario_firma'); // Suponiendo que 'id' sea la clave primaria del usuario
            $mantenimiento->save();

            return redirect()->route('mantenimientos.index')->with('success', 'Usuario y contraseña guardados exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Credenciales de usuario incorrectas. Por favor, inténtalo de nuevo.');
        }
    }

    public function firma_auxiliar(Request $request, $id_mantenimiento)
    {
        $request->validate([
            'cod_auxi_firma' => 'required',
            'nombre_auxiliar_firma' => 'required',
            'password_auxiliar_firma' => 'required',
        ]);

        $mantenimiento = Mantenimiento::findOrFail($id_mantenimiento);
        $user = User::where('usuario', $request->nombre_auxiliar_firma)->first();

        if ($user && Hash::check($request->password_auxiliar_firma, $user->password)) {
            $mantenimiento->cod_auxi_firma = $request->input('cod_auxi_firma'); // Suponiendo que 'id' sea la clave primaria del usuario
            $mantenimiento->finalizado_mtto = true;
            $mantenimiento->save();

            return redirect()->route('mantenimientos.index')->with('success', 'Usuario y contraseña guardados exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Credenciales de usuario incorrectas. Por favor, inténtalo de nuevo.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function criterio(Mantenimiento $mantenimiento)
    {
        if ($mantenimiento->cod_usuario_firma == null) {
            $detalles_mtto = Detalle_mtto::where('id_mantenimiento', $mantenimiento->id_mantenimiento)->get();
            return view('mantenimientos.criterio', compact('detalles_mtto', 'mantenimiento'));
        } else {
            return redirect()->route('mantenimientos.index');
        }
    }

    public function update_criterios(Request $request, $id_mantenimiento)
    {
        $detalles_mtto = Detalle_mtto::where('id_mantenimiento', $id_mantenimiento)->get();

        foreach ($detalles_mtto as $detalle) {
            $detalle->selecciona_criterio_mtto = in_array($detalle->id_detalle_mtto, $request->input('criterios', []));
            $detalle->save();
        }

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento actualizado exitosamente.');
    }

    public function edit(Mantenimiento $mantenimiento)
    {
        $opciones_tipo_equipo = ['Laptop', 'Escritorio'];
        return view('mantenimientos.edit', compact('opciones_tipo_equipo', 'mantenimiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mantenimiento)
    {
        // $request->validate([
        //     'fecha_mantenimiento' => 'required',
        //     'cod_empleado_mtto' => 'required|integer',
        //     'observacion_mtto' => 'string',
        // ]);
        $mantenimiento = Mantenimiento::find($mantenimiento);

        $mantenimiento->fecha_mantenimiento = date('Y-m-d', strtotime($request->input('fecha_mantenimiento')));
        $mantenimiento->cod_empleado_mtto = $request->input('cod_empleado_mtto');
        $mantenimiento->observacion_mtto = $request->input('observacion_mtto');
        $mantenimiento->save();

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_mantenimiento)
    {
        $mantenimiento = Mantenimiento::find($id_mantenimiento);
        $mantenimiento->delete();

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento eliminado exitosamente.');
    }
}
