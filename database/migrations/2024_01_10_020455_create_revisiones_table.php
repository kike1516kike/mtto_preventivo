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
        Schema::create('revisiones', function (Blueprint $table) {
            $table->increments('id_revision');
            $table->string('trimestre_revision', 75)->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->integer('cod_jefe_firma')->nullable();
            $table->date('fecha_firma')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};

