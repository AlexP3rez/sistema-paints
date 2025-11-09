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
    Schema::create('detalle_facturas', function (Blueprint $table) {
        $table->id('id_detalle');
        $table->foreignId('id_factura')->constrained('facturas', 'id_factura')->onDelete('cascade');
        $table->foreignId('id_producto')->constrained('productos', 'id_producto');
        $table->decimal('cantidad', 10, 3);
        $table->decimal('precio_unitario', 10, 2);
        $table->decimal('descuento_porcentaje', 5, 2)->default(0.00);
        $table->decimal('descuento_monto', 10, 2)->default(0.00);
        $table->decimal('subtotal', 12, 2);
        
        // Índices
        $table->index('id_factura', 'idx_factura');
        $table->index('id_producto', 'idx_producto');
        $table->index('id_producto', 'idx_detalle_facturas_producto');
        $table->index('id_factura', 'idx_detalle_facturas_factura');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_facturas');
    }
};
