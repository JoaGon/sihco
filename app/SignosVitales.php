<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SignosVitales extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id_signo_vital',
          'presion_sanguinea',
          'pulso',
          'temperatura',
          'frecuencia_respiratoria',
          'validar',
          'consulta_id',
          'paciente_id',
          'ultimo_usuario',
          'profesor',
          'fecha',
          'fecha_validacion',
    ];
    protected $primaryKey = 'id_signo_vital';
    protected $table      = 'signos_vitales';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
