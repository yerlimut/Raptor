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
                    <select class="form-control @error('idOrden') is-invalid @enderror" id="idOrden" name="idOrden">
                        <option value="">-- Seleccione --</option>
                        @foreach($ordenes as $orden)
                        <option value="{{ $orden->id }}">{{ "Orden #{$orden->id} - Placa: {$orden->moto->placa} - Marca: {$orden->moto->marca->nombreMarca}" }}

                        </option>
                        @endforeach
                    </select>
                    @error('idOrden')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="idMecanico" class="form-label">Mecánico</label>
                    <select class="form-control @error('idMecanico') is-invalid @enderror" id="idMecanico" name="idMecanico">
                        <option value="">-- Seleccione --</option>
                        @foreach($mecanicos as $mecanico)
                        <option value="{{ $mecanico->id }}">{{ $mecanico->nombre }}</option>
                        @endforeach
                    </select>
                    @error('idMecanico')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- MULTIPLE SELECCIÓN DE REPUESTOS --}}
                <div class="col-md-12">
                    <label for="idRepuesto" class="form-label">Repuestos</label>
                    <select class="form-control @error('idRepuesto') is-invalid @enderror @error('idRepuesto.*') is-invalid @enderror"
                        id="idRepuesto" name="idRepuesto[]" multiple>
                        @foreach($repuestos as $repuesto)
                        <option value="{{ $repuesto->id }}">{{ $repuesto->nombre }} — ${{ number_format($repuesto->precio, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                    @error('idRepuesto')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @error('idRepuesto.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Selección de Moto -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="idMoto">Moto</label>
                        <select class="form-control @error('idMoto') is-invalid @enderror" id="idMoto" name="idMoto">
                            <option value="">Todas</option>
                            @foreach($motos as $moto)
                            <option value="{{ $moto->id }}" {{ request('idMoto') == $moto->id ? 'selected' : '' }}>
                                {{ $moto->placa }} — {{ $moto->modelo }}  —  {{ $moto->marca->nombreMarca}}
                            </option>
                            @endforeach
                        </select>
                        @error('idMoto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror"
                        id="descripcion" name="descripcion" rows="3"></textarea>
                    @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mt-3">
                <label for="mano_obra" class="form-label">Precio Mano de Obra</label>
                <input type="number" class="form-control @error('mano_obra') is-invalid @enderror"
                    id="mano_obra" name="mano_obra" placeholder="Ingrese el valor de la mano de obra" value="0">
                @error('mano_obra')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mt-3">
                <label for="saldo" class="form-label">Total (Repuestos + Mano de Obra)</label>
                <input type="number" class="form-control @error('saldo') is-invalid @enderror"
                    id="saldo" name="saldo" readonly>
                @error('saldo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {

        $('#idRepuesto').select2({
            placeholder: "Seleccione uno o varios repuestos",
            allowClear: true,
            width: '100%'
        });

        // ← CORREGIDO ✔
        const preciosRepuestos = {!! json_encode($repuestos->pluck('precio', 'id')) !!};


        function actualizarSaldo() {
            let total = 0;

            // Sumar precios de repuestos seleccionados
            const seleccionados = $('#idRepuesto').val() || [];
            seleccionados.forEach(id => {
                total += preciosRepuestos[id] || 0;
            });

            // Sumar mano de obra (si lo ingresas manual)
            const manoObra = parseFloat($('#mano_obra').val());
            if (!isNaN(manoObra)) {
                total += manoObra;
            }

            $('#saldo').val(total.toFixed(2));
        }

        $('#idRepuesto').on('change', actualizarSaldo);
        $('#mano_obra').on('input', actualizarSaldo);
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
