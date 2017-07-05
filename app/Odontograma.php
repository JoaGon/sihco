<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Odontograma extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_odontograma',
        'paciente_id',
        'nro_historia',
        'consulta_id',
        'elemento',
        'posicion_y',
        'posicion_x',
        'ultimo_usuario',
        'fecha_validacion',
        'validar',
        'profesor',
        'fecha',

    ];
    protected $primaryKey = 'id_odontograma';
    protected $table      = 'odontograma';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
