@extends('layouts.app')

@section('content_header')

@endsection

@section('title', 'Editar Preorden')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Preorden</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('Preorden.update', $preorden->id) }}" method="POST">
            @csrf

            <div class="row g-3">

                {{-- ORDEN --}}
                <div class="col-md-6">
                    <label for="idOrden" class="form-label">Orden de Trabajo</label>
                    <select class="form-control @error('idOrden') is-invalid @enderror" id="idOrden" name="idOrden">
                        <option value="">-- Seleccione --</option>
                        @foreach($ordenes as $orden)
                        <option value="{{ $orden->id }}" 
                            {{ $preorden->idOrden == $orden->id ? 'selected' : '' }}>
                            {{ "Orden #{$orden->id} - Placa: {$orden->moto->placa} - Marca: {$orden->moto->marca->nombreMarca}" }}
                        </option>
                        @endforeach
                    </select>
                    @error('idOrden')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- MECÁNICO --}}
                <div class="col-md-6">
                    <label for="idMecanico" class="form-label">Mecánico</label>
                    <select class="form-control @error('idMecanico') is-invalid @enderror" id="idMecanico" name="idMecanico">
                        <option value="">-- Seleccione --</option>
                        @foreach($mecanicos as $mecanico)
                        <option value="{{ $mecanico->id }}" 
                            {{ $preorden->idMecanico == $mecanico->id ? 'selected' : '' }}>
                            {{ $mecanico->nombre }}
                        </option>
                        @endforeach
                    </select>
                    @error('idMecanico')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- REPUESTOS --}}
                <div class="col-md-12">
                    <label for="idRepuesto" class="form-label">Repuestos</label>
                    <select class="form-control @error('idRepuesto') is-invalid @enderror" 
                        id="idRepuesto" name="idRepuesto[]" multiple>
                        @foreach($repuestos as $repuesto)
                        <option value="{{ $repuesto->id }}"
                            data-precio="{{ $repuesto->precio }}"
                            {{ $preorden->repuestos->contains($repuesto->id) ? 'selected' : '' }}>
                            {{ $repuesto->nombre }} — ${{ number_format($repuesto->precio, 0, ',', '.') }}
                        </option>
                        @endforeach
                    </select>
                    @error('idRepuesto')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @error('idRepuesto.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- MOTO --}}
                <div class="col-md-3">
                    <label for="idMoto">Moto</label>
                    <select class="form-control @error('idMoto') is-invalid @enderror" id="idMoto" name="idMoto">
                        <option value="">Todas</option>
                        @foreach($motos as $moto)
                        <option value="{{ $moto->id }}" 
                            {{ $preorden->idMoto == $moto->id ? 'selected' : '' }}>
                            {{ $moto->placa }} — {{ $moto->modelo }}
                        </option>
                        @endforeach
                    </select>
                    @error('idMoto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESCRIPCIÓN --}}
                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror"
                        id="descripcion" name="descripcion" rows="3">{{ $preorden->descripcion }}</textarea>
                    @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- MANO DE OBRA --}}
                <div class="col-md-6 mt-3">
                    <label for="mano_obra" class="form-label">Precio Mano de Obra</label>
                    <input type="number" class="form-control @error('mano_obra') is-invalid @enderror"
                        id="mano_obra" name="mano_obra"
                        value="{{ old('mano_obra', $preorden->mano_obra) }}">
                    @error('mano_obra')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TOTAL --}}
                <div class="col-md-6 mt-3">
                    <label for="saldo" class="form-label">Total (Repuestos + Mano de Obra)</label>
                    <input type="number" class="form-control @error('saldo') is-invalid @enderror"
                        id="saldo" name="saldo"
                        value="{{ old('saldo', $preorden->saldo) }}" readonly>
                    @error('saldo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            {{-- BOTONES --}}
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {

    $('#idRepuesto').select2({
        placeholder: "Seleccione uno o varios repuestos",
        allowClear: true,
        width: '100%'
    });

    // Precios desde las opciones
    const preciosRepuestos = {};
    $('#idRepuesto option').each(function() {
        preciosRepuestos[$(this).val()] = parseFloat($(this).data('precio')) || 0;
    });

    function actualizarSaldo() {
        let total = 0;

        // Sumar precios de repuestos seleccionados
        $('#idRepuesto option:selected').each(function() {
            total += parseFloat($(this).data('precio')) || 0;
        });

        // Mano de obra
        const manoObra = parseFloat($('#mano_obra').val()) || 0;
        total += manoObra;

        $('#saldo').val(total.toFixed(2));
    }

    // Eventos
    $('#idRepuesto').on('change', actualizarSaldo);
    $('#mano_obra').on('input', actualizarSaldo);

    // ⭐ MUY IMPORTANTE: calcular al cargar ⭐
    actualizarSaldo();
});
</script>

<style>
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
