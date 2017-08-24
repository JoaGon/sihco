<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pronostico extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_pronostico',
      'fecha',
      'consulta_id',
      'paciente_id',
      'validar',
      'fecha_validacion',
      'profesor',
      'ultimo_usuario',
      'especialidad',
      'pronostico'

    ];
    protected $primaryKey = 'id_pronostico';
    protected $table      = 'pronostico';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
