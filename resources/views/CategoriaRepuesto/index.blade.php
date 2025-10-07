@extends('layouts.app')

@section('title', 'Gestión de Categorías de Repuestos')

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<img src="{{ asset('imagenes/RAPTOR.png') }}"
    alt="RAPTOR"
    class="position-fixed rounded-4"
    style="top: 40px; right: 10px; max-height: 130px; z-index: 1000; background-color: transparent;">


<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-list-ul"></i> Gestión de Categorías de Repuestos</h1>

    <a href="{{ route('categoriaRepuesto.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Categoría
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
                    <th>Nombre de la Categoría</th>
                    <th>opciones</th>


                </tr>
            </thead>
            <tbody>
                @foreach($categoriasRepuesto as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombreCategoria }}</td>

                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('categoriaRepuesto.edit', $categoria->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>

                            <form action="{{ route('categoriaRepuesto.destroy', $categoria->id) }}" method="POST" style="display:inline;">
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