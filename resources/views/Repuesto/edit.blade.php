@extends('layouts.app')

@section('title')
Editar Repuesto
@endsection

@section('content_header')
<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<img src="{{ asset('imagenes/RAPTOR.png') }}"
    alt="RAPTOR"
    class="position-fixed rounded-4"
    style="top: 40px; right: 10px; max-height: 130px; z-index: 1000; background-color: transparent;">


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
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        name="nombre"
                        value="{{ $repuesto->nombre }}">
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Marca --}}
                <div class="col-md-6">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text"
                        class="form-control @error('marca') is-invalid @enderror"
                        id="marca"
                        name="marca"
                        value="{{ $repuesto->marca }}">
                    @error('marca')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Precio --}}
                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number"
                        class="form-control @error('precio') is-invalid @enderror"
                        id="precio"
                        name="precio"
                        step="0.01"
                        value="{{ $repuesto->precio }}">
                    @error('precio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Stock --}}
                <div class="col-md-6">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number"
                        class="form-control @error('stock') is-invalid @enderror"
                        id="stock"
                        name="stock"
                        value="{{ $repuesto->stock }}">
                    @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Categoría --}}
                <div class="col-md-6">
                    <label for="idCategoria" class="form-label">Categoría</label>
                    <select class="form-control @error('idCategoria') is-invalid @enderror" id="idCategoria" name="idCategoria">
                        <option value="">-- Seleccione --</option>
                        @foreach($categoriasRepuesto as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ $repuesto->idCategoria == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombreCategoria }}
                        </option>
                        @endforeach
                    </select>
                    @error('idCategoria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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