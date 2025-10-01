@extends('layouts.app')

@section('title')
Editar Categoría de Repuesto
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark"><i class="bi bi-pencil-square"></i> Editar Categoría de Repuesto</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('categoriaRepuesto.update', $categoriasRepuesto->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombreCategoria" class="form-label">Nombre de la Categoría</label>
                <select class="form-select" id="nombreCategoria" name="nombreCategoria" required>
                    <option value="">-- Seleccione una categoría --</option>
                    <option value="Motor" {{ $categoriasRepuesto->nombreCategoria == 'Motor' ? 'selected' : '' }}>Motor</option>
                    <option value="Transmisión" {{ $categoriasRepuesto->nombreCategoria == 'Transmisión' ? 'selected' : '' }}>Transmisión</option>
                    <option value="Frenos" {{ $categoriasRepuesto->nombreCategoria == 'Frenos' ? 'selected' : '' }}>Frenos</option>
                    <option value="Suspensión" {{ $categoriasRepuesto->nombreCategoria == 'Suspensión' ? 'selected' : '' }}>Suspensión</option>
                    <option value="Eléctrico" {{ $categoriasRepuesto->nombreCategoria == 'Eléctrico' ? 'selected' : '' }}>Eléctrico</option>
                    <option value="Carrocería" {{ $categoriasRepuesto->nombreCategoria == 'Carrocería' ? 'selected' : '' }}>Carrocería</option>
                    <option value="Escape" {{ $categoriasRepuesto->nombreCategoria == 'Escape' ? 'selected' : '' }}>Escape</option>
                    <option value="Ruedas y Neumáticos" {{ $categoriasRepuesto->nombreCategoria == 'Ruedas y Neumáticos' ? 'selected' : '' }}>Ruedas y Neumáticos</option>
                    <option value="Lubricantes" {{ $categoriasRepuesto->nombreCategoria == 'Lubricantes' ? 'selected' : '' }}>Lubricantes</option>
                    <option value="Filtros" {{ $categoriasRepuesto->nombreCategoria == 'Filtros' ? 'selected' : '' }}>Filtros</option>
                    <option value="Accesorios" {{ $categoriasRepuesto->nombreCategoria == 'Accesorios' ? 'selected' : '' }}>Accesorios</option>
                </select>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('categoriaRepuesto.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
