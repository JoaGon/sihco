<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class DentadurasTotales extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'maxilar_caries' ,
          'maxilar_ambas' ,
          'maxilar_accidente' ,
          'maxilar_anos' ,
          'mandibular_caries' ,
          'mandibular_ambas' ,
          'mandibular_accidente' ,
          'mandibular_anos' ,
          'dentadura_ninguna' ,
          'dentadura_cuanta' ,
          'dentadura_buena' ,
          'dentadura_mala' ,
          'dentadura_uso' ,
          'razon_reemplazo' ,
          'tiempo_uso' ,
          'tipo_detadura_sup' ,
          'tipo_detadura_inf' ,
          'tipo_detadura_ambas' ,
          'tipo_detadura_nunguna' ,
          'uso_dentadura',
          'material_diente' ,
          'forma_diente' ,
          'material_base' ,
          'eval_comodidad' ,
          'eval_efic_masticatoria' ,
          'eval_estetica' ,
          'eval_pronunciacion' ,
          'eval_dolor' ,
          'eval_dist_adecuada' ,
          'eval_mas' ,
          'eval_menos' ,
          'eval_estabilidad' ,
          'eval_oclusion' ,
          'eval_retencion' ,
          'eval_estetica_dent' ,
          'eval_dimension_vertical' ,
          'eval_prese_cam' ,
          'eval_higiene' ,
          'dentadura_maxilar' ,
          'dentadura_mandibular' ,
          'expresion_facial' ,
          'labios' ,
          'relacion_labio_alveolar' ,
          'reabsorcion_sup' ,
          'reabsorcion_inf' ,
          'relacion_reborde' ,
          'piso_boca' ,
          'resilencia_sup' ,
          'resilencia_inf' ,
          'insercion_sup' ,
          'insercion_inf' ,
          'abertura_boca' ,
          'tam_sup' ,
          'tam_inf' ,
          'contorno_boveda' ,
          'contorno_paladar' ,
          'anchura' ,
          'depresibilidad' ,
          'palatino_ausente' ,
          'palatino_presente' ,
          'palatino_tam' ,
          'mandibular_ausente' ,
          'mandibular_presente' ,
          'mandibular_tam' ,
          'espacio' ,
          'mm' ,
          'posicion' ,
          'seleccion_sup' ,
          'seleccion_inf',
          'material',
          'diente_sup',
          'diente_inf',
          'relacion_inter',
          'relacion_borde',
          'espacio_disp',
          'espacion_disp_oclusal',
          'seleccion_arti_color',
          'seleccion_arti_marca',
          'formula_anterior',
          'formula_posterior',
          'formula_marca',
          'numero_cita',
          'comodidad',
          'eficiencia_masticatoria',
          'post_estetica',
          'pronunciacion',
          'validar',
          'consulta_id',
          'paciente_id',
          'ultimo_usuario',
          'profesor',
          'fecha',
          'fecha_validacion',
          'id_dentadura_total',

    ];
    protected $primaryKey = 'id_dentadura_total';
    protected $table      = 'dentaduras_totales';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
