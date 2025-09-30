@extends('layouts.app')

@section('title')
Editar Moto
@endsection

@section('content_header')

<h1 class="fw-bold display-6 mb-0">RAPTOR </h1>
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark"><i class="bi bi-pencil-square"></i> Editar Moto</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('moto.update', $moto->id) }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Modelo --}}
                <div class="col-md-6">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text"
                        class="form-control"
                        id="modelo"
                        name="modelo"
                        value="{{ $moto->modelo }}">
                </div>

                {{-- Año --}}
                <div class="col-md-6">
                    <label for="año" class="form-label">Año</label>
                    <input type="date"
                        class="form-control"
                        id="año"
                        name="año"
                        value="{{ $moto->año }}">
                </div>

                {{-- Placa --}}
                <div class="col-md-6">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text"
                        class="form-control"
                        id="placa"
                        name="placa"
                        value="{{ $moto->placa }}">
                </div>

                {{-- Cliente --}}
                <div class="col-md-6">
                    <label for="idCliente" class="form-label">Cliente</label>
                    <select class="form-control" id="idCliente" name="idCliente">
                        <option value="">-- Seleccione --</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ $moto->idCliente == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Marca --}}
                <div class="col-md-6">
                    <label for="idMarca" class="form-label">Marca</label>
                    <select class="form-control" id="idMarca" name="idMarca">
                        <option value="">-- Seleccione --</option>
                        @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}"
                            {{ $moto->idMarca == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Actualizar
                </button>
                <a href="{{ route('moto.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection