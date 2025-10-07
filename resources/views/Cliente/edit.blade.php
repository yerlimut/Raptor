@extends('layouts.app')

@section('title')
Editar Cliente
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
    <h1 class="text-center"><i class="bi bi-pencil-square"></i> Editar Cliente</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Nombre --}}
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        name="nombre"
                        value="{{ $cliente->nombre }}">
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Apellido --}}
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text"
                        class="form-control @error('apellido') is-invalid @enderror"
                        id="apellido"
                        name="apellido"
                        value="{{ $cliente->apellido }}">
                    @error('apellido')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tipo Documento --}}
                <div class="col-md-6">
                    <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                    <select class="form-control @error('tipoDocumento') is-invalid @enderror"
                        id="tipoDocumento" name="tipoDocumento">
                        <option value="">-- Seleccione --</option>
                        <option value="CC" {{ $cliente->tipoDocumento == 'CC' ? 'selected' : '' }}>Cédula</option>
                        <option value="TI" {{ $cliente->tipoDocumento == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                        <option value="CE" {{ $cliente->tipoDocumento == 'CE' ? 'selected' : '' }}>Cédula Extranjera</option>
                        <option value="NIT" {{ $cliente->tipoDocumento == 'NIT' ? 'selected' : '' }}>NIT</option>
                    </select>
                    @error('tipoDocumento')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Número Documento --}}
                <div class="col-md-6">
                    <label for="numeroDocumento" class="form-label">Número de Documento</label>
                    <input type="text"
                        class="form-control @error('numeroDocumento') is-invalid @enderror"
                        id="numeroDocumento"
                        name="numeroDocumento"
                        value="{{ $cliente->numeroDocumento }}">
                    @error('numeroDocumento')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Teléfono --}}
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text"
                        class="form-control @error('telefono') is-invalid @enderror"
                        id="telefono"
                        name="telefono"
                        value="{{ $cliente->telefono }}">
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Correo --}}
                <div class="col-md-6">
                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                    <input type="email"
                        class="form-control @error('correoElectronico') is-invalid @enderror"
                        id="correoElectronico"
                        name="correoElectronico"
                        value="{{ $cliente->correoElectronico }}">
                    @error('correoElectronico')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Dirección --}}
                <div class="col-12">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text"
                        class="form-control @error('direccion') is-invalid @enderror"
                        id="direccion"
                        name="direccion"
                        value="{{ $cliente->direccion }}">
                    @error('direccion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('cliente.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection