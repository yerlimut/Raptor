@extends('layouts.app')

@section('title')
Crear Orden de Trabajo
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-file-earmark-plus"></i> Crear Orden de Trabajo</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('OrdenTrabajo.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Fecha Inicio --}}
                <div class="col-md-6">
                    <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                </div>

                {{-- Fecha Fin --}}
                <div class="col-md-6">
                    <label for="fechaFin" class="form-label">Fecha de Fin</label>
                    <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                </div>

                {{-- Estado --}}
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="pendiente">Pendiente</option>
                        <option value="en proceso">En Proceso</option>
                        <option value="finalizado">Finalizado</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>

                {{-- Diagnóstico --}}
                <div class="col-md-6">
                    <label for="idDiagnostico" class="form-label">Diagnóstico</label>
                    <select class="form-control" id="idDiagnostico" name="idDiagnostico" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($diagnosticos as $diagnostico)
                            <option value="{{ $diagnostico->id }}">
                                {{ $diagnostico->descripcion ?? 'Diagnóstico #'.$diagnostico->id }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar
                </button>
                <a href="{{ route('OrdenTrabajo.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
