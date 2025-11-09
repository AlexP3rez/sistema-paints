@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="bi bi-pencil"></i> Editar Producto</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="codigo" class="form-label">Código <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('codigo') is-invalid @enderror" 
                                   id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo) }}" required>
                            @error('codigo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="2">{{ old('descripcion', $producto->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_categoria" class="form-label">Categoría <span class="text-danger">*</span></label>
                            <select class="form-select @error('id_categoria') is-invalid @enderror" 
                                    id="id_categoria" name="id_categoria" required>
                                <option value="">Seleccione...</option>
                                @foreach($categorias as $cat)
                                    <option value="{{ $cat->id_categoria }}" {{ old('id_categoria', $producto->id_categoria) == $cat->id_categoria ? 'selected' : '' }}>
                                        {{ $cat->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_categoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="id_unidad" class="form-label">Unidad de Medida <span class="text-danger">*</span></label>
                            <select class="form-select @error('id_unidad') is-invalid @enderror" 
                                    id="id_unidad" name="id_unidad" required>
                                <option value="">Seleccione...</option>
                                @foreach($unidades as $unidad)
                                    <option value="{{ $unidad->id_unidad }}" {{ old('id_unidad', $producto->id_unidad) == $unidad->id_unidad ? 'selected' : '' }}>
                                        {{ $unidad->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_unidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_color" class="form-label">Color</label>
                            <select class="form-select @error('id_color') is-invalid @enderror" 
                                    id="id_color" name="id_color">
                                <option value="">Ninguno</option>
                                @foreach($colores as $color)
                                    <option value="{{ $color->id_color }}" {{ old('id_color', $producto->id_color) == $color->id_color ? 'selected' : '' }}>
                                        {{ $color->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="id_marca" class="form-label">Marca</label>
                            <select class="form-select @error('id_marca') is-invalid @enderror" 
                                    id="id_marca" name="id_marca">
                                <option value="">Ninguna</option>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id_marca }}" {{ old('id_marca', $producto->id_marca) == $marca->id_marca ? 'selected' : '' }}>
                                        {{ $marca->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_marca')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="porcentaje_descuento" class="form-label">% Descuento</label>
                            <input type="number" step="0.01" min="0" max="100" 
                                   class="form-control @error('porcentaje_descuento') is-invalid @enderror" 
                                   id="porcentaje_descuento" name="porcentaje_descuento" value="{{ old('porcentaje_descuento', $producto->porcentaje_descuento) }}">
                            @error('porcentaje_descuento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="stock_minimo" class="form-label">Stock Mínimo <span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control @error('stock_minimo') is-invalid @enderror" 
                                   id="stock_minimo" name="stock_minimo" value="{{ old('stock_minimo', $producto->stock_minimo) }}" required>
                            @error('stock_minimo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="tiempo_duracion_anos" class="form-label">Duración (años)</label>
                            <input type="number" min="0" class="form-control @error('tiempo_duracion_anos') is-invalid @enderror" 
                                   id="tiempo_duracion_anos" name="tiempo_duracion_anos" value="{{ old('tiempo_duracion_anos', $producto->tiempo_duracion_anos) }}">
                            @error('tiempo_duracion_anos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="extension_cobertura_m2" class="form-label">Cobertura (m²)</label>
                        <input type="number" step="0.01" min="0" 
                               class="form-control @error('extension_cobertura_m2') is-invalid @enderror" 
                               id="extension_cobertura_m2" name="extension_cobertura_m2" value="{{ old('extension_cobertura_m2', $producto->extension_cobertura_m2) }}">
                        @error('extension_cobertura_m2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">
<h5 class="mb-3">Precios</h5>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="precio_venta" class="form-label">Precio de Venta <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text">Q</span>
            <input type="number" step="0.01" min="0" 
                   class="form-control @error('precio_venta') is-invalid @enderror" 
                   id="precio_venta" name="precio_venta" 
                   value="{{ old('precio_venta', $producto->precioActual->precio_venta ?? 0) }}" required>
            @error('precio_venta')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="precio_compra" class="form-label">Precio de Compra</label>
        <div class="input-group">
            <span class="input-group-text">Q</span>
            <input type="number" step="0.01" min="0" 
                   class="form-control @error('precio_compra') is-invalid @enderror" 
                   id="precio_compra" name="precio_compra" 
                   value="{{ old('precio_compra', $producto->precioActual->precio_compra ?? 0) }}">
            @error('precio_compra')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

@if($producto->historialPrecios->count() > 1)
    <div class="alert alert-info">
        <small><i class="bi bi-info-circle"></i> Este producto tiene {{ $producto->historialPrecios->count() }} cambios de precio registrados.</small>
    </div>
@endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection