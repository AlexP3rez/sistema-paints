<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $count = DB::table('usuarios')->count();
        
        if ($count == 0) {
            $usuarios = [
                [
                    'username' => 'admin',
                    'password_hash' => hash('sha256', 'admin123' . 'salt123'),
                    'salt' => 'salt123',
                    'perfil_usuario' => 'Gerente',
                    'estado' => true,
                    'intentos_login' => 0
                ],
                [
                    'username' => 'digitador1',
                    'password_hash' => hash('sha256', 'digitador123' . 'salt456'),
                    'salt' => 'salt456',
                    'perfil_usuario' => 'Digitador',
                    'estado' => true,
                    'intentos_login' => 0
                ],
                [
                    'username' => 'cajero1',
                    'password_hash' => hash('sha256', 'cajero123' . 'salt789'),
                    'salt' => 'salt789',
                    'perfil_usuario' => 'Cajero',
                    'estado' => true,
                    'intentos_login' => 0
                ]
            ];

            foreach ($usuarios as $usuario) {
                DB::table('usuarios')->insert($usuario);
            }
        }
    }
}