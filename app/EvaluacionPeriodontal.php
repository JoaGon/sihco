<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class EvaluacionPeriodontal extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_evaluacion_periodontal' ,
          'color' ,
          'consistencia' ,
          'contorno',
          'textura',
          'grosor',
          'ancho_encia',
          'posicion',
          'sangramiento',
          'cepillado',
          'espontaneo' ,
          'otro' ,
          'haliatosis',
          'sensibilidad',
          'fecha',
          'ultimo_usuario',
          'profesor',
          'paciente_id',
          'consulta_id',
          'validar' ,
          'fecha_validacion',

    ];
    protected $primaryKey = 'id_evaluacion_periodontal';
    protected $table      = 'evaluacion_periodontal';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
