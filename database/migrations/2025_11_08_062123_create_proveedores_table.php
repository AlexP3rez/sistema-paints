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
    Schema::create('proveedores', function (Blueprint $table) {
        $table->id('id_proveedor');
        $table->string('nombre', 100);
        $table->string('contacto', 100)->nullable();
        $table->string('telefono', 15)->nullable();
        $table->string('email', 100)->nullable();
        $table->string('direccion', 200)->nullable();
        $table->boolean('estado')->default(true);
        
        // Índices
        $table->index('nombre', 'idx_nombre');
        $table->index('estado', 'idx_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
