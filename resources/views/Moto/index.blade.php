@extends('layouts.app')

@section('title')
Listado de Motos
@endsection


@section('content_header')


@endsection

@section('content')



<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-bicycle"></i> Gestión de Motos</h1>

    <a href="{{ route('moto.create', ['idCliente' => request('idCliente')]) }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Registrar Moto
    </a>
    <br>
    <br>


    <!-- 🔽 FILTROS -->
    <div class="card card-secondary shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('moto.index') }}" class="mb-4">
                <div class="row g-2">

                    {{-- Búsqueda general --}}
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por modelo o placa..."
                            value="{{ request('search') }}">
                    </div>

                    {{-- Filtro por cliente --}}
                    <div class="col-md-2">
                        <select name="idCliente" class="form-select">
                            <option value="">Cliente</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ request('idCliente') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nombre }} {{ $cliente->apellido }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filtro por marca --}}
                    <div class="col-md-2">
                        <select name="idMarca" class="form-select">
                            <option value="">Marca</option>
                            @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ request('idMarca') == $marca->id ? 'selected' : '' }}>
                                {{ $marca->nombreMarca }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filtro por año --}}
                    <div class="col-md-2">
                        <input type="date" name="año" class="form-control" placeholder="Año"
                            value="{{ request('año') }}">
                    </div>



                    {{-- Botones --}}
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"> Filtrar</i>
                        </button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('moto.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-arrow-counterclockwise"> Limpiar</i>
                        </a>
                    </div>
                </div>
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
            <thead class="table card-header bg-primary text-white">
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
                        <div class="d-flex flex-wrap gap-2">
                            {{-- Editar --}}
                            <a href="{{ route('moto.edit', $moto->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>

                            {{-- Diagnósticos --}}
                            <a href="{{ route('diagnostico.porMoto', $moto->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-clipboard-pulse"></i> Diagnósticos
                            </a>


                            {{-- Inventario --}}
                            <a href="{{ route('inventario.porMoto', $moto->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-box-seam"></i> Inventario
                            </a>


                            {{-- Eliminar --}}
                            <form action="{{ route('moto.destroy', $moto->id) }}" method="POST" style="display:inline;">
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
            <a href="{{ $volver }}" class="btn btn-info">
                <i class="bi bi-arrow-left-circle"></i> Volver
            </a>

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
</div>
@endsection