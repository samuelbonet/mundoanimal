<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Formulario de login
     */
    public function mostrarFormularioLogin()
    {
        return view('auth.login');
    }
    /**
     * Inicio de sesión
     */
    public function iniciarSesion(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/intranet'); // Si los credenciales están autorizados, lleva a la intranet
        }

        return back()->withErrors([
            'email' => 'Datos introducidos no correctos', // Datos incorrectos
        ]);
    }

    /**
     * Cerrar sesión
     */
    public function cerrarSesion()
    {
        Auth::logout();
        return redirect('/'); //Redirige a index
    }
}
