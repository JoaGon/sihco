<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class DienteConPlaca extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       	'id_diente',
	  	'valor_diente',
	  	'cara_diente',
	  	'estado_diente',
		'tipo_diente',
		'control_placa_id',
    ];
    protected $primaryKey = 'id_diente';
    protected $table      = 'dientes_con_placa';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
