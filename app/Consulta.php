<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Consulta extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'paciente_id',
        'nro_historia',
        'motivo_consulta' ,
        'enfermedad_actual' ,
        'fecha_consulta',
        'ultimo_usuario' ,
        'profesor',
        'validar',
        'fecha_validacion'

    ];
    protected $primaryKey = 'id';
    protected $table      = 'consulta';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
