<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedades_patologicas extends Model
{
    protected $fillable = [
        'id_enfermedad_patologica',
        'enfermedad',
        'valor_id',
        'ultimo_usuario',

    ];
    protected $primaryKey = 'id_enfermedad_patologica';
    protected $table      = 'enfermedades_patologicas';
    public $timestamps    = true;
    
}
