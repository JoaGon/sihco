<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AntecedenteFamiliar extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_antecedente_familiar',
        'enfer_cardiov',
        'enfer_renal',
        'neurosicopatia',
        'enfer_meta_endocrina',
        'discrasia_sanguinea',
        'enfer_alergica',
        'fiebre_reumatica',
        'artritis_reumatoidea',
        'cancer',
        'enfer_infecciosas',
        'enfer_trans_sexual',
        'otro',
        'espec_enfer_cardio',
        'espec_otro',
        'validar',
        'profesor',
        'ultimo_usuario',
        'fecha',
        'paciente_id',
        'consulta_id',
    ];
    protected $primaryKey = 'id_antecedente_familiar';
    protected $table      = 'antecedentes_familiares';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
