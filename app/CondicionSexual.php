<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CondicionSexual extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_condicion_sexual',
      'condicion_sexual',
     
    ];
     protected $primaryKey='id_condicion_sexual';
     protected $table='condicion_sexual';
     public $timestamps=false;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
