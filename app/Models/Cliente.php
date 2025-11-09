<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'nit',
        'dpi',
        'telefono',
        'email',
        'direccion',
        'acepta_promociones',
        'estado'
    ];

    protected $casts = [
        'acepta_promociones' => 'boolean',
        'estado' => 'boolean',
        'fecha_registro' => 'datetime'
    ];

    // Accessors
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }
}