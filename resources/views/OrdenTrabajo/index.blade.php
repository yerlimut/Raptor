@extends('layouts.app')

@section('title')
Gestión de Órdenes de Trabajo
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
    <h1 class="text-center"><i class="bi bi-clipboard-check"></i> Gestión de Órdenes de Trabajo</h1>

    <a href="{{ route('OrdenTrabajo.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Orden de Trabajo
    </a>

    <div class="card card-secondary">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
    </div>

    <form method="GET" action="{{ route('OrdenTrabajo.index') }}">
        <div class="card-body">
            {{-- Fila de filtros --}}
            <div class="row g-3">

                {{-- Búsqueda general --}}
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por ID o diagnóstico..."
                        value="{{ request('search') }}">
                </div>

                {{-- Filtro por estado --}}
                <div class="col-md-2">
                    <select name="estado" class="form-select">
                        <option value="">Todos los estados</option>
                        <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en proceso" {{ request('estado') == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                        <option value="finalizado" {{ request('estado') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                        <option value="cancelado" {{ request('estado') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                </div>

                {{-- Filtro por diagnóstico --}}
                <div class="col-md-3">
                    <select name="idDiagnostico" class="form-select">
                        <option value="">Todos los diagnósticos</option>
                        @foreach($diagnosticos as $diag)
                            <option value="{{ $diag->id }}" {{ request('idDiagnostico') == $diag->id ? 'selected' : '' }}>
                                {{ $diag->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filtro por fecha de inicio --}}
                <div class="col-md-2">
                    <input type="date" name="fechaInicio" class="form-control" value="{{ request('fechaInicio') }}">
                </div>

                {{-- Filtro por fecha de fin --}}
                <div class="col-md-2">
                    <input type="date" name="fechaFin" class="form-control" value="{{ request('fechaFin') }}">
                </div>

            </div>

            {{-- Fila de filtros adicionales --}}
            <div class="row g-3 mt-3">

                {{-- Filtro por rango de fechas --}}
                <div class="col-md-3">
                    <input type="date" name="rangoInicio" class="form-control" value="{{ request('rangoInicio') }}">
                </div>

                <div class="col-md-3">
                    <input type="date" name="rangoFin" class="form-control" value="{{ request('rangoFin') }}">
                </div>

                {{-- Botones --}}
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('OrdenTrabajo.index') }}" class="btn btn-secondary w-100">
                        <i class="bi bi-arrow-counterclockwise"></i> Limpiar
                    </a>
                </div>
            </div>
        </div>
    </form>
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
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
                <th>Diagnóstico</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
            <tr>
                <td>{{ $orden->id }}</td>
                <td>{{ $orden->fechaInicio }}</td>
                <td>{{ $orden->fechaFin ?? 'En proceso' }}</td>
                <td>
                    @if($orden->estado == 'pendiente')
                    <span class="badge bg-warning text-dark">Pendiente</span>
                    @elseif($orden->estado == 'en proceso')
                    <span class="badge bg-primary">En Proceso</span>
                    @elseif($orden->estado == 'finalizado')
                    <span class="badge bg-success">Finalizado</span>
                    @else
                    <span class="badge bg-danger">Cancelado</span>
                    @endif
                </td>
                <td>{{ $orden->diagnostico->descripcion ?? 'Sin diagnóstico' }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('OrdenTrabajo.edit', $orden->id) }}" class="btn btn-success btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </a>

                        <form action="{{ route('OrdenTrabajo.destroy', $orden->id) }}" method="POST" style="display:inline;">
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
<div class="container">
    <div class="row g-3">
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E3F2FD;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Total de órdenes del mes</h6>
                    <p class="fs-5 text-secondary mb-0">120</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E8F5E9;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Órdenes finalizadas</h6>
                    <p class="fs-5 text-secondary mb-0">85</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FFF3E0;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Órdenes pendientes</h6>
                    <p class="fs-5 text-secondary mb-0">20</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E0F7FA;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Órdenes en proceso</h6>
                    <p class="fs-5 text-secondary mb-0">10</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FCE4EC;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Órdenes canceladas</h6>
                    <p class="fs-5 text-secondary mb-0">5</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#EDE7F6;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Tiempo promedio de reparación</h6>
                    <p class="fs-5 text-secondary mb-0">3.5 días</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#F1F8E9;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Diagnósticos realizados</h6>
                    <p class="fs-5 text-secondary mb-0">120</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FFFDE7;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Mecánicos por orden</h6>
                    <p class="fs-5 text-secondary mb-0">2</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#F3E5F5;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Repuestos utilizados</h6>
                    <p class="fs-5 text-secondary mb-0">245</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E8EAF6;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Órdenes finalizadas en el mes actual</h6>
                    <p class="fs-5 text-secondary mb-0">85</p>
                </div>
            </div>
        </div>
    </div>
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