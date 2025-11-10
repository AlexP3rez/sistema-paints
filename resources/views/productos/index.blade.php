@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-box"></i> Listado de Productos</h4>
                <a href="{{ route('productos.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Nuevo Producto
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
    <tr>
        <th>Imagen</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Precio Venta</th> <!-- NUEVA COLUMNA -->
        <th>Stock Mín.</th>
        <th>Estado</th>
        <th class="text-center">Acciones</th>
    </tr>
</thead>
<tbody>
    @forelse($productos as $producto)
        <tr>
            <td> <!-- NUEVA CELDA -->
                @if($producto->imagen)
                    <img src="{{ asset('storage/' . $producto->imagen) }}" 
                         alt="{{ $producto->nombre }}" 
                         class="img-thumbnail" 
                         style="width: 50px; height: 50px; object-fit: cover;">
                @else
                    <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                @endif
            </td>
            <td><strong>{{ $producto->codigo }}</strong></td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td>
            <td>{{ $producto->marca->nombre ?? 'N/A' }}</td>
            <td>
                @if($producto->color)
                    <span class="badge" style="background-color: {{ $producto->color->codigo_hex }}; color: {{ $producto->color->codigo_hex == '#FFFFFF' ? '#000' : '#FFF' }}">
                        {{ $producto->color->nombre }}
                    </span>
                @else
                    N/A
                @endif
            </td>
            <td>
                @if($producto->precioActual)
                    <strong>Q{{ number_format($producto->precioActual->precio_venta, 2) }}</strong>
                @else
                    <span class="text-muted">Sin precio</span>
                @endif
            </td>
            <td>{{ $producto->stock_minimo }}</td>
            <td>
                <span class="badge bg-{{ $producto->estado ? 'success' : 'danger' }}">
                    {{ $producto->estado ? 'Activo' : 'Inactivo' }}
                </span>
            </td>
            <td class="text-center">
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('productos.show', $producto->id_producto) }}" class="btn btn-info" title="Ver">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning" title="Editar">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desactivar producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Eliminar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="9" class="text-center">No hay productos registrados</td></tr>
    @endforelse
</tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">{{ $productos->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection