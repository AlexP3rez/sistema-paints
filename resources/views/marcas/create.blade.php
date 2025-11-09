@extends('layouts.app')

@section('title', 'Nueva Marca')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Nueva Marca</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('marcas.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Marca <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" required maxlength="50">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pais_origen" class="form-label">País de Origen</label>
                        <input type="text" class="form-control @error('pais_origen') is-invalid @enderror" 
                               id="pais_origen" name="pais_origen" value="{{ old('pais_origen') }}" maxlength="50" placeholder="Ej: Guatemala, Estados Unidos">
                        @error('pais_origen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="3" maxlength="200">{{ old('descripcion') }}</textarea>
                        <small class="text-muted">Máximo 200 caracteres</small>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('marcas.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Marca
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection