<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'imagen',
        'porcentaje_descuento',
        'stock_minimo',
        'id_categoria',
        'id_unidad',
        'id_color',
        'id_marca',
        'tiempo_duracion_anos',
        'extension_cobertura_m2',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean',
        'porcentaje_descuento' => 'decimal:2',
        'extension_cobertura_m2' => 'decimal:2',
        'fecha_creacion' => 'datetime'
    ];

    // Relaciones
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function unidad()
    {
        return $this->belongsTo(UnidadMedida::class, 'id_unidad', 'id_unidad');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'id_color', 'id_color');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
    }

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'productos_proveedores', 'id_producto', 'id_proveedor');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }
    // Agregar esta relación después de las que ya tienes
public function precioActual()
{
    return $this->hasOne(HistorialPrecio::class, 'id_producto', 'id_producto')
                ->where('estado_precio', 'Activo')
                ->latest('fecha_inicio');
}

public function historialPrecios()
{
    return $this->hasMany(HistorialPrecio::class, 'id_producto', 'id_producto')
                ->orderBy('fecha_inicio', 'desc');
}
}