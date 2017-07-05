<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Paciente extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id_paciente',
          'fecha_ingreso',
          'ci',
          'ultimo_usuario',
          'nro_historia',
          'grupo_sanguineo',
          'familiar_cercano',
          'parentesco',
          'direccion_familiar',
          'telefono_familiar',
          'nivel_educacional',
          'lee_escribe',
          'zona_residencia',
          'convive',
          'situacion_laboral',
          'lugar_nacimiento' ,
          'ocupacion',
          'estado_civil',
          'persona_id',

    ];

    protected $primaryKey = 'id_paciente';
    protected $table      = 'paciente';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
