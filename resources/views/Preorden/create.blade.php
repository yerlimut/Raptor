@extends('layouts.app')

@section('title', 'Crear Preorden')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Preorden</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('Preorden.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="idOrden" class="form-label">Orden de Trabajo</label>
                    <select class="form-control" id="idOrden" name="idOrden">
                        <option value="">-- Seleccione --</option>
                        @foreach($ordenes as $orden)
                        <option value="{{ $orden->id }}">Orden #{{ $orden->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="idMecanico" class="form-label">Mecánico</label>
                    <select class="form-control" id="idMecanico" name="idMecanico">
                        <option value="">-- Seleccione --</option>
                        @foreach($mecanicos as $mecanico)
                        <option value="{{ $mecanico->id }}">{{ $mecanico->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- MULTIPLE SELECCIÓN DE REPUESTOS --}}
                <div class="col-md-12">
                    <label for="idRepuesto" class="form-label">Repuestos</label>
                    <select class="form-control" id="idRepuesto" name="idRepuesto[]" multiple>
                        @foreach($repuestos as $repuesto)
                        <option value="{{ $repuesto->id }}">{{ $repuesto->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
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
{{-- Dependencias de Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#idRepuesto').select2({
            placeholder: "-- Seleccione uno o varios repuestos --",
            allowClear: true,
            width: '100%'
        });
    });
</script>

<style>
/* 🔧 Forzar texto negro dentro de las etiquetas seleccionadas */
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    color: #000 !important;              /* texto negro */
    background-color: #f1f1f1 !important; /* fondo gris claro */
    border: 1px solid #aaa !important;
    border-radius: 6px !important;
    font-weight: 500;
}

/* Cambiar color del botón de eliminar (la X) */
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #000 !important;
    font-weight: bold;
    margin-right: 4px;
}
</style>

@endsection