@extends('adminlte::page')

@section('title', 'Intranet')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">

        {{-- Clientes --}}
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $clientes }}</h3>
                    <p>Clientes registrados</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>

        {{-- Mascotas --}}
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $mascotas }}</h3>
                    <p>Mascotas</p>
                </div>
                <div class="icon"><i class="fas fa-dog"></i></div>
            </div>
        </div>

        {{-- Facturación --}}
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ number_format($facturacionMes, 2) }} €</h3>
                    <p>Facturación</p>
                </div>
                <div class="icon"><i class="fas fa-file-invoice-dollar"></i></div>
            </div>
        </div>

        {{-- Peluquerías --}}
        <div class="col-md-3">
    <div class="small-box bg-danger">
        <div class="inner">
            <h3>{{ $peluqueriasCount }}</h3>
            <p>Servicios de peluquería</p>
        </div>
        <div class="icon"><i class="fas fa-cut"></i></div>
    </div>
</div>

    </div>

    {{-- Próximas Citas Clínica --}}
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">Próximas citas en clínica</div>
        <div class="card-body">
            <ul>
                @foreach ($citas as $cita)
                    <li>{{ $cita->fecha_aplicacion->format('d/m/Y H:i') }} - {{ $cita->cliente->nombre }}
                        {{ $cita->cliente->apellidos }} - {{ $cita->motivo_cita }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Próximas Citas Peluquería --}}
    <div class="card mt-4">
        <div class="card-header bg-dark text-white">Próximas citas en peluquería</div>
        <div class="card-body">
            <ul>
                @foreach ($peluquerias as $peluqueria)
                    <li>{{ $peluqueria->hora_corte->format('d/m/Y H:i') }} - {{ $peluqueria->cliente->nombre }}
                        {{ $peluqueria->cliente->apellidos }} - {{ $peluqueria->observaciones }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Últimos Mensajes --}}
    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">Últimos mensajes de contacto</div>
        <div class="card-body">
            <ul>
                @foreach ($mensajes as $mensaje)
                    <li>{{ $mensaje->created_at->format('d/m/Y H:i') }} - {{ Str::limit($mensaje->nombre) }} {{ Str::limit($mensaje->apellido) }} - {{ Str::limit($mensaje->mensaje, 50) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
