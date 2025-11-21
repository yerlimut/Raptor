@extends('layouts.app')

@section('title')
Crear Mecánico
@endsection
@section('content_header')

@endsection

@section('content')



<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-person-plus"></i> Crear Mecánico</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('mecanico.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Nombre --}}
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }} oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')">
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Apellido --}}
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }} oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')">
                    @error('apellido')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tipo Documento --}}
                <div class="col-md-6">
                    <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                    <select class="form-control @error('tipoDocumento') is-invalid @enderror" id="tipoDocumento" name="tipoDocumento">
                        <option value="">-- Seleccione --</option>
                        <option value="CC">Cédula</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cédula Extranjera</option>
                        <option value="NIT">NIT</option>
                    </select>
                    @error('tipoDocumento')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Número Documento --}}
                <div class="col-md-6">
                    <label for="numeroDocumento" class="form-label">Número de Documento</label>
                    <input type="text" class="form-control @error('numeroDocumento') is-invalid @enderror" id="numeroDocumento" name="numeroDocumento" value="{{ old('numeroDocumento') }}">
                    @error('numeroDocumento')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Teléfono --}}
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}">
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Correo --}}
                <div class="col-md-6">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Dirección --}}
                <div class="col-12">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion') }}">
                    @error('direccion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Especialidad --}}
                <div class="col-12">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <select class="form-control @error('especialidad') is-invalid @enderror" id="especialidad" name="especialidad">
                        <option value="">-- Seleccione una especialidad --</option>
                        <option value="mecanica_general">Mecánica General</option>
                        <option value="electricidad">Electricidad Automotriz</option>
                        <option value="inyeccion">Sistemas de Inyección</option>
                        <option value="motos_altas">Motos de Alta Cilindrada</option>
                        <option value="motos_bajas">Motos de Baja Cilindrada</option>
                        <option value="frenos">Frenos</option>
                        <option value="suspension">Suspensión</option>
                        <option value="transmision">Transmisión</option>
                        <option value="carburacion">Carburación</option>
                        <option value="diagnostico">Diagnóstico Computarizado</option>
                    </select>
                    @error('especialidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Guardar
                    </button>
                    <a href="{{ route('mecanico.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </a>
                </div>
        </form>
    </div>
</div>
@endsection