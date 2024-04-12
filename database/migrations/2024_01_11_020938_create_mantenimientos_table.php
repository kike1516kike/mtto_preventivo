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
            $table->date('fecha_mantenimiento')->nullable();
            $table->string('trimestre_mantenimiento', 75)->nullable();
            $table->integer('cod_empleado_mtto')->nullable();
            $table->string('observacion_mtto')->nullable();
            $table->integer('cod_usuario_firma')->nullable();
            $table->integer('cod_auxi_firma')->nullable();
            $table->boolean('finalizado_mtto')->nullable();
            $table->date('fecha_finaliza')->nullable();

            $table->unsignedInteger('id_revision');
            $table->foreign('id_revision')->references('id_revision')->on('revisiones')->onDelete('cascade');


            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER [dbo].[mtto]
        ON [dbo].[mantenimientos]
        AFTER INSERT
        AS
        BEGIN
            INSERT INTO detalles_mtto (criterio_detalle_mtto, software_detalle_mtto, id_mantenimiento)
            SELECT
                criterios.nombre_criterio,
                criterios.software_criterio,
                inserted.id_mantenimiento as id_mantenimiento

            FROM
                criterios
            CROSS JOIN
                inserted;
        END
    ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar el trigger antes de eliminar la tabla
        DB::unprepared('DROP TRIGGER IF EXISTS nombre_del_trigger');

        Schema::dropIfExists('mantenimientos');
    }
};
