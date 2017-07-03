<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConsultaHistoria extends Controller
{

    public function index()
    {
        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('paciente.nro_historia', '13')
            ->get();
        $paciente2 = DB::table('antecedentes_familiares')
            ->where('paciente_id', '15')
            ->where('consulta_id', '212')
            ->get();
        return view('admin.consulta.consulta_antecedente_familia', ['pacientes' => $paciente, 'ante' => $paciente2, 'consulta' => '212', 'id_paciente' => '15']);

    }

}
