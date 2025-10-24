@extends('layouts.app')

@section('title', 'Gestión de Categorías de Repuestos')

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<img src="{{ asset('imagenes/RAPTOR.png') }}"
    alt="RAPTOR"
    class="position-fixed rounded-4"
    style="top: 40px; right: 10px; max-height: 130px; z-index: 1000; background-color: transparent;">


<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-list-ul"></i> Gestión de Categorías de Repuestos</h1>

    <a href="{{ route('categoriaRepuesto.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Categoría
    </a>
    <!-- 🔽 FILTROS -->
    <div class="card card-secondary shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('categoriaRepuesto.index') }}">
                <div class="row">
                    <!-- Buscar -->
                    <div class="col-md-4">
                        <label for="search">Buscar</label>
                        <input type="text" name="search" id="search" class="form-control"
                            value="{{ request('search') }}" placeholder="Nombre de la categoría...">
                    </div>

                    <!-- Fecha desde -->
                    <div class="col-md-3">
                        <label for="fechaInicio">Fecha desde</label>
                        <input type="date" name="fechaInicio" id="fechaInicio" class="form-control"
                            value="{{ request('fechaInicio') }}">
                    </div>

                    <!-- Fecha hasta -->
                    <div class="col-md-3">
                        <label for="fechaFin">Fecha hasta</label>
                        <input type="date" name="fechaFin" id="fechaFin" class="form-control"
                            value="{{ request('fechaFin') }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <!-- Ordenar por -->
                    <div class="col-md-3">
                        <label for="sort">Ordenar por</label>
                        <select name="sort" id="sort" class="form-control">
                            <option value="nombreCategoria" {{ request('sort') == 'nombreCategoria' ? 'selected' : '' }}>Nombre de categoría</option>
                            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Fecha de creación</option>
                        </select>
                    </div>

                    <!-- Dirección -->
                    <div class="col-md-3">
                        <label for="direction">Dirección</label>
                        <select name="direction" id="direction" class="form-control">
                            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descendente</option>
                        </select>
                    </div>

                    <!-- Botón buscar -->
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <a href="{{ route('categoriaRepuesto.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-undo"></i> Limpiar
                        </a>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>

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

<div class="container">
    <table id="myTable" class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre de la Categoría</th>
                <th>opciones</th>


            </tr>
        </thead>
        <tbody>
            @foreach($categoriasRepuesto as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombreCategoria }}</td>

                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('categoriaRepuesto.edit', $categoria->id) }}" class="btn btn-success btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </a>

                        <form action="{{ route('categoriaRepuesto.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirmarEliminacion(event)">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

    <a href="{{ route('welcome') }}" class="btn btn-info">
        <i class="bi bi-arrow-left-circle"></i> Volver
    </a>
</div>

<script>
    function confirmarEliminacion(event) {
        event.preventDefault();
        const form = event.target.closest('form');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
</div>
@endsection