<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Endodoncia extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_endodoncia',
          'frio' ,
          'calor' ,
          'masticacion' ,
          'palpacion' ,
          'fecha_validacion' ,
          'percusion_vertical' ,
          'dolor_localizado' ,
          'dolor_difuso' ,
          'dolor_provocado' ,
          'dolor_espontaneo' ,
          'dolor_constante' ,
          'dolor_intermitente' ,
          'dolor_palpitante' ,
          'dolor_referido' ,
          'ausencia_dolor',
          'diente_tratar' ,
          'observacion',
          'infla_intraoral' ,
          'infla_extraoral' ,
          'fistula' ,
          'caries' ,
          'obsturaciones' ,
          'coronas_metal' ,
          'fractura_corona' ,
          'fisura' ,
          'cambio_color' ,
          'movilidad' ,
          'polipo_pulpar' ,
          'faceta_articular' ,
          'labios' ,
          'lengua' ,
          'paladar_duro' ,
          'paladar_blando' ,
          'frenillos' ,
          'mucosa_oral' ,
          'piso_boca' ,
          'glandulas_salivales' ,
          'sist_linfatico' ,
          'musculos_masticatorios' ,
          'placa' ,
          'calculos' ,
          'gingivitis' ,
          'periodontitis' ,
          'bolsa_periodontal' ,
          'test_cavidad' ,
          'prueba_electrica' ,
          'frio_sensibilidad' ,
          'calor_sensibilidad' ,
          'espacio_periodontal' ,
          'perdida_alveolar' ,
          'zona_radiolucida' ,
          'zona_radiolucida_lateral' ,
          'zona_radiolucida_furca' ,
          'reabsorcion_interna' ,
          'reabsorcion_externa' ,
          'radiopacidad_apical' ,
          'raiz_formacion' ,
          'nucleo' ,
          'fractura_radicular' ,
          'tratamiento_endodontico' ,
          'otros' ,
          'bacteriana' ,
          'quimica' ,
          'fisica' ,
          'trauma' ,
          'fines_protesicos' ,
          'fines_terapeuticos' ,
          'ultimo_usuario',
          'validar',
          'fecha',
          'paciente_id',
          'consulta_id',
          'profesor',
    ];
    protected $primaryKey = 'id_endodoncia';
    protected $table      = 'endodoncia';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
