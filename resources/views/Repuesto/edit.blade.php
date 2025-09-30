@extends('layouts.app')

@section('title')
Editar Repuesto
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection
@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-pencil-square"></i> Editar Repuesto</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('repuesto.update', $repuesto->id) }}" method="POST">
            @csrf
            <div class="row g-3">
                {{-- Nombre --}}
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                        class="form-control"
                        id="nombre"
                        name="nombre"
                        value="{{ $repuesto->nombre }}">
                </div>

                {{-- Marca --}}
                <div class="col-md-6">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text"
                        class="form-control"
                        id="marca"
                        name="marca"
                        value="{{ $repuesto->marca }}">
                </div>

                {{-- Precio --}}
                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number"
                        class="form-control"
                        id="precio"
                        name="precio"
                        step="0.01"
                        value="{{ $repuesto->precio }}">
                </div>

                {{-- Stock --}}
                <div class="col-md-6">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number"
                        class="form-control"
                        id="stock"
                        name="stock"
                        value="{{ $repuesto->stock }}">
                </div>

                {{-- Categoría --}}
                <div class="col-md-6">
                    <label for="idCategoria" class="form-label">Categoría</label>
                    <select class="form-control" id="idCategoria" name="idCategoria">
                        <option value="">-- Seleccione --</option>
                        @foreach($categoriasRepuesto as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ $repuesto->idCategoria == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombreCategoria }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('repuesto.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection