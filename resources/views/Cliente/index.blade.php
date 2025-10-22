@extends('layouts.app')

@section('title')
Gestión de Clientes
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
{{-- Logo Principal --}}
<img src="{{ asset('imagenes/RAPTOR.png') }}"
    alt="RAPTOR"
    class="position-fixed rounded-4"
    style="top: 40px; right: 10px; max-height: 130px; z-index: 1000; background-color: transparent;">


<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-people"></i> Gestión de Clientes</h1>

    <a href="{{ route('cliente.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Crear Cliente
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
        <table  id="myTable" class="table table-bordered table-hover">
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
    <div class="container">
    <div class="row g-3">
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E3F2FD;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Total de clientes registrados</h6>
                    <p class="fs-5 text-secondary mb-0">3</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E8F5E9;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Nuevos clientes del mes</h6>
                    <p class="fs-5 text-secondary mb-0">25</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FFF3E0;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Clientes que regresan</h6>
                    <p class="fs-5 text-secondary mb-0">18</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FCE4EC;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Clientes inactivos</h6>
                    <p class="fs-5 text-secondary mb-0">5</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E0F7FA;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Clientes por tipo de servicio</h6>
                    <p class="fs-5 text-secondary mb-0">3 tipos</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#EDE7F6;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Promedio de visitas por cliente</h6>
                    <p class="fs-5 text-secondary mb-0">2.4</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#F1F8E9;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Clientes Clientes con órdenes finalizadas</h6>
                    <p class="fs-5 text-secondary mb-0">3</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#F3E5F5;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Clientes con varias motos</h6>
                    <p class="fs-5 text-secondary mb-0">12</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FFFDE7;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Clientes nuevos vs recurrentes</h6>
                    <p class="fs-5 text-secondary mb-0">60% / 40%</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E8EAF6;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Crecimiento mensual de clientes</h6>
                    <p class="fs-5 text-secondary mb-0">8%</p>
                </div>
            </div>
        </div>
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