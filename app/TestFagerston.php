<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TestFagerston extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id_test',
          'primer_cigarrillo',
          'fumar_en_lugares',
          'molesta_mas',
          'cigarro_por_dia',
          'fuma_frecuencia',
          'fuma_enfermo',
          'total',
          'validar',
          'profesor',
          'ultimo_usuario',
          'fecha',
          'paciente_id',
          'consulta_id',
          'fecha_validacion',
    ];
    protected $primaryKey = 'id_test';
    protected $table      = 'test_fagerstrom';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
