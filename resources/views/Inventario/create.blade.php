@extends('layouts.app')

@section('title')
Crear Inventario
@endsection

@section('content_header')

@endsection

@section('content')

<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-box-seam"></i> Crear Inventario</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('inventario.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Descripción --}}
                <div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text"
                        class="form-control @error('descripcion') is-invalid @enderror"
                        id="descripcion"
                        name="descripcion">
                    @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fecha de Registro --}}
                <div class="col-md-6">
                    <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
                    <input type="datetime-local"
                        class="form-control @error('fechaRegistro') is-invalid @enderror"
                        id="fechaRegistro"
                        name="fechaRegistro">

                    @error('fechaRegistro')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Estado General --}}
                <div class="col-md-6">
                    <label for="estadoGeneral" class="form-label">Estado General</label>
                    <select class="form-control @error('estadoGeneral') is-invalid @enderror"
                        id="estadoGeneral"
                        name="estadoGeneral">
                        <option value="">-- Seleccione --</option>
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                    </select>
                    @error('estadoGeneral')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Estado Inventario --}}
                <div class="col-md-6">
                    <label for="estadoInventario" class="form-label">Estado Inventario</label>
                    <select class="form-control @error('estadoInventario') is-invalid @enderror"
                        id="estadoInventario"
                        name="estadoInventario">
                        <option value="">-- Seleccione --</option>
                        <option value="En taller">En taller</option>
                        <option value="Entregado">Entregado</option>
                        <option value="Pendiente">Pendiente</option>
                    </select>
                    @error('estadoInventario')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="idMoto" class="form-label">Moto</label>
                    <select class="form-control @error('idMoto') is-invalid @enderror"
                        id="idMoto"
                        name="idMoto">
                        <option value="">-- Seleccione una moto --</option>
                        @foreach($motos as $moto)
                        <option value="{{ $moto->id }}">
                            {{ $moto->placa }} - {{ $moto->marca->nombreMarca ?? 'Sin marca' }}
                        </option>
                        @endforeach
                    </select>
                    @error('idMoto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar
                </button>
                <a href="{{ route('inventario.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection