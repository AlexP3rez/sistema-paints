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
    Schema::create('medios_pago_factura', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_factura')->constrained('facturas', 'id_factura')->onDelete('cascade');
        $table->foreignId('id_tipo_pago')->constrained('tipos_pago', 'id_tipo_pago');
        $table->decimal('monto', 10, 2);
        $table->string('numero_referencia', 50)->nullable();
        $table->string('banco', 50)->nullable();
        $table->timestamp('fecha_pago')->useCurrent();
        
        // Índices
        $table->index('id_factura', 'idx_factura');
        $table->index('id_tipo_pago', 'idx_tipo_pago');
        $table->index('id_factura', 'idx_medios_pago_factura');
        $table->index('id_tipo_pago', 'idx_medios_pago_tipo');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medios_pago_factura');
    }
};
