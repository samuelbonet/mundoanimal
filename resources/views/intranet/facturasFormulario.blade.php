@extends('adminlte::page')

@section('title', 'Registrar Factura')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh; bg-gradient">
    <div class="card shadow mt-5" style="width: 100%; max-width: 500px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">Registrar Factura</h4>
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

            {{-- Formulario de registro de facturas --}}
            <form action="" method="POST">
                @csrf

                {{-- Fecha emisión --}}
                <div class="mb-3">
                    <label for="fecha_emision" class="form-label">Fecha de Emisión <span class="text-danger">*</span></label>
                    <input type="date" id="fecha_emision" name="fecha_emision" class="form-control" required>
                    @error('fecha_emision')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Concepto --}}
                <div class="mb-3">
                    <label for="concepto" class="form-label">Concepto <span class="text-danger">*</span></label>
                    <textarea id="concepto" name="concepto" class="form-control" rows="3" required></textarea>
                    @error('concepto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Total --}}
                <div class="mb-3">
                    <label for="total" class="form-label">Total (€) <span class="text-danger">*</span></label>
                    <input type="number" id="total" name="total" class="form-control" step="0.01" min="0" required>
                    @error('total')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botón regitsrar  --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Registrar Factura</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
