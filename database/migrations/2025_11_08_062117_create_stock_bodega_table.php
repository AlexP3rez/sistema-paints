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
    Schema::create('stock_bodega', function (Blueprint $table) {
        $table->id('id_stock');
        $table->foreignId('id_producto')->constrained('productos', 'id_producto');
        $table->foreignId('id_bodega')->constrained('bodegas', 'id_bodega');
        $table->decimal('cantidad_actual', 10, 3)->default(0);
        $table->timestamp('fecha_ultima_actualizacion')->useCurrent()->useCurrentOnUpdate();
        
        // Índices y restricciones únicas
        $table->unique(['id_producto', 'id_bodega'], 'uk_producto_bodega');
        $table->index('id_producto', 'idx_producto');
        $table->index('id_bodega', 'idx_bodega');
        $table->index('id_producto', 'idx_stock_producto');
        $table->index('id_bodega', 'idx_stock_bodega');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_bodega');
    }
};
