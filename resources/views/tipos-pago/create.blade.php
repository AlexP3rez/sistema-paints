@extends('layouts.app')

@section('title', 'Nuevo Tipo de Pago')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Nuevo Tipo de Pago</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tipos-pago.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" required maxlength="20" 
                               placeholder="Ej: Efectivo, Tarjeta, Cheque">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Máximo 20 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
                               id="descripcion" name="descripcion" value="{{ old('descripcion') }}" maxlength="100"
                               placeholder="Breve descripción del método de pago">
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Máximo 100 caracteres</small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tipos-pago.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Tipo de Pago
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection