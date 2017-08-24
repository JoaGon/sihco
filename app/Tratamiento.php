<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tratamiento extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_tratamiento',
      'fecha_tratamiento',
      'tratamiento_realizado',
      'tratamiento_id',

    ];
    protected $primaryKey = 'id_tratamiento';
    protected $table      = 'tratamiento';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
