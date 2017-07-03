<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class HistoriaOdontologica extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_historia_odontologica',
        'tratamiento_odontologico',
        'afectando_salud',
        'apariencia_dientes',
        'nervios_tratamiento',
        'reaccion_anestesico',
        'dolor_reciente_dentadura',
        'sangra_encia',
        'control_dental_reg',
        'ultima_visita_odo',
        'cepillo_dental',
        'hilo_dental',
        'espec_control_dental',
        'espec_tratamiento_odon',
        'frecuencia_cepillado',
        'tipo_cepillo',
        'frecuencia_hilo_dental',
        'otros_medios',
        'cuales_medios',
        'dieta_habitual',
        'alimento_azucar',
        'frecu_aliment_azucar',
        'cirugia_cavidad',
        'espec_cirugia',
        'exodoncia',
        'espec_exodoncia',
        'complic_pos_exo',
        'tipo_complicacion',
        'ortodoncia',
        'cuando_ortodoncia',
        'endodoncia',
        'cuando_endodoncia',
        'cuales_dientes_endodoncia',
        'periodoncia',
        'tipo_tratamiento',
        'fecha_tratamiento',
        'protesis_dental',
        'tipo_protesis',
        'porque_tratamiento_odontologico',
        'mastica_alimentos_blandos',
        'mastica_alimentos_duros',
        'risa_sonrisa',
        'satisfecho_tratamiento',
        'mastica_solo_lado',
        'sensibilidad_dental',
        'dolor_atm_derecha',
        'dolor_atm_izquierda',
        'ausencia_dientes',
        'otras_causas',
        'dificultad_boca',
        'rechina_diente',
        'cuando_rechina_diente',
        'articulacion_temporomandibular',
        'abrir_boca',
        'cerrar_boca',
        'masticar',
        'bostezar',
        'reir',
        'dolor_cabeza',
        'frecuencia_dolor_cabeza',
        'ciclo_dolor_cabeza',
        'morderse_uyas',
        'morderse_labios',
        'droga',
        'tipo_protesis',
        'morder_fosforos',
        'respirar_boca',
        'tabaco',
        'abre_objeto_dientes',
        'lengua_contra_dientes',
        'bebida_alcoholica',
        'homosexual',
        'heterosexual',
        'morder_fosforos',
        'respirar_boca',
        'tabaco',
        'abre_objeto_dientes',
        'lengua_contra_dientes',
        'bebida_alcoholica',
        'ultimo_usuario',
        'paciente_id',
        'consulta_id',
        'profesor',
        'fecha',
        'condicion_sexual_id',
    ];
    protected $primaryKey = 'id_historia_odontologica';
    protected $table      = 'historia_odontologica';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
