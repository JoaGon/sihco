<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ResumenOdontologico extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_resumen_historia_odontologica',
        'fecha',
        'consulta_id',
        'paciente_id',
        'ultimo_usuario',
        'validar',
        'profesor',
        'rho_1',
    ];
    protected $primaryKey = 'id_resumen_historia_odontologica';
    protected $table      = 'resumen_historia_odontologica';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
