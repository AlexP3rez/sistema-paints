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
    Schema::create('empleados', function (Blueprint $table) {
        $table->id('id_empleado');
        $table->string('nombres', 100);
        $table->string('apellidos', 100);
        $table->string('dpi', 15)->unique();
        $table->string('telefono', 15)->nullable();
        $table->string('email', 100)->nullable();
        $table->date('fecha_contratacion');
        $table->decimal('salario', 10, 2)->nullable();
        $table->foreignId('id_sucursal')->constrained('sucursales', 'id_sucursal');
        $table->foreignId('id_usuario')->nullable()->unique()->constrained('usuarios', 'id_usuario');
        $table->boolean('estado')->default(true);
        
        // Índices
        $table->index('dpi', 'idx_dpi');
        $table->index('id_sucursal', 'idx_sucursal');
        $table->index('estado', 'idx_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
