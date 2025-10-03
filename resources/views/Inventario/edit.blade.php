@extends('layouts.app')

@section('title')
Editar Inventario
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-pencil-square"></i> Editar Inventario</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('inventario.update', $inventarios->id) }}" method="POST">
            @csrf
            <div class="row g-3">
                {{-- Descripción --}}
                <div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text"
                        class="form-control @error('descripcion') is-invalid @enderror"
                        id="descripcion"
                        name="descripcion"
                        value="{{ $inventarios->descripcion }}">
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fecha de Registro --}}
                <div class="col-md-6">
                    <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
                    <input type="date"
                        class="form-control @error('fechaRegistro') is-invalid @enderror"
                        id="fechaRegistro"
                        name="fechaRegistro"
                        value="{{ $inventarios->fechaRegistro }}">
                    @error('fechaRegistro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Estado General --}}
                <div class="col-md-6">
                    <label for="estadoGeneral" class="form-label">Estado General</label>
                    <select class="form-control @error('estadoGeneral') is-invalid @enderror" id="estadoGeneral" name="estadoGeneral">
                        <option value="">-- Seleccione --</option>
                        <option value="Bueno" {{ $inventarios->estadoGeneral == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                        <option value="Regular" {{ $inventarios->estadoGeneral == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="Malo" {{ $inventarios->estadoGeneral == 'Malo' ? 'selected' : '' }}>Malo</option>
                    </select>
                    @error('estadoGeneral')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Estado Inventario --}}
                <div class="col-md-6">
                    <label for="estadoInventario" class="form-label">Estado Inventario</label>
                    <select class="form-control @error('estadoInventario') is-invalid @enderror" id="estadoInventario" name="estadoInventario">
                        <option value="">-- Seleccione --</option>
                        <option value="En taller" {{ $inventarios->estadoInventario == 'En taller' ? 'selected' : '' }}>En taller</option>
                        <option value="Entregado" {{ $inventarios->estadoInventario == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                        <option value="Pendiente" {{ $inventarios->estadoInventario == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    </select>
                    @error('estadoInventario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Moto --}}
                <div class="col-md-12">
                    <label for="idMoto" class="form-label">Moto</label>
                    <select class="form-control @error('idMoto') is-invalid @enderror" id="idMoto" name="idMoto">
                        <option value="">-- Seleccione una moto --</option>
                        @foreach($motos as $moto)
                        <option value="{{ $moto->id }}" {{ $inventarios->idMoto == $moto->id ? 'selected' : '' }}>
                            {{ $moto->placa }} - {{ $moto->marca }}
                        </option>
                        @endforeach
                    </select>
                    @error('idMoto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('inventario.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
