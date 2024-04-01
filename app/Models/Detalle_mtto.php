<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_mtto extends Model
{

    use HasFactory;

    protected $table = 'detalles_mtto';

    protected $primaryKey = 'id_detalle_mtto';

    protected $fillable = [
        'criterio_detalle_mtto',
        'software_detalle_mtto',
        'seleciona_criterio_mtto',
        'id_mantenimiento',
    ];
}
