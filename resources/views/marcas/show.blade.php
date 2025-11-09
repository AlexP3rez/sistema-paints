@extends('layouts.app')

@section('title', 'Ver Marca')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalle de la Marca</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>ID:</strong>
                        <p>{{ $marca->id_marca }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong>
                        <p>
                            <span class="badge bg-{{ $marca->estado ? 'success' : 'danger' }}">
                                {{ $marca->estado ? 'Activa' : 'Inactiva' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Nombre:</strong>
                        <p class="fs-5"><strong>{{ $marca->nombre }}</strong></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>País de Origen:</strong>
                        <p>{{ $marca->pais_origen ?? 'No especificado' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Descripción:</strong>
                        <p>{{ $marca->descripcion ?? 'Sin descripción' }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('marcas.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('marcas.edit', $marca->id_marca) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection