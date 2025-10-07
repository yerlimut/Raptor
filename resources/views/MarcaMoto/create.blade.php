@extends('layouts.app')

@section('title')
Crear Marca de Moto
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<img src="{{ asset('imagenes/RAPTOR.png') }}"
    alt="RAPTOR"
    class="position-fixed rounded-4"
    style="top: 40px; right: 10px; max-height: 130px; z-index: 1000; background-color: transparent;">


<div class="container d-flex align-items-center justify-content-center min-vh-50">
    <div class="col-md-6">
        <h1 class="text-center mb-4">
            <i class="bi bi-plus-circle"></i> Crear Marca de Moto
        </h1>

        <div class="card shadow-sm rounded-4 p-4">
            <form action="{{ route('marcaMoto.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    {{-- Nombre Marca --}}
                    <div class="col-12">
                        <label for="nombreMarca" class="form-label">Nombre de la Marca</label>
                        <input type="text"
                            class="form-control @error('nombreMarca') is-invalid @enderror"
                            id="nombreMarca"
                            name="nombreMarca"
                            placeholder="Ej: Yamaha, Honda, Suzuki">
                        @error('nombreMarca')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2 justify-content">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Guardar
                    </button>
                    <a href="{{ route('marcaMoto.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection