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
        Schema::create('perifericos_mtto', function (Blueprint $table) {
            $table->increments('id_periferico_mtto');
            $table->string('tipo_periferico_mtto', 100); 

            $table->unsignedInteger('id_equipo_mtto');
            $table->foreign('id_equipo_mtto')->references('id_equipo_mtto')->on('equipos_mtto')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perifericos_mtto');
    }
};
