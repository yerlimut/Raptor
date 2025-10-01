@extends('layouts.app')

@section('title')
Listado de Motos
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-bicycle"></i> Gestión de Motos</h1>

    <a href="{{ route('moto.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Nueva Moto
    </a>

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
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Placa</th>
                    <th>Cliente</th>
                    <th>Marca</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($motos as $moto)
                <tr>
                    <td>{{ $moto->id }}</td>
                    <td>{{ $moto->modelo }}</td>
                    <td>{{ $moto->año }}</td>
                    <td>{{ $moto->placa }}</td>
                    <td>{{ $moto->cliente->nombre ?? '---' }}</td>
                    <td>{{ $moto->marca->nombreMarca ?? '---' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('moto.edit', $moto->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('moto.destroy', $moto->id) }}" method="POST" style="display:inline;">
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
