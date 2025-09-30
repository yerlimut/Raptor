@extends('layouts.app')

@section('title')
Crear Inventario
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
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
                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>

                {{-- Fecha de Registro --}}
                <div class="col-md-6">
                    <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
                    <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro">
                </div>

                {{-- Estado General --}}
                <div class="col-md-6">
                    <label for="estadoGeneral" class="form-label">Estado General</label>
                    <select class="form-control" id="estadoGeneral" name="estadoGeneral">
                        <option value="">-- Seleccione --</option>
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                    </select>
                </div>

                {{-- Estado Inventario --}}
                <div class="col-md-6">
                    <label for="estadoInventario" class="form-label">Estado Inventario</label>
                    <select class="form-control" id="estadoInventario" name="estadoInventario">
                        <option value="">-- Seleccione --</option>
                        <option value="En taller">En taller</option>
                        <option value="Entregado">Entregado</option>
                        <option value="Pendiente">Pendiente</option>
                    </select>
                </div>

                {{-- Moto --}}
                <div class="col-md-12">
                    <label for="idMoto" class="form-label">Moto</label>
                    <select class="form-control" id="idMoto" name="idMoto">
                        <option value="">-- Seleccione una moto --</option>
                        @foreach($motos as $moto)
                            <option value="{{ $moto->id }}">
                                {{ $moto->placa }} - {{ $moto->marca }}
                            </option>
                        @endforeach
                    </select>
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
