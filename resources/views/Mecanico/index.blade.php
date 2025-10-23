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

    <!-- 🔽 FILTROS -->
    <div class="card card-secondary shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-filter"></i> Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('mecanico.index') }}" class="mb-4">
                <div class="row g-2">
                    {{-- Búsqueda general --}}
                    <div class="col-md-3">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Buscar por nombre, apellido o documento...">
                    </div>

            {{-- Tipo de documento --}}
            <div class="col-md-2">
                <select name="tipoDocumento" class="form-select">
                    <option value="">Tipo de documento</option>
                    <option value="CC" {{ request('tipoDocumento') == 'CC' ? 'selected' : '' }}>Cédula</option>
                    <option value="TI" {{ request('tipoDocumento') == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                    <option value="CE" {{ request('tipoDocumento') == 'CE' ? 'selected' : '' }}>Cédula Extranjera</option>
                    <option value="PAS" {{ request('tipoDocumento') == 'PAS' ? 'selected' : '' }}>Pasaporte</option>
                </select>
            </div>



            <!-- Especialidad -->
            <div class="col-md-3">

                <select name="especialidad" class="form-select">
                    <option value="">Especialidad</option>
                    <option value="mecanica_general" {{ request('especialidad') == 'mecanica_general' ? 'selected' : '' }}>Mecánica General</option>
                    <option value="electricidad" {{ request('especialidad') == 'electricidad' ? 'selected' : '' }}>Electricidad Automotriz</option>
                    <option value="inyeccion" {{ request('especialidad') == 'inyeccion' ? 'selected' : '' }}>Sistemas de Inyección</option>
                    <option value="motos_altas" {{ request('especialidad') == 'motos_altas' ? 'selected' : '' }}>Motos de Alta Cilindrada</option>
                    <option value="motos_bajas" {{ request('especialidad') == 'motos_bajas' ? 'selected' : '' }}>Motos de Baja Cilindrada</option>
                    <option value="frenos" {{ request('especialidad') == 'frenos' ? 'selected' : '' }}>Frenos</option>
                    <option value="suspension" {{ request('especialidad') == 'suspension' ? 'selected' : '' }}>Suspensión</option>
                    <option value="transmision" {{ request('especialidad') == 'transmision' ? 'selected' : '' }}>Transmisión</option>
                    <option value="carburacion" {{ request('especialidad') == 'carburacion' ? 'selected' : '' }}>Carburación</option>
                    <option value="diagnostico" {{ request('especialidad') == 'diagnostico' ? 'selected' : '' }}>Diagnóstico Computarizado</option>
                </select>
            </div>

                    


            <!-- Botón -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Filtrar
                </button>
            </div>

                    <div class="col-md-2">
                        <a href="{{ route('mecanico.index') }}" class="btn btn-secondary w-100">
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
        <table id="myTable" class="table table-bordered table-hover">
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