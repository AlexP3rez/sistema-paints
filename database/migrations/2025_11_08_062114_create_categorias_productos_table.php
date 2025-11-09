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
    Schema::create('categorias_productos', function (Blueprint $table) {
        $table->id('id_categoria');
        $table->string('nombre', 50);
        $table->string('descripcion', 200)->nullable();
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
        Schema::dropIfExists('categorias_productos');
    }
};
