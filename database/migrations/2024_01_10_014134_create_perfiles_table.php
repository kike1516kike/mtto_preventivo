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
        Schema::create('perfiles', function (Blueprint $table) {
            $table->increments('id_perfil');
            $table->integer('cod_empleado_perfil')->nullable();
            $table->string('nombres_perfil', 100)->nullable();
            $table->string('apellidos_perfil', 100)->nullable();
            $table->string('cargo_perfil', 100)->nullable();
            $table->boolean('estado_perfil')->nullable();
            $table->string('observacion_perfil')->nullable();
            
            $table->datetime('fecha_registro')->nullable();
            $table->string('usuario_registro', 50)->nullable();
            $table->boolean('eliminado')->nullable();
            $table->string('usuario_eliminado', 50)->nullable();
            $table->datetime('fecha_modifica')->nullable();
            $table->string('usuario_modifica', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
