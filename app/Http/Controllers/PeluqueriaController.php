<?php

namespace App\Http\Controllers;

use App\Models\Peluqueria;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PeluqueriaController extends Controller
{
    // Listado de peluquerías
    public function index()
    {
        $peluquerias = Peluqueria::with('cliente')->get();
        return view('intranet.peluqueriaTabla', compact('peluquerias'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('intranet.peluqueriaFormulario', [
            'mode' => 'create',
            'peluqueria' => null,
            'clientes' => $clientes
        ]);
    }

    // Guardar nueva peluquería
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'tipo_corte' => 'required|string|max:50',
            'bano' => 'nullable|boolean',
            'observaciones' => 'nullable|string|max:255',
        ]);

        Peluqueria::create($request->all());

        return redirect()->route('peluqueria.index')->with('success', 'Servicio registrado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Peluqueria $peluqueria)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('intranet.peluqueriaFormulario', [
            'mode' => 'update',
            'peluqueria' => $peluqueria,
            'clientes' => $clientes
        ]);
    }

    // Actualizar peluquería
    public function update(Peluqueria $peluqueria, Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'tipo_corte' => 'required|string|max:50',
            'bano' => 'nullable|boolean',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $peluqueria->update($request->all());

        return redirect()->route('peluqueria.index')->with('success', 'Servicio actualizado correctamente.');
    }

    // Eliminar peluquería
    public function destroy(Peluqueria $peluqueria)
    {
        $peluqueria->delete();
        return redirect()->route('peluqueria.index')->with('success', 'Servicio eliminado correctamente.');
    }
}
