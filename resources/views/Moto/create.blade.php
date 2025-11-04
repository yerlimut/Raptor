@extends('layouts.app')

@section('title')
Registrar Moto
@endsection

@section('content_header')

@endsection

@section('content')



<div class="container mt-5">
    <h1 class="text-center text-dark">
        <i class="bi bi-bicycle"></i> Registrar Nueva Moto
    </h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('moto.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Modelo --}}
                <div class="col-md-6">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" name="modelo" id="modelo"
                        class="form-control @error('modelo') is-invalid @enderror">
                    @error('modelo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Año --}}
                <div class="col-md-6">
                    <label for="año" class="form-label">Año</label>
                    <input type="date" name="año" id="año"
                        class="form-control @error('año') is-invalid @enderror">
                    @error('año')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Placa --}}
                <div class="col-md-6">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" name="placa" id="placa"
                        class="form-control @error('placa') is-invalid @enderror">
                    @error('placa')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="idCliente" class="form-label">Cliente</label>
                    @if(isset($idCliente) && $idCliente)
                    {{-- Cliente preseleccionado (solo lectura) --}}
                    <input type="hidden" name="idCliente" value="{{ $clientes->first()->id }}">
                    <input type="text" class="form-control" value="{{ $clientes->first()->nombre }}" readonly>
                    @else
                    {{-- Mostrar lista completa si no hay cliente fijo --}}
                    <select name="idCliente" id="idCliente" class="form-control @error('idCliente') is-invalid @enderror">
                        <option value="">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                    @endif
                    @error('idCliente')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                {{-- Marca --}}
                <div class="col-md-6">
                    <label for="idMarca" class="form-label">Marca</label>
                    <select name="idMarca" id="idMarca"
                        class="form-control @error('idMarca') is-invalid @enderror">
                        <option value="">Seleccione una marca</option>
                        @foreach($marcasMotos as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombreMarca }}</option>
                        @endforeach
                    </select>
                    @error('idMarca')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Botones --}}
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Guardar
                </button>
                <a href="{{ route('moto.index', ['idCliente' => $idCliente ?? null]) }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection