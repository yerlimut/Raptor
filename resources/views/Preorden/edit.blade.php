@extends('layouts.app')

@section('title')
Editar Preorden
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-pencil-square"></i> Editar Preorden</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('Preorden.update', $preorden->id) }}" method="POST">
            @csrf
            <div class="row g-3">
                {{-- Orden --}}
                <div class="col-md-6">
                    <label for="idOrden" class="form-label">Orden de Trabajo</label>
                    <select class="form-control" id="idOrden" name="idOrden">
                        <option value="">-- Seleccione --</option>
                        @foreach($ordenes as $orden)
                            <option value="{{ $orden->id }}" {{ $preorden->idOrden == $orden->id ? 'selected' : '' }}>
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
                            <option value="{{ $mecanico->id }}" {{ $preorden->idMecanico == $mecanico->id ? 'selected' : '' }}>
                                {{ $mecanico->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Repuestos --}}
                <div class="col-md-6">
                    <label for="idRepuesto" class="form-label">Repuesto(s)</label>
                    <select class="form-control" id="idRepuesto" name="repuestos[]" multiple>
                        @foreach($repuestos as $repuesto)
                            <option 
                                value="{{ $repuesto->id }}" 
                                data-precio="{{ $repuesto->precio }}"
                                {{ $preorden->repuestos->contains($repuesto->id) ? 'selected' : '' }}>
                                {{ $repuesto->nombre }} - ${{ number_format($repuesto->precio, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Selecciona uno o varios repuestos (Ctrl o Shift para varios)</small>
                </div>

                {{-- Descripción --}}
                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $preorden->descripcion }}</textarea>
                </div>

                {{-- Saldo --}}
                <div class="col-12 mt-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="saldo" name="saldo" 
                            value="{{ old('saldo', $preorden->saldo) }}" readonly>
                    </div>
                </div>

                {{-- Botones --}}
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Actualizar
                    </button>
                    <a href="{{ route('Preorden.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Inicializar Select2
    $('#idRepuesto').select2({
        placeholder: "Selecciona uno o varios repuestos",
        allowClear: true,
        width: '100%'
    });

    // 🧮 Calcular total automáticamente al cambiar selección
    $('#idRepuesto').on('change', function() {
        let total = 0;
        $(this).find('option:selected').each(function() {
            total += parseFloat($(this).data('precio')) || 0;
        });
        $('#saldo').val(total); // mostrar total en campo saldo
    });

    // ✅ Calcular total al cargar página (por si ya hay seleccionados)
    $('#idRepuesto').trigger('change');
});
</script>

<style>
    /* Estilos de Select2 */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #000 !important;
        background-color: #f1f1f1 !important;
        border: 1px solid #aaa !important;
        border-radius: 6px !important;
        font-weight: 500;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #000 !important;
        font-weight: bold;
        margin-right: 4px;
    }
</style>
@endsection
