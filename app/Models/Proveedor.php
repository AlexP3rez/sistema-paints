<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'contacto',
        'telefono',
        'email',
        'direccion',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean'
    ];

    // Relaciones
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_proveedores', 'id_proveedor', 'id_producto')
            ->withPivot('precio_compra', 'tiempo_entrega_dias');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }
}