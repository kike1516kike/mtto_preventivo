<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipos';

    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'nombre_equipo',
         'fecha_ingreso_equipo',
         'cod_act_fijo_equipo',
         'tipo_equipo',
         'id_marca',
         'modelo_equipo',
         'sistema_operativo_equipo',
         'ram_equipo',
         'procesador_equipo',
         'disco_equipo',
         'estado_equipo',
         'ip_equipo',
         'id_office',
         'id_ubicacion',
         'id_perfil',
    ];
}
