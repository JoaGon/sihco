<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ExamenMuscular extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'temporal_posterio_izq',
      'temporal_posterio_der',
      'temporar_medio_der',
      'temporar_medio_izq',
      'temporal_anterior_der',
      'temporal_anterior_izq',
      'origen_masetero_der',
      'origen_masetero_izq',
      'cuerpo_masetero_der',
      'cuerpo_masetero_izq' ,
      'insercion_masetero_der',
      'insercion_masetero_izq',
      'region_mandibular_der' ,
      'region_mandibular_izq',
      'region_submandibular_der',
      'region_submandibular_izq',
      'esternocleidomastoideo_der',
      'esternocleidomastoideo_izq',
      'musculatura_der',
      'musculatura_izq',
      'area_pterigoide_der',
      'area_pterigoide_izq',
      'tendon_temp_der',
      'tendon_temp_izq',
      'polo_lateral_der',
      'polo_lateral_izq' ,
      'insercion_pos_der',
      'insercion_pos_izq',
      'atm_apertura_der',
      'atm_cierre_der' ,
      'atm_lateralidad_der',
      'atm_lateralidad_izq' ,
      'atm_protrusion_der' ,
      'atm_apertura_izq',
      'atm_cierre_izq',
      'atm_izq_lateralidad_der',
      'atm_izq_lateralidad_izq',
      'atm_protrusion_izq',
      'fecha',
      'ultimo_usuario',
      'paciente_id',
      'consulta_id' ,
      'profesor',
      'validar',
      'id_examen_muscular',
      'fecha_validacion',

    ];
    protected $primaryKey = 'id_examen_muscular';
    protected $table      = 'examen_muscular';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
