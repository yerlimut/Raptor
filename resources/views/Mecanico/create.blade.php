@extends('layouts.app')

@section('title')
Crear Mecánico
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center"><i class="bi bi-person-plus"></i> Crear Mecánico</h1>

    <div class="card shadow-sm rounded-4 p-4">
        <form action="{{ route('mecanico.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Nombre --}}
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>

                {{-- Apellido --}}
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido">
                </div>

                {{-- Tipo Documento --}}
                <div class="col-md-6">
                    <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                    <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                        <option value="">-- Seleccione --</option>
                        <option value="CC">Cédula</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cédula Extranjera</option>
                        <option value="NIT">NIT</option>
                    </select>
                </div>

                {{-- Número Documento --}}
                <div class="col-md-6">
                    <label for="numeroDocumento" class="form-label">Número de Documento</label>
                    <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento">
                </div>

                {{-- Teléfono --}}
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                </div>

                {{-- Correo --}}
                <div class="col-md-6">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                {{-- Dirección --}}
                <div class="col-12">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="" class="form-control" id="direccion" name="direccion">
                </div>

                {{-- Especialidad --}}
                <div class="col-12">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <input type="text" class="form-control" id="especialidad" name="especialidad">
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar
                </button>
                <a href="{{ route('mecanico.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
