@extends('adminlte::page')

@section('title', $mode === 'create' ? 'Crear Factura' : 'Editar Factura')

@section('content')
<div class="d-flex justify-content-center" style="min-height: 80vh;">
    <div class="card shadow mt-5" style="width: 100%; max-width: 600px;">
        <div class="card-header text-center bg-success bg-gradient">
            <h4 class="mb-0">{{ $mode === 'create' ? 'Crear Factura' : 'Editar Factura' }}</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ $mode === 'create' ? route('facturas.store') : route('facturas.update', $factura->id_factura) }}" method="POST">
                @csrf
                @if($mode === 'update')
                    {{-- Si quieres mantener POST en lugar de PUT, no hace falta @method('PUT') --}}
                @endif

                {{-- Cliente --}}
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Cliente <span class="text-danger">*</span></label>
                    <select name="id_cliente" id="id_cliente" class="form-control" required>
                        <option value="">-- Selecciona un cliente --</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}" 
                                {{ old('id_cliente', $factura?->id_cliente) == $cliente->id_cliente ? 'selected' : '' }}>
                                {{ $cliente->nombre }} {{ $cliente->apellidos }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_cliente')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Fecha de Emisión --}}
                <div class="mb-3">
                    <label for="fecha_emision" class="form-label">Fecha de Emisión <span class="text-danger">*</span></label>
                    <input type="datetime-local" 
                           id="fecha_emision" 
                           name="fecha_emision" 
                           class="form-control"
                           value="{{ old('fecha_emision', $factura?->fecha_emision?->format('Y-m-d\TH:i')) }}"
                           required>
                    @error('fecha_emision')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Concepto --}}
                <div class="mb-3">
                    <label for="concepto" class="form-label">Concepto <span class="text-danger">*</span></label>
                    <input type="text" name="concepto" id="concepto" class="form-control"
                           value="{{ old('concepto', $factura?->concepto) }}" required>
                    @error('concepto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Precio --}}
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="precio" id="precio" class="form-control"
                           value="{{ old('precio', $factura?->precio) }}" required>
                    @error('precio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botones --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{ $mode === 'create' ? 'Crear' : 'Actualizar' }}</button>
                    <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
