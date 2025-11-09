<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Este debe ir al final porque depende de categorías y marcas
        $productos = [
            [
                'codigo' => 'ACC-001',
                'nombre' => 'Brocha 1 pulgada',
                'descripcion' => 'Brocha de cerda natural de 1 pulgada',
                'porcentaje_descuento' => 0.00,
                'stock_minimo' => 20,
                'id_categoria' => 1,
                'id_unidad' => 1,
                'id_color' => null,
                'id_marca' => 1,
                'tiempo_duracion_anos' => null,
                'extension_cobertura_m2' => null,
                'estado' => true
            ],
            [
                'codigo' => 'PIN-001',
                'nombre' => 'Pintura Látex Blanca',
                'descripcion' => 'Pintura látex base agua color blanco',
                'porcentaje_descuento' => 5.00,
                'stock_minimo' => 5,
                'id_categoria' => 3,
                'id_unidad' => 7,
                'id_color' => 1,
                'id_marca' => 1,
                'tiempo_duracion_anos' => 5,
                'extension_cobertura_m2' => 35.00,
                'estado' => true
            ],
            [
                'codigo' => 'BAR-001',
                'nombre' => 'Barniz Acrílico',
                'descripcion' => 'Barniz acrílico transparente',
                'porcentaje_descuento' => 0.00,
                'stock_minimo' => 8,
                'id_categoria' => 4,
                'id_unidad' => 7,
                'id_color' => null,
                'id_marca' => 2,
                'tiempo_duracion_anos' => 3,
                'extension_cobertura_m2' => 25.00,
                'estado' => true
            ]
        ];

        foreach ($productos as $producto) {
            DB::table('productos')->insert($producto);
        }
    }
}