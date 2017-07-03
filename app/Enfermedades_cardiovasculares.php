<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedades_cardiovasculares extends Model
{
    protected $fillable = [
        'id_enfermedad_cardiovascular',
        'enfermedad',
        'ultimo_usuario',

    ];
    protected $primaryKey = 'id_enfermedad_cardiovascular';
    protected $table      = 'enfermedades_cardiovasculares';
}
