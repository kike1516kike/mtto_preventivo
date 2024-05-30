<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;
    protected $table = 'observaciones';

    protected $primaryKey = 'id_observacion';

    protected $fillable = [
        'descripcion_evento',
        'id_periferico',
    ];
}
