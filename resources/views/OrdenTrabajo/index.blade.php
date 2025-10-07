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
        <table class="table table-bordered table-hover">
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