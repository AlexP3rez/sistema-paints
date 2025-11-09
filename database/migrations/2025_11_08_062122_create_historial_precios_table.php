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
    Schema::create('historial_precios', function (Blueprint $table) {
        $table->id('id_historial_precio');
        $table->foreignId('id_producto')->constrained('productos', 'id_producto');
        $table->decimal('precio_venta', 10, 2);
        $table->decimal('precio_compra', 10, 2)->nullable();
        $table->timestamp('fecha_inicio')->useCurrent();
        $table->timestamp('fecha_fin')->nullable();
        $table->foreignId('id_empleado_modifico')->nullable()->constrained('empleados', 'id_empleado');
        $table->string('motivo_cambio', 200)->nullable();
        $table->enum('estado_precio', ['Activo', 'Inactivo'])->default('Activo');
        
        // Índices
        $table->index('id_producto', 'idx_producto');
        $table->index('estado_precio', 'idx_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_precios');
    }
};
