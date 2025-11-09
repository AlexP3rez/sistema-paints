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
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id('id_usuario');
        $table->string('username', 50)->unique();
        $table->string('password_hash', 255);
        $table->string('salt', 50);
        $table->enum('perfil_usuario', ['Digitador', 'Cajero', 'Gerente']);
        $table->boolean('estado')->default(true);
        $table->timestamp('fecha_creacion')->useCurrent();
        $table->timestamp('ultimo_acceso')->nullable();
        $table->integer('intentos_login')->default(0);
        
        // Índices
        $table->index('username', 'idx_username');
        $table->index('perfil_usuario', 'idx_perfil');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
