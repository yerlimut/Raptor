@extends('layouts.app')

@section('title')
Editar Diagnóstico
@endsection

@section('content_header')

@endsection

@section('content')

<div class="container mt-5">
    <h1 class="text-center text-dark"><i class="bi bi-pencil-square"></i> Editar Diagnóstico</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('diagnostico.update', $diagnosticos->id) }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Descripción --}}
                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text"
                        class="form-control @error('descripcion') is-invalid @enderror"
                        id="descripcion"
                        name="descripcion"
                        value="{{ $diagnosticos->descripcion }}">
                    @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fecha Diagnóstico --}}
                <div class="col-md-6">
                    <label for="fechaDiagnostico" class="form-label">Fecha del Diagnóstico</label>
                    <input type="date"
                        class="form-control @error('fechaDiagnostico') is-invalid @enderror"
                        id="fechaDiagnostico"
                        name="fechaDiagnostico"
                        value="{{ $diagnosticos->fechaDiagnostico }}">
                    @error('fechaDiagnostico')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tipo --}}
                <div class="col-md-6">
                    <label for="tipo" class="form-label">Tipo de Diagnóstico</label>
                    <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                        <option value="">Seleccione...</option>
                        <option value="preventivo" {{ $diagnosticos->tipo == 'preventivo' ? 'selected' : '' }}>Preventivo</option>
                        <option value="correctivo" {{ $diagnosticos->tipo == 'correctivo' ? 'selected' : '' }}>Correctivo</option>
                        <option value="inspeccion" {{ $diagnosticos->tipo == 'inspeccion' ? 'selected' : '' }}>Inspección</option>
                    </select>
                    @error('tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Estado --}}
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado">
                        <option value="">Seleccione...</option>
                        <option value="pendiente" {{ $diagnosticos->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en proceso" {{ $diagnosticos->estado == 'en proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="completado" {{ $diagnosticos->estado == 'completado' ? 'selected' : '' }}>Completado</option>
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
                        <option value="{{ $moto->id }}"
                            {{ $diagnosticos->idMoto == $moto->id ? 'selected' : '' }}>
                            {{ $moto->modelo }} - {{ $moto->placa }}
                        </option>
                        @endforeach
                    </select>
                    @error('idMoto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('diagnostico.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection