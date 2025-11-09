<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\UnidadMedida;
use App\Models\Color;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Models\HistorialPrecio;

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
        'porcentaje_descuento' => 'nullable|numeric|min:0|max:100',
        'stock_minimo' => 'required|integer|min:0',
        'id_categoria' => 'required|exists:categorias_productos,id_categoria',
        'id_unidad' => 'required|exists:unidades_medida,id_unidad',
        'id_color' => 'nullable|exists:colores,id_color',
        'id_marca' => 'nullable|exists:marcas,id_marca',
        'tiempo_duracion_anos' => 'nullable|integer|min:0',
        'extension_cobertura_m2' => 'nullable|numeric|min:0',
        // Agregar validación de precios
        'precio_venta' => 'required|numeric|min:0',
        'precio_compra' => 'nullable|numeric|min:0',
    ]);

    $validated['estado'] = true;
    $validated['porcentaje_descuento'] = $validated['porcentaje_descuento'] ?? 0;

    // Crear el producto
    $producto = Producto::create($validated);

    // Crear el precio inicial en historial_precios
    HistorialPrecio::create([
        'id_producto' => $producto->id_producto,
        'precio_venta' => $request->precio_venta,
        'precio_compra' => $request->precio_compra,
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

    $validated['porcentaje_descuento'] = $validated['porcentaje_descuento'] ?? 0;

    // Actualizar el producto
    $producto->update($validated);

    // Manejar el precio
    $precioActual = HistorialPrecio::where('id_producto', $producto->id_producto)
                                   ->where('estado_precio', 'Activo')
                                   ->first();
    
    if ($precioActual) {
        // Verificar si el precio cambió
        if ($precioActual->precio_venta != $request->precio_venta || 
            $precioActual->precio_compra != $request->precio_compra) {
            
            // Desactivar precio anterior
            $precioActual->update([
                'estado_precio' => 'Inactivo',
                'fecha_fin' => now()
            ]);
            
            // Crear nuevo precio
            HistorialPrecio::create([
                'id_producto' => $producto->id_producto,
                'precio_venta' => $request->precio_venta,
                'precio_compra' => $request->precio_compra ?? 0,
                'fecha_inicio' => now(),
                'motivo_cambio' => 'Actualización de precio',
                'estado_precio' => 'Activo'
            ]);
        }
    } else {
        // Si no existe precio, crear uno nuevo
        HistorialPrecio::create([
            'id_producto' => $producto->id_producto,
            'precio_venta' => $request->precio_venta,
            'precio_compra' => $request->precio_compra ?? 0,
            'fecha_inicio' => now(),
            'motivo_cambio' => 'Precio inicial',
            'estado_precio' => 'Activo'
        ]);
    }

    return redirect()->route('productos.index')
        ->with('success', 'Producto actualizado exitosamente.');
}

    public function destroy(Producto $producto)
    {
        $producto->update(['estado' => false]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto desactivado exitosamente.');
    }
}