<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Parciales extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'clasificacion_kennedy' ,
            'posicion_h' ,
            'posicion_a' ,
            'posicion_p' ,
            'posicion_ld' ,
            'posicion_li' ,
            'dientes_pilares' ,
            'localizacion_retenciones' ,
            'retenedores_directos' ,
            'apoyos' ,
            'retenedores_indirectos' ,
            'planos_guias' ,
            'c_mayor' ,
            'bases' ,
            'imagen' ,
            'observaciones' ,
            'consulta_id' ,
            'validar' ,
            'ultimo_usuario' ,
            'profesor' ,
            'paciente_id' ,
            'fecha',
            'orientacion' ,
            'id_parciales',
    ];
    protected $primaryKey = 'id_parciales';
    protected $table      = 'parciales';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
