<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){

        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        // Verificar si el usuario ya está autenticado
        if (Auth::check()) {

            return redirect()->route('home'); // Redirigir al home si ya está autenticado
        }

        $user = User::where('usuario', $request->usuario)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()
                ->route('home')
                ->with('status', 'Logueo con éxito');
        }

        throw ValidationException::withMessages([
            'usuario' => ['Estas credenciales no coinciden con nuestros registros'],
        ]);
    }




    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');


    }

}
