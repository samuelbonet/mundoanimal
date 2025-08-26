<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra del formulario de cambio de contraseña 
     */
    public function cambiarContrasenaFormulario()
    {
        return view('auth.cambiarContrasena');
    }

    /**
     * Actualiza la contraseña cambiada
     */
    public function actualizarContrasena(Request $request)
    {
        $request->validate([
            'actual_contrasena' => 'required',
            'password' => 'required|string|confirmed',
        ]);

        $user = Auth::user();

        // Verifica la contraseña actual
        if (!Hash::check($request->actual_contrasena, $user->password)) {
            return back()->withErrors(['actual_contrasena' => 'La contraseña actual no coincide.']);
        }

        // Guarda la nueva contraseña y muestra que ha sido cambiada
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('password.change')->with('success', 'Contraseña cambiada correctamente.');
    }
}
