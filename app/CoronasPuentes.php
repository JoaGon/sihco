<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CoronasPuentes extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id_coronas' ,
          'tipo_corona' ,
          'material' ,
          'tipo_puente' ,
          'retenedores' ,
          'panticos',
          'dientes_pilares' ,
          'conectores',
          'material_puente' ,
          'fecha' ,
          'ultimo_usuario' ,
          'paciente_id' ,
          'consulta_id' ,
          'profesor' ,
          'validar' ,
          'fecha_validacion' ,

    ];
    protected $primaryKey = 'id_coronas';
    protected $table      = 'coronas_puentes';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
