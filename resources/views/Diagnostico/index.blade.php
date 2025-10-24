@extends('layouts.app')

@section('title')
Listado de Diagnósticos
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
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
    <h1 class="text-center"><i class="bi bi-clipboard2-pulse"></i> Gestión de Diagnósticos</h1>

    <a href="{{ route('diagnostico.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Nuevo Diagnóstico
    </a>
    <!-- 🔽 FILTROS -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('diagnostico.index') }}">
                <div class="row">
                    <!-- Buscar -->
                    <div class="col-md-4">
                        <label for="search">Buscar</label>
                        <input type="text" name="search" id="search" class="form-control"
                            value="{{ request('search') }}" placeholder="Descripción o modelo de moto...">
                    </div>

                    <!-- Estado -->
                    <div class="col-md-3">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="">-- Todos --</option>
                            <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en proceso" {{ request('estado') == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                            <option value="completado" {{ request('estado') == 'completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                    </div>

                    <!-- Tipo -->
                    <div class="col-md-3">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="">-- Todos --</option>
                            <option value="preventivo" {{ request('tipo') == 'preventivo' ? 'selected' : '' }}>Preventivo</option>
                            <option value="correctivo" {{ request('tipo') == 'correctivo' ? 'selected' : '' }}>Correctivo</option>
                            <option value="inspeccion" {{ request('tipo') == 'inspeccion' ? 'selected' : '' }}>Inspección</option>
                        </select>
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
                            <option value="fechaDiagnostico" {{ request('sort') == 'fechaDiagnostico' ? 'selected' : '' }}>Fecha del diagnóstico</option>
                            <option value="estado" {{ request('sort') == 'estado' ? 'selected' : '' }}>Estado</option>
                            <option value="tipo" {{ request('sort') == 'tipo' ? 'selected' : '' }}>Tipo</option>
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

                    <!-- Botón buscar -->
                    <div class=" row mt-3  col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>

                    <!-- Botón limpiar -->
                    <div class=" row mt-3  col-md-2 d-flex align-items-end">
                        <a href="{{ route('categoriaRepuesto.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-undo"></i> Limpiar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Mensaje de éxito con SweetAlert --}}
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
                    <th>Fecha Diagnóstico</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th>Moto</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($diagnosticos as $diagnostico)
                <tr>
                    <td>{{ $diagnostico->id }}</td>
                    <td>{{ $diagnostico->descripcion }}</td>
                    <td>{{ $diagnostico->fechaDiagnostico }}</td>
                    <td>{{ ucfirst($diagnostico->estado ?? '---') }}</td>
                    <td>{{ ucfirst($diagnostico->tipo ?? '---') }}</td>
                    <td>
                        {{ $diagnostico->moto->marca->nombreMarca ?? '---' }}
                        ({{ $diagnostico->moto->placa ?? '' }})
                    </td>


                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('diagnostico.edit', $diagnostico->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('diagnostico.destroy', $diagnostico->id) }}" method="POST" style="display:inline;">
                                @csrf

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="confirmarEliminacion(event)">
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