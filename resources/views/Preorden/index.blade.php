@extends('layouts.app')

@section('title')
Gestión de Preórdenes
@endsection

@section('content_header')


@endsection
@section('content')



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

                <!-- Mostrar filtros aplicados -->
                @if(request()->hasAny(['search', 'idOrden', 'idMecanico', 'idRepuesto']))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible fade show mb-0 mt-2" role="alert">
                            <strong>Filtros aplicados:</strong>
                            @if(request('search'))
                            <span class="badge badge-light">Búsqueda: "{{ request('search') }}"</span>
                            @endif
                            @if(request('idOrden'))
                            <span class="badge badge-light">Orden: #{{ request('idOrden') }}</span>
                            @endif
                            @if(request('idMecanico'))
                            <span class="badge badge-light">Mecánico:
                                {{ $mecanicos->find(request('idMecanico'))->nombre ?? '' }}
                                {{ $mecanicos->find(request('idMecanico'))->apellido ?? '' }}
                            </span>
                            @endif
                            @if(request('idRepuesto'))
                            <span class="badge badge-light">Repuesto:
                                {{ $repuestos->find(request('idRepuesto'))->nombre ?? '' }}
                            </span>
                            @endif
                            <a href="{{ route('Preorden.index') }}" class="btn btn-sm btn-outline-secondary ml-2">
                                <i class="fas fa-times"></i> Limpiar
                            </a>
                        </div>
                    </div>
                </div>
                @endif
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
                    <th>Orden</th>
                    <th>Mecánico</th>
                    <th>Repuesto</th>
                    <th>Descripción</th>
                    <th>Saldo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($preorden as $preorden)
                <tr>
                    <td>{{ $preorden->id }}</td>
                    <td>Orden #{{ $preorden->ordenTrabajo ?->id ?? 'N/A' }}</td>
                    <td>{{ $preorden->mecanico->nombre ?? 'N/A' }}</td>
                    <td>

                        <ul class="mb-0">
                            @forelse($preorden->repuestos as $rep)
                            <li>{{ $rep->nombre }}</li>
                            @empty
                            <li>N/A</li>
                            @endforelse
                        </ul>
                    </td>
                    <

                        <td>{{ $preorden->descripcion }}</td>
                        <td>${{ number_format($preorden->saldo, 2) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('Preorden.edit', $preorden->id) }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <form action="{{ route('Preorden.destroy', $preorden->id) }}" method="POST" style="display:inline;">
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

@section('js')
<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        }
    });
});
</script>
@endsection
