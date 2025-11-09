@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-truck"></i> Listado de Proveedores</h4>
                <a href="{{ route('proveedores.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Nuevo Proveedor
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Contacto</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($proveedores as $proveedor)
                                <tr>
                                    <td>{{ $proveedor->id_proveedor }}</td>
                                    <td>{{ $proveedor->nombre }}</td>
                                    <td>{{ $proveedor->contacto ?? 'N/A' }}</td>
                                    <td>{{ $proveedor->telefono ?? 'N/A' }}</td>
                                    <td>{{ $proveedor->email ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $proveedor->estado ? 'success' : 'danger' }}">
                                            {{ $proveedor->estado ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('proveedores.show', $proveedor->id_proveedor) }}" class="btn btn-info" title="Ver">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('proveedores.edit', $proveedor->id_proveedor) }}" class="btn btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('proveedores.destroy', $proveedor->id_proveedor) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desactivar proveedor?')">
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
                                <tr><td colspan="7" class="text-center">No hay proveedores registrados</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">{{ $proveedores->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection