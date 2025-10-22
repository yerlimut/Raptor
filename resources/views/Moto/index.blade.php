@extends('layouts.app')

@section('title')
Listado de Motos
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
    <h1 class="text-center"><i class="bi bi-bicycle"></i> Gestión de Motos</h1>

    <a href="{{ route('moto.create', ['idCliente' => request('idCliente')]) }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Registrar Moto
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


<div class="container">
    <div class="row g-3">
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E3F2FD;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Total de motos registradas</h6>
                    <p class="fs-5 text-secondary mb-0">180</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E8F5E9;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Motos atendidas este mes</h6>
                    <p class="fs-5 text-secondary mb-0">45</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FFF3E0;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Motos nuevas ingresadas</h6>
                    <p class="fs-5 text-secondary mb-0">20</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FCE4EC;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Motos por marca</h6>
                    <p class="fs-5 text-secondary mb-0">8 marcas</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E0F7FA;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Estado general de motos (inventario)</h6>
                    <p class="fs-5 text-secondary mb-0">Activo</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#EDE7F6;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Promedio de reparaciones por moto</h6>
                    <p class="fs-5 text-secondary mb-0">1.7</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#F1F8E9;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Motos con diagnóstico preventivo</h6>
                    <p class="fs-5 text-secondary mb-0">15</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#FFFDE7;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Motos con estado pendiente de entrega</h6>
                    <p class="fs-5 text-secondary mb-0">10</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#F3E5F5;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Motos entregadas</h6>
                    <p class="fs-5 text-secondary mb-0">35</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0" style="background-color:#E8EAF6;">
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold mb-1">Motos reincidentes (mismo cliente)</h6>
                    <p class="fs-5 text-secondary mb-0">7</p>
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