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
        Schema::create('marcas', function (Blueprint $table) {
            $table->increments('id_marca');
            $table->string('nombre_marca', 25);

            $table->datetime('fecha_registro');
            $table->string('usuario_registro', 50);
            $table->boolean('eliminado');
            $table->string('usuario_eliminado', 50);
            $table->datetime('fecha_modifica');
            $table->string('usuario_modifica', 50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marcas');
    }
};
