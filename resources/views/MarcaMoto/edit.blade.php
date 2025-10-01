@extends('layouts.app')

@section('title')
Editar Marca de Moto
@endsection

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-50">
    <div class="col-md-6">
        <h1 class="text-center mb-4">
            <i class="bi bi-pencil"></i> Editar Marca de Moto
        </h1>

        <div class="card shadow-sm rounded-4 p-4">
            <form action="{{ route('marcaMoto.update', $marcasMoto->id) }}" method="POST">
                @csrf
                <div class="row g-3">
                    {{-- Nombre Marca --}}
                    <div class="col-12">
                        <label for="nombreMarca" class="form-label">Nombre de la Marca</label>
                        <input type="text" class="form-control" id="nombreMarca" name="nombreMarca"
                            value="{{ $marcasMoto->nombreMarca }}" placeholder="Ej: Yamaha, Honda, Suzuki">
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2 justify-content">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Actualizar
                    </button>
                    <a href="{{ route('marcaMoto.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
