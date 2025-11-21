@extends('layouts.app')

@section('title')
Gestión de Clientes
@endsection

@section('content_header')

@endsection

@section('content')
{{-- Logo Principal --}}

<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-people"></i> Gestión de Clientes</h1>

    <a href="{{ route('cliente.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Cliente
    </a>
    <!-- 🔽 FILTROS -->
    <div class="card card-secondary shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('cliente.index') }}">
                <div class="row">
                    <!-- Buscar -->
                    <div class="col-md-3">
                        <label for="search">Buscar</label>
                        <input type="text" name="search" id="search" class="form-control"
                            value="{{ request('search') }}" placeholder="Nombre, documento, correo...">
                    </div>

                    <!-- Tipo Documento -->
                    <div class="col-md-2">
                        <label for="tipoDocumento">Tipo de Documento</label>
                        <select name="tipoDocumento" id="tipoDocumento" class="form-control">
                            <option value="">Todos</option>
                            <option value="CC" {{ request('tipoDocumento') == 'CC' ? 'selected' : '' }}>Cédula</option>
                            <option value="TI" {{ request('tipoDocumento') == 'TI' ? 'selected' : '' }}>Tarjeta de identidad</option>
                            <option value="CE" {{ request('tipoDocumento') == 'CE' ? 'selected' : '' }}>Cédula de extranjería</option>
                            <option value="NIT" {{ request('tipoDocumento') == 'NIT' ? 'selected' : '' }}>NIT</option>
                        </select>
                    </div>

                    <!-- Teléfono -->
                    <div class="col-md-2">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control"
                            value="{{ request('telefono') }}" placeholder="Ej: 312...">
                    </div>

                    <!-- Dirección -->
                    <div class="col-md-2">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control"
                            value="{{ request('direccion') }}" placeholder="Ej: Calle 10...">
                    </div>

                    <!-- Dominio de correo -->
                    <div class="col-md-3">
                        <label for="correoDominio">Dominio de correo</label>
                        <select name="correoDominio" id="correoDominio" class="form-control">
                            <option value="">Todos</option>
                            <option value="gmail.com" {{ request('correoDominio') == 'gmail.com' ? 'selected' : '' }}>Gmail</option>
                            <option value="hotmail.com" {{ request('correoDominio') == 'hotmail.com' ? 'selected' : '' }}>Hotmail</option>
                            <option value="outlook.com" {{ request('correoDominio') == 'outlook.com' ? 'selected' : '' }}>Outlook</option>
                            <option value="yahoo.com" {{ request('correoDominio') == 'yahoo.com' ? 'selected' : '' }}>Yahoo</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <!-- Fecha inicio -->
                    <div class="col-md-3">
                        <label for="fechaInicio">Fecha desde</label>
                        <input type="date" name="fechaInicio" id="fechaInicio" class="form-control"
                            value="{{ request('fechaInicio') }}">
                    </div>

                    <!-- Fecha fin -->
                    <div class="col-md-3">
                        <label for="fechaFin">Fecha hasta</label>
                        <input type="date" name="fechaFin" id="fechaFin" class="form-control"
                            value="{{ request('fechaFin') }}">
                    </div>

                    <!-- Ordenar por -->
                    <div class="col-md-3">
                        <label for="sort">Ordenar por</label>
                        <select name="sort" id="sort" class="form-control">
                            <option value="nombre" {{ request('sort') == 'nombre' ? 'selected' : '' }}>Nombre</option>
                            <option value="apellido" {{ request('sort') == 'apellido' ? 'selected' : '' }}>Apellido</option>
                            <option value="numeroDocumento" {{ request('sort') == 'numeroDocumento' ? 'selected' : '' }}>Documento</option>
                            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Fecha registro</option>
                        </select>
                    </div>

                    <!-- Dirección orden -->
                    <div class="col-md-2">
                        <label for="direction">Dirección</label>
                        <select name="direction" id="direction" class="form-control">
                            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descendente</option>
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Filtrar
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('cliente.index') }}" class="btn btn-secondary w-100">
                    <i class="bi bi-arrow-counterclockwise"></i> Limpiar
                </a>
            </div>

            
                </div>
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
        <table id="myTable" class="table table-bordered table-hover w-75 mx-auto small align-middle" >
            <thead class="table card-header bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->tipoDocumento }}</td>
                    <td>{{ $cliente->numeroDocumento }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->correoElectronico }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>

                            <a href="{{ route('moto.index', ['idCliente' => $cliente->id] ) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-motorcycle"></i> Motos
                            </a>

                            <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" style="display:inline;">
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