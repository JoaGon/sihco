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
          'id_antecedente_familiar' ,
          'neuropsicopatia' ,
          'enfer_meta_endocrina'  ,
          'discrasia_sanguinea'  ,
          'fiebre_reumatica'  ,
          'artritis_reumatoidea' ,
          'otro',
          'espec_otro',
          'validar',
          'profesor' ,
          'ultimo_usuario' ,
          'fecha' ,
          'paciente_id' ,
          'consulta_id' ,
          'enfer_renal' ,
          'fecha_validacion',


    ];
    protected $primaryKey = 'id_antecedente_familiar';
    protected $table      = 'antecedentes_familiares';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
