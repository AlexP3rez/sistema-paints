<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPagoSeeder extends Seeder
{
    public function run(): void
    {
        $count = DB::table('tipos_pago')->count();
        
        if ($count == 0) {
            $tipos = [
                [
                    'nombre' => 'Efectivo',
                    'descripcion' => 'Pago en efectivo',
                    'estado' => true
                ],
                [
                    'nombre' => 'Cheque',
                    'descripcion' => 'Pago con cheque bancario',
                    'estado' => true
                ],
                [
                    'nombre' => 'Tarjeta',
                    'descripcion' => 'Pago con tarjeta de crédito o débito',
                    'estado' => true
                ]
            ];

            foreach ($tipos as $tipo) {
                DB::table('tipos_pago')->insert($tipo);
            }
        }
    }
}