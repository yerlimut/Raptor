@extends('layouts.app')

@section('title')
Crear Diagnóstico
@endsection

@section('content_header')
<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-50">
    <div class="col-md-8">
        <h1 class="text-center mb-4">
            <i class="bi bi-plus-circle"></i> Crear Diagnóstico
        </h1>

        <div class="card shadow-sm rounded-4 p-4">
            <form action="{{ route('diagnostico.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    {{-- Descripción --}}
                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text"
                               class="form-control @error('descripcion') is-invalid @enderror"
                               id="descripcion"
                               name="descripcion"
                               placeholder="Ingrese la descripción del diagnóstico">
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Fecha Diagnóstico --}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="fechaDiagnostico" class="form-label">Fecha del Diagnóstico</label>
                        <input type="date"
                               class="form-control @error('fechaDiagnostico') is-invalid @enderror"
                               id="fechaDiagnostico"
                               name="fechaDiagnostico">
                        @error('fechaDiagnostico')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tipo de Diagnóstico --}}
                    <div class="col-md-6">
                        <label for="tipo" class="form-label">Tipo de Diagnóstico</label>
                        <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                            <option value="">Seleccione...</option>
                            <option value="preventivo">Preventivo</option>
                            <option value="correctivo">Correctivo</option>
                            <option value="inspeccion">Inspección</option>
                        </select>
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Estado --}}
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado">
                            <option value="">Seleccione...</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="proceso">En Proceso</option>
                            <option value="finalizado">Finalizado</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Moto --}}
                    <div class="col-md-6">
                        <label for="idMoto" class="form-label">Moto</label>
                        <select class="form-control @error('idMoto') is-invalid @enderror" id="idMoto" name="idMoto">
                            <option value="">Seleccione una moto...</option>
                            @foreach($motos as $moto)
                                <option value="{{ $moto->id }}">
                                    {{ $moto->marca->nombreMarca }}
                                </option>
                            @endforeach
                        </select>
                        @error('idMoto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
        </div>

        <div class="mt-4 d-flex gap-2 justify-content">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Guardar
            </button>
            <a href="{{ route('diagnostico.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Cancelar
            </a>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
