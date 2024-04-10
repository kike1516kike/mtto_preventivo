<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos';

    protected $primaryKey = 'id_mantenimiento';

    protected $fillable = [
        'fecha_mantenimiento',
        'trimestre_mantenimiento',
        'cod_empleado_mtto',
        'nombres_mtto',
        'apellidos_mtto',
        'cargo_mtto',
        'observacion_mtto',
        'cod_usuario_firma',
        'cod_jefe_firma',
        'cod_auxi_firma',
        'finalizado_mtto',
        'fecha_finaliza',
    ];
}
