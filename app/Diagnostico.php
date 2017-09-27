<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Diagnostico extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_diagnostico',
      'fecha_tratamiento',
      'diagnostico',
      'diagnostico_id',
      'especialidad'

    ];
    protected $primaryKey = 'id_diagnostico';
    protected $table      = 'diagnostico';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
