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
        Schema::create('criterios', function (Blueprint $table) {
            $table->increments('id_criterio');
            $table->string('nombre_criterio')->nullable();
            $table->boolean('software_criterio')->nullable();

            $table->timestamps();
        });

        DB::table('criterios')->insert([
            ['nombre_criterio' => 'Limpieza de archivos temporales', 'software_criterio' => 'TRUE'],
            ['nombre_criterio' => 'Disco Desfragmentado', 'software_criterio' => 'TRUE'],
            ['nombre_criterio' => 'Presencia de virus', 'software_criterio' => 'TRUE'],
            ['nombre_criterio' => 'Apps Instaladas', 'software_criterio' => 'TRUE'],
            ['nombre_criterio' => 'Limpieza de Equipo', 'software_criterio' => 'FALSE'],
            ['nombre_criterio' => 'Limpieza de impresora', 'software_criterio' => 'FALSE'],
            ['nombre_criterio' => 'Limpieza de escanner', 'software_criterio' => 'FALSE'],

            // Agrega más registros según sea necesario
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterios');
    }
};
