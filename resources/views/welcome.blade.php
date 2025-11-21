@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content_header')
<div class="text-center my-5 fade-in">
    <h1 class="fw-bold display-5 text-primary mb-3">
        Panel de Control <span class="text-dark">RAPTOR</span>
    </h1>
    <p class="text-muted lead">Explora y gestiona cada módulo del sistema</p>
</div>
@endsection


@section('content')
<div class="container py-4">
    <div class="row gy-4 gx-3 justify-content-center">


        {{-- ⭐ CLIENTES ⭐ --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
            <div class="glass-card flex-fill text-center position-relative overflow-hidden p-4">
                <div class="icon-circle bg-primary text-white shadow position-absolute top-0 start-50 translate-middle mt-3">
                    <i class="bi bi-people-fill fs-3"></i>
                </div>

                <div class="pt-5">
                    <h5 class="fw-bold mt-3">Clientes</h5>
                    <p class="text-muted small">Registrados en el sistema</p>
                    <h3 class="fw-bold text-primary">{{ $ContarClientes }}</h3>

                    <a href="{{ route('cliente.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 mt-3">
                        <i class="bi bi-eye"></i> Ver Clientes
                    </a>
                </div>
            </div>
        </div>


        {{-- ⭐ MOTOS ⭐ --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
            <div class="glass-card flex-fill text-center position-relative overflow-hidden p-4">
                <div class="icon-circle bg-success text-white shadow position-absolute top-0 start-50 translate-middle mt-3">
                    <i class="bi bi-bicycle fs-3"></i>
                </div>

                <div class="pt-5">
                    <h5 class="fw-bold mt-3">Motos</h5>
                    <p class="text-muted small">Registradas en el taller</p>
                    <h3 class="fw-bold text-success">{{ $ContarMotos }}</h3>

                    <a href="{{ route('moto.index') }}" class="btn btn-outline-success btn-sm rounded-pill px-3 mt-3">
                        <i class="bi bi-eye"></i> Ver Motos
                    </a>
                </div>
            </div>
        </div>


        {{-- ⭐ REPUESTOS ⭐ --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
            <div class="glass-card flex-fill text-center position-relative overflow-hidden p-4">
                <div class="icon-circle bg-warning text-white shadow position-absolute top-0 start-50 translate-middle mt-3">
                    <i class="bi bi-tools fs-3"></i>
                </div>

                <div class="pt-5">
                    <h5 class="fw-bold mt-3">Repuestos</h5>
                    <p class="text-muted small">Componentes disponibles</p>
                    <h3 class="fw-bold text-warning">{{ $ContarRepuestos }}</h3>

                    <a href="{{ route('repuesto.index') }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 mt-3">
                        <i class="bi bi-eye"></i> Ver Repuestos
                    </a>
                </div>
            </div>
        </div>


        {{-- ⭐ OT PENDIENTES ⭐ --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
            <div class="glass-card flex-fill text-center position-relative overflow-hidden p-4">
                <div class="icon-circle bg-danger text-white shadow position-absolute top-0 start-50 translate-middle mt-3">
                    <i class="bi bi-hourglass-split fs-3"></i>
                </div>

                <div class="pt-5">
                    <h5 class="fw-bold mt-3">OT Pendientes</h5>
                    <p class="text-muted small">Órdenes sin iniciar</p>
                    <h3 class="fw-bold text-danger">{{ $countPendiente }}</h3>

                    <a href="{{ route('OrdenTrabajo.index', ['estado' => 'pendiente']) }}"
                        class="btn btn-outline-danger btn-sm rounded-pill px-3 mt-3">
                        <i class="bi bi-eye"></i> Ver Órdenes
                    </a>

                </div>
            </div>
        </div>


        {{-- ⭐ OT EN PROCESO ⭐ --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex  mt-4">
            <div class="glass-card flex-fill text-center position-relative overflow-hidden p-4">
                <div class="icon-circle bg-info text-white shadow position-absolute top-0 start-50 translate-middle mt-3">
                    <i class="bi bi-gear-wide-connected fs-3"></i>
                </div>

                <div class="pt-5">
                    <h5 class="fw-bold mt-3">OT En Proceso</h5>
                    <p class="text-muted small">Actualmente en reparación</p>
                    <h3 class="fw-bold text-info">{{ $countEnProceso }}</h3>

                    <a href="{{ route('OrdenTrabajo.index', ['estado' => 'en proceso']) }}"
                        class="btn btn-outline-info btn-sm rounded-pill px-3 mt-3">
                        <i class="bi bi-eye"></i> Ver Órdenes
                    </a>

                </div>
            </div>
        </div>


        {{-- ⭐ OT FINALIZADAS ⭐ --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex  mt-4">
            <div class="glass-card flex-fill text-center position-relative overflow-hidden p-4">
                <div class="icon-circle bg-success text-white shadow position-absolute top-0 start-50 translate-middle mt-3">
                    <i class="bi bi-check-circle-fill fs-3"></i>
                </div>

                <div class="pt-5">
                    <h5 class="fw-bold mt-3">OT Finalizadas</h5>
                    <p class="text-muted small">Mantenimientos completados</p>
                    <h3 class="fw-bold text-success">{{ $countFinalizado }}</h3>

                    <a href="{{ route('OrdenTrabajo.index', ['estado' => 'finalizado']) }}"
                        class="btn btn-outline-success btn-sm rounded-pill px-3 mt-3">
                        <i class="bi bi-eye"></i> Ver Órdenes
                    </a>

                </div>
            </div>
        </div>


        {{-- ⭐ OT CANCELADAS ⭐ --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex  mt-4">
            <div class="glass-card flex-fill text-center position-relative overflow-hidden p-4">
                <div class="icon-circle bg-secondary text-white shadow position-absolute top-0 start-50 translate-middle mt-3">
                    <i class="bi bi-x-circle-fill fs-3"></i>
                </div>

                <div class="pt-5">
                    <h5 class="fw-bold mt-3">OT Canceladas</h5>
                    <p class="text-muted small">Órdenes anuladas</p>
                    <h3 class="fw-bold text-secondary">{{ $countCancelado }}</h3>

                    <a href="{{ route('OrdenTrabajo.index', ['estado' => 'cancelado']) }}"
                        class="btn btn-outline-secondary btn-sm rounded-pill px-3 mt-3">
                        <i class="bi bi-eye"></i> Ver Órdenes
                    </a>

                </div>
            </div>
        </div>


    </div>
</div>


{{-- 💎 ESTILOS GLASSMORPHISM --}}
<style>
    body {
        background: linear-gradient(135deg, #f2f6ff 0%, #e8f0ff 100%);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        border-radius: 1.5rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        min-height: 250px;
    }

    .glass-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection