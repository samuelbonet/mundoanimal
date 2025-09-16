@extends('adminlte::page')

@section('title', 'Listado de Peluquería')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow w-100" style="max-width: 900px;">
        <div class="card-header bg-success bg-success text-white text-center">
            <h4 class="mb-0">Listado de Peluquería</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Mascota</th>
                            <th>Tipo de Corte</th>
                            <th>Baño</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Firulais</td>
                            <td>Corte completo</td>
                            <td>Sí</td>
                            <td>Piel sensible, usar shampoo hipoalergénico</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Misu</td>
                            <td>Recorte de uñas</td>
                            <td>No</td>
                            <td>Ninguna observación</td>
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
