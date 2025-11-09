<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password_hash',
        'salt',
        'perfil_usuario',
        'estado',
        'intentos_login'
    ];

    protected $hidden = [
        'password_hash',
        'salt'
    ];

    protected $casts = [
        'estado' => 'boolean',
        'fecha_creacion' => 'datetime',
        'ultimo_acceso' => 'datetime'
    ];

    // Relaciones
    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'id_usuario', 'id_usuario');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }
}