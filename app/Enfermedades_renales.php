<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedades_renales extends Model
{
    protected $fillable = [
        'id_enfermedad_renal',
        'enfermedad',
        'ultimo_usuario',

    ];
    protected $primaryKey = 'id_enfermedad_renal';
    protected $table      = 'enfermedades_renales';
    public $timestamps    = true;
    
}
