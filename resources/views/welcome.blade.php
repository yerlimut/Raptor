@extends('layouts.app')

@section('title')
Bienvenido
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>

@section('content')
<div class="d-flex align-items-center my-4 flex-wrap">
    {{-- Logo RAPTOR --}}
    <img src="{{ asset('imagenes/raptor.png') }}" alt="RAPTOR"
        class="img-fluid" style="max-height: 180px;">


</div>
@endsection
<div class="container py-3">
    <div class="row g-3">

        {{-- Clientes --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/clientes.png') }}"
                    class="card-img-top mx-auto d-block"
                    alt="Clientes"
                    style="max-height: 100px; width: auto; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Clientes</h6>
                    <p class="text-muted small mb-2">Administra todos los clientes registrados.</p>
                    <a href="{{route('cliente.index')}}" class="btn btn-sm btn-outline-primary mt-auto">Ver Clientes</a>
                </div>
            </div>
        </div>

        {{-- Marcas de Motos --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/marcasmotos.jpg') }}" class="card-img-top"
                    alt="Marcas de Motos" style="max-height: 100px; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Marcas de Motos</h6>
                    <p class="text-muted small mb-2">Gestiona las marcas de motocicletas.</p>
                    <a href="{{route('marcaMoto.index')}}" class="btn btn-sm btn-outline-primary mt-auto">Ver Marcas</a>
                </div>
            </div>
        </div>

        {{-- Mecánicos --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/mecanico.png') }}" class="card-img-top"
                    alt="Mecánicos" style="max-height: 100px; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Mecánicos</h6>
                    <p class="text-muted small mb-2">Gestiona el personal del taller.</p>
                    <a href="{{route('mecanico.index')}}" class="btn btn-sm btn-outline-primary mt-auto">Ver Mecánicos</a>
                </div>
            </div>
        </div>

        {{-- Categorías --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/categoriarepuesto.jpg') }}" class="card-img-top"
                    alt="Categorías" style="max-height: 100px; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Categorías</h6>
                    <p class="text-muted small mb-2">Organiza las categorías de repuestos.</p>
                    <a href="{{route('categoriaRepuesto.index')}}" class="btn btn-sm btn-outline-primary mt-auto">Ver Categorías</a>
                </div>
            </div>
        </div>

        {{-- Motos --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/motos.jpg') }}" class="card-img-top"
                    alt="Motos" style="max-height: 100px; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Motos</h6>
                    <p class="text-muted small mb-2">Control de motos registradas en el taller.</p>
                    <a href="{{route ('moto.index')}}" class="btn btn-sm btn-outline-primary mt-auto">Ver Motos</a>
                </div>
            </div>
        </div>

        {{-- Repuestos --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/repuestos.png') }}" class="card-img-top mx-auto d-block"
                    alt="Repuestos" style="max-height: 100px; width: auto; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Repuestos</h6>
                    <p class="text-muted small mb-2">Administra los repuestos disponibles.</p>
                    <a href="{{route('repuesto.index')}}" class="btn btn-sm btn-outline-primary mt-auto">Ver Repuestos</a>
                </div>
            </div>
        </div>

        {{-- Inventario --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/inventario.webp') }}" class="card-img-top"
                    alt="Inventario" style="max-height: 100px; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Inventario</h6>
                    <p class="text-muted small mb-2">Gestiona el stock de repuestos y productos.</p>
                    <a href="" class="btn btn-sm btn-outline-primary mt-auto">Ver Inventario</a>
                </div>
            </div>
        </div>

        {{-- Órdenes de Trabajo --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/ordenTrabajo.jpg') }}" class="card-img-top"
                    alt="Órdenes de Trabajo" style="max-height: 100px; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Órdenes de Trabajo</h6>
                    <p class="text-muted small mb-2">Crea y administra las órdenes de trabajo.</p>
                    <a href="" class="btn btn-sm btn-outline-primary mt-auto">Ver Órdenes</a>
                </div>
            </div>
        </div>

        {{-- Preórdenes --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/preorden.jpg') }}" class="card-img-top"
                    alt="Preórdenes" style="max-height: 100px; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Preórdenes</h6>
                    <p class="text-muted small mb-2">Gestiona las preórdenes de servicio.</p>
                    <a href="" class="btn btn-sm btn-outline-primary mt-auto">Ver Preórdenes</a>
                </div>
            </div>
        </div>

        {{-- Diagnóstico --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
            <div class="card h-100 border-0 shadow-sm rounded-3">
                <img src="{{ asset('imagenes/diagnostico.png') }}" class="card-img-top"
                    alt="Diagnóstico" style="max-height: 100px; object-fit: contain; padding: 8px;">
                <div class="card-body text-center p-2 d-flex flex-column">
                    <h6 class="fw-bold mb-1">Diagnóstico</h6>
                    <p class="text-muted small mb-2">Registra diagnósticos de las motos.</p>
                    <a href="{{route('diagnostico.index')}}" class="btn btn-sm btn-outline-primary mt-auto">Ver Diagnósticos</a>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- CSS personalizado para 5 columnas en escritorio grande --}}
<style>
    @media (min-width: 1200px) {
        .col-xl-5th {
            flex: 0 0 20%;
            max-width: 20%;
        }
    }
</style>

@endsection