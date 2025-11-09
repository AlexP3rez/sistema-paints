@extends('layouts.app')

@section('title', 'Ver Categoría')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalle de la Categoría</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>ID:</strong>
                        <p>{{ $categoria->id_categoria }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong>
                        <p>
                            <span class="badge bg-{{ $categoria->estado ? 'success' : 'danger' }}">
                                {{ $categoria->estado ? 'Activa' : 'Inactiva' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Nombre:</strong>
                        <p class="fs-5"><strong>{{ $categoria->nombre }}</strong></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Descripción:</strong>
                        <p>{{ $categoria->descripcion ?? 'Sin descripción' }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection