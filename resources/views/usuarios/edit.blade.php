@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="bi bi-pencil"></i> Editar Usuario</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de Usuario <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                               id="username" name="username" value="{{ old('username', $usuario->username) }}" required maxlength="50">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" minlength="6">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Dejar en blanco para mantener la contraseña actual. Mínimo 6 caracteres.</small>
                    </div>

                    <div class="mb-3">
                        <label for="perfil_usuario" class="form-label">Perfil de Usuario <span class="text-danger">*</span></label>
                        <select class="form-select @error('perfil_usuario') is-invalid @enderror" 
                                id="perfil_usuario" name="perfil_usuario" required>
                            <option value="">Seleccione un perfil...</option>
                            <option value="Digitador" {{ old('perfil_usuario', $usuario->perfil_usuario) == 'Digitador' ? 'selected' : '' }}>Digitador</option>
                            <option value="Cajero" {{ old('perfil_usuario', $usuario->perfil_usuario) == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                            <option value="Gerente" {{ old('perfil_usuario', $usuario->perfil_usuario) == 'Gerente' ? 'selected' : '' }}>Gerente</option>
                        </select>
                        @error('perfil_usuario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection