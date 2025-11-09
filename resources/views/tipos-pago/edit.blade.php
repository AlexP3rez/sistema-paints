@extends('layouts.app')

@section('title', 'Editar Tipo de Pago')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="bi bi-pencil"></i> Editar Tipo de Pago</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tipos-pago.update', $tipoPago->id_tipo_pago) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $tipoPago->nombre) }}" required maxlength="20">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Máximo 20 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
                               id="descripcion" name="descripcion" value="{{ old('descripcion', $tipoPago->descripcion) }}" maxlength="100">
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Máximo 100 caracteres</small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tipos-pago.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar Tipo de Pago
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection