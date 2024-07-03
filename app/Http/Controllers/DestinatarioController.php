<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfil;
use App\Models\Marca;
use App\Models\Ubicacion;
use App\Models\Voffice;
use App\Models\Equipo;
use App\Models\Periferico;
use App\Models\Evento;
use App\Models\Mantenimiento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DestinatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = User::where('id_perfil', Auth::user()->id_perfil)->first();

        if (is_null($usuario)) {
            return Redirect::route('home')->with('error', 'Usuario no tiene un perfil asociado');
        }

        $perfil = Perfil::where('id_perfil', $usuario->id_perfil)->first();

        if (is_null($perfil)) {
            return Redirect::route('home')->with('error', 'No hay perfil encontrado.');
        }

        $equipos = Equipo::where('id_perfil', $usuario->id_perfil)->get();
        $perifericos = Periferico::where('id_perfil', $usuario->id_perfil)->get();

        $mantenimientos = Mantenimiento::where('cod_empleado_mtto', $perfil->cod_empleado)->paginate(10);

        if ($mantenimientos->isEmpty()) {
            $mantenimientos = null;
        }

        $marcas = Marca::all();
        $voffices = Voffice::all();
        $ubicaciones = Ubicacion::all();




        return view('destinatarios.index', compact('usuario', 'perfil', 'equipos', 'perifericos', 'mantenimientos'));
    }

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

            return redirect()->route('destinatarios.index')->with('success', 'Usuario y contraseña guardados exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Credenciales de usuario incorrectas. Por favor, inténtalo de nuevo.');
        }
    }

    public function show(Mantenimiento $id_mantenimiento)
    {
        return view('destinatarios.view', compact('id_mantenimiento'));
    }


}
