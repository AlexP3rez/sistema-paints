@extends('layouts.app')

@section('title', 'Nuevo Usuario')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Nuevo Usuario</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de Usuario <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                               id="username" name="username" value="{{ old('username') }}" required maxlength="50"
                               placeholder="usuario123">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required minlength="6">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Mínimo 6 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="perfil_usuario" class="form-label">Perfil de Usuario <span class="text-danger">*</span></label>
                        <select class="form-select @error('perfil_usuario') is-invalid @enderror" 
                                id="perfil_usuario" name="perfil_usuario" required>
                            <option value="">Seleccione un perfil...</option>
                            <option value="Digitador" {{ old('perfil_usuario') == 'Digitador' ? 'selected' : '' }}>Digitador</option>
                            <option value="Cajero" {{ old('perfil_usuario') == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                            <option value="Gerente" {{ old('perfil_usuario') == 'Gerente' ? 'selected' : '' }}>Gerente</option>
                        </select>
                        @error('perfil_usuario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted d-block mt-1">
                            <strong>Digitador:</strong> Alimentar el sistema<br>
                            <strong>Cajero:</strong> Autorizar ventas<br>
                            <strong>Gerente:</strong> Acceso completo y reportes
                        </small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection