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
    Schema::create('clientes', function (Blueprint $table) {
        $table->id('id_cliente');
        $table->string('nombres', 100);
        $table->string('apellidos', 100);
        $table->string('nit', 15)->nullable();
        $table->string('dpi', 15)->nullable();
        $table->string('telefono', 15)->nullable();
        $table->string('email', 100)->unique()->nullable();
        $table->string('direccion', 200)->nullable();
        $table->timestamp('fecha_registro')->useCurrent();
        $table->boolean('acepta_promociones')->default(false);
        $table->boolean('estado')->default(true);
        
        // Índices
        $table->index('email', 'idx_email');
        $table->index('nit', 'idx_nit');
        $table->index('estado', 'idx_estado');
        $table->index('nit', 'idx_clientes_nit');
        $table->index(['nombres', 'apellidos'], 'idx_clientes_nombres');
        $table->index('estado', 'idx_clientes_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
