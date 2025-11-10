<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\UnidadMedida;
use App\Models\Color;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Models\HistorialPrecio;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'marca', 'color', 'unidad'])
            ->orderBy('id_producto', 'desc')
            ->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
{
    $categorias = Categoria::where('estado', true)->get();
    $unidades = UnidadMedida::all();
    $colores = Color::where('estado', true)->get();
    $marcas = Marca::where('estado', true)->get();
    
    return view('productos.create', compact('categorias', 'unidades', 'colores', 'marcas'));
}

    public function store(Request $request)
{
    $validated = $request->validate([
        'codigo' => 'required|string|max:20|unique:productos,codigo',
        'nombre' => 'required|string|max:100',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // ← NUEVO
        'porcentaje_descuento' => 'nullable|numeric|min:0|max:100',
        'stock_minimo' => 'required|integer|min:0',
        'id_categoria' => 'required|exists:categorias_productos,id_categoria',
        'id_unidad' => 'required|exists:unidades_medida,id_unidad',
        'id_color' => 'nullable|exists:colores,id_color',
        'id_marca' => 'nullable|exists:marcas,id_marca',
        'tiempo_duracion_anos' => 'nullable|integer|min:0',
        'extension_cobertura_m2' => 'nullable|numeric|min:0',
        'precio_venta' => 'required|numeric|min:0',
        'precio_compra' => 'nullable|numeric|min:0',
    ]);

    $validated['estado'] = true;
    $validated['porcentaje_descuento'] = $validated['porcentaje_descuento'] ?? 0;

    // Manejar la imagen
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $ruta = $imagen->storeAs('productos', $nombreImagen, 'public');
        $validated['imagen'] = $ruta;
    }

    // Crear el producto
    $producto = Producto::create($validated);

    // Crear el precio inicial
    HistorialPrecio::create([
        'id_producto' => $producto->id_producto,
        'precio_venta' => $request->precio_venta,
        'precio_compra' => $request->precio_compra ?? 0,
        'fecha_inicio' => now(),
        'motivo_cambio' => 'Precio inicial',
        'estado_precio' => 'Activo'
    ]);

    return redirect()->route('productos.index')
        ->with('success', 'Producto creado exitosamente.');
}

    public function show(Producto $producto)
    {
        $producto->load(['categoria', 'unidad', 'color', 'marca']);
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
{
    $categorias = Categoria::where('estado', true)->get();
    $unidades = UnidadMedida::all();
    $colores = Color::where('estado', true)->get();
    $marcas = Marca::where('estado', true)->get();
    
    // Cargar el precio actual
    $producto->load('precioActual');
    
    return view('productos.edit', compact('producto', 'categorias', 'unidades', 'colores', 'marcas'));
}

    public function update(Request $request, Producto $producto)
{
    $validated = $request->validate([
        'codigo' => 'required|string|max:20|unique:productos,codigo,' . $producto->id_producto . ',id_producto',
        'nombre' => 'required|string|max:100',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
        'porcentaje_descuento' => 'nullable|numeric|min:0|max:100',
        'stock_minimo' => 'required|integer|min:0',
        'id_categoria' => 'required|exists:categorias_productos,id_categoria',
        'id_unidad' => 'required|exists:unidades_medida,id_unidad',
        'id_color' => 'nullable|exists:colores,id_color',
        'id_marca' => 'nullable|exists:marcas,id_marca',
        'tiempo_duracion_anos' => 'nullable|integer|min:0',
        'extension_cobertura_m2' => 'nullable|numeric|min:0',
        'precio_venta' => 'required|numeric|min:0',
        'precio_compra' => 'nullable|numeric|min:0',
    ]);

    // Manejar la nueva imagen
    if ($request->hasFile('imagen')) {
        // Eliminar imagen anterior si existe
        if ($producto->imagen && \Storage::disk('public')->exists($producto->imagen)) {
            \Storage::disk('public')->delete($producto->imagen);
        }
        
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $ruta = $imagen->storeAs('productos', $nombreImagen, 'public');
        $validated['imagen'] = $ruta;
    }

    // Actualizar campos del producto
    $producto->update([
        'codigo' => $validated['codigo'],
        'nombre' => $validated['nombre'],
        'descripcion' => $validated['descripcion'],
        'imagen' => $validated['imagen'] ?? $producto->imagen,
        'porcentaje_descuento' => $validated['porcentaje_descuento'] ?? 0,
        'stock_minimo' => $validated['stock_minimo'],
        'id_categoria' => $validated['id_categoria'],
        'id_unidad' => $validated['id_unidad'],
        'id_color' => $validated['id_color'],
        'id_marca' => $validated['id_marca'],
        'tiempo_duracion_anos' => $validated['tiempo_duracion_anos'],
        'extension_cobertura_m2' => $validated['extension_cobertura_m2'],
    ]);

    // Manejar el precio (código existente)
    $precioActual = HistorialPrecio::where('id_producto', $producto->id_producto)
                                   ->where('estado_precio', 'Activo')
                                   ->first();
    
    $precioVenta = (float) $request->precio_venta;
    $precioCompra = (float) ($request->precio_compra ?? 0);
    
    if ($precioActual) {
        if ($precioActual->precio_venta != $precioVenta || 
            $precioActual->precio_compra != $precioCompra) {
            
            $precioActual->update([
                'estado_precio' => 'Inactivo',
                'fecha_fin' => now()
            ]);
            
            HistorialPrecio::create([
                'id_producto' => $producto->id_producto,
                'precio_venta' => $precioVenta,
                'precio_compra' => $precioCompra,
                'fecha_inicio' => now(),
                'fecha_fin' => null,
                'id_empleado_modifico' => null,
                'motivo_cambio' => 'Actualización manual',
                'estado_precio' => 'Activo'
            ]);
        }
    } else {
        HistorialPrecio::create([
            'id_producto' => $producto->id_producto,
            'precio_venta' => $precioVenta,
            'precio_compra' => $precioCompra,
            'fecha_inicio' => now(),
            'fecha_fin' => null,
            'id_empleado_modifico' => null,
            'motivo_cambio' => 'Precio inicial',
            'estado_precio' => 'Activo'
        ]);
    }

    return redirect()->route('productos.index')
        ->with('success', 'Producto y precio actualizados exitosamente.');
}

    public function destroy(Producto $producto)
    {
        $producto->update(['estado' => false]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto desactivado exitosamente.');
    }
}