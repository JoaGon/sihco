<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ExamenComplementario extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_examen_complementario',
      'resumen',
      'fecha',
      'ultimo_usuario',
      'paciente_id',
      'consulta_id' ,
      'profesor',
      'validar',
      'fecha_validacion',

    ];
    protected $primaryKey = 'id_examen_complementario';
    protected $table      = 'examen_complementario';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
