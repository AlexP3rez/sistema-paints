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
    Schema::create('carrito_compras', function (Blueprint $table) {
        $table->id('id_carrito');
        $table->foreignId('id_cliente')->constrained('clientes', 'id_cliente')->onDelete('cascade');
        $table->foreignId('id_producto')->constrained('productos', 'id_producto');
        $table->decimal('cantidad', 10, 3);
        $table->timestamp('fecha_agregado')->useCurrent();
        
        // Índices y restricciones únicas
        $table->unique(['id_cliente', 'id_producto'], 'uk_cliente_producto');
        $table->index('id_cliente', 'idx_cliente');
        $table->index('fecha_agregado', 'idx_fecha');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_compras');
    }
};
