<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Persona extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
         'ci',
         'ultimo_usuario',
         'nombre',
         'apellido',
         'fecha_nacimiento',
         'lugar_nacimiento',
         'genero',
         'telefono',
         'celular',
         'direccion',
         'id_persona'
     ];

     protected $primaryKey='ci';
     protected $table='persona';



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
