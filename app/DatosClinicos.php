<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class DatosClinicos extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_dato_clinico',
        'examinado_ultmo_ayo',
        'cambio_salud_ultimo_ayo',
        'sangra_largo_tiempo',
        'perdida_peso',
        'grave_enfermo',
        'hospitalizado',
        'marcapaso',
        'tranfusion_sanguinea',
        'asma',
        'aspirina',
        'penicilina',
        'yodo',
        'sulfonamida',
        'barbiturico',
        'otros_medicamentos',
        'trastorno_visual',
        'sinusitis',
        'hemorragia_nasal',
        'dolor_pecho',
        'tos',
        'tos_sangre',
        'dificultad_tragar',
        'indigestion',
        'vomito',
        'orines',
        'sediento',
        'desmayo',
        'moretones',
        'desorden_sangre',
        'cansancio',
        'embarazo',
        'pastilla_anticonceptiva',
        'desarreglos_mensuales',
        'cicatrizacion_lenta',
        'dc_34',
        'espec_grav_enfermo',
        'espec_otros_medicamentos',
        'validar',
        'consulta_id',
        'paciente_id',
        'ultimo_usuario',
        'profesor',
        'fecha',
        'espec_fecha_hospitalizacion',
    ];
    protected $primaryKey = 'id_dato_clinico';
    protected $table      = 'datos_clinicos';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
