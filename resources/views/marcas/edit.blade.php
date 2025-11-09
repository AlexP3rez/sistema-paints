@extends('layouts.app')

@section('title', 'Editar Marca')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="bi bi-pencil"></i> Editar Marca</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('marcas.update', $marca->id_marca) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Marca <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $marca->nombre) }}" required maxlength="50">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pais_origen" class="form-label">País de Origen</label>
                        <input type="text" class="form-control @error('pais_origen') is-invalid @enderror" 
                               id="pais_origen" name="pais_origen" value="{{ old('pais_origen', $marca->pais_origen) }}" maxlength="50">
                        @error('pais_origen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="3" maxlength="200">{{ old('descripcion', $marca->descripcion) }}</textarea>
                        <small class="text-muted">Máximo 200 caracteres</small>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('marcas.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar Marca
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection