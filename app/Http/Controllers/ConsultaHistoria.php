<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Paciente as Paciente;
use App\Valores_listas as Valores_listas;

class ConsultaHistoria extends Controller
{
   
    public function index()
    {
        $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('paciente.nro_historia','13')
         ->get();
        $paciente2 = DB::table('antecedentes_familiares')
         ->where('paciente_id', '15')
         ->where('consulta_id', '212')
         ->get();
        return view('admin.consulta.consulta_antecedente_familia',['pacientes'=> $paciente,'ante'=> $paciente2 , 'consulta'=>'212', 'id_paciente'=>'15']);

    }
     
}
