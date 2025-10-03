@extends('layouts.app')

@section('title', 'Crear Categoría de Repuesto')

@section('content_header')
<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-plus-circle"></i> Crear Categoría de Repuesto</h1>

    {{-- Alerta de éxito --}}
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                confirmButtonText: 'Aceptar',
                timer: 3000
            });
        });
    </script>
    @endif

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('categoriaRepuesto.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombreCategoria" class="form-label">Nombre de la Categoría</label>
                <select class="form-control @error('nombreCategoria') is-invalid @enderror" id="nombreCategoria" name="nombreCategoria" required>
                    <option value="">-- Seleccione una categoría --</option>
                    <option value="Motor">Motor</option>
                    <option value="Transmisión">Transmisión</option>
                    <option value="Frenos">Frenos</option>
                    <option value="Suspensión">Suspensión</option>
                    <option value="Eléctrico">Eléctrico</option>
                    <option value="Carrocería">Carrocería</option>
                    <option value="Escape">Escape</option>
                    <option value="Ruedas y Neumáticos">Ruedas y Neumáticos</option>
                    <option value="Lubricantes">Lubricantes</option>
                    <option value="Filtros">Filtros</option>
                    <option value="Accesorios">Accesorios</option>
                </select>
                @error('nombreCategoria')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar
                </button>
                <a href="{{ route('categoriaRepuesto.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
