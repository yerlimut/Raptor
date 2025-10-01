@extends('layouts.app')

@section('title')
Listado de Repuestos
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-tools"></i> Gestión de Repuestos</h1>

    <a href="{{ route('repuesto.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Nuevo Repuesto
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
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($repuestos as $repuesto)
                <tr>
                    <td>{{ $repuesto->id }}</td>
                    <td>{{ $repuesto->nombre }}</td>
                    <td>{{ $repuesto->marca }}</td>
                    <td>${{ number_format($repuesto->precio, 2) }}</td>
                    <td>{{ $repuesto->stock }}</td>
                    <td>{{ $repuesto->categoria->nombreCategoria ?? '---' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('repuesto.edit', $repuesto->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('repuesto.destroy', $repuesto->id) }}" method="POST" style="display:inline;">
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
