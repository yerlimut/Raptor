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

        {{-- ARRAY DE CARDS --}}
        @php
            $cards = [
                [
                    'titulo' => 'Clientes',
                    'icono' => 'bi-people-fill',
                    'color' => 'primary',
                    'count' => $ContarClientes,
                    'ruta' => route('cliente.index'),
                    'texto' => 'Registrados en el sistema'
                ],
                [
                    'titulo' => 'Motos',
                    'icono' => 'bi-bicycle',
                    'color' => 'success',
                    'count' => $ContarMotos,
                    'ruta' => route('moto.index'),
                    'texto' => 'Registradas en el taller'
                ],
                [
                    'titulo' => 'Repuestos',
                    'icono' => 'bi-tools',
                    'color' => 'warning',
                    'count' => $ContarRepuestos,
                    'ruta' => route('repuesto.index'),
                    'texto' => 'Componentes disponibles'
                ],
            ];
        @endphp

        {{-- RECORRER Y MOSTRAR LAS CARDS --}}
        @foreach ($cards as $card)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
            <div class="glass-card flex-fill text-center position-relative overflow-hidden p-4">
                {{-- Ícono circular flotante --}}
                <div class="icon-circle bg-{{ $card['color'] }} text-white shadow position-absolute top-0 start-50 translate-middle mt-3">
                    <i class="bi {{ $card['icono'] }} fs-3"></i>
                </div>

                {{-- Contenido --}}
                <div class="pt-5">
                    <h5 class="fw-bold mt-3">{{ $card['titulo'] }}</h5>
                    <p class="text-muted small mb-2">{{ $card['texto'] }}</p>

                    @if($card['count'])
                        <h3 class="fw-bold text-{{ $card['color'] }}">{{ $card['count'] }}</h3>
                    @endif

                    <a href="{{ $card['ruta'] }}" class="btn btn-outline-{{ $card['color'] }} btn-sm rounded-pill px-3 mt-3">
                        <i class="bi bi-eye"></i> Ver {{ $card['titulo'] }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach

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

    /* Animación suave */
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* 🧩 Mejoras responsivas */
    @media (max-width: 767px) {
        .glass-card {
            padding: 1.5rem;
            min-height: 220px;
        }
        .icon-circle {
            width: 50px;
            height: 50px;
        }
        .glass-card h5 {
            font-size: 1rem;
        }
        .glass-card h3 {
            font-size: 1.4rem;
        }
        .glass-card p {
            font-size: 0.85rem;
        }
    }

    @media (min-width: 992px) {
        .glass-card {
            min-height: 270px;
        }
    }
</style>
@endsection
