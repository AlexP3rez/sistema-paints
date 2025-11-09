<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        // Verificar si ya existen
        $count = DB::table('categorias_productos')->count();
        
        if ($count == 0) {
            $categorias = [
                [
                    'nombre' => 'Accesorios',
                    'descripcion' => 'Brochas, rodillos, bandejas, etc.',
                    'estado' => true
                ],
                [
                    'nombre' => 'Solventes',
                    'descripcion' => 'Aguarrás, solvente limpiador, gas, etc.',
                    'estado' => true
                ],
                [
                    'nombre' => 'Pinturas',
                    'descripcion' => 'Pinturas a base de agua y aceite',
                    'estado' => true
                ],
                [
                    'nombre' => 'Barnices',
                    'descripcion' => 'Barniz sintético y acrílico',
                    'estado' => true
                ]
            ];

            foreach ($categorias as $categoria) {
                DB::table('categorias_productos')->insert($categoria);
            }
        }
    }
}