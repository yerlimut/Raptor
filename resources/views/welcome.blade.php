@extends('layouts.app')

@section('title')
    Welcome
@endsection

@section('titleContent')
    <h1 class="text-center my-4 fw-bold text-white">
        <i class="fas fa-tachometer-alt"></i> Dashboard Taller
    </h1>
@endsection

@section('content')
<div class="container-fluid py-4 bg-gradient-dark">
    <div class="row g-4 justify-content-center">

        <!-- Clientes -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Clientes</h5>
                    <p class="card-text text-light opacity-75">Administra todos los clientes registrados.</p>
                    <a href="{{ route('cliente.index') }}" class="btn btn-outline-light w-100 fw-bold">Ir a Clientes</a>
                </div>
            </div>
        </div>

        <!-- Marcas de Motos -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-motorcycle fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Marcas de Motos</h5>
                    <p class="card-text text-light opacity-75">Gestiona las marcas de motocicletas.</p>
                    <a href="{{ route('marcaMoto.index') }}" class="btn btn-outline-light w-100 fw-bold">Ir a Marcas</a>
                </div>
            </div>
        </div>

        <!-- Mecánicos -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-user-cog fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Mecánicos</h5>
                    <p class="card-text text-light opacity-75">Gestiona el personal del taller.</p>
                    <a href="{{ route('mecanico.index') }}" class="btn btn-outline-light w-100 fw-bold">Ir a Mecánicos</a>
                </div>
            </div>
        </div>

        <!-- Categorías Repuestos -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-layer-group fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Categorías</h5>
                    <p class="card-text text-light opacity-75">Organiza las categorías de repuestos.</p>
                    <a href="{{ route('categoriaRepuesto.index') }}" class="btn btn-outline-light w-100 fw-bold">Ir a Categorías</a>
                </div>
            </div>
        </div>

        <!-- Motos -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-biking fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Motos</h5>
                    <p class="card-text text-light opacity-75">Control de motos registradas en el taller.</p>
                    <a href="{{ route('moto.index') }}" class="btn btn-outline-light w-100 fw-bold">Ir a Motos</a>
                </div>
            </div>
        </div>

        <!-- Repuestos -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-cogs fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Repuestos</h5>
                    <p class="card-text text-light opacity-75">Administra los repuestos disponibles.</p>
                    <a href="{{ route('repuesto.index') }}" class="btn btn-outline-light w-100 fw-bold">Ir a Repuestos</a>
                </div>
            </div>
        </div>

        <!-- Inventario -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-boxes fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Inventario</h5>
                    <p class="card-text text-light opacity-75">Gestiona el stock de repuestos y productos.</p>
                    <a href="" class="btn btn-outline-light w-100 fw-bold">Ir a Inventario</a>
                </div>
            </div>
        </div>

        <!-- Orden de Trabajo -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-file-alt fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Orden de Trabajo</h5>
                    <p class="card-text text-light opacity-75">Crea y administra las órdenes de trabajo.</p>
                    <a href="" class="btn btn-outline-light w-100 fw-bold">Ir a Órdenes</a>
                </div>
            </div>
        </div>

        <!-- Preorden -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-clipboard-list fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Preorden</h5>
                    <p class="card-text text-light opacity-75">Gestiona las preórdenes de servicio.</p>
                    <a href="" class="btn btn-outline-light w-100 fw-bold">Ir a Preórdenes</a>
                </div>
            </div>
        </div>

        <!-- Diagnóstico -->
        <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card glass-card border-0 rounded-4 h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-circle icon-gradient mb-3 mx-auto">
                        <i class="fas fa-stethoscope fa-lg"></i>
                    </div>
                    <h5 class="card-title fw-bold text-white">Diagnóstico</h5>
                    <p class="card-text text-light opacity-75">Registra diagnósticos de las motos.</p>
                    <a href="" class="btn btn-outline-light w-100 fw-bold">Ir a Diagnósticos</a>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #1c1c1c, #2e2e2e);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #fff;
    }

    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.6);
    }

    .icon-circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: #fff;
    }

    .icon-gradient {
        background: linear-gradient(135deg, #444, #111);
        box-shadow: 0 4px 10px rgba(0,0,0,0.4);
    }

    .btn-outline-light {
        border-width: 2px;
        transition: all 0.3s ease;
    }
    .btn-outline-light:hover {
        background: #fff;
        color: #000;
    }
</style>
@endsection
