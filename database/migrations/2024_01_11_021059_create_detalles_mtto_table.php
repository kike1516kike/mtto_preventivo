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
        Schema::create('detalles_mtto', function (Blueprint $table) {
            $table->increments('id_detalle_mtto');
            $table->string('criterio_detalle_mtto');
            $table->boolean('software_detalle_mtto');
            $table->boolean('selecciona_criterio_mtto');

            $table->datetime('fecha_registro');
            $table->string('usuario_registro', 50);
            $table->boolean('eliminado');
            $table->string('usuario_eliminado', 50);
            $table->datetime('fecha_modifica');
            $table->string('usuario_modifica', 50);

            $table->unsignedInteger('id_mantenimiento');
            $table->foreign('id_mantenimiento')->references('id_mantenimiento')->on('mantenimientos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_mtto');
    }
};
