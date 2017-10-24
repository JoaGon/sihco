<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class PacienteFamiliar extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
          'id_paciente_familiar',
          'familiar_cercano',
          'parentesco',
          'direccion_familiar',
          'telefono_familiar',
          'paciente_id',

    ];

    protected $primaryKey = 'id_paciente_familiar';
    protected $table      = 'paciente_familiar';
    public $timestamps    = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
