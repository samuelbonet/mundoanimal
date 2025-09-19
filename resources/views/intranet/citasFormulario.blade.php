@extends('adminlte::page')

@section('title', $mode == 'create' ? 'Registrar Cita' : 'Editar Cita')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh; bg-gradient">
    <div class="card shadow mt-5" style="width: 100%; max-width: 500px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">{{ $mode == 'create' ? 'Registrar' : 'Editar' }} Cita</h4>
        </div>
        <div class="card-body">

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            {{-- Errores generales --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ $mode == 'create' ? route('cita.store') : route('cita.update', $cita?->id_cita) }}" method="POST">
            @csrf

            {{-- Cliente --}}
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select id="id_cliente" name="id_cliente" class="form-control" required>
                    <option value="" disabled selected hidden>-- Selecciona un cliente --</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}" @if($cliente->id_cliente == $cita?->id_cliente) selected @endif>
                            {{ $cliente->nombre }} {{ $cliente->apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Teléfono --}}
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $cita?->telefono) }}" required>
            </div>

            {{-- Fecha y hora --}}
            <div class="mb-3">
                <label for="fecha_aplicacion" class="form-label">Fecha y Hora de Aplicación <span class="text-danger">*</span></label>
                <input type="datetime-local" id="fecha_aplicacion" name="fecha_aplicacion" class="form-control" value="{{ old('fecha_aplicacion', $cita?->fecha_aplicacion?->format('Y-m-d\TH:i')) }}" required>
            </div>

            {{-- Motivo --}}
            <div class="mb-3">
                <label for="motivo_cita" class="form-label">Motivo de cita</label>
                <textarea id="motivo_cita" name="motivo_cita" class="form-control">{{ old('motivo_cita', $cita?->motivo_cita) }}</textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">{{ $mode == 'create' ? 'Registrar' : 'Editar'}} Cita</button>
            </div>
        </form>

        </div>
    </div>
</div>
@stop
