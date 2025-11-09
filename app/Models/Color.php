<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colores';
    protected $primaryKey = 'id_color';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'codigo_hex',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean'
    ];

    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }
}