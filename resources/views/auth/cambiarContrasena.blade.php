@extends('adminlte::page')

@section('title', 'Cambiar Contraseña')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow" style="width: 100%; max-width: 500px;">
        <div class="card-header text-center">
            <h4 class="mb-0">Cambiar Contraseña</h4>
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

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="actual_contrasena" class="form-label">Contraseña actual</label>
                    <input type="password" name="actual_contrasena" class="form-control" required>
                    @error('actual_contrasena')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Nueva contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
