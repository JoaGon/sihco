<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Citas extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_cita',
        'nro_historia',
        'paciente_id',
        'especialidad' ,
        'clinica' ,
        'observacion',
        'ultimo_usuario' ,
        'profesor',
        'validar',
        'fecha_validacion',
        'estatus',
        'motivo',
        'fecha_cita',
        'hora'


    ];
    protected $primaryKey = 'id_cita';
    protected $table      = 'citas';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
