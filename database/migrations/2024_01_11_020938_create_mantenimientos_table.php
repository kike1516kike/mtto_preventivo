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
            $table->date('fecha_finaliza')->nullable();

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
