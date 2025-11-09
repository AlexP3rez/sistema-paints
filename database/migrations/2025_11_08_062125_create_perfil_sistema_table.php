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
    Schema::create('perfil_sistema', function (Blueprint $table) {
        $table->id('id_perfil');
        $table->string('nombre', 50)->unique();
        $table->string('descripcion', 200)->nullable();
        $table->integer('nivel_acceso')->default(1);
        $table->boolean('estado')->default(true);
        
        // Índices
        $table->index('nombre', 'idx_nombre');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_sistema');
    }
};
