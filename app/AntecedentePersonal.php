<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AntecedentePersonal extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id_antecedente_personal',
          'enfer_meta_endocrina',
          'discrasia_sanguinea' ,
          'fiebre_reumatica' ,
          'artritis_reumatoidea',
          'adenopatia' ,
          'otro',
          'cefalea',
          'convulsiones' ,
          'parestesias' ,
          'edema_miembro_inf' ,
          'erupciones_piel' ,
          'ictericia' ,
          'trastorno_audicion' ,
          'intervencion_quirurgica' ,
          'trauma_accidente',
          'fractura' ,
          'accidente_transito' ,
          'espec_otro' ,
          'espec_meta_endocrina' ,
          'espec_trauma_accidente' ,
          'espec_fractura' ,
          'espec_accidente_transito' ,
          'consulta_id' ,
          'validar',
          'ultimo_usuario' ,
          'profesor' ,
          'paciente_id' ,
          'fecha' ,
          'espec_accidente_trans' ,
          'espec_interv_quirurgica' ,

    ];
    protected $primaryKey = 'id_antecedente_personal';
    protected $table      = 'antecedentes_personales';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
