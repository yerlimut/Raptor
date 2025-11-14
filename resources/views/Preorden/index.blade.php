@extends('layouts.app')

@section('title')
Gestión de Preórdenes
@endsection

@section('content_header')
@endsection

@section('content')

<style>
    /* Ancho fijo para que DataTables no aplaste los botones */
    .col-opciones {
        min-width: 240px !important;
        white-space: nowrap;
    }

    /* Separación correcta entre botones */
    .btn-acciones {
        margin-right: 6px;
        /* espacio entre botones */
    }

    .opciones-vertical {
        display: flex;
        flex-direction: column;
        /* botones uno debajo del otro */
        gap: 6px;
        /* separación entre botones */
    }
</style>




<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-list-task"></i> Gestión de Preórdenes</h1>

    <a href="{{ route('Preorden.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Preorden
    </a>

    <div class="card card-secondary">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('Preorden.index') }}">
                <div class="row">
                    <!-- Búsqueda general -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="search">Buscar</label>
                            <input type="text" class="form-control" id="search" name="search"
                                value="{{ request('search') }}" placeholder="Descripción o palabra clave...">
                        </div>
                    </div>

                    <!-- Filtro por Orden de Trabajo -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="idOrden">Orden de Trabajo</label>
                            <select class="form-control" id="idOrden" name="idOrden">
                                <option value="">Todas</option>
                                @foreach($ordenes as $orden)
                                <option value="{{ $orden->id }}"
                                    {{ request('idOrden') == $orden->id ? 'selected' : '' }}>
                                    Orden #{{ $orden->id }} — {{ $orden->estado }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filtro por Mecánico -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="idMecanico">Mecánico</label>
                            <select class="form-control" id="idMecanico" name="idMecanico">
                                <option value="">Todos</option>
                                @foreach($mecanicos as $mecanico)
                                <option value="{{ $mecanico->id }}"
                                    {{ request('idMecanico') == $mecanico->id ? 'selected' : '' }}>
                                    {{ $mecanico->nombre }} {{ $mecanico->apellido }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filtro por Repuesto -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="idRepuesto">Repuesto</label>
                            <select class="form-control" id="idRepuesto" name="idRepuesto">
                                <option value="">Todos</option>
                                @foreach($repuestos as $repuesto)
                                <option value="{{ $repuesto->id }}"
                                    {{ request('idRepuesto') == $repuesto->id ? 'selected' : '' }}>
                                    {{ $repuesto->nombreRepuesto }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('Preorden.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-arrow-counterclockwise"></i> Limpiar
                        </a>
                    </div>
                </div>

            </form>
        </div>
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
        <thead class="table card-header bg-primary text-white">
            <tr>
                <th>ID</th>
                <th>Orden</th>
                <th>Mecánico</th>
                <th>Repuesto</th>
                <th>Moto</th>
                <th>Descripción</th>
                <th>Mano de Obra</th>
                <th>Saldo</th>
                <th>Total</th>
                <th class="col-opciones">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($preorden as $pre)
            <tr>
                <td>{{ $pre->id }}</td>
                <td>Orden #{{ $pre->ordenTrabajo?->id ?? 'N/A' }}</td>
                <td>{{ $pre->mecanico->nombre ?? 'N/A' }}</td>
                <td>
                    <ul class="mb-0">
                        @forelse($pre->repuestos as $rep)
                        <li>{{ $rep->nombre }}</li>
                        @empty
                        <li>N/A</li>
                        @endforelse
                    </ul>
                </td>
                <td>
                    {{ $pre->ordenTrabajo->moto->placa ?? 'N/A' }}<br>
                    <small class="text-muted">{{ $pre->ordenTrabajo->moto->modelo ?? '' }}</small>
                </td>
                <td>{{ $pre->descripcion }}</td>
                <td>${{ number_format($pre->mano_obra, 2) }}</td>
                <td>${{ number_format($pre->saldo, 2) }}</td>
                <td><strong>${{ number_format($pre->saldo + $pre->mano_obra, 2) }}</strong></td>

                <td class="col-opciones">
                    <div class="opciones-vertical">
                        <a href="{{ route('Preorden.edit', $pre->id) }}" class="btn btn-success btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </a>

                        <form action="{{ route('Preorden.destroy', $pre->id) }}" method="POST" class="w-100">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm w-100" onclick="confirmarEliminacion(event)">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>

                        <a href="{{ route('Preorden.verPDF', $pre->id) }}" class="btn btn-primary btn-sm" target="_blank">
                            <i class="bi bi-eye"></i> Ver PDF
                        </a>

                        <a href="{{ route('Preorden.descargarPDF', $pre->id) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-download"></i> Descargar PDF
                        </a>
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        @if(isset($volver))
        <a href="{{ $volver }}" class="btn btn-info mt-3">
            <i class="bi bi-arrow-left-circle"></i> Volver a la Orden de Trabajo
        </a>
        @else
        <a href="{{ route('welcome') }}" class="btn btn-secondary mt-3">
            <i class="bi bi-arrow-left-circle"></i> Volver
        </a>
        @endif
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

@section('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            autoWidth: false,
            columnDefs: [{
                width: "230px",
                targets: -1
            }],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection