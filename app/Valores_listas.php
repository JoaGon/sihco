<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Valores_listas extends Model
{
    protected $fillable = [
        'id_valor',
        'lista_id',
        'valor',
        'codigo',
    ];
    protected $primaryKey = 'id_valor';
    protected $table      = 'valores_listas';
}
