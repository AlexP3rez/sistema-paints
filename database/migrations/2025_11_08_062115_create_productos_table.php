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
    Schema::create('productos', function (Blueprint $table) {
        $table->id('id_producto');
        $table->string('codigo', 20)->unique();
        $table->string('nombre', 100);
        $table->text('descripcion')->nullable();
        $table->decimal('porcentaje_descuento', 5, 2)->default(0.00);
        $table->integer('stock_minimo')->default(10);
        $table->foreignId('id_categoria')->constrained('categorias_productos', 'id_categoria');
        $table->foreignId('id_unidad')->constrained('unidades_medida', 'id_unidad');
        $table->foreignId('id_color')->nullable()->constrained('colores', 'id_color');
        $table->integer('tiempo_duracion_anos')->nullable();
        $table->decimal('extension_cobertura_m2', 8, 2)->nullable();
        $table->timestamp('fecha_creacion')->useCurrent();
        $table->boolean('estado')->default(true);
        
        // Índices
        $table->index('codigo', 'idx_codigo');
        $table->index('nombre', 'idx_nombre');
        $table->index('id_categoria', 'idx_categoria');
        $table->index('estado', 'idx_estado');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
