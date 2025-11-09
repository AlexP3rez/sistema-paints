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
    Schema::create('configuracion_sistema', function (Blueprint $table) {
        $table->id('id_config');
        $table->string('clave', 50)->unique();
        $table->string('valor', 200);
        $table->string('descripcion', 200)->nullable();
        $table->timestamp('fecha_modificacion')->useCurrent()->useCurrentOnUpdate();
        
        // Índices
        $table->index('clave', 'idx_clave');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracion_sistema');
    }
};
