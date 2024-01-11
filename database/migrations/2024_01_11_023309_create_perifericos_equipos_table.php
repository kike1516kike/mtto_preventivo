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
        Schema::create('perifericos_equipos', function (Blueprint $table) {
            $table->increments('id_periferico_equipo');

            $table->integer('id_periferico');
            $table->string('tipo_periferico', 100); 
           
            $table->integer('id_equipo');
            $table->string('nombre_equipo', 75);
            $table->datetime('fecha_ingreso_equipo');
            $table->string('cod_act_fijo_equipo', 20);
            $table->string('ubicacion_equipo', 100);
            $table->string('tipo_equipo', 25);
            $table->string('marca_equipo', 100);
            $table->string('modelo_equipo', 100);
            $table->string('sitema_operativo_equipo', 100);
            $table->string('voffice_equipo');
            $table->integer('ram_equipo');
            $table->string('procesador_equipo', 100);
            $table->string('disco_equipo', 100);
            $table->boolean('estado_equipo');
            $table->integer('ip_equipo');
            
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
        Schema::dropIfExists('perifericos_equipos');
    }
};
