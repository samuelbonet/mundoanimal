@extends('adminlte::page')

@section('title', 'Historial Clínico')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow w-100" style="max-width: 900px;">
        <div class="card-header bg-success bg-gradient text-white text-center">
            <h4 class="mb-0">Historial Clínico</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Mascota</th>
                            <th>Fecha Aplicación</th>
                            <th>Vacuna</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Firulais</td>
                            <td>15/08/2025</td>
                            <td>Rabia</td>
                            <td>Sin complicaciones</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Misu</td>
                            <td>20/08/2025</td>
                            <td>Gripe felina</td>
                            <td>Observación por 24h</td>
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
