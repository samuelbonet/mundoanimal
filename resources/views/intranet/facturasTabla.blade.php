@extends('adminlte::page')

@section('content')
<h1>Lista de Facturas</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('facturas.create') }}" class="btn btn-primary mb-3">Nueva Factura</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha de Emisión</th>
            <th>Concepto</th>
            <th>Precio</th>
            <th>PDF</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($facturas as $factura)
            <tr>
                <td>{{ $factura->id_factura }}</td>
                <td>{{ $factura->cliente->nombre }} {{ $factura->cliente->apellidos }}</td>
                <td>{{ \Carbon\Carbon::parse($factura->fecha_emision)->format('d/m/Y H:i') }}</td>
                <td>{{ $factura->concepto }}</td>
                <td>{{ number_format($factura->precio, 2) }} €</td>
                <td>
                    <a href="{{ route('facturas.pdf', $factura) }}" class="btn btn-sm btn-danger" target="_blank">
                        Descargar PDF
                    </a>
                </td>
                <td>
                    <a href="{{ route('facturas.edit', $factura) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('facturas.destroy', $factura) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('¿Seguro que quieres eliminar esta factura?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
