@extends('layouts.app')

@section('title')
Gestión de Inventarios
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
    <h1 class="text-center"><i class="bi bi-box-seam"></i> Gestión de Inventarios</h1>

    <a href="{{ route('inventario.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Inventario
    </a>
    <!-- FILTROS -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('inventario.index') }}">
                <div class="row">
                    <!-- Buscar -->
                    <div class="col-md-4">
                        <label for="search">Buscar</label>
                        <input type="text" name="search" id="search" class="form-control"
                            value="{{ request('search') }}" placeholder="Descripción o modelo de moto...">
                    </div>

                    <!-- Estado general -->
                    <div class="col-md-3">
                        <label for="estadoGeneral">Estado general</label>
                        <select name="estadoGeneral" id="estadoGeneral" class="form-control">
                            <option value="">-- Todos --</option>
                            <option value="Bueno" {{ request('estadoGeneral') == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                            <option value="Regular" {{ request('estadoGeneral') == 'Regular' ? 'selected' : '' }}>Regular</option>
                            <option value="Malo" {{ request('estadoGeneral') == 'Malo' ? 'selected' : '' }}>Malo</option>
                        </select>
                    </div>

                    <!-- Estado inventario -->
                    <div class="col-md-3">
                        <label for="estadoInventario">Estado del inventario</label>
                        <select name="estadoInventario" id="estadoInventario" class="form-control">
                            <option value="">-- Todos --</option>
                            <option value="En taller" {{ request('estadoInventario') == 'En taller' ? 'selected' : '' }}>En taller</option>
                            <option value="Entregado" {{ request('estadoInventario') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                            <option value="Pendiente" {{ request('estadoInventario') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        </select>
                    </div>

                    <!-- Botón buscar -->
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>

                <div class="row mt-3">
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

                    <!-- Ordenar por -->
                    <div class="col-md-3">
                        <label for="sort">Ordenar por</label>
                        <select name="sort" id="sort" class="form-control">
                            <option value="fechaRegistro" {{ request('sort') == 'fechaRegistro' ? 'selected' : '' }}>Fecha de registro</option>
                            <option value="estadoGeneral" {{ request('sort') == 'estadoGeneral' ? 'selected' : '' }}>Estado general</option>
                            <option value="estadoInventario" {{ request('sort') == 'estadoInventario' ? 'selected' : '' }}>Estado inventario</option>
                        </select>
                    </div>

                    <!-- Dirección -->
                    <div class="col-md-2">
                        <label for="direction">Dirección</label>
                        <select name="direction" id="direction" class="form-control">
                            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descendente</option>
                        </select>
                    </div>

                    <!-- Botón limpiar -->
                    <div class="col-md-1 d-flex align-items-end">
                        <a href="{{ route('inventario.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-undo"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

    <div class="container">
        <table id="myTable" class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Fecha Registro</th>
                    <th>Estado General</th>
                    <th>Estado Inventario</th>
                    <th>Moto</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->id }}</td>
                    <td>{{ $inventario->descripcion }}</td>
                    <td>{{ $inventario->fechaRegistro }}</td>
                    <td>{{ $inventario->estadoGeneral }}</td>
                    <td>{{ $inventario->estadoInventario }}</td>
                    <td>{{ $inventario->moto->placa ?? 'Sin asignar' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('inventario.edit', $inventario->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>

                            <form action="{{ route('inventario.destroy', $inventario->id) }}" method="POST" style="display:inline;">
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