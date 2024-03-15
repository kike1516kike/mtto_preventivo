<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';
    protected $primaryKey = 'id_perfil';

    protected $fillable = [
        'cod_empleado',
        'nombres_perfil',
        'apellidos_perfil',
        'cargo_perfil',
        'estado_perfil',
        'observacion_perfil',
    ];
}
