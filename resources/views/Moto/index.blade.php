@extends('layouts.app')

@section('title', 'Listado de Motos')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Listado de Motos</h2>
        <a href="{{ route('moto.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Moto
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Placa</th>
                    <th>Cliente</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($motos as $moto)
                <tr>
                    <td>{{ $moto->id }}</td>
                    <td>{{ $moto->modelo }}</td>
                    <td>{{ $moto->año }}</td>
                    <td>{{ $moto->placa }}</td>
                    <td>{{ $moto->cliente->nombre ?? '---' }}</td>
                    <td>{{ $moto->marca->nombre ?? '---' }}</td>
                    <td>
                        <a href="{{ route('motos.edit', $moto) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('motos.destroy', $moto) }}" method="POST" class="d-inline">
                            @csrf

                            <button onclick="return confirm('¿Seguro de eliminar esta moto?')" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay motos registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection