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
    Schema::create('lotes', function (Blueprint $table) {
        $table->id('id_lote');
        $table->foreignId('id_sucursal')->constrained('sucursales', 'id_sucursal');
        $table->foreignId('id_producto')->constrained('productos', 'id_producto');
        $table->string('numero_lote', 50)->unique();
        $table->decimal('cantidad_ingreso', 10, 3);
        $table->decimal('cantidad_actual', 10, 3);
        $table->decimal('precio_compra_unitario', 10, 2);
        $table->decimal('precio_compra_total', 12, 2);
        $table->timestamp('fecha_ingreso')->useCurrent();
        $table->date('fecha_vencimiento')->nullable();
        $table->foreignId('id_empleado_registro')->nullable()->constrained('empleados', 'id_empleado')->onDelete('set null');
        $table->text('observaciones')->nullable();
        $table->enum('estado', ['Activo', 'Agotado', 'Vencido'])->default('Activo');
        
        // Índices
        $table->index('id_sucursal', 'idx_sucursal');
        $table->index('id_producto', 'idx_producto');
        $table->index('fecha_ingreso', 'idx_fecha_ingreso');
        $table->index('estado', 'idx_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
