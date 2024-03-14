<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voffice extends Model
{
    use HasFactory;

    protected $table = 'voffices';
    protected $primaryKey = 'id_office';

    protected $fillable = [
        'nombre_office'
    ];
}
