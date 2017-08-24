<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Diagnosticos extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_diagnosticos',
      'fecha',
      'consulta_id',
      'paciente_id',
      'validar',
      'fecha_validacion',
      'profesor',
      'ultimo_usuario',
      'especialidad',
      'tipo'

    ];
    protected $primaryKey = 'id_diagnosticos';
    protected $table      = 'diagnosticos';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
