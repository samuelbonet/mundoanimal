@extends('adminlte::page')

@section('title', 'Listado de Facturas')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow w-100" style="max-width: 1000px;">
            <div class="card-header bg-success bg-gradient text-white text-center">
                <h4 class="mb-0">Listado de Facturas</h4>
            </div>
            <div class="card-body">
                {{-- Mensaje de éxito --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                @if (isset($facturas) && $facturas->isEmpty())
                    <p class="text-center">No hay facturas registradas.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-success">
                                <tr class="text-center">
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
                                @foreach ($facturas as $factura)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $factura->cliente->nombre }} {{ $factura->cliente->apellidos }}</td>
                                        <td>{{ \Carbon\Carbon::parse($factura->fecha_emision)->format('d/m/Y H:i') }}</td>
                                        <td>{{ $factura->concepto }}</td>
                                        <td>{{ number_format($factura->precio, 2) }} €</td>
                                        <td class="text-center">
                                            <a href="{{ route('facturas.pdf', $factura->id_factura) }}"
                                                class="btn btn-sm btn-danger" target="_blank" title="Descargar PDF">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <div
                                                style="display: inline-flex; gap: 8px; justify-content: center; align-items: center;">
                                                <a href="{{ route('facturas.edit', $factura->id_factura) }}"
                                                    class="btn btn-sm btn-primary" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('facturas.destroy', $factura->id_factura) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"
                                                        onclick="return confirm('¿Desea eliminar esta factura?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
