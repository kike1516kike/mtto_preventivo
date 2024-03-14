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
            $table->string('criterio_detalle_mtto')->nullable();
            $table->boolean('software_detalle_mtto')->nullable();
            $table->boolean('selecciona_criterio_mtto')->nullable();

            $table->datetime('fecha_registro')->nullable();
            $table->string('usuario_registro', 50)->nullable();
            $table->boolean('eliminado')->nullable();
            $table->string('usuario_eliminado', 50)->nullable();
            $table->datetime('fecha_modifica')->nullable();
            $table->string('usuario_modifica', 50)->nullable();

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
