<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = [
            [
                'nombres' => 'Juan',
                'apellidos' => 'Pérez García',
                'nit' => '12345678-9',
                'dpi' => '1234567890101',
                'telefono' => '2345-6789',
                'email' => 'juan.perez@email.com',
                'direccion' => 'Zona 1, Guatemala',
                'acepta_promociones' => true,
                'estado' => true
            ],
            [
                'nombres' => 'María',
                'apellidos' => 'López Hernández',
                'nit' => '87654321-0',
                'dpi' => '9876543210987',
                'telefono' => '5678-1234',
                'email' => 'maria.lopez@email.com',
                'direccion' => 'Zona 10, Guatemala',
                'acepta_promociones' => true,
                'estado' => true
            ],
            [
                'nombres' => 'Carlos',
                'apellidos' => 'Ramírez Méndez',
                'nit' => 'CF',
                'dpi' => '1122334455667',
                'telefono' => '4321-8765',
                'email' => 'carlos.ramirez@email.com',
                'direccion' => 'Antigua Guatemala',
                'acepta_promociones' => false,
                'estado' => true
            ],
            [
                'nombres' => 'Ana',
                'apellidos' => 'Martínez Flores',
                'nit' => '11223344-5',
                'dpi' => '2233445566778',
                'telefono' => '6789-0123',
                'email' => 'ana.martinez@email.com',
                'direccion' => 'Escuintla',
                'acepta_promociones' => true,
                'estado' => true
            ],
            [
                'nombres' => 'Roberto',
                'apellidos' => 'González Díaz',
                'nit' => '55667788-9',
                'dpi' => '3344556677889',
                'telefono' => '9012-3456',
                'email' => 'roberto.gonzalez@email.com',
                'direccion' => 'Quetzaltenango',
                'acepta_promociones' => false,
                'estado' => true
            ]
        ];

        foreach ($clientes as $cliente) {
            DB::table('clientes')->insert($cliente);
        }
    }
}