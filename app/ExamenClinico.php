<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ExamenClinico extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_examen_clinico',
        'piel',
        'cabeza' ,
        'cara',
        'cuello',
        'labios' ,
        'carrillos' ,
        'mucosa_labial_bucal',
        'lengua' ,
        'piso_boca' ,
        'paladar_duro_blando',
        'orofaringe' ,
        'pigmentacion',
        'viscosidad',
        'observaciones',
        'fecha',
        'ultimo_usuario',
        'paciente_id',
        'consulta_id',
        'profesor' ,
        'validar' ,
        'fecha_validacion',

    ];
    protected $primaryKey = 'id_examen_clinico';
    protected $table      = 'examen_clinico';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
