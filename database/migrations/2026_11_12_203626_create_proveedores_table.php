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
           $table->id();
            $table->string('rtn', 14)->unique();
            $table->string('empresa');
            $table->string('contacto');
            $table->string('telefono', 8);
            $table->enum('categoria', ['Farmacos', 'Material Quirurgico', 'Equipos']);
            $table->decimal('limite_credito', 12, 2)->default(0.00);
            $table->enum('dias_credito', ['15', '30', '45', '60']);
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamp('fecha_registro')->nullable();
            $table->timestamps();
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
