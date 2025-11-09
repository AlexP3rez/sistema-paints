<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';
    protected $primaryKey = 'id_marca';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'pais_origen',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean',
        'fecha_creacion' => 'datetime'
    ];

    // Relaciones
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_marca', 'id_marca');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }
}