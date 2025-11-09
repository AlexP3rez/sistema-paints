<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // PRIMERO: Datos base que no dependen de nadie
            UnidadMedidaSeeder::class,
            CategoriaSeeder::class,
            ColorSeeder::class,           // ← AGREGAR AQUÍ
            MarcaSeeder::class,
            TipoPagoSeeder::class,
            
            // SEGUNDO: Datos de catálogos
            ClienteSeeder::class,
            ProveedorSeeder::class,
            SucursalSeeder::class,
            UsuarioSeeder::class,
            
            // AL FINAL: Productos (depende de unidades, categorías, marcas y colores)
            ProductoSeeder::class,
        ]);
    }
}