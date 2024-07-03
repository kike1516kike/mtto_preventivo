<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->boolean('estado_revision')->nullable();
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER tr_creacion_mantenimientos
        ON Revisiones
        AFTER INSERT
        AS
        BEGIN

            INSERT INTO mantenimientos (fecha_mantenimiento, trimestre_mantenimiento, cod_empleado_mtto, id_revision)
            SELECT
                GETDATE() AS fecha_mantenimiento,
                i.trimestre_revision AS trimestre_mantenimiento,
                p.cod_empleado,
                i.id_revision
            FROM
                inserted i
            CROSS JOIN
                perfiles p
            WHERE
                i.trimestre_revision IS NOT NULL;
        END
    ');

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};
