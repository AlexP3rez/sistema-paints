<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SucursalSeeder extends Seeder
{
    public function run(): void
    {
        // Las sucursales ya existen desde las migraciones
        // Este seeder está vacío o puedes verificar si existen
        
        $count = DB::table('sucursales')->count();
        
        if ($count == 0) {
            $sucursales = [
                [
                    'nombre' => 'Pradera Chimaltenango',
                    'direccion' => 'Centro Comercial Pradera Chimaltenango',
                    'departamento' => 'Chimaltenango',
                    'telefono' => '78321000',
                    'latitud' => 14.65910000,
                    'longitud' => -90.81540000,
                    'estado' => true
                ],
                [
                    'nombre' => 'Pradera Escuintla',
                    'direccion' => 'Centro Comercial Pradera Escuintla',
                    'departamento' => 'Escuintla',
                    'telefono' => '78812000',
                    'latitud' => 14.30580000,
                    'longitud' => -90.78510000,
                    'estado' => true
                ],
                [
                    'nombre' => 'Las Américas Mazatenango',
                    'direccion' => 'Centro Comercial Las Américas',
                    'departamento' => 'Suchitepéquez',
                    'telefono' => '78723000',
                    'latitud' => 14.53420000,
                    'longitud' => -91.50350000,
                    'estado' => true
                ],
                [
                    'nombre' => 'La Trinidad Coatepeque',
                    'direccion' => 'Centro Comercial La Trinidad',
                    'departamento' => 'Quetzaltenango',
                    'telefono' => '77754000',
                    'latitud' => 14.70420000,
                    'longitud' => -91.86300000,
                    'estado' => true
                ],
                [
                    'nombre' => 'Pradera Xela',
                    'direccion' => 'Centro Comercial Pradera Xela',
                    'departamento' => 'Quetzaltenango',
                    'telefono' => '77615000',
                    'latitud' => 14.83730000,
                    'longitud' => -91.51830000,
                    'estado' => true
                ],
                [
                    'nombre' => 'Miraflores Guatemala',
                    'direccion' => 'Centro Comercial Miraflores',
                    'departamento' => 'Guatemala',
                    'telefono' => '22776000',
                    'latitud' => 14.61180000,
                    'longitud' => -90.53920000,
                    'estado' => true
                ]
            ];

            foreach ($sucursales as $sucursal) {
                DB::table('sucursales')->insert($sucursal);
            }
        }
    }
}