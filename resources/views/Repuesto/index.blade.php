@extends('layouts.app')

@section('title')
Listado de Repuestos
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
    <h1 class="text-center"><i class="bi bi-tools"></i> Gestión de Repuestos</h1>

    <a href="{{ route('repuesto.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Nuevo Repuesto
    </a>

    <div class="card card-secondary">
        <div class="card-header">
            <h5 class="card-title"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>

        <div class="card-body">
            <form method="GET" action="{{ route('repuesto.index') }}">
                <div class="row">
                    <!-- Filtro de búsqueda general -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="search">Buscar</label>
                            <input type="text" class="form-control" id="search" name="search"
                                value="{{ request('search') }}" placeholder="Nombre o marca del repuesto...">
                        </div>
                    </div>

                    <!-- Filtro por Categoría -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="idCategoria">Categoría</label>
                            <select class="form-control" id="idCategoria" name="idCategoria">
                                <option value="">Todas</option>
                                @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ request('idCategoria') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombreCategoria }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filtro por rango de precios -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="precio_min">Precio mínimo</label>
                            <input type="number" class="form-control" id="precio_min" name="precio_min"
                                value="{{ request('precio_min') }}" placeholder="0">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="precio_max">Precio máximo</label>
                            <input type="number" class="form-control" id="precio_max" name="precio_max"
                                value="{{ request('precio_max') }}" placeholder="500000">
                        </div>
                    </div>

                    <!-- Filtro por stock -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <select class="form-control" id="stock" name="stock">
                                <option value="">Todos</option>
                                <option value="bajo" {{ request('stock') == 'bajo' ? 'selected' : '' }}>Bajo (&lt; 5)</option>
                                <option value="medio" {{ request('stock') == 'medio' ? 'selected' : '' }}>Medio (5–20)</option>
                                <option value="alto" {{ request('stock') == 'alto' ? 'selected' : '' }}>Alto (&gt; 20)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Botón de búsqueda -->
                    <div class="col-md-1 mt-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Mostrar filtros aplicados -->
                @if(request()->hasAny(['search', 'idCategoria', 'precio_min', 'precio_max', 'stock']))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible fade show mb-0 mt-2" role="alert">
                            <strong>Filtros aplicados:</strong>
                            @if(request('search'))
                            <span class="badge badge-light">Búsqueda: "{{ request('search') }}"</span>
                            @endif
                            @if(request('idCategoria'))
                            <span class="badge badge-light">Categoría:
                                {{ $categorias->find(request('idCategoria'))->nombreCategoria ?? '' }}
                            </span>
                            @endif
                            @if(request('precio_min'))
                            <span class="badge badge-light">Desde: ${{ number_format(request('precio_min'), 0, ',', '.') }}</span>
                            @endif
                            @if(request('precio_max'))
                            <span class="badge badge-light">Hasta: ${{ number_format(request('precio_max'), 0, ',', '.') }}</span>
                            @endif
                            @if(request('stock'))
                            <span class="badge badge-light">Stock:
                                @if(request('stock') == 'bajo') Bajo (&lt; 5)
                                @elseif(request('stock') == 'medio') Medio (5–20)
                                @else Alto (&gt; 20) @endif
                            </span>
                            @endif
                            <a href="{{ route('repuesto.index') }}" class="btn btn-sm btn-outline-secondary ml-2">
                                <i class="fas fa-times"></i> Limpiar
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>


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
        <table id="myTable" class="table table-bordered table-hover">
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