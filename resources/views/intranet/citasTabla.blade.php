@extends('adminlte::page')

@section('title', 'Listado de Citas')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow w-100" style="max-width: 900px;">
        <div class="card-header bg-success bg-gradient text-white text-center">
            <h4 class="mb-0">Listado de Citas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Fecha y Hora</th>
                            <th>Motivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Juan</td>
                            <td>Pérez</td>
                            <td>555-1234</td>
                            <td>01/09/2025 14:30</td>
                            <td>Consulta general</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>María</td>
                            <td>Gómez</td>
                            <td>555-5678</td>
                            <td>02/09/2025 10:00</td>
                            <td>Vacunación</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <!-- Más filas estáticas -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
