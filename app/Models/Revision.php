<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $table ='revisiones';

    protected $primaryKey = 'id_revision';

    protected $fillable = [
        'id_revision',
        'trimestre_revision',
        'fecha_creacion',
        'cod_jefe_firma',
        'fecha_firma',
        'estado_revision',

    ];
}
