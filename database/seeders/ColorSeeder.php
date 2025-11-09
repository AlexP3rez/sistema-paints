<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colores = [
            [
                'nombre' => 'Blanco',
                'codigo_hex' => '#FFFFFF',
                'estado' => true
            ],
            [
                'nombre' => 'Negro',
                'codigo_hex' => '#000000',
                'estado' => true
            ],
            [
                'nombre' => 'Rojo',
                'codigo_hex' => '#FF0000',
                'estado' => true
            ],
            [
                'nombre' => 'Azul',
                'codigo_hex' => '#0000FF',
                'estado' => true
            ],
            [
                'nombre' => 'Verde',
                'codigo_hex' => '#00FF00',
                'estado' => true
            ],
            [
                'nombre' => 'Amarillo',
                'codigo_hex' => '#FFFF00',
                'estado' => true
            ],
            [
                'nombre' => 'Gris',
                'codigo_hex' => '#808080',
                'estado' => true
            ],
            [
                'nombre' => 'Café',
                'codigo_hex' => '#8B4513',
                'estado' => true
            ],
            [
                'nombre' => 'Naranja',
                'codigo_hex' => '#FFA500',
                'estado' => true
            ],
            [
                'nombre' => 'Morado',
                'codigo_hex' => '#800080',
                'estado' => true
            ],
            [
                'nombre' => 'Rosa',
                'codigo_hex' => '#FFC0CB',
                'estado' => true
            ],
            [
                'nombre' => 'Beige',
                'codigo_hex' => '#F5F5DC',
                'estado' => true
            ]
        ];

        foreach ($colores as $color) {
            DB::table('colores')->insert($color);
        }
    }
}