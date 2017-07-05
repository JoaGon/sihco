<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ModeloDiagnostico extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_modelo_diagnostico',
          'forma_su',
          'simetria_su',
          'forma_inf',
          'simetria_inf',
          'dientes_ausentes',
          'grado',
          'kennedy_su',
          'kennedy_inf',
          'corona_tam',
          'corona_forma',
          'giroversiones',
          'migraciones',
          'extrusiones',
          'inclinados',
          'faceta_desgaste',
          'rebordes',
          'cuspide',
          'contacto_prematuro',
          'relaciones_bordes',
          'espacio_disponible',
          'espacio_apoyo',
          'profesor',
          'ultimo_usuario',
          'fecha' ,
          'validar',
          'paciente_id',
          'consulta_id',
          'modif_su',
          'modif_inf',
          'fecha_validacion',

    ];
    protected $primaryKey = 'id_modelo_diagnostico';
    protected $table      = 'modelo_diagnostico';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
