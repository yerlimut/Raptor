@extends('layouts.app')

@section('title')
Editar Preorden
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection
@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-pencil-square"></i> Editar Preorden</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('Preorden.update', $preordenes->id) }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Orden --}}
                <div class="col-md-6">
                    <label for="idOrden" class="form-label">Orden de Trabajo</label>
                    <select class="form-control" id="idOrden" name="idOrden">
                        <option value="">-- Seleccione --</option>
                        @foreach($ordenes as $orden)
                            <option value="{{ $orden->id }}" {{ $preordenes->idOrden == $orden->id ? 'selected' : '' }}>
                                Orden #{{ $orden->id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Mecánico --}}
                <div class="col-md-6">
                    <label for="idMecanico" class="form-label">Mecánico</label>
                    <select class="form-control" id="idMecanico" name="idMecanico">
                        <option value="">-- Seleccione --</option>
                        @foreach($mecanicos as $mecanico)
                            <option value="{{ $mecanico->id }}" {{ $preordenes->idMecanico == $mecanico->id ? 'selected' : '' }}>
                                {{ $mecanico->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Repuesto --}}
                <div class="col-md-6">
                    <label for="idRepuesto" class="form-label">Repuesto</label>
                    <select class="form-control" id="idRepuesto" name="idRepuesto">
                        <option value="">-- Seleccione --</option>
                        @foreach($repuestos as $repuesto)
                            <option value="{{ $repuesto->id }}" {{ $preordenes->idRepuesto == $repuesto->id ? 'selected' : '' }}>
                                {{ $repuesto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Descripción --}}
                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $preordenes->descripcion }}</textarea>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('Preorden.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
