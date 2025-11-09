@extends('layouts.app')

@section('title', 'Ver Cliente')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalle del Cliente</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>ID:</strong>
                        <p>{{ $cliente->id_cliente }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong>
                        <p>
                            @if($cliente->estado)
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-danger">Inactivo</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nombres:</strong>
                        <p>{{ $cliente->nombres }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Apellidos:</strong>
                        <p>{{ $cliente->apellidos }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>NIT:</strong>
                        <p>{{ $cliente->nit ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>DPI:</strong>
                        <p>{{ $cliente->dpi ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Teléfono:</strong>
                        <p>{{ $cliente->telefono ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong>
                        <p>{{ $cliente->email ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Dirección:</strong>
                        <p>{{ $cliente->direccion ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Acepta Promociones:</strong>
                        <p>{{ $cliente->acepta_promociones ? 'Sí' : 'No' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Fecha de Registro:</strong>
                        <p>{{ $cliente->fecha_registro->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection