<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class UsuarioController extends Controller
{
    /**
     * Validate the incoming request.
     */
    // private function validar(Request $request)
    // {

    // }

    /**
     * Get the user data from the request.
     */
    // private function getUserData(Request $request)
    // {
    //     $userData = [
    //         'usuario' => $request->usuario,
    //         'rol' => $request->rol,
    //         // Agrega más campos según sea necesario
    //     ];

    //     // Si se proporciona una contraseña, la agregamos a los datos
    //     if ($request->filled('password')) {
    //         $userData['password'] = Hash::make($request->password);
    //     }

    //     return $userData;
    // }

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
        $perfiles = Perfil::all();
        return view('usuarios.create', compact('perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required|unique:users|string|max:255',
            'rol' => 'required|integer',
            'password' => 'nullable|string|min:8',
            'id_perfil',
            // Agrega más validaciones según sea necesario
        ]);

        $user = new User();

        $user->usuario = $request->input('usuario');
        $user->rol = $request->input('rol');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->id_perfil = $request->input('id_perfil');

        $user->save();

        // $userData = $this->getUserData($request);

        // User::create($userData);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        $perfil = Perfil::find($usuario->id_perfil);
        $nombre_perfil = $perfil->nombres_perfil . ' ' . $perfil->apellidos_perfil;
        return view('usuarios.view', compact('usuario', 'nombre_perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $perfiles = Perfil::all();
        return view('usuarios.edit', compact('usuario', 'perfiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $user)
    {

        $request->validate([
            'usuario',
            'rol' => 'required|integer',
            'password' => 'nullable|string|min:8',
            'id_perfil',
            // Agrega más validaciones según sea necesario
        ]);
        $user = User::find($user);

        // $user->usuario = $request->input('usuario');
        $user->rol = $request->input('rol');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->id_perfil = $request->input('id_perfil');

        $user->save();
        // $userData = $this->getUserData($request);

        // $usuario->update($userData);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
