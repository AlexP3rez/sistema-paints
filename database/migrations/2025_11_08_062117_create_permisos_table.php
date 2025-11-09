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
    Schema::create('permisos', function (Blueprint $table) {
        $table->id('id_permiso');
        $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
        $table->string('modulo', 50);
        $table->boolean('puede_crear')->default(false);
        $table->boolean('puede_leer')->default(true);
        $table->boolean('puede_actualizar')->default(false);
        $table->boolean('puede_eliminar')->default(false);
        $table->boolean('puede_imprimir')->default(false);
        $table->boolean('puede_exportar')->default(false);
        $table->boolean('puede_aprobar')->default(false);
        $table->boolean('puede_anular')->default(false);
        $table->timestamp('fecha_asignacion')->useCurrent();
        $table->timestamp('fecha_modificacion')->useCurrent()->useCurrentOnUpdate();
        $table->boolean('estado')->default(true);
        
        // Índices y restricciones únicas
        $table->unique(['id_usuario', 'modulo'], 'uk_usuario_modulo');
        $table->index('id_usuario', 'idx_usuario');
        $table->index('modulo', 'idx_modulo');
        $table->index('estado', 'idx_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
