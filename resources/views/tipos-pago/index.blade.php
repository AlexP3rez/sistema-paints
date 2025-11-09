@extends('layouts.app')

@section('title', 'Tipos de Pago')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-cash-coin"></i> Listado de Tipos de Pago</h4>
                <a href="{{ route('tipos-pago.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Nuevo Tipo de Pago
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tiposPago as $tipoPago)
                                <tr>
                                    <td>{{ $tipoPago->id_tipo_pago }}</td>
                                    <td><strong>{{ $tipoPago->nombre }}</strong></td>
                                    <td>{{ $tipoPago->descripcion ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $tipoPago->estado ? 'success' : 'danger' }}">
                                            {{ $tipoPago->estado ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('tipos-pago.show', $tipoPago->id_tipo_pago) }}" class="btn btn-info" title="Ver">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('tipos-pago.edit', $tipoPago->id_tipo_pago) }}" class="btn btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('tipos-pago.destroy', $tipoPago->id_tipo_pago) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desactivar tipo de pago?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Eliminar">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center">No hay tipos de pago registrados</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">{{ $tiposPago->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection