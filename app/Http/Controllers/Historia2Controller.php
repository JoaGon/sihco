<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Paciente as Paciente;
use App\ResumenMedica;
use App\Enfermedades_renales as Enfer_Renal;
use App\Enfermedades_cardiovasculares as Enfer_Cardiovascular;
use App\Enfermedades_patologicas as Enfer_Patologica;
use App\Lista as Lista;
use App\Paciente_enfer_patologica as Paciente_Enfer_Patologica;
use App\ResumenOdontologico;
use App\DatosClinicos;
use App\CondicionSexual;
use App\HistoriaOdontologica;
use App\AntecedentesFamiliares;
use App\Valores_listas as Valores_listas;
use Auth;


class Historia2Controller extends Controller
{
   	public function examenClinicoIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	 $consulta = intval($consulta);
        

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();

        return view('admin.examen_clinico', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       

    }
     public function examenClinico(Request $req)
    {   

        $data = $req->all();
         DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor'] = Auth::user()->id;
            $data['validar'] = '';

            unset($data['_token']);
            unset($data['historia']);
           
            $verificar = DB::table('examen_clinico')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

            if($verificar > 0){

                $id = DB::table('examen_clinico')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('examen_clinico.id_examen_clinico');

                        $data['id_examen_clinico'] = $id[0];

                        DB::table('examen_clinico')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();

            }
            $consulta2 = DB::table('examen_clinico')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();

        
    }
    public function evaluacionperiodontalIndex($paciente_id,$consulta)
    {	
    	$consulta = intval($consulta);

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();

        return view('admin.evaluacion_periodontal', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       

    }
    public function evaluacionperiodontal(Request $req)
    {   

        $data = $req->all();
         DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor'] = Auth::user()->id;
            $data['validar'] = '';

            unset($data['_token']);
            unset($data['historia']);
           
            $verificar = DB::table('evaluacion_periodontal')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

            if($verificar > 0){

                $id = DB::table('evaluacion_periodontal')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('evaluacion_periodontal.id_evaluacion_periodontal');

                        $data['id_evaluacion_periodontal'] = $id[0];

                        DB::table('evaluacion_periodontal')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();

            }
            $consulta2 = DB::table('evaluacion_periodontal')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();

        
    }
}
