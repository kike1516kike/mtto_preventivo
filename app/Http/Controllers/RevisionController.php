<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use Illuminate\Http\Request;

class RevisionController extends Controller
{

    private function validar(Request $request)
    {
        $request->validate([
            'trimestre_revision' => 'required',
            'fecha_creacion' => 'required',
            // 'trimestre_mantenimeinto' => 'required|string',
            'cod_jefe_firma',
            'fecha_firma' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revisiones = Revision::paginate(10);
        return view('revisiones.index', compact('revisiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('revisiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validar($request);
        $revision = new Revision();


        $revision->trimestre_revision = $request->input('trimestre_revision');
        $revision->fecha_creacion = date('Y-m-d', strtotime($request->input('fecha_creacion')));
        // $revision->cod_jefe_firma = $request->input('cod_jefe_firma');
        $revision->fecha_firma = date('Y-m-d', strtotime($request->input('fecha_firma')));



        $revision->save();

        return redirect()->route('revisiones.index')->with('success', 'Revision creado correctamente');
    }

    public function firma_jefe(Request $request, $id_revision)
    {
        // Validar los datos del formulario
        $request->validate([
            'cod_jefe_firma' => 'required',
            'nombre_jefe_firma' => 'required',
            'password_jefe_firma' => 'required',
        ]);

        // Obtener el mantenimiento por su 02
        $revision = Revision::findOrFail($id_revision);

        // Verificar si la contraseña proporcionada coincide con la almacenada en la tabla de usuarios
        $user = User::where('usuario', $request->nombre_jefe_firma)->first();

        if ($user && Hash::check($request->password_jefe_firma, $user->password)) {
            // Si la contraseña coincide, guardar el código de usuario en el mantenimiento
            $revision->cod_jefe_firma = $request->input('cod_jefe_firma'); // Suponiendo que 'id' sea la clave primaria del usuario
            $revision->save();

            // Redirigir de vuelta a la página de mantenimientos con un mensaje de éxito
            return redirect()->route('revisiones.index')->with('success', 'Usuario y contraseña guardados exitosamente.');
        } else {
            // Si la contraseña no coincide o el usuario no existe, mostrar un mensaje de error
            return redirect()->back()->with('error', 'Credenciales de usuario incorrectas. Por favor, inténtalo de nuevo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Revision $revision)
    {
        return view('revisiones.show', compact('revision'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Revision $revision)
    {
        return view('revisiones.edit', compact('revision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $revision)
    {

        $this->validar($request);

        $revision = Revision::find($revision);
        $revision->trimestre_revision = $request->input('trimestre_revision');
        $revision->fecha_creacion = date('Y-m-d', strtotime($request->input('fecha_creacion')));
        // $revision->cod_jefe_firma = $request->input('cod_jefe_firma');
        $revision->fecha_firma = date('Y-m-d', strtotime($request->input('fecha_firma')));

        return redirect()->route('revisiones.index')->with('success', 'Revisión actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_revision)
    {
        $revision = Revision::find($id_revision);
        $revision->delete();

        return redirect()->route('revisiones.index')->with('success', 'Revision eliminado exitosamente.');
    }
}
