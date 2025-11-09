@extends('layouts.app')

@section('title', 'Nueva Sucursal')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Nueva Sucursal</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('sucursales.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Sucursal <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                               id="direccion" name="direccion" value="{{ old('direccion') }}" required>
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departamento" class="form-label">Departamento <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('departamento') is-invalid @enderror" 
                                   id="departamento" name="departamento" value="{{ old('departamento') }}" required>
                            @error('departamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                                   id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="1234-5678">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="latitud" class="form-label">Latitud</label>
                            <input type="number" step="0.00000001" class="form-control @error('latitud') is-invalid @enderror" 
                                   id="latitud" name="latitud" value="{{ old('latitud') }}" placeholder="14.12345678">
                            @error('latitud')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="longitud" class="form-label">Longitud</label>
                            <input type="number" step="0.00000001" class="form-control @error('longitud') is-invalid @enderror" 
                                   id="longitud" name="longitud" value="{{ old('longitud') }}" placeholder="-90.12345678">
                            @error('longitud')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('sucursales.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Sucursal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection