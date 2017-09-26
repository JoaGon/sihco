<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ElementosOdontograma extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_elemento',
        'odontograma_id',
        'elemento',
        'posicion_y',
        'posicion_x',

    ];
    protected $primaryKey = 'id_elemento';
    protected $table      = 'elementos_odontograma';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
