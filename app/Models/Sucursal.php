<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursales';
    protected $primaryKey = 'id_sucursal';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'direccion',
        'departamento',
        'telefono',
        'latitud',
        'longitud',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean',
        'latitud' => 'decimal:8',
        'longitud' => 'decimal:8'
    ];

    // Relaciones
    public function bodegas()
    {
        return $this->hasMany(Bodega::class, 'id_sucursal', 'id_sucursal');
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_sucursal', 'id_sucursal');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }
}