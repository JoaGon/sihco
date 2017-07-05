<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class DiagramaRiesgo extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id_diagrama_riesgo' ,
          'bop' ,
          'pd' ,
          'tooth' ,
          'bl_age' ,
          'sys_age' ,
          'envir' ,
          'paciente_id' ,
          'consulta_id' ,
          'ultimo_usuario' ,
          'validar' ,
          'profesor' ,
          'fecha' ,
          'fecha_validacion',

    ];
    protected $primaryKey = 'id_diagrama_riesgo';
    protected $table      = 'diagrama_riesgo';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
