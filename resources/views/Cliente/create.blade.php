@extends('layouts.app')

@section('title')
Crear Cliente
@endsection

@section('content_header')

@endsection

@section('content')



<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-person-plus"></i> Crear Cliente</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Nombre --}}
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre">
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Apellido --}}
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido">
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
                    <input type="text" class="form-control @error('numeroDocumento') is-invalid @enderror" id="numeroDocumento" name="numeroDocumento">
                    @error('numeroDocumento')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Teléfono --}}
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono">
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Correo --}}
                <div class="col-md-6">
                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control @error('correoElectronico') is-invalid @enderror" id="correoElectronico" name="correoElectronico">
                    @error('correoElectronico')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Dirección --}}
                <div class="col-12">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion">
                    @error('direccion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar
                </button>
                <a href="{{ route('cliente.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection