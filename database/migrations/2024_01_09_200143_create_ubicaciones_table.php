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
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->increments('id_ubicacion');
            $table->string('nombre_ubicacion', 50)->nullable();

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
        Schema::dropIfExists('ubicaciones');
    }
};
