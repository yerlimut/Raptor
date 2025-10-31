@extends('layouts.app')

@section('title', 'Bienvenido')

@section('titleContent')
    <div class="text-center my-5">
        <h1 class="fw-bold display-5">Panel de Control RAPTOR</h1>
        <p class="text-muted">Accede rápidamente a las secciones principales del sistema</p>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row g-4 justify-content-center">

        {{-- Clientes --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                <img src="{{ asset('imagenes/clientes.png') }}" alt="Clientes" class="card-img-top" style="height: 110px; object-fit: contain; background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Clientes</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Administra todos los clientes registrados en el sistema.
                    </p>
                    <a href="{{ route('cliente.index') }}" class="btn btn-sm btn-outline-primary w-100 mt-auto rounded-pill">
                        Ver Clientes
                    </a>
                </div>
            </div>
        </div>

        {{-- Marcas de Motos --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                <img src="{{ asset('imagenes/marcasmotos.jpg') }}" alt="Marcas de Motos" class="card-img-top" style="height: 110px; object-fit: contain; background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Marcas de Motos</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Gestiona las marcas de motocicletas disponibles.
                    </p>
                    <a href="{{ route('marcaMoto.index') }}" class="btn btn-sm btn-outline-primary w-100 mt-auto rounded-pill">
                        Ver Marcas
                    </a>
                </div>
            </div>
        </div>

        {{-- Motos --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                <img src="{{ asset('imagenes/motos.jpg') }}" alt="Motos" class="card-img-top" style="height: 110px; object-fit: contain; background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Motos</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Controla y administra las motos registradas en el taller.
                    </p>
                    <a href="{{ route('moto.index') }}" class="btn btn-sm btn-outline-primary w-100 mt-auto rounded-pill">
                        Ver Motos
                    </a>
                </div>
            </div>
        </div>

        {{-- Repuestos --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                <img src="{{ asset('imagenes/repuestos.png') }}" alt="Repuestos" class="card-img-top" style="height: 110px; object-fit: contain; background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Repuestos</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Administra los repuestos y componentes disponibles.
                    </p>
                    <a href="{{ route('repuesto.index') }}" class="btn btn-sm btn-outline-primary w-100 mt-auto rounded-pill">
                        Ver Repuestos
                    </a>
                </div>
            </div>
        </div>

        {{-- Inventario de Motos --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                <img src="{{ asset('imagenes/inventario.webp') }}" alt="Inventario" class="card-img-top" style="height: 110px; object-fit: contain; background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Inventario de Motos</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Registra el estado general de las motos al ingreso: daños, combustible, accesorios y más.
                    </p>
                    <a href="{{ route('inventario.index') }}" class="btn btn-sm btn-outline-primary w-100 mt-auto rounded-pill">
                        Ver Inventario
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Estilo hover adicional --}}
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
