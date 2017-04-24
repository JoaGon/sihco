<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Valores_listas extends Model
{
     protected $fillable = [
        'id_valor',
        'lista_id',
        'valor',
        'codigo'
    ];
    protected $primaryKey='id_valor';
    protected $table='valores_listas';
}
