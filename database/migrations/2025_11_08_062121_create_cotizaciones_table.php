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
    Schema::create('cotizaciones', function (Blueprint $table) {
        $table->id('id_cotizacion');
        $table->string('numero_cotizacion', 20)->unique();
        $table->timestamp('fecha_cotizacion')->useCurrent();
        $table->date('fecha_vencimiento');
        $table->foreignId('id_cliente')->constrained('clientes', 'id_cliente');
        $table->foreignId('id_empleado')->constrained('empleados', 'id_empleado');
        $table->foreignId('id_sucursal')->constrained('sucursales', 'id_sucursal');
        $table->decimal('subtotal', 12, 2);
        $table->decimal('descuento_total', 12, 2)->default(0.00);
        $table->decimal('impuesto', 12, 2)->default(0.00);
        $table->decimal('total', 12, 2);
        $table->enum('estado', ['Pendiente', 'Aprobada', 'Rechazada', 'Facturada'])->default('Pendiente');
        $table->text('observaciones')->nullable();
        
        // Índices
        $table->index('numero_cotizacion', 'idx_numero');
        $table->index('fecha_cotizacion', 'idx_fecha');
        $table->index('id_cliente', 'idx_cliente');
        $table->index('estado', 'idx_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
