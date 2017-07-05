<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente_enfer_renal extends Model
{
    protected $fillable = [
         'paciente_id',
          'enfermedad_renal_id',
          'circulo_hereditario', 
          'id_paciente_enfer_renal',
          'ultimo_usuario',
          'consulta_id',
          'antecedente',

    ];
    protected $primaryKey = 'id_paciente_enfer_renal';
    protected $table      = 'paciente_enfer_renal';
}
