@extends('layouts.app')

@section('title', 'Ver Usuario')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalle del Usuario</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>ID:</strong>
                        <p>{{ $usuario->id_usuario }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong>
                        <p>
                            <span class="badge bg-{{ $usuario->estado ? 'success' : 'danger' }}">
                                {{ $usuario->estado ? 'Activo' : 'Inactivo' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Nombre de Usuario:</strong>
                        <p class="fs-5"><strong>{{ $usuario->username }}</strong></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Perfil de Usuario:</strong>
                        <p>
                            <span class="badge bg-{{ $usuario->perfil_usuario == 'Gerente' ? 'danger' : ($usuario->perfil_usuario == 'Digitador' ? 'warning' : 'info') }} fs-6">
                                {{ $usuario->perfil_usuario }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Fecha de Creación:</strong>
                        <p>{{ $usuario->fecha_creacion ? $usuario->fecha_creacion->format('d/m/Y H:i') : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Último Acceso:</strong>
                        <p>{{ $usuario->ultimo_acceso ? $usuario->ultimo_acceso->format('d/m/Y H:i') : 'Nunca' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Intentos de Login:</strong>
                        <p>{{ $usuario->intentos_login }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection