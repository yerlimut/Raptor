@extends('layouts.app')

@section('title')
Crear Orden de Trabajo
@endsection

@section('content_header')

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
                    <input 
                        type="date" 
                        class="form-control @error('fechaInicio') is-invalid @enderror" 
                        id="fechaInicio" 
                        name="fechaInicio" >
                    @error('fechaInicio')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fecha Fin --}}
                <div class="col-md-6">
                    <label for="fechaFin" class="form-label">Fecha de Fin</label>
                    <input 
                        type="date" 
                        class="form-control @error('fechaFin') is-invalid @enderror" 
                        id="fechaFin" 
                        name="fechaFin">
                    @error('fechaFin')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Estado --}}
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select 
                        class="form-control @error('estado') is-invalid @enderror" 
                        id="estado" 
                        name="estado" >
                        <option value="">Seleccione una opcion</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="en proceso">En Proceso</option>
                        <option value="finalizado">Finalizado</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Diagnóstico --}}
                <div class="col-md-6">
                    <label for="idDiagnostico" class="form-label">Diagnóstico</label>
                    <select 
                        class="form-control @error('idDiagnostico') is-invalid @enderror" 
                        id="idDiagnostico" 
                        name="idDiagnostico" >
                        <option value="">-- Seleccione --</option>
                        @foreach($diagnosticos as $diagnostico)
                            <option value="{{ $diagnostico->id }}">
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
                    <select 
                        class="form-control @error('idMoto') is-invalid @enderror" 
                        id="idMoto" 
                        name="idMoto">
                        <option value="">-- Seleccione una moto --</option>
                        @foreach($motos as $moto)
                            <option value="{{ $moto->id }}">
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
