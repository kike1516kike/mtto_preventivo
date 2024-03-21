<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periferico extends Model
{
    use HasFactory;

    protected $table = 'perifericos';

    protected $primaryKey = 'id_periferico';

    protected $fillable = [
        'tipo_periferico',
        'id_perfil',
    ];
}
