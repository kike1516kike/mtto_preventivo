<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'rol' => 'required|integer',

            // Otras validaciones necesarias
        ]);

        $usuario = new User();
        $usuario->usuario = $request->usuario;
        $usuario->rol = $request->rol;
        $usuario->password = Hash::make($request->password);
        // Puedes asignar otros campos si es necesario
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $usuario = User::find($id);

    $request->validate([
        'usuario' => 'required|string|max:255',
        'rol' => 'required|integer',
        'password' => 'nullable|string|min:8',
        // Agrega más validaciones según sea necesario
    ]);

    $usuario->update([
        'usuario' => $request->usuario,
        'rol' => $request->rol,
        // Actualiza otros campos aquí según sea necesario
    ]);

    // Si se proporciona una nueva contraseña, la actualizamos
    if ($request->filled('password')) {
        $usuario->update([
            'password' => bcrypt($request->password),
        ]);
    }

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
