@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-person-badge"></i> Listado de Usuarios</h4>
                <a href="{{ route('usuarios.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Nuevo Usuario
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Perfil</th>
                                <th>Último Acceso</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id_usuario }}</td>
                                    <td><strong>{{ $usuario->username }}</strong></td>
                                    <td>
                                        <span class="badge bg-{{ $usuario->perfil_usuario == 'Gerente' ? 'danger' : ($usuario->perfil_usuario == 'Digitador' ? 'warning' : 'info') }}">
                                            {{ $usuario->perfil_usuario }}
                                        </span>
                                    </td>
                                    <td>{{ $usuario->ultimo_acceso ? $usuario->ultimo_acceso->format('d/m/Y H:i') : 'Nunca' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $usuario->estado ? 'success' : 'danger' }}">
                                            {{ $usuario->estado ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('usuarios.show', $usuario->id_usuario) }}" class="btn btn-info" title="Ver">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desactivar usuario?')">
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
                                <tr><td colspan="6" class="text-center">No hay usuarios registrados</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">{{ $usuarios->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection