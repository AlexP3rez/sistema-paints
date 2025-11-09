<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    public function run(): void
    {
        $proveedores = [
            [
                'nombre' => 'Distribuidora Pinturas S.A.',
                'contacto' => 'Luis Mendoza',
                'telefono' => '2234-5678',
                'email' => 'ventas@distpinturas.com',
                'direccion' => 'Zona 12, Ciudad de Guatemala',
                'estado' => true
            ],
            [
                'nombre' => 'Importadora de Barnices',
                'contacto' => 'Carmen Rodríguez',
                'telefono' => '2345-6789',
                'email' => 'info@barnices.com.gt',
                'direccion' => 'Zona 4, Mixco',
                'estado' => true
            ],
            [
                'nombre' => 'Solventes Industriales GT',
                'contacto' => 'Pedro Castillo',
                'telefono' => '2456-7890',
                'email' => 'contacto@solventes.gt',
                'direccion' => 'Villa Nueva',
                'estado' => true
            ],
            [
                'nombre' => 'Accesorios para Pintar',
                'contacto' => 'Sandra López',
                'telefono' => '2567-8901',
                'email' => 'ventas@accesorios.com',
                'direccion' => 'Zona 11, Guatemala',
                'estado' => true
            ]
        ];

        foreach ($proveedores as $proveedor) {
            DB::table('proveedores')->insert($proveedor);
        }
    }
}