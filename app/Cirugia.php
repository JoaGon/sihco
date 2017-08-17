<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Cirugia extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'infecciosas',
        'espec_infecciosa',
        'metabolicas',
        'cardiovasculares',
        'gastrointestinales',
        'genito_urinaria',
        'neurologica',
        'espec_patologico',
        'fecha_hospitalizacion',
        'causa',
        'fecha_hospitalizacion_quirurgico',
        'causa_quirurgico',
        'hubo_complicacion',
        'obser_quirurgico',
        'alegia',
        'cual_alergia',
        'dosis',
        'medicamento',
        'cual_medicamento',
        'hematologicos',
        'causa_hema',
        'transfusionales',
        'causa_trans',
        'embarazada',
        'otros_no_especificados',
        'cirugia',
        'tipo',
        'complicaciones_cirugia',
        'espec_complicaciones',
        'examenes_complementarios',
        'consulta_id',
        'validar',
        'ultimo_usuario',
        'profesor',
        'paciente_id',
        'fecha',
        'id_cirugia',
        'fecha_validacion',
        'hospitalizado',
        'operado'

    ];
    protected $primaryKey = 'id_cirugia';
    protected $table      = 'cirugia';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
