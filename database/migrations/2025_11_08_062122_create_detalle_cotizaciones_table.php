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
    Schema::create('detalle_cotizaciones', function (Blueprint $table) {
        $table->id('id_detalle');
        $table->foreignId('id_cotizacion')->constrained('cotizaciones', 'id_cotizacion')->onDelete('cascade');
        $table->foreignId('id_producto')->constrained('productos', 'id_producto');
        $table->decimal('cantidad', 10, 3);
        $table->decimal('precio_unitario', 10, 2);
        $table->decimal('descuento_porcentaje', 5, 2)->default(0.00);
        $table->decimal('subtotal', 12, 2);
        
        // Índices
        $table->index('id_cotizacion', 'idx_cotizacion');
        $table->index('id_producto', 'idx_producto');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_cotizaciones');
    }
};
