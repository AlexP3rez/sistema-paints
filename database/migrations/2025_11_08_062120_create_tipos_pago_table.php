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
    Schema::create('tipos_pago', function (Blueprint $table) {
        $table->id('id_tipo_pago');
        $table->string('nombre', 20);
        $table->string('descripcion', 100)->nullable();
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
        Schema::dropIfExists('tipos_pago');
    }
};
