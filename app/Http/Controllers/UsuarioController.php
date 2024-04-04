<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Validate the incoming request.
     */
    private function validar(Request $request)
    {
        $request->validate([
            'usuario' => 'required|unique:users|string|max:255',
            'rol' => 'required|integer',
            'password' => 'nullable|string|min:8',
            // Agrega más validaciones según sea necesario
        ]);
    }

    /**
     * Get the user data from the request.
     */
    private function getUserData(Request $request)
    {
        $userData = [
            'usuario' => $request->usuario,
            'rol' => $request->rol,
            // Agrega más campos según sea necesario
        ];

        // Si se proporciona una contraseña, la agregamos a los datos
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        return $userData;
    }

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
        $this->validar($request);

        $userData = $this->getUserData($request);

        User::create($userData);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return view('usuarios.view', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $this->validar($request);

        $userData = $this->getUserData($request);

        $usuario->update($userData);

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
