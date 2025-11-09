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
    Schema::create('unidades_medida', function (Blueprint $table) {
        $table->id('id_unidad');
        $table->string('nombre', 20);
        $table->string('abreviatura', 10);
        $table->decimal('factor_conversion', 10, 6)->default(1.000000);
        
        // Índices
        $table->index('nombre', 'idx_nombre');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades_medida');
    }
};
