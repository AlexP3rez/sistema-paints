@extends('layouts.app')

@section('title', 'Ver Tipo de Pago')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalle del Tipo de Pago</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>ID:</strong>
                        <p>{{ $tipoPago->id_tipo_pago }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong>
                        <p>
                            <span class="badge bg-{{ $tipoPago->estado ? 'success' : 'danger' }}">
                                {{ $tipoPago->estado ? 'Activo' : 'Inactivo' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Nombre:</strong>
                        <p class="fs-5"><strong>{{ $tipoPago->nombre }}</strong></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Descripción:</strong>
                        <p>{{ $tipoPago->descripcion ?? 'Sin descripción' }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tipos-pago.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('tipos-pago.edit', $tipoPago->id_tipo_pago) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection