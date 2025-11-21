@extends('layouts.app')

@section('title')
Gestión de Órdenes de Trabajo
@endsection

@section('content_header')


@endsection

@section('content')



<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-clipboard-check"></i> Gestión de Órdenes de Trabajo</h1>
    {{-- Mensaje cuando se aplica un filtro por estado --}}
    @if ($estado)
    <div class="card shadow-sm border-start border-4 border-primary mt-3 p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1 text-primary fw-bold">
                    Filtrando por estado: {{ ucfirst($estado) }}
                </h6>
                <p class="text-muted mb-0">Se muestran solo las órdenes coincidentes.</p>
            </div>

            <a href="{{ route('OrdenTrabajo.index') }}" class="btn btn-sm btn-outline-danger">
                Quitar filtro
            </a>
        </div>
    </div>
    @endif


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


    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: '¡Atención!',
                text: "{{ session('error') }}",
                confirmButtonText: 'Aceptar',
            });
        });
    </script>
    @endif

    <div class="container">
        <table id="myTable" class="table table-bordered table-hover">
            <thead class="table card-header bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Diagnóstico</th>
                    <th>Moto</th>
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
                    <td>{{ optional($orden->diagnostico)->descripcion ?? 'Sin diagnóstico' }}</td>
                    <td>
                        {{ optional(optional($orden->moto)->marca)->nombreMarca ?? 'Sin marca' }} -
                        {{ optional($orden->moto)->placa ?? 'Sin placa' }}
                    </td>

                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('OrdenTrabajo.edit', $orden->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>

                            <a href="{{ route('Preorden.porOrden', $orden->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-clipboard-plus"></i> Ver Preórdenes
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
        <div>
            @if(isset($volver))
            <a href="{{ $volver }}" class="btn btn-info mt-3">
                <i class="bi bi-arrow-left-circle"></i> Volver a los Diagnósticos
            </a>
            @else
            <a href="{{ route('welcome') }}" class="btn btn-secondary mt-3">
                <i class="bi bi-arrow-left-circle"></i> Volver
            </a>
            @endif
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

@endsection