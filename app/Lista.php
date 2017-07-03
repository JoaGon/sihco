<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'id_lista',
        'lista',

    ];
    protected $primaryKey = 'id_lista';
    protected $table      = 'listas';
}
