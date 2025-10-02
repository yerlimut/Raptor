@extends('layouts.app')

@section('title')
Editar Orden de Trabajo
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-pencil-square"></i> Editar Orden de Trabajo</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('ordenTrabajo.update', $ordenTrabajo->id) }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Fecha Inicio --}}
                <div class="col-md-6">
                    <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" 
                           class="form-control" 
                           id="fechaInicio" 
                           name="fechaInicio" 
                           value="{{ $ordenTrabajo->fechaInicio }}">
                </div>

                {{-- Fecha Fin --}}
                <div class="col-md-6">
                    <label for="fechaFin" class="form-label">Fecha de Fin</label>
                    <input type="date" 
                           class="form-control" 
                           id="fechaFin" 
                           name="fechaFin" 
                           value="{{ $ordenTrabajo->fechaFin }}">
                </div>

                {{-- Estado --}}
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" id="estado" name="estado">
                        <option value="pendiente" {{ $ordenTrabajo->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en proceso" {{ $ordenTrabajo->estado == 'en proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="finalizado" {{ $ordenTrabajo->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                        <option value="cancelado" {{ $ordenTrabajo->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                </div>

                {{-- Diagnóstico --}}
                <div class="col-md-6">
                    <label for="idDiagnostico" class="form-label">Diagnóstico</label>
                    <select class="form-select" id="idDiagnostico" name="idDiagnostico">
                        <option value="">-- Seleccione --</option>
                        @foreach($diagnosticos as $diagnostico)
                            <option value="{{ $diagnostico->id }}" 
                                {{ $ordenTrabajo->idDiagnostico == $diagnostico->id ? 'selected' : '' }}>
                                {{ $diagnostico->descripcion ?? 'Diagnóstico #'.$diagnostico->id }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('ordenTrabajo.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
