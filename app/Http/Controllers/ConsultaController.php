<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Paciente as Paciente;
use App\Valores_listas as Valores_listas;

class ConsultaController extends Controller
{
   
    public function index()
    {
       
        $paciente = DB::table('persona')
         ->join('paciente', 'persona.ci', '=', 'paciente.ci')
         ->get();
        return view('admin.consulta_paciente',['pacientes'=> $paciente]);

    }
     public function show_details($nro_historia)
    {	
    	//echo "<pre>"; print_r($nro_historia); echo "</pre>";
       
        $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('paciente.nro_historia',$nro_historia)
         ->get();
      //  echo "<pre>"; print_r($paciente); echo "</pre>";
       
       
        return view('admin.motivo_consulta',['pacientes'=> $paciente], ['consulta'=>'']);
    }
    public function save(Request $req)
    {	
      //  dd("lega",$req->input('paciente_id'));
        $consulta2 = DB::table('consulta')->insertGetId(
        	['paciente_id'=>$req->input('paciente_id'),
        	'nro_historia'=>$req->input('historia'),
        	'motivo_consulta'=>$req->input('motivo'),
        	'enfermedad_actual'=>$req->input('enfermedad'),
        	'fecha_consulta'=>$req->input('fecha_consulta'),

        	]);
        $persona = DB::table('paciente')
              ->where('nro_historia',$req->input('historia'))
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();

         $cardiovascular = DB::table('enfermedades_cardiovasculares')
         ->get();

          $circulo = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'circulo_familiar') 
                        ->get();

        return view('admin.antecedente_familiar', [
            'consulta'=>$consulta2,
            'id_paciente'=>$req->input('id_paciente'), 
            'pacientes'=>$paciente,
            'cardiovasculares'=>$cardiovascular,
            'circulos'=>$circulo
            ]);
    


    }

    public function odonto(){

    	  return view('verOdonto');

    }

    public function consulta_paciente($nro_historia){

          $paciente = DB::table('persona')
         ->join('paciente', 'persona.ci', '=', 'paciente.ci')
         ->where('paciente.nro_historia',$nro_historia)
         ->get();

        //  Paciente::where('nro_historia', $nro_historia)->get();

      //  echo "<pre>"; print_r($paciente); echo "</pre>";
       
       
        return view('admin.consulta_datos_paciente',['pacientes'=> $paciente]);


    }
}