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
    Schema::create('productos_proveedores', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_producto')->constrained('productos', 'id_producto');
        $table->foreignId('id_proveedor')->constrained('proveedores', 'id_proveedor');
        $table->decimal('precio_compra', 10, 2);
        $table->integer('tiempo_entrega_dias')->default(7);
        $table->timestamp('fecha_registro')->useCurrent();
        $table->boolean('estado')->default(true);
        
        // Índices y restricciones únicas
        $table->unique(['id_producto', 'id_proveedor'], 'uk_producto_proveedor');
        $table->index('id_producto', 'idx_producto');
        $table->index('id_proveedor', 'idx_proveedor');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_proveedores');
    }
};
