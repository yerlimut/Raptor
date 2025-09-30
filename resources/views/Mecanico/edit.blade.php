@extends('layouts.app')

@section('title')
Editar Mecánico
@endsection
@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-pencil-square"></i> Editar Mecánico</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('mecanico.update', $mecanico->id) }}" method="POST">
            @csrf
            <div class="row g-3">
                {{-- Nombre --}}
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        name="nombre"
                        value="{{ $mecanico->nombre }}">
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
                        value="{{ $mecanico->apellido }}">
                    @error('apellido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tipo Documento --}}
                <div class="col-md-6">
                    <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                    <select class="form-control @error('tipoDocumento') is-invalid @enderror" id="tipoDocumento" name="tipoDocumento">
                        <option value="">-- Seleccione --</option>
                        <option value="CC" {{ $mecanico->tipoDocumento == 'CC' ? 'selected' : '' }}>Cédula</option>
                        <option value="TI" {{ $mecanico->tipoDocumento == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                        <option value="CE" {{ $mecanico->tipoDocumento == 'CE' ? 'selected' : '' }}>Cédula Extranjera</option>
                        <option value="NIT" {{ $mecanico->tipoDocumento == 'NIT' ? 'selected' : '' }}>NIT</option>
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
                        value="{{ $mecanico->numeroDocumento }}">
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
                        value="{{ $mecanico->telefono }}">
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Correo --}}
                <div class="col-md-6">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ $mecanico->email }}">
                    @error('email')
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
                        value="{{ $mecanico->direccion }}">
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Especialidad --}}
                <div class="col-12">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <select class="form-control @error('especialidad') is-invalid @enderror" id="especialidad" name="especialidad">
                        <option value="">-- Seleccione una especialidad --</option>
                        <option value="mecanica_general" {{ $mecanico->especialidad == 'mecanica_general' ? 'selected' : '' }}>Mecánica General</option>
                        <option value="electricidad" {{ $mecanico->especialidad == 'electricidad' ? 'selected' : '' }}>Electricidad Automotriz</option>
                        <option value="inyeccion" {{ $mecanico->especialidad == 'inyeccion' ? 'selected' : '' }}>Sistemas de Inyección</option>
                        <option value="motos_altas" {{ $mecanico->especialidad == 'motos_altas' ? 'selected' : '' }}>Motos de Alta Cilindrada</option>
                        <option value="motos_bajas" {{ $mecanico->especialidad == 'motos_bajas' ? 'selected' : '' }}>Motos de Baja Cilindrada</option>
                        <option value="frenos" {{ $mecanico->especialidad == 'frenos' ? 'selected' : '' }}>Frenos</option>
                        <option value="suspension" {{ $mecanico->especialidad == 'suspension' ? 'selected' : '' }}>Suspensión</option>
                        <option value="transmision" {{ $mecanico->especialidad == 'transmision' ? 'selected' : '' }}>Transmisión</option>
                        <option value="carburacion" {{ $mecanico->especialidad == 'carburacion' ? 'selected' : '' }}>Carburación</option>
                        <option value="diagnostico" {{ $mecanico->especialidad == 'diagnostico' ? 'selected' : '' }}>Diagnóstico Computarizado</option>
                    </select>
                    @error('especialidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Actualizar
                    </button>
                    <a href="{{ route('mecanico.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </a>
                </div>
        </form>
    </div>
</div>
@endsection
