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
    Schema::create('movimientos_inventario', function (Blueprint $table) {
        $table->id('id_movimiento');
        $table->foreignId('id_producto')->constrained('productos', 'id_producto');
        $table->foreignId('id_bodega')->constrained('bodegas', 'id_bodega');
        $table->enum('tipo_movimiento', ['Entrada', 'Salida', 'Ajuste']);
        $table->decimal('cantidad', 10, 3);
        $table->integer('stock_nuevo');
        $table->string('motivo', 100);
        $table->foreignId('id_factura')->nullable()->constrained('facturas', 'id_factura');
        $table->foreignId('id_empleado')->constrained('empleados', 'id_empleado');
        $table->timestamp('fecha_movimiento')->useCurrent();
        
        // Índices
        $table->index('id_producto', 'idx_producto');
        $table->index('id_bodega', 'idx_bodega');
        $table->index('tipo_movimiento', 'idx_tipo');
        $table->index('fecha_movimiento', 'idx_fecha');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_inventario');
    }
};
