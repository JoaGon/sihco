<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ExamenOclusion extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
           'id_oclusion',
          'fremilus' ,
          'normoclusion' ,
          'clase_dos' ,
          'clase_tres' ,
          'abierta_anterior' ,
          'abierta_posterior_derecha' ,
          'abierta_posterior_izquierda' ,
          'a_tope_anterior' ,
          'a_tope_posterior_derecha' ,
          'a_tope_posterior_izquierda' ,
          'cruzada_anterior' ,
          'cruzada_posterior_derecha' ,
          'cruzada_posterior_izquierda' ,
          'sobremordida_horizontal' ,
          'sobremordida_vertical' ,
          'desviacion_derecha' ,
          'desviacion_izquierda' ,
          'desviacion_ninguna',
          'dimension_normal' ,
          'dimension_aumentada' ,
          'dimension_disminuida' ,
          'dvr' ,
          'dvr' ,
          'total' ,
          'deslizamiento_anterior' ,
          'deslizamiento_derecha' ,
          'deslizamiento_izquierda' ,
          'funcion_grupo' ,
          'guia_canina' ,
          'guia_incisiva' ,
          'maxima_apertura' ,
          'maxima_lat_derecha' ,
          'maxima_lat_izquierda' ,
          'maxima_protrusion' ,
          'max_apertura' ,
          'max_lat_derecha' ,
          'max_lat_izquierda' ,
          'max_protrusion' ,
          'fecha' ,
          'consulta_id' ,
          'paciente_id' ,
          'profesor' ,
          'validar' ,
          'fecha_validacion',
          'ultimo_usuario' ,
          'contacto_en_maxima' ,
          'interferencia_derecha' ,
          'interferencia_izquierda' ,
          'interferencia_protrusivo' ,
          'contacto_prematuro' ,

    ];
    protected $primaryKey = 'id_oclusion';
    protected $table      = 'examen_oclusion';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
