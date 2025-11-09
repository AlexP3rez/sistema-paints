@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-tags"></i> Listado de Categorías</h4>
                <a href="{{ route('categorias.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Nueva Categoría
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
                            @forelse($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->id_categoria }}</td>
                                    <td><strong>{{ $categoria->nombre }}</strong></td>
                                    <td>{{ $categoria->descripcion ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $categoria->estado ? 'success' : 'danger' }}">
                                            {{ $categoria->estado ? 'Activa' : 'Inactiva' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('categorias.show', $categoria->id_categoria) }}" class="btn btn-info" title="Ver">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" class="btn btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desactivar categoría?')">
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
                                <tr><td colspan="5" class="text-center">No hay categorías registradas</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">{{ $categorias->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection