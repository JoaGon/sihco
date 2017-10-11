<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tratamientos extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_tratamientos',
      'fecha',
      'consulta_id',
      'paciente_id',
      'validar',
      'fecha_validacion',
      'profesor',
      'ultimo_usuario',
      'especialidad',
      'fase_emergencia' ,
      'fase_sistemica' ,
      'fase_inicial' ,
      'fase_correctiva' ,
      't_periodontal' ,
      't_endodontico' ,
      't_restaurativo' ,
      't_quirurgico' ,
      't_protesico' ,
      'fase_mantenimiento',

    ];
    protected $primaryKey = 'id_tratamientos';
    protected $table      = 'tratamientos';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
