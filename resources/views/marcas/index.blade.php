@extends('layouts.app')

@section('title', 'Marcas')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-tag"></i> Listado de Marcas</h4>
                <a href="{{ route('marcas.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Nueva Marca
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>País de Origen</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($marcas as $marca)
                                <tr>
                                    <td>{{ $marca->id_marca }}</td>
                                    <td><strong>{{ $marca->nombre }}</strong></td>
                                    <td>{{ $marca->pais_origen ?? 'N/A' }}</td>
                                    <td>{{ Str::limit($marca->descripcion ?? 'N/A', 50) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $marca->estado ? 'success' : 'danger' }}">
                                            {{ $marca->estado ? 'Activa' : 'Inactiva' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('marcas.show', $marca->id_marca) }}" class="btn btn-info" title="Ver">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('marcas.edit', $marca->id_marca) }}" class="btn btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('marcas.destroy', $marca->id_marca) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desactivar marca?')">
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
                                <tr><td colspan="6" class="text-center">No hay marcas registradas</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">{{ $marcas->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection