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
    Schema::create('permisos_perfil', function (Blueprint $table) {
        $table->id('id_permiso');
        $table->foreignId('id_perfil')->constrained('perfil_sistema', 'id_perfil');
        $table->string('modulo', 50);
        $table->boolean('puede_crear')->default(false);
        $table->boolean('puede_leer')->default(true);
        $table->boolean('puede_actualizar')->default(false);
        $table->boolean('puede_eliminar')->default(false);
        $table->boolean('puede_aprobar')->default(false);
        
        // Índices y restricciones únicas
        $table->unique(['id_perfil', 'modulo'], 'uk_perfil_modulo');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos_perfil');
    }
};
