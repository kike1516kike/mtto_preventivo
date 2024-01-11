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
        Schema::create('credenciales', function (Blueprint $table) {
            $table->increments('id_credencial');
            $table->string('usuario_credencial');
            $table->string('password_credencial');

            $table->datetime('fecha_registro');
            $table->string('usuario_registro', 50);
            $table->boolean('eliminado');
            $table->string('usuario_eliminado', 50);
            $table->datetime('fecha_modifica');
            $table->string('usuario_modifica', 50);

            $table->unsignedInteger('id_perfil');
            $table->foreign('id_perfil')->references('id_perfil')->on('perfiles')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credenciales');
    }
};
