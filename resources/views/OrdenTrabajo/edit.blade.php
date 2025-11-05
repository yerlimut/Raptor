@extends('layouts.app')

@section('title')
Editar Orden de Trabajo
@endsection

@section('content_header')

@endsection

@section('content')


<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-pencil-square"></i> Editar Orden de Trabajo</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('OrdenTrabajo.update', $ordenes->id) }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Fecha Inicio --}}
                <div class="col-md-6">
                    <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                    <input type="date"
                        class="form-control"
                        id="fechaInicio"
                        name="fechaInicio"
                        value="{{ $ordenes->fechaInicio }}">
                    @error('fechaInicio')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fecha Fin --}}
                <div class="col-md-6">
                    <label for="fechaFin" class="form-label">Fecha de Fin</label>
                    <input type="date"
                        class="form-control"
                        id="fechaFin"
                        name="fechaFin"
                        value="{{ $ordenes->fechaFin }}">
                    @error('fechaFin')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Estado --}}
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" id="estado" name="estado">
                        <option value="pendiente" {{ $ordenes->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en proceso" {{ $ordenes->estado == 'en proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="finalizado" {{ $ordenes->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                        <option value="cancelado" {{ $ordenes->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                    @error('estado')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Diagnóstico --}}
                <div class="col-md-6">
                    <label for="idDiagnostico" class="form-label">Diagnóstico</label>
                    <select class="form-control" id="idDiagnostico" name="idDiagnostico">
                        <option value="">-- Seleccione --</option>
                        @foreach($diagnosticos as $diagnostico)
                        <option value="{{ $diagnostico->id }}"
                            {{ $ordenes->idDiagnostico == $diagnostico->id ? 'selected' : '' }}>
                            {{ $diagnostico->descripcion ?? 'Diagnóstico #'.$diagnostico->id }}
                        </option>
                        @endforeach
                    </select>
                    @error('idDiagnostico')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Moto --}}
                <div class="col-md-6">
                    <label for="idMoto" class="form-label">Moto</label>
                    <select class="form-control" id="idMoto" name="idMoto" required>
                        <option value="">-- Seleccione una moto --</option>
                        @foreach($motos as $moto)
                        <option value="{{ $moto->id }}"
                            {{ $ordenes->idMoto == $moto->id ? 'selected' : '' }}>
                            {{ $moto->placa }} - {{ $moto->modelo }} ({{ $moto->marca->nombreMarca ?? 'Sin marca' }})
                        </option>
                        @endforeach
                    </select>
                    @error('idMoto')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('OrdenTrabajo.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection