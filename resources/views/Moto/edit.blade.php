@extends('layouts.app')

@section('title')
Editar Moto
@endsection

@section('content_header')


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
                        class="form-control @error('modelo') is-invalid @enderror"
                        id="modelo"
                        name="modelo"
                        value="{{ $moto->modelo }}">
                    @error('modelo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Año --}}
                <div class="col-md-6">
                    <label for="año" class="form-label">Año</label>
                    <input type="date"
                        class="form-control @error('año') is-invalid @enderror"
                        id="año"
                        name="año"
                        value="{{ $moto->año }}">
                    @error('año')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Placa --}}
                <div class="col-md-6">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text"
                        class="form-control @error('placa') is-invalid @enderror"
                        id="placa"
                        name="placa"
                        value="{{ $moto->placa }}">
                    @error('placa')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Cliente (solo lectura) --}}
                <div class="col-md-6">
                    <label for="idCliente" class="form-label">Cliente</label>
                    <input type="hidden" name="idCliente" value="{{ $moto->idCliente }}">
                    <input type="text" class="form-control"
                        value="{{ $clientes->first()->nombre }}" readonly>
                </div>


                {{-- Marca --}}
                <div class="col-md-6">
                    <label for="idMarca" class="form-label">Marca</label>
                    <select class="form-control @error('idMarca') is-invalid @enderror" id="idMarca" name="idMarca">
                        <option value="">-- Seleccione --</option>
                        @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}"
                            {{ $moto->idMarca == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nombreMarca }}
                        </option>
                        @endforeach
                    </select>
                    @error('idMarca')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success  btn-sm">
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