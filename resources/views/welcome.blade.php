@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content_header')
<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<div class="container py-4">

    {{-- Logo Principal --}}
    <img src="{{ asset('imagenes/RAPTOR.png') }}"
        alt="RAPTOR"
        class="position-fixed shadow-sm rounded-4"
        style="top: 40px; right: 10px; max-height: 130px; z-index: 1000;">


    <div class="row g-4 justify-content-center">

        {{-- Clientes --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                <img src="{{ asset('imagenes/clientes.png') }}"
                    class="card-img-top mx-auto d-block p-3"
                    alt="Clientes"
                    style="max-height: 120px; object-fit: contain;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="fw-bold mb-2">Clientes</h5>
                    <p class="text-muted small mb-3">Administra todos los clientes registrados.</p>
                    <a href="{{ route('cliente.index') }}"
                        class="btn btn-outline-primary btn-sm mt-auto rounded-pill">Ver Clientes</a>
                </div>
            </div>
        </div>

        {{-- Marcas de Motos --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                <img src="{{ asset('imagenes/marcasmotos.jpg') }}"
                    class="card-img-top mx-auto d-block p-3"
                    alt="Marcas de Motos"
                    style="max-height: 120px; object-fit: contain;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="fw-bold mb-2">Marcas de Motos</h5>
                    <p class="text-muted small mb-3">Gestiona las marcas de motocicletas.</p>
                    <a href="{{ route('marcaMoto.index') }}"
                        class="btn btn-outline-primary btn-sm mt-auto rounded-pill">Ver Marcas</a>
                </div>
            </div>
        </div>

        {{-- Motos --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                <img src="{{ asset('imagenes/motos.jpg') }}"
                    class="card-img-top mx-auto d-block p-3"
                    alt="Motos"
                    style="max-height: 120px; object-fit: contain;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="fw-bold mb-2">Motos</h5>
                    <p class="text-muted small mb-3">Control de motos registradas en el taller.</p>
                    <a href="{{ route('moto.index') }}"
                        class="btn btn-outline-primary btn-sm mt-auto rounded-pill">Ver Motos</a>
                </div>
            </div>
        </div>

        {{-- Repuestos --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                <img src="{{ asset('imagenes/repuestos.png') }}"
                    class="card-img-top mx-auto d-block p-3"
                    alt="Repuestos"
                    style="max-height: 120px; object-fit: contain;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="fw-bold mb-2">Repuestos</h5>
                    <p class="text-muted small mb-3">Administra los repuestos disponibles.</p>
                    <a href="{{ route('repuesto.index') }}"
                        class="btn btn-outline-primary btn-sm mt-auto rounded-pill">Ver Repuestos</a>
                </div>
            </div>
        </div>

        {{-- Inventario de Moto --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                <img src="{{ asset('imagenes/inventario.webp') }}"
                    class="card-img-top mx-auto d-block p-3"
                    alt="Inventario de Moto"
                    style="max-height: 120px; object-fit: contain;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="fw-bold mb-2">Inventario de Motos</h5>
                    <p class="text-muted small mb-3">
                        Registra el estado general de la moto al ingresar: accesorios, daños, combustible y más.
                    </p>
                    <a href="{{ route('inventario.index') }}"
                        class="btn btn-outline-primary btn-sm mt-auto rounded-pill">
                        Ver Inventarios
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>

{{-- Estilo extra para hover --}}
<style>
    .hover-card {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .hover-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection