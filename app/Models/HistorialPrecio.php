<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialPrecio extends Model
{
    use HasFactory;

    protected $table = 'historial_precios';
    protected $primaryKey = 'id_historial_precio';
    public $timestamps = false;

    protected $fillable = [
        'id_producto',
        'precio_venta',
        'precio_compra',
        'fecha_inicio',
        'fecha_fin',
        'id_empleado_modifico',
        'motivo_cambio',
        'estado_precio'
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime'
    ];

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    // Scope para obtener precio activo
    public function scopeActivo($query)
    {
        return $query->where('estado_precio', 'Activo');
    }
}