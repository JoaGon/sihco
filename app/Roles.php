<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Roles extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id_rol',
          'rol_name',
          'nivel_acceso',
          'ultimo_usuario',
          'codigo'
    ];
    protected $primaryKey = 'id_rol';
    protected $table      = 'roles';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
