<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente_enfer_cardiovascular extends Model
{
    protected $fillable = [
         'id_paciente_enfer_cardiovascular',
          'paciente_id',
          'enfermedad_cardiovascular_id',
          'circulo_hereditario', 
          'consulta_id',
          'ultimo_usuario',
          'antecedente',

    ];
    protected $primaryKey = 'id_paciente_enfer_cardiovascular';
    protected $table      = 'paciente_enfer_cardiovascular';
}
