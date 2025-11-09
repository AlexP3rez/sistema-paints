<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadMedidaSeeder extends Seeder
{
    public function run(): void
    {
        $unidades = [
            [
                'nombre' => 'Unidad',
                'abreviatura' => 'u',
                'factor_conversion' => 1.000000
            ],
            [
                'nombre' => '1/32 de galón',
                'abreviatura' => '1/32 gal',
                'factor_conversion' => 0.031250
            ],
            [
                'nombre' => '1/16 de galón',
                'abreviatura' => '1/16 gal',
                'factor_conversion' => 0.062500
            ],
            [
                'nombre' => '1/8 de galón',
                'abreviatura' => '1/8 gal',
                'factor_conversion' => 0.125000
            ],
            [
                'nombre' => '1/4 de galón',
                'abreviatura' => '1/4 gal',
                'factor_conversion' => 0.250000
            ],
            [
                'nombre' => '1/2 galón',
                'abreviatura' => '1/2 gal',
                'factor_conversion' => 0.500000
            ],
            [
                'nombre' => '1 galón',
                'abreviatura' => '1 gal',
                'factor_conversion' => 1.000000
            ],
            [
                'nombre' => '1 cubeta',
                'abreviatura' => 'cubeta',
                'factor_conversion' => 5.000000
            ]
        ];

        foreach ($unidades as $unidad) {
            DB::table('unidades_medida')->insert($unidad);
        }
    }
}