@extends('layouts.app')

@section('title')
Editar Diagnóstico
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark"><i class="bi bi-pencil-square"></i> Editar Diagnóstico</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('diagnostico.update', $diagnostico->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                {{-- Descripción --}}
                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" 
                           class="form-control" 
                           id="descripcion" 
                           name="descripcion" 
                           value="{{ $diagnostico->descripcion }}">
                </div>

                {{-- Fecha Diagnóstico --}}
                <div class="col-md-6">
                    <label for="fechaDiagnostico" class="form-label">Fecha del Diagnóstico</label>
                    <input type="date" 
                           class="form-control" 
                           id="fechaDiagnostico" 
                           name="fechaDiagnostico" 
                           value="{{ $diagnostico->fechaDiagnostico }}">
                </div>

                {{-- Estado --}}
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" id="estado" name="estado">
                        <option value="">Seleccione...</option>
                        <option value="pendiente" {{ $diagnostico->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en proceso" {{ $diagnostico->estado == 'en proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="completado" {{ $diagnostico->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                    </select>
                </div>

                {{-- Tipo --}}
                <div class="col-md-6">
                    <label for="tipo" class="form-label">Tipo de Diagnóstico</label>
                    <select class="form-select" id="tipo" name="tipo">
                        <option value="">Seleccione...</option>
                        <option value="preventivo" {{ $diagnostico->tipo == 'preventivo' ? 'selected' : '' }}>Preventivo</option>
                        <option value="correctivo" {{ $diagnostico->tipo == 'correctivo' ? 'selected' : '' }}>Correctivo</option>
                        <option value="inspeccion" {{ $diagnostico->tipo == 'inspeccion' ? 'selected' : '' }}>Inspección</option>
                    </select>
                </div>

                {{-- Moto --}}
                <div class="col-md-6">
                    <label for="idMoto" class="form-label">Moto</label>
                    <select class="form-select" id="idMoto" name="idMoto">
                        <option value="">Seleccione una moto...</option>
                        @foreach($motos as $moto)
                            <option value="{{ $moto->id }}" 
                                {{ $diagnostico->idMoto == $moto->id ? 'selected' : '' }}>
                                {{ $moto->modelo }} - {{ $moto->placa }}
                            </option>
                        @endforeach
                    </select>
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
