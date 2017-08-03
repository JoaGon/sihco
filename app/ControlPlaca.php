<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ControlPlaca extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id_control_placa',
          'diente_presentes' ,
          'cantidad_dientes_placa',
          'fecha',
          'ultimo_usuario',
          'paciente_id',
          'consulta_id',
          'profesor',
          'validar' ,
          'fecha_validacion',
    ];
    protected $primaryKey = 'id_control_placa';
    protected $table      = 'control_placa';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
