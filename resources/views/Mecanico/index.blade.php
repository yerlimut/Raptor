@extends('layouts.app')

@section('title')
Gestión de Mecánicos
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
    <h1 class="text-center"><i class="bi bi-person-workspace"></i> Gestión de Mecánicos</h1>

    <a href="{{ route('mecanico.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Mecánico
    </a>

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
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Especialidad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mecanicos as $mecanico)
                <tr>
                    <td>{{ $mecanico->id }}</td>
                    <td>{{ $mecanico->nombre }}</td>
                    <td>{{ $mecanico->apellido }}</td>
                    <td>{{ $mecanico->tipoDocumento }}</td>
                    <td>{{ $mecanico->numeroDocumento }}</td>
                    <td>{{ $mecanico->telefono }}</td>
                    <td>{{ $mecanico->email }}</td>
                    <td>{{ $mecanico->direccion }}</td>
                    <td>{{ $mecanico->especialidad }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('mecanico.edit', $mecanico->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>

                            <form action="{{ route('mecanico.destroy', $mecanico->id) }}" method="POST" style="display:inline;">
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