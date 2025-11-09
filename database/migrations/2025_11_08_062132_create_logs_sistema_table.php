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
    Schema::create('logs_sistema', function (Blueprint $table) {
        $table->id('id_log');
        $table->foreignId('id_usuario')->nullable()->constrained('usuarios', 'id_usuario');
        $table->string('modulo', 50)->nullable();
        $table->string('accion', 100);
        $table->string('tabla_afectada', 50)->nullable();
        $table->integer('id_registro')->nullable();
        $table->text('detalle')->nullable();
        $table->text('valores_anteriores')->nullable();
        $table->text('valores_nuevos')->nullable();
        $table->string('ip_origen', 45)->nullable();
        $table->string('navegador', 200)->nullable();
        $table->timestamp('fecha_accion')->useCurrent();
        
        // Índices
        $table->index('id_usuario', 'idx_usuario');
        $table->index('fecha_accion', 'idx_fecha');
        $table->index('accion', 'idx_accion');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs_sistema');
    }
};
