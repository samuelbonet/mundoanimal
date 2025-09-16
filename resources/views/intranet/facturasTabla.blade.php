@extends('adminlte::page')

@section('title', 'Listado de Facturas')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow w-100" style="max-width: 900px;">
        <div class="card-header bg-success bg-gradient text-white text-center">
            <h4 class="mb-0">Listado de Facturas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Fecha Emisión</th>
                            <th>Concepto</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>01/09/2025</td>
                            <td>Consulta veterinaria</td>
                            <td>$50.00</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>02/09/2025</td>
                            <td>Vacunación</td>
                            <td>$30.00</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <!-- Agrega más filas estáticas aquí -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
