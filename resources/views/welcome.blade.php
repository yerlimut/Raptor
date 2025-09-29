@extends('layouts.app')

@section('title')
Bienvenido
@endsection

@section('titleContent')
<div class="text-center my-5">
    <h1 class="fw-bold display-5">Panel de Control</h1>
    <p class="text-muted">Accede rápidamente a las secciones principales del sistema</p>
</div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row g-4 justify-content-center">

        {{-- Clientes --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="{{ asset('imagenes/clientes.png') }}"
                    class="card-img-top mx-auto d-block"
                    alt="Clientes"
                    style="max-height: 120px; width: auto; object-fit: contain; padding: 10px;">

                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Clientes</h6>
                    <p class="text-muted mb-3">
                        Administra todos los clientes registrados.
                    </p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">
                        Ver Clientes
                    </a>
                </div>
            </div>
        </div>


        {{-- Marcas de Motos --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Marcas de Motos" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Marcas de Motos</h6>
                    <p class="text-muted mb-3">Gestiona las marcas de motocicletas.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Marcas</a>
                </div>
            </div>
        </div>

        {{-- Mecánicos --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Mecánicos" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Mecánicos</h6>
                    <p class="text-muted mb-3">Gestiona el personal del taller.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Mecánicos</a>
                </div>
            </div>
        </div>

        {{-- Categorías --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Categorías" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Categorías</h6>
                    <p class="text-muted mb-3">Organiza las categorías de repuestos.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Categorías</a>
                </div>
            </div>
        </div>

        {{-- Motos --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Motos" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Motos</h6>
                    <p class="text-muted mb-3">Control de motos registradas en el taller.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Motos</a>
                </div>
            </div>
        </div>

        {{-- Repuestos --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Repuestos" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Repuestos</h6>
                    <p class="text-muted mb-3">Administra los repuestos disponibles.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Repuestos</a>
                </div>
            </div>
        </div>

        {{-- Inventario --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Inventario" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Inventario</h6>
                    <p class="text-muted mb-3">Gestiona el stock de repuestos y productos.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Inventario</a>
                </div>
            </div>
        </div>

        {{-- Órdenes de Trabajo --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Órdenes de Trabajo" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Órdenes de Trabajo</h6>
                    <p class="text-muted mb-3">Crea y administra las órdenes de trabajo.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Órdenes</a>
                </div>
            </div>
        </div>

        {{-- Preórdenes --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Preórdenes" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Preórdenes</h6>
                    <p class="text-muted mb-3">Gestiona las preórdenes de servicio.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Preórdenes</a>
                </div>
            </div>
        </div>

        {{-- Diagnóstico --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="" class="card-img-top" alt="Diagnóstico" style="height: 150px; object-fit: cover;">
                <div class="card-body d-flex flex-column text-center">
                    <h6 class="fw-bold mt-2 mb-2">Diagnóstico</h6>
                    <p class="text-muted mb-3">Registra diagnósticos de las motos.</p>
                    <a href="" class="btn btn-sm btn-outline-primary w-100 mt-auto">Ver Diagnósticos</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection