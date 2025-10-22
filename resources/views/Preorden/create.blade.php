@extends('layouts.app')

@section('title')
Crear Preorden
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection
@section('content')
<img src="{{ asset('imagenes/RAPTOR.png') }}"
    alt="RAPTOR"
    class="position-fixed rounded-4"
    style="top: 40px; right: 10px; max-height: 130px; z-index: 1000; background-color: transparent;">


<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-plus-circle"></i> Crear Preorden</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('Preorden.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Orden --}}
                <div class="col-md-6">
                    <label for="idOrden" class="form-label">Orden de Trabajo</label>
                    <select class="form-control" id="idOrden" name="idOrden">
                        <option value="">-- Seleccione --</option>
                        @foreach($ordenes as $orden)
                        <option value="{{ $orden->id }}">Orden #{{ $orden->id }}</option>
                        @endforeach
                    </select>
                    @error('idOrden')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Mecánico --}}
                <div class="col-md-6">
                    <label for="idMecanico" class="form-label">Mecánico</label>
                    <select class="form-control" id="idMecanico" name="idMecanico">
                        <option value="">-- Seleccione --</option>
                        @foreach($mecanicos as $mecanico)
                        <option value="{{ $mecanico->id }}">{{ $mecanico->nombre }}</option>
                        @endforeach
                    </select>
                    @error('idMecanico')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Repuesto --}}
                <div class="col-md-6">
                    <label for="idRepuesto" class="form-label">Repuesto</label>
                    <select class="form-control" id="idRepuesto" name="idRepuesto[]" multiple>
                        @foreach($repuestos as $repuesto)
                        <option value="{{ $repuesto->id }}">{{ $repuesto->nombre }}</option>
                        @endforeach
                    </select>
                    @error('idRepuesto')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                {{-- Descripción --}}
                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    @error('descripcion')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar
                </button>
                <a href="{{ route('Preorden.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#idRepuesto').select2({
            placeholder: "-- Seleccione repuestos --"
        });
    });
</script>
@endsection
