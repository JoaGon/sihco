<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente_enfer_patologica extends Model
{
    protected $fillable = [
         'id_paciente_enfer_patologica',
          'paciente_id',
          'enfermedad_patologica_id',
          'consulta_id',
          'circulo_familiar_id',
          'ultimo_usuario',
          'antecedente',

    ];
    protected $primaryKey = 'id_paciente_enfer_patologica';
    protected $table      = 'paciente_enfer_patologicas';
}
