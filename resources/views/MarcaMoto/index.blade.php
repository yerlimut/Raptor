@extends('layouts.app')

@section('title')
Gestión de Marcas de Motos
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
    <h1 class="text-center"><i class="bi bi-bicycle"></i> Gestión de Marcas de Motos</h1>

    <a href="{{ route('marcaMoto.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Marca
    </a>

    {{-- Filtros --}}
    <form method="GET" action="{{ route('marcaMoto.index') }}" class="mb-3">
        <div class="row">
            <!-- Buscar -->
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Buscar marca..." value="{{ request('search') }}">
            </div>

            
            <!-- Botón -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Filtrar
                </button>
            </div>
             <div class="col-md-2">
                <a href="{{ route('marcaMoto.index') }}" class="btn btn-secondary w-100">
                    <i class="bi bi-arrow-counterclockwise"></i> Limpiar
                </a>
            </div>
        </div>
    </form>


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
                    <th>Nombre Marca</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcasMoto as $marca)
                <tr>
                    <td>{{ $marca->id }}</td>
                    <td>{{ $marca->nombreMarca }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('marcaMoto.edit', $marca->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('marcaMoto.destroy', $marca->id) }}" method="POST">
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