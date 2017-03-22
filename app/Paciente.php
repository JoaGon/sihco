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
         'ocupacion',
         'fecha_ingreso',
         'ci',
         'lugar_nacimiento',
         'ultimo_usuario',
         'nro_historia',
         'grupo_sanguineo',
         'familiar_cercano',
         'parentesco',
         'telefono_familiar',
         'direccion_familiar',
         'nivel_educacional',
         'lee_escribe',
         'zona_residencia',
         'convive',
         'situacion_laboral',
         'estado_civil',
         'persona_id'

     ];

     protected $primaryKey='id_paciente';
     protected $table='paciente';



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
