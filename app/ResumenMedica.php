<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ResumenMedica extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_resumen_historia_medica',
          'fecha',
          'consulta_id',
          'paciente_id',
          'ultimo_usuario',
          'validar',
          'profesor',
          'rhm_1',
          'fecha_validacion',
    ];
    protected $primaryKey = 'id_resumen_historia_medica';
    protected $table      = 'resumen_historia_medica';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
