<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'rol_id',
        'email',
        'password',
        'ultimo_usuario',
        'valor_id',
        'ci',
        'persona_id',

    ];

    protected $primaryKey = 'id';
    protected $table      = 'usuarios';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
