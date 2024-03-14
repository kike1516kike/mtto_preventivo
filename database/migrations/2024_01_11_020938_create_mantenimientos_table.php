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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id_mantenimiento');
            $table->datetime('fecha_mantenimiento')->nullable();
            $table->string('trimestre_mantenimiento', 75)->nullable();
            $table->integer('cod_empleado_mtto')->nullable();
            $table->string('nombres_mtto', 100)->nullable();
            $table->string('apellidos_mtto', 100)->nullable();
            $table->string('cargo_mtto', 100)->nullable();
            $table->string('observacion_mtto')->nullable();
            $table->integer('cod_usuario_firma')->nullable();
            $table->string('nombre_usuario_firma', 100)->nullable();
            $table->string('password_usuario_firma', 100)->nullable();
            $table->integer('cod_jefe_firma')->nullable();
            $table->string('nombre_jefe_firma', 100)->nullable();
            $table->string('password_jefe_firma', 100)->nullable();
            $table->integer('cod_auxi_firma')->nullable();
            $table->string('nombre_auxi_firma', 100)->nullable();
            $table->string('password_auxi_firma', 100)->nullable();
            $table->boolean('finalizado_mtto')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
