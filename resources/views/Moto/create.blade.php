@extends('layouts.app')

@section('title', 'Registrar Moto')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4">Registrar Nueva Moto</h2>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('moto.store') }}" method="POST">
                @csrf

                {{-- Modelo --}}
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" name="modelo" id="modelo" class="form-control"
                        value="{{ old('modelo') }}" required>
                    @error('modelo')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Año --}}
                <div class="mb-3">
                    <label for="año" class="form-label">Año</label>
                    <input type="date" name="año" id="año" class="form-control"
                        value="{{ old('año') }}" required>
                    @error('año')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Placa --}}
                <div class="mb-3">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" name="placa" id="placa" class="form-control"
                        value="{{ old('placa') }}" required>
                    @error('placa')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Cliente --}}
                <div class="mb-3">
                    <label for="idCliente" class="form-label">Cliente</label>
                    <select name="idCliente" id="idCliente" class="form-select" required>
                        <option value="">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ old('idCliente') == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                        @endforeach
                    </select>
                    @error('idCliente')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Marca --}}
                <div class="mb-3">
                    <label for="idMarca" class="form-label">Marca</label>
                    <select name="idMarca" id="idMarca" class="form-select" required>
                        <option value="">Seleccione una marca</option>
                        @foreach($marcasMotos as $marca)
                        <option value="{{ $marca->id }}"
                            {{ old('idMarca') == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nombre }}
                        </option>
                        @endforeach
                    </select>
                    @error('idMarca')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Botones --}}
                <div class="text-end">
                    <a href="{{ route('moto.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection