@extends('layouts.app')

@section('title', 'Ver Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalle del Producto</h4>
            </div>
            <div class="card-body">
                @if($producto->imagen)
    <div class="text-center mb-4">
        <img src="{{ asset('storage/' . $producto->imagen) }}" 
             alt="{{ $producto->nombre }}" 
             class="img-fluid rounded shadow" 
             style="max-width: 400px;">
    </div>
@else
    <div class="text-center mb-4">
        <div class="bg-light rounded p-5" style="max-width: 400px; margin: 0 auto;">
            <i class="bi bi-image" style="font-size: 4rem; color: #ccc;"></i>
            <p class="text-muted mt-2">Sin imagen</p>
        </div>
    </div>
@endif

<hr class="my-4">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Código:</strong>
                        <p class="fs-5"><strong>{{ $producto->codigo }}</strong></p>
                    </div>
                    <div class="col-md-8">
                        <strong>Nombre:</strong>
                        <p class="fs-5">{{ $producto->nombre }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>Descripción:</strong>
                        <p>{{ $producto->descripcion ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Categoría:</strong>
                        <p>{{ $producto->categoria->nombre ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Unidad de Medida:</strong>
                        <p>{{ $producto->unidad->nombre ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Color:</strong>
                        <p>
                            @if($producto->color)
                                <span class="badge" style="background-color: {{ $producto->color->codigo_hex }}; color: {{ $producto->color->codigo_hex == '#FFFFFF' ? '#000' : '#FFF' }}">
                                    {{ $producto->color->nombre }}
                                </span>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <strong>Marca:</strong>
                        <p>{{ $producto->marca->nombre ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>% Descuento:</strong>
                        <p>{{ $producto->porcentaje_descuento }}%</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Stock Mínimo:</strong>
                        <p>{{ $producto->stock_minimo }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Estado:</strong>
                        <p>
                            <span class="badge bg-{{ $producto->estado ? 'success' : 'danger' }}">
                                {{ $producto->estado ? 'Activo' : 'Inactivo' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Duración:</strong>
                        <p>{{ $producto->tiempo_duracion_anos ? $producto->tiempo_duracion_anos . ' años' : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Cobertura:</strong>
                        <p>{{ $producto->extension_cobertura_m2 ? $producto->extension_cobertura_m2 . ' m²' : 'N/A' }}</p>
                    </div>
                </div>

                <hr class="my-3">
<h5 class="mb-3">Precios</h5>

<div class="row mb-3">
    <div class="col-md-6">
        <strong>Precio de Venta:</strong>
        <p class="fs-5 text-success">
            @if($producto->precioActual)
                <strong>Q{{ number_format($producto->precioActual->precio_venta, 2) }}</strong>
            @else
                <span class="text-muted">Sin precio</span>
            @endif
        </p>
    </div>
    <div class="col-md-6">
        <strong>Precio de Compra:</strong>
        <p class="fs-5">
            @if($producto->precioActual)
                Q{{ number_format($producto->precioActual->precio_compra, 2) }}
            @else
                <span class="text-muted">Sin precio</span>
            @endif
        </p>
    </div>
</div>

@if($producto->precioActual)
    <div class="row mb-3">
        <div class="col-md-12">
            <strong>Margen de Ganancia:</strong>
            <p>
                @php
                    $margen = $producto->precioActual->precio_venta - $producto->precioActual->precio_compra;
                    $porcentaje = $producto->precioActual->precio_compra > 0 
                        ? ($margen / $producto->precioActual->precio_compra) * 100 
                        : 0;
                @endphp
                Q{{ number_format($margen, 2) }} 
                <span class="badge bg-primary">{{ number_format($porcentaje, 2) }}%</span>
            </p>
        </div>
    </div>
@endif

                <div class="d-flex justify-content-between">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection