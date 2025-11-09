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
    Schema::create('facturas', function (Blueprint $table) {
        $table->id('id_factura');
        $table->integer('numero_factura');
        $table->foreignId('id_serie')->constrained('series_facturas', 'id_serie');
        $table->timestamp('fecha_emision')->useCurrent();
        $table->foreignId('id_cliente')->constrained('clientes', 'id_cliente');
        $table->foreignId('id_empleado')->constrained('empleados', 'id_empleado');
        $table->foreignId('id_sucursal')->constrained('sucursales', 'id_sucursal');
        $table->decimal('subtotal', 12, 2);
        $table->decimal('descuento_total', 12, 2)->default(0.00);
        $table->decimal('impuesto', 12, 2)->default(0.00);
        $table->decimal('total', 12, 2);
        $table->enum('estado', ['Activa', 'Anulada'])->default('Activa');
        $table->timestamp('fecha_anulacion')->nullable();
        $table->string('motivo_anulacion', 200)->nullable();
        
        // Índices y restricciones únicas
        $table->unique(['numero_factura', 'id_serie'], 'uk_factura_serie');
        $table->index('fecha_emision', 'idx_fecha');
        $table->index('id_cliente', 'idx_cliente');
        $table->index('id_empleado', 'idx_empleado');
        $table->index('estado', 'idx_estado');
        $table->index('fecha_emision', 'idx_facturas_fecha');
        $table->index('id_cliente', 'idx_facturas_cliente');
        $table->index('id_empleado', 'idx_facturas_empleado');
        $table->index('estado', 'idx_facturas_estado');
        $table->index('numero_factura', 'idx_facturas_numero');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
