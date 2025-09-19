<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Cliente;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    
    // Listado de la tabla
    public function index()
    {
        $mascotas = Mascota::with('cliente')->get();
        return view('intranet.gestionMascotasTabla', compact('mascotas'));
    }

    //Aquí mostrará formulario de edición
    public function edit(Mascota $mascota)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('intranet.gestionMascotasFormulario', [
            'mode' => 'update',
            'mascota' => $mascota,
            'clientes' => $clientes
        ]);
    }

    //Aquí eliminará del formulario a la mascota
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index');
    }

    // Muestra formulario en el que se registra una mascota
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('intranet.gestionMascotasFormulario', [
            'mode'=> 'create',
            'mascota' => null,
            'clientes' => $clientes
        ]);
    }

    // Guardar mascota nueva
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'nombre'     => 'required|string|max:255',
            'especie'    => 'required|string|max:50',
            'raza'       => 'nullable|string|max:100',
            'edad'       => 'nullable|integer|min:0',
            'peso'       => 'nullable|numeric|min:0',
        ]);

        Mascota::create($request->all());

        return redirect()->route('mascotas.index');
    }

    //Actualizará mascota
    public function update(Mascota $mascota, Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'nombre'     => 'required|string|max:255',
            'especie'    => 'required|string|max:50',
            'raza'       => 'nullable|string|max:100',
            'edad'       => 'nullable|integer|min:0',
            'peso'       => 'nullable|numeric|min:0',
        ]);

        $mascota->update($request->all());

        return redirect()->route('mascotas.index');
    }

}
