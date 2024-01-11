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
        Schema::create('equipos_mtto', function (Blueprint $table) {
            $table->increments('id_equipo_mtto');
            $table->string('nombre_equipo_mtto', 75);
            $table->datetime('fecha_ingreso_equipo_mtto');
            $table->string('cod_act_fijo_equipo_mtto', 20);
            $table->string('ubicacion_equipo', 100);
            $table->string('tipo_equipo_mtto', 25);
            $table->string('marca_equipo_mtto', 100);
            $table->string('modelo_equipo_mtto', 100);
            $table->string('sitema_operativo_equipo_mtto', 100);
            $table->string('voffice_equipo_mtto');
            $table->integer('ram_equipo_mtto');
            $table->string('procesador_equipo_mtto', 100);
            $table->string('disco_equipo_mtto', 100);
            $table->boolean('estado_equipo_mtto');
            $table->integer('ip_equipo_mtto');
            $table->string('observacion_equipo_mtto');

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
        Schema::dropIfExists('equipos_mtto');
    }
};
