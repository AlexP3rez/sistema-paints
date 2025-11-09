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
    Schema::create('series_facturas', function (Blueprint $table) {
        $table->id('id_serie');
        $table->string('letra_serie', 2);
        $table->integer('numero_inicial');
        $table->integer('numero_actual');
        $table->integer('numero_final');
        $table->foreignId('id_sucursal')->constrained('sucursales', 'id_sucursal');
        $table->boolean('estado')->default(true);
        
        // Índices y restricciones únicas
        $table->unique(['letra_serie', 'id_sucursal'], 'uk_serie_sucursal');
        $table->index('id_sucursal', 'idx_sucursal');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series_facturas');
    }
};
