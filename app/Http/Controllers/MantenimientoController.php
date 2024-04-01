<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Perfil;
use App\Models\Detalle_mtto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class MantenimientoController extends Controller
{
    private function validar(Request $request)
    {
        $request->validate([
            'fecha_mantenimiento' => 'required',
            'trimestre_mantenimeinto' => 'required|string',
            'cod_empleado_mtto' => 'required|integer',
            // 'nombres_mtto' => 'required|string|max:255',
            // 'apellidos_mtto' => 'required|string|max:255',
            // 'cargo_mtto' => 'required|string|max:255',
            'observacion_mtto' => 'string',
            // 'cod_usuario_firma' => 'required|integer|max:255',
            // 'nombre_usuario_firma' => 'required|string|max:255',
            // 'password_usuario_firma' => 'required|',
            // 'cod_jefe_firma' => 'required|integer|max:255',
            // 'nombre_jefe_firma' => 'required|string|max:255',
            // 'password_jefe_firma' => 'required',
            // 'cod_auxi_firma' => 'required|integer|max:255',
            // 'nombre_auxi_firma' => 'required|string|max:255',
            // 'password_auxi_firma' => 'required',
            // 'finalizado_mtto',
        ]);
    }
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
    public function create()
    {
        // $marcas = Marca::all();
        // $voffices = Voffice::all();
        // $perfiles = Perfil::all();
        // $ubicaciones = Ubicacion::all();
        return view('mantenimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validar($request);

        // $EquipoData = $this->getEquipoData($request);

        // Equipo::create($EquipoData);

        $mantenimiento = new Mantenimiento();
        //  throw

        $mantenimiento->fecha_mantenimiento = date('Y-m-d', strtotime($request->input('fecha_mantenimiento')));
        // $fecha_formateada = date('Y-m-d', strtotime($fecha));
        //   $fecha;

        $mantenimiento->trimestre_mantenimiento = $request->input('trimestre_mantenimiento');
        $mantenimiento->cod_empleado_mtto = $request->input('cod_empleado_mtto');
        // $mantenimiento->nombres_mtto = $request->input('nombres_mtto');
        // $mantenimiento->apellidos_mtto = $request->input('apellidos_mtto');
        // $mantenimiento->cargo_mtto = $request->input('cargo_mtto');
        $mantenimiento->observacion_mtto = $request->input('observacion_mtto');
        // $mantenimiento->cod_usuario_firma = $request->input('cod_usuario_firma');
        // $mantenimiento->nombre_usuario_firma = $request->input('nombre_usuario_firma');
        // $mantenimiento->password_usuario_firma = $request->input('password_usuario_firma');
        // $mantenimiento->cod_jefe_firma = $request->has('cod_jefe_firma');
        // $mantenimiento->nombre_jefe_firma = $request->input('nombre_jefe_firma');
        // $mantenimiento->password_jefe_firma = $request->input('password_jefe_firma');
        // $mantenimiento->cod_auxi_firma = $request->input('cod_auxi_firma');
        // $mantenimiento->nombre_auxi_firma = $request->input('nombre_auxi_firma');
        // $mantenimiento->password_auxi_firma = $request->input('password_auxi_firma');
        // $mantenimiento->finalizado_mtto = $request->input('finalizado_mtto');

        $mantenimiento->save();

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimento creado correctamente');
    }

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
            'codigo_empleado' => 'required|integer',
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Obtener el mantenimiento por su ID
        $mantenimiento = Mantenimiento::findOrFail($id_mantenimiento);

        // Verificar si la contraseña proporcionada coincide con la almacenada
        if (Hash::check($request->password, $mantenimiento->password_usuario_firma)) {
            // Si la contraseña coincide, guardar los campos de usuario y contraseña
            $mantenimiento->cod_usuario_firma = $request->codigo_empleado;
            $mantenimiento->nombre_usuario_firma = $request->username;
            // No es necesario guardar la contraseña nuevamente si coincide
            $mantenimiento->save();

            // Redirigir de vuelta a la página de mantenimientos con un mensaje de éxito
            return redirect()->route('mantenimientos.index')->with('success', 'Usuario y contraseña guardados exitosamente.');
        } else {
            // Si la contraseña no coincide, mostrar un mensaje de error
            return redirect()->back()->with('error', 'La contraseña proporcionada es incorrecta. Por favor, inténtalo de nuevo.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function criterio(Mantenimiento $mantenimiento)
    {
        $detalles_mtto = Detalle_mtto::where('id_mantenimiento', $mantenimiento->id_mantenimiento)->get();
        return view('mantenimientos.criterio', compact('detalles_mtto', 'mantenimiento'));
    }

    public function update_criterios(Request $request, $id_mantenimiento)
    {
        // Obtener los detalles del mantenimiento por su id
        $detalles_mtto = Detalle_mtto::where('id_mantenimiento', $id_mantenimiento)->get();

        // Iterar sobre los detalles y actualizar los criterios seleccionados
        foreach ($detalles_mtto as $detalle) {
            $detalle->selecciona_criterio_mtto = in_array($detalle->id_detalle_mtto, $request->input('criterios', []));
            $detalle->save();
        }

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento actualizado exitosamente.');
    }

    public function edit(Mantenimiento $mantenimiento)
    {
        // $marcas = Marca::all();
        // $voffices = Voffice::all();
        // $perfiles = Perfil::all();
        // $ubicaciones = Ubicacion::all();
        $opciones_tipo_equipo = ['Laptop', 'Escritorio'];
        return view('mantenimientos.edit', compact('opciones_tipo_equipo', 'mantenimiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mantenimiento)
    {
        // $this->validar($request);

        $mantenimiento = Mantenimiento::find($mantenimiento);

        $mantenimiento->fecha_mantenimiento = date('Y-m-d', strtotime($request->input('fecha_mantenimiento')));
        // $mantenimiento->fecha_mantenimiento = $request->input('fecha_mantenimiento');
        $mantenimiento->trimestre_mantenimiento = $request->input('trimestre_mantenimiento');
        $mantenimiento->cod_empleado_mtto = $request->input('cod_empleado_mtto');
        // $mantenimiento->nombres_mtto = $request->input('nombres_mtto');
        // $mantenimiento->apellidos_mtto = $request->input('apellidos_mtto');
        // $mantenimiento->cargo_mtto = $request->input('cargo_mtto');
        $mantenimiento->observacion_mtto = $request->input('observacion_mtto');
        // $mantenimiento->cod_usuario_firma = $request->input('cod_usuario_firma');
        // $mantenimiento->nombre_usuario_firma = $request->input('nombre_usuario_firma');
        // $mantenimiento->password_usuario_firma = $request->input('password_usuario_firma');
        // $mantenimiento->cod_jefe_firma = $request->has('cod_jefe_firma');
        // $mantenimiento->nombre_jefe_firma = $request->input('nombre_jefe_firma');
        // $mantenimiento->password_jefe_firma = $request->input('password_jefe_firma');
        // $mantenimiento->cod_auxi_firma = $request->input('cod_auxi_firma');
        // $mantenimiento->nombre_auxi_firma = $request->input('nombre_auxi_firma');
        // $mantenimiento->password_auxi_firma = $request->input('password_auxi_firma');
        // $mantenimiento->finalizado_mtto = $request->input('finalizado_mtto');

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
