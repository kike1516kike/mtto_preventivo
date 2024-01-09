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
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id_equipo');
            $table->string('nombre_equipo', 75);
            $table->datetime('fecha_ingreso_equipo');
            $table->string('cod_act_fijo_equipo', 20);
            $table->string('tipo_equipo', 25);
            $table->string('modelo_equipo', 100);
            $table->string('sitema_operativo_equipo', 100);
            $table->intenger('ram_equipo');
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
            $table->unsignedInteger('id_marca');
            $table->foreign('id_marca')->references('id_marca')->on('marcas')->onDelete('cascade');
            $table->unsignedInteger('id_ubicacion');
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones')->onDelete('cascade');
            $table->unsignedInteger('id_office');
            $table->foreign('id_offcie')->references('id_offcie')->on('offices')->onDelete('cascade');
            $table->unsignedInteger('id_evento');
            $table->foreign('id_evento')->references('id_evento')->on('eventos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
