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
          'hepatitis' ,
          'diabetes' ,
          'fiebre_reumatica' ,
          'alergias' ,
          'fecha_validacion' ,
    ];
    protected $primaryKey = 'id';
    protected $table      = 'endodoncia';
    public $timestamps    = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
