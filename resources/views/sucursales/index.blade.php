@extends('layouts.app')

@section('title', 'Sucursales')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-building"></i> Listado de Sucursales</h4>
                <a href="{{ route('sucursales.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Nueva Sucursal
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Departamento</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sucursales as $sucursal)
                                <tr>
                                    <td>{{ $sucursal->id_sucursal }}</td>
                                    <td>{{ $sucursal->nombre }}</td>
                                    <td>{{ $sucursal->direccion }}</td>
                                    <td>{{ $sucursal->departamento }}</td>
                                    <td>{{ $sucursal->telefono ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $sucursal->estado ? 'success' : 'danger' }}">
                                            {{ $sucursal->estado ? 'Activa' : 'Inactiva' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('sucursales.show', $sucursal->id_sucursal) }}" class="btn btn-info" title="Ver">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('sucursales.edit', $sucursal->id_sucursal) }}" class="btn btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('sucursales.destroy', $sucursal->id_sucursal) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desactivar sucursal?')">
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
                                <tr><td colspan="7" class="text-center">No hay sucursales registradas</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">{{ $sucursales->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection