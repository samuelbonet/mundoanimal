<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class FacturaController extends Controller
{
    //Listado de la tabla 
    public function index()
    {
        $facturas = Factura::with('cliente')->get();
        return view('intranet.facturasTabla', compact('facturas'));
    }

    //Crear factura
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('intranet.facturasFormulario', [
            'mode' => 'create',
            'factura' => null,
            'clientes' => $clientes
        ]);
    }

    //Almacenar factura
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'fecha_emision' => 'required|date',
            'concepto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        Factura::create($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura creada correctamente.');
    }

    //Editar factura
    public function edit(Factura $factura)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('intranet.facturasFormulario', [
            'mode' => 'update',
            'factura' => $factura,
            'clientes' => $clientes
        ]);
    }

    //Actualizará factura una vez editado
    public function update(Factura $factura, Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'fecha_emision' => 'required|date',
            'concepto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        $factura->update($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura actualizada correctamente.');
    }

    //Eliminará factura
    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada correctamente.');
    }

    public function generatePDF(Factura $factura)
{
    // Cargar la vista con los datos de la factura
    $pdf = PDF::loadView('intranet.facturaPDF', compact('factura'));

    // Descargar el PDF con nombre dinámico
    return $pdf->download('Factura_' . $factura->id_factura . '.pdf');
}
}
