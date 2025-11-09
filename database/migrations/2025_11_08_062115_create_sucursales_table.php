<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('sucursales', function (Blueprint $table) {
        $table->id('id_sucursal');
        $table->string('nombre', 100);
        $table->string('direccion', 200);
        $table->string('departamento', 50);
        $table->string('telefono', 15)->nullable();
        $table->decimal('latitud', 10, 8)->nullable();
        $table->decimal('longitud', 11, 8)->nullable();
        $table->boolean('estado')->default(true);
        
        // Índices
        $table->index('departamento', 'idx_departamento');
        $table->index('estado', 'idx_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursales');
    }
};
