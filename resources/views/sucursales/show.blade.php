@extends('layouts.app')

@section('title', 'Ver Sucursal')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalle de la Sucursal</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>ID:</strong>
                        <p>{{ $sucursal->id_sucursal }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong>
                        <p>
                            <span class="badge bg-{{ $sucursal->estado ? 'success' : 'danger' }}">
                                {{ $sucursal->estado ? 'Activa' : 'Inactiva' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Nombre:</strong>
                        <p>{{ $sucursal->nombre }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Dirección:</strong>
                        <p>{{ $sucursal->direccion }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Departamento:</strong>
                        <p>{{ $sucursal->departamento }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Teléfono:</strong>
                        <p>{{ $sucursal->telefono ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Latitud:</strong>
                        <p>{{ $sucursal->latitud ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Longitud:</strong>
                        <p>{{ $sucursal->longitud ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('sucursales.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('sucursales.edit', $sucursal->id_sucursal) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection