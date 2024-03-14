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
            $table->string('nombre_equipo_mtto', 75)->nullable();
            $table->datetime('fecha_ingreso_equipo_mtto')->nullable();
            $table->string('cod_act_fijo_equipo_mtto', 20)->nullable();
            $table->string('ubicacion_equipo', 100)->nullable();
            $table->string('tipo_equipo_mtto', 25)->nullable();
            $table->string('marca_equipo_mtto', 100)->nullable();
            $table->string('modelo_equipo_mtto', 100)->nullable();
            $table->string('sitema_operativo_equipo_mtto', 100)->nullable();
            $table->string('voffice_equipo_mtto')->nullable();
            $table->integer('ram_equipo_mtto')->nullable();
            $table->string('procesador_equipo_mtto', 100)->nullable();
            $table->string('disco_equipo_mtto', 100)->nullable();
            $table->boolean('estado_equipo_mtto')->nullable();
            $table->integer('ip_equipo_mtto')->nullable();
            $table->string('observacion_equipo_mtto')->nullable();

            $table->datetime('fecha_registro')->nullable();
            $table->string('usuario_registro', 50)->nullable();
            $table->boolean('eliminado')->nullable();
            $table->string('usuario_eliminado', 50)->nullable();
            $table->datetime('fecha_modifica')->nullable();
            $table->string('usuario_modifica', 50)->nullable()->nullable();

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
