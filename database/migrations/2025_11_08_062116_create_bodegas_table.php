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
    Schema::create('bodegas', function (Blueprint $table) {
        $table->id('id_bodega');
        $table->foreignId('id_sucursal')->constrained('sucursales', 'id_sucursal');
        $table->string('nombre', 100);
        $table->string('descripcion', 200)->nullable();
        $table->integer('capacidad_maxima')->default(10000);
        $table->boolean('estado')->default(true);
        
        // Índices
        $table->index('id_sucursal', 'idx_sucursal');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bodegas');
    }
};
