<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol_id',
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'sexo',
        'celular',
        'ultimo_usuario',
        'valor_id',
        'fecha_nacimiento',
        'ci',
        'direccion',
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
