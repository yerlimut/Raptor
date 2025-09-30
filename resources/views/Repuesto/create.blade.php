@extends('layouts.app')

@section('title', 'Crear Repuesto')

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-plus-circle"></i> Crear Repuesto</h1>

    {{-- Alerta de éxito --}}
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                confirmButtonText: 'Aceptar',
                timer: 3000
            });
        });
    </script>
    @endif

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('repuesto.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Repuesto</label>
                <select class="form-control" id="nombre" name="nombre" >
                    <option value="">-- Seleccione un repuesto --</option>

                    <!-- Motor -->
                    <option value="Bujía">Motor : Bujía</option>
                    <option value="Aceite motor">Motor : Aceite motor</option>
                    <option value="Correa de distribución">Motor : Correa de distribución</option>

                    <!-- Transmisión -->
                    <option value="Embrague">Transmisión : Embrague</option>
                    <option value="Caja de cambios">Transmisión : Caja de cambios</option>
                    <option value="Palanca de cambios">Transmisión : Palanca de cambios</option>

                    <!-- Frenos -->
                    <option value="Pastillas de freno">Frenos : Pastillas de freno</option>
                    <option value="Disco de freno">Frenos : Disco de freno</option>
                    <option value="Bombín de freno">Frenos : Bombín de freno</option>

                    <!-- Suspensión -->
                    <option value="Amortiguador">Suspensión : Amortiguador</option>
                    <option value="Muelles">Suspensión : Muelles</option>
                    <option value="Barras estabilizadoras">Suspensión : Barras estabilizadoras</option>

                    <!-- Eléctrico -->
                    <option value="Batería">Eléctrico : Batería</option>
                    <option value="Alternador">Eléctrico : Alternador</option>
                    <option value="Sensor de luz">Eléctrico : Sensor de luz</option>

                    <!-- Carrocería -->
                    <option value="Puerta">Carrocería : Puerta</option>
                    <option value="Capó">Carrocería : Capó</option>
                    <option value="Parachoques">Carrocería : Parachoques</option>

                    <!-- Escape -->
                    <option value="Silenciador">Escape : Silenciador</option>
                    <option value="Tubo de escape">Escape : Tubo de escape</option>
                    <option value="Catalizador">Escape : Catalizador</option>

                    <!-- Ruedas y Neumáticos -->
                    <option value="Neumático">Ruedas y Neumáticos : Neumático</option>
                    <option value="Llanta">Ruedas y Neumáticos : Llanta</option>
                    <option value="Balín de rueda">Ruedas y Neumáticos : Balín de rueda</option>

                    <!-- Lubricantes -->
                    <option value="Aceite de transmisión">Lubricantes : Aceite de transmisión</option>
                    <option value="Grasa">Lubricantes : Grasa</option>
                    <option value="Aditivos">Lubricantes : Aditivos</option>

                    <!-- Filtros -->
                    <option value="Filtro de aceite">Filtros : Filtro de aceite</option>
                    <option value="Filtro de aire">Filtros : Filtro de aire</option>
                    <option value="Filtro de combustible">Filtros : Filtro de combustible</option>

                    <!-- Accesorios -->
                    <option value="Espejo">Accesorios : Espejo</option>
                    <option value="Faro">Accesorios : Faro</option>
                    <option value="Tapetes">Accesorios : Tapetes</option>
                </select>


                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese la marca" >
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio" >
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Cantidad disponible" >
                </div>

                <div class="mb-3">
                    <label for="idCategoria" class="form-label">Categoría</label>
                    <select class="form-control" id="idCategoria" name="idCategoria" >
                        <option value="">-- Seleccione una categoría --</option>
                        @foreach($categoriasRepuesto as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombreCategoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Guardar
                    </button>
                    <a href="{{ route('repuesto.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </a>
                </div>
        </form>
    </div>
</div>
@endsection