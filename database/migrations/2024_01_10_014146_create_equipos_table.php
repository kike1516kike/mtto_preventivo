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
            $table->string('nombre_equipo', 75)->nullable();
            $table->datetime('fecha_ingreso_equipo')->nullable();
            $table->string('cod_act_fijo_equipo', 20)->nullable();
            $table->string('tipo_equipo', 25)->nullable();
            $table->string('modelo_equipo', 100)->nullable();
            $table->string('sistema_operativo_equipo', 100)->nullable();
            $table->integer('ram_equipo')->nullable();
            $table->string('procesador_equipo', 100)->nullable();
            $table->string('disco_equipo', 100)->nullable();
            $table->boolean('estado_equipo')->nullable();
            $table->integer('ip_equipo')->nullable();
            $table->integer('id_evento')->nullable();

            $table->datetime('fecha_registro')->nullable();
            $table->string('usuario_registro', 50)->nullable();
            $table->boolean('eliminado')->nullable();
            $table->string('usuario_eliminado', 50)->nullable();
            $table->datetime('fecha_modifica')->nullable();
            $table->string('usuario_modifica', 50)->nullable();

            $table->unsignedInteger('id_marca')->nullable();;
            $table->foreign('id_marca')->references('id_marca')->on('marcas')->onDelete('cascade');
            $table->unsignedInteger('id_ubicacion')->nullable();;
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones')->onDelete('cascade');
            $table->unsignedInteger('id_office')->nullable();;
            $table->foreign('id_office')->references('id_office')->on('voffices')->onDelete('cascade');
            $table->unsignedInteger('id_perfil')->nullable();;
            $table->foreign('id_perfil')->references('id_perfil')->on('perfiles')->onDelete('cascade');

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
