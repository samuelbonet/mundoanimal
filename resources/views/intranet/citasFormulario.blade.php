@extends('adminlte::page')

@section('title', 'Registrar Cita')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh; bg-gradient">
    <div class="card shadow mt-5" style="width: 100%; max-width: 500px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">Registrar Cita</h4>
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

            {{-- Formulario de registro de cita --}}
            <form action="" method="POST">
                @csrf

                {{-- Nombre --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Apellidos --}}
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                    @error('apellidos')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Teléfono --}}
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                    <input type="tel" id="telefono" name="telefono" class="form-control" required>
                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Fecha y hora --}}
                <div class="mb-3">
                    <label for="fecha_hora" class="form-label">Fecha y Hora <span class="text-danger">*</span></label>
                    <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" required>
                    @error('fecha_hora')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                {{-- Motivo de la cita --}}
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo de la Cita <span class="text-danger">*</span></label>
                    <textarea id="motivo" name="motivo" class="form-control" rows="3" required></textarea>
                    @error('motivo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botón registrar --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Registrar Cita</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
