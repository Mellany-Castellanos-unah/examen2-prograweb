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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique(); 
            $table->string('nombre');
            $table->enum('categoria', ['Antibioticos', 'Analgesicos', 'Sueros', 'Material Quirurgico', 'Vitaminas']);
            $table->decimal('precio', 10, 2);
            $table->decimal('costo', 10, 2);
            $table->integer('inventario');
            $table->string('imagen')->nullable();
            $table->string('laboratorio');
            $table->date('fecha_vencimiento');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('numero_lote');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
