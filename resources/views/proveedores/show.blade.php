@extends('layouts.app')

@section('title', 'Ver Proveedor')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalle del Proveedor</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>ID:</strong>
                        <p>{{ $proveedore->id_proveedor }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong>
                        <p>
                            <span class="badge bg-{{ $proveedore->estado ? 'success' : 'danger' }}">
                                {{ $proveedore->estado ? 'Activo' : 'Inactivo' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Nombre de la Empresa:</strong>
                        <p>{{ $proveedore->nombre }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Persona de Contacto:</strong>
                        <p>{{ $proveedore->contacto ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Teléfono:</strong>
                        <p>{{ $proveedore->telefono ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong>
                        <p>{{ $proveedore->email ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Dirección:</strong>
                        <p>{{ $proveedore->direccion ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('proveedores.edit', $proveedore->id_proveedor) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection