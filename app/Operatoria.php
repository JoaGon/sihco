<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Operatoria extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cavidades' ,
          'lesiones_radiograficas' ,
          'lesiones_mancha' ,
          'restauraciones' ,
          'recuento' ,
          'abundante' ,
          'bocadillos' ,
          'fosas' ,
          'drogas' ,
          'flujo_salival' ,
          'factores_reduccion' ,
          'raices_expuestas' ,
          'aparatologia',
          'vive_trabaja',
          'dentrifrico_una' ,
          'dentrifrico_dos' ,
          'enjuague_bucal' ,
          'dentrifico_fluorado',
          'barniz',
          'clorhexidina',
          'goma_mascar',
          'dentrifrico_de_calcio' ,
          'adecuado_flujo' ,
          'flujo_salival_ml' ,
          'riesgo_caries' ,
          'consulta_id' ,
          'validar' ,
          'ultimo_usuario' ,
          'profesor' ,
          'paciente_id' ,
          'fecha',
          'id_operatoria',
          'fecha_validacion',
    ];
    protected $primaryKey = 'id_operatoria';
    protected $table      = 'operatoria';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
