<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            [
                'nombre' => 'Sherwin-Williams',
                'descripcion' => 'Marca americana líder en pinturas',
                'pais_origen' => 'Estados Unidos',
                'estado' => true
            ],
            [
                'nombre' => 'Comex',
                'descripcion' => 'Marca mexicana de pinturas',
                'pais_origen' => 'México',
                'estado' => true
            ],
            [
                'nombre' => 'Pittsburgh Paints',
                'descripcion' => 'Pinturas de alta calidad',
                'pais_origen' => 'Estados Unidos',
                'estado' => true
            ],
            [
                'nombre' => 'Behr',
                'descripcion' => 'Marca reconocida de pinturas',
                'pais_origen' => 'Estados Unidos',
                'estado' => true
            ],
            [
                'nombre' => 'Benjamin Moore',
                'descripcion' => 'Pinturas premium',
                'pais_origen' => 'Estados Unidos',
                'estado' => true
            ],
            [
                'nombre' => 'Glidden',
                'descripcion' => 'Pinturas económicas',
                'pais_origen' => 'Estados Unidos',
                'estado' => true
            ],
            [
                'nombre' => 'Valspar',
                'descripcion' => 'Pinturas para interiores y exteriores',
                'pais_origen' => 'Estados Unidos',
                'estado' => true
            ],
            [
                'nombre' => 'Rust-Oleum',
                'descripcion' => 'Especialistas en pinturas protectoras',
                'pais_origen' => 'Estados Unidos',
                'estado' => true
            ]
        ];

        foreach ($marcas as $marca) {
            DB::table('marcas')->insert($marca);
        }
    }
}