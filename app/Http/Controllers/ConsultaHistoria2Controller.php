<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

use App\Paciente as Paciente;
use App\Persona as Persona;
use App\ExamenClinico as ExamenClinico;
use App\EvaluacionPeriodontal as EvaluacionPeriodontal;
use App\ExamenMuscular as ExamenMuscular;
use App\ModeloDiagnostico as ModeloDiagnostico;
use App\TestFagerston as TestFagerston;
use App\DiagramaRiesgo as DiagramaRiesgo;
use App\Odontograma as Odontograma;
use App\ControlPlaca as ControlPlaca;


use Illuminate\Support\Facades\DB;

class ConsultaHistoria2Controller extends Controller
{

   
    public function showExamenClinico($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

     //   dd($persona);
        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
     if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){
    
        $antecedentes = DB::table('examen_clinico')
            ->join('usuarios', 'examen_clinico.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('examen_clinico.ultimo_usuario',Auth::user()->id)
            ->where('paciente_id', $paciente)
            ->get();
        }else{
            $antecedentes = DB::table('examen_clinico')
            ->join('usuarios', 'examen_clinico.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
        }
        return view('admin.consulta.parte2.consulta_historia_examen_clinico', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }

    public function getExamenClinico($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('examen_clinico')
            ->where('id_examen_clinico', $id)
            ->get();
        $validado = DB::table('examen_clinico')
            ->where('id_examen_clinico', $id)
            ->select('validar')
            ->get();
        // dd($validado);
        $consulta = DB::table('examen_clinico')
            ->where('id_examen_clinico', $id)
            ->pluck('consulta_id');
            //dd($consulta);


        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte2.consulta_examen_clinico', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,

        ]);

    }

    public function updateExamenClinico(Request $req)
    {
        //dd($req->input('id_enfermedad'));
        $data = $req->all();

        try {

            $verificar = DB::table('examen_clinico')
                ->where('id_examen_clinico', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();

            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;
            $data['id_examen_clinico'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);

            DB::table('examen_clinico')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

            $consulta2 = ExamenClinico::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function validarExamenClinico(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");

        try {

            $verificar = DB::table('examen_clinico')
                ->where('id_examen_clinico', $req->input('id_enfermedad'))
                ->update([
                    'validar'  => '1',
                    'profesor' => Auth::user()->id,
                    'fecha_validacion' => $today
                ]);

            return 'validado';

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
      public function showEvaluacionPeriodontal($paciente)
    {
        //dd($paciente);
        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){
    
        $antecedentes = DB::table('evaluacion_periodontal')
            ->join('usuarios', 'evaluacion_periodontal.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('evaluacion_periodontal.ultimo_usuario',Auth::user()->id)
            ->get();
        }else{
            $antecedentes = DB::table('evaluacion_periodontal')
            ->join('usuarios', 'evaluacion_periodontal.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get(); 
        }

            //dd($antecedentes);
        return view('admin.consulta.parte2.consulta_historia_evaluacion_periodontal', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
        public function getEvaluacionPeriodontal($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('evaluacion_periodontal')
            ->where('id_evaluacion_periodontal', $id)
            ->get();
        $validado = DB::table('evaluacion_periodontal')
            ->where('id_evaluacion_periodontal', $id)
            ->select('validar')
            ->get();
        // dd($validado);
        $consulta = DB::table('evaluacion_periodontal')
            ->where('id_evaluacion_periodontal', $id)
            ->pluck('consulta_id');
//dd($consulta);
      
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte2.consulta_evaluacion_periodontal', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,

        ]);

    }

    public function updateEvaluacionPeriodontal(Request $req)
    {
        //dd($req->input('id_enfermedad'));
        $data = $req->all();
                 // dd($data);

        try {

            $verificar = DB::table('evaluacion_periodontal')
                ->where('id_evaluacion_periodontal', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();
               // dd($verificar);
            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;
            $data['id_evaluacion_periodontal'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
           

            DB::table('evaluacion_periodontal')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();
          $consulta2 = EvaluacionPeriodontal::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function validarEvaluacionPeriodontal(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");

        try {

            $verificar = DB::table('evaluacion_periodontal')
                ->where('id_evaluacion_periodontal', $req->input('id_enfermedad'))
                ->update([
                    'validar'  => '1',
                    'profesor' => Auth::user()->id,
                    'fecha_validacion' => $today
                ]);

            return 'validado';

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
         public function getExamenMuscular($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("examen_muscular")
                        ->where("id_examen_muscular",$id)
                        ->get();


        $validado = DB::table('examen_muscular')
            ->where('id_examen_muscular', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('examen_muscular')
            ->where('id_examen_muscular', $id)
            ->pluck('consulta_id');
    
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte2.consulta_examen_muscular', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
            
        ]);

    }

     public function showExamenMuscular($paciente)
    {
       //dd($paciente);
        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('examen_muscular')
            ->join('usuarios', 'examen_muscular.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('examen_muscular.ultimo_usuario',Auth::user()->id)
            ->get();
}else{
    $antecedentes = DB::table('examen_muscular')
            ->join('usuarios', 'examen_muscular.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
}
           //dd($antecedentes);
        return view('admin.consulta.parte2.consulta_historia_examen_muscular', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
      public function updateExamenMuscular(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('examen_muscular')
                ->where('id_examen_muscular', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();
               // dd($verificar);
            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;
            $data['id_examen_muscular'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);

            DB::table('examen_muscular')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();
 //dd($data);
          $consulta2 = ExamenMuscular::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
     public function validarExamenMuscular(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('examen_muscular')
                ->where('id_examen_muscular', $req->input('id_enfermedad'))
                ->update([
                    'validar'  => '1',
                    'profesor' => Auth::user()->id,
                    'fecha_validacion' => $today
                ]);

            return 'validado';

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function showModeloDiagnostico($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('modelo_diagnostico')
            ->join('usuarios', 'modelo_diagnostico.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('modelo_diagnostico.ultimo_usuario', Auth::user()->id)
            ->get();
}else{

        $antecedentes = DB::table('modelo_diagnostico')
            ->join('usuarios', 'modelo_diagnostico.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
}
        return view('admin.consulta.parte2.consulta_historia_modelo_diagnostico', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getModeloDiagnostico($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("modelo_diagnostico")
                        ->where("id_modelo_diagnostico",$id)
                        ->get();

        $validado = DB::table('modelo_diagnostico')
            ->where('id_modelo_diagnostico', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('modelo_diagnostico')
            ->where('id_modelo_diagnostico', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte2.consulta_modelo_diagnostico', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateModeloDiagnostico(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('modelo_diagnostico')
                ->where('id_modelo_diagnostico', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();
               // dd($verificar);
            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;
            $data['id_modelo_diagnostico'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('modelo_diagnostico')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = ModeloDiagnostico::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarModeloDiagnostico(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('modelo_diagnostico')
                ->where('id_modelo_diagnostico', $req->input('id_enfermedad'))
                ->update([
                    'validar'  => '1',
                    'profesor' => Auth::user()->id,
                    'fecha_validacion' => $today
                ]);

            return 'validado';

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
     public function showTestFagerstrom($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('test_fagerstrom')
            ->join('usuarios', 'test_fagerstrom.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('test_fagerstrom.ultimo_usuario',Auth::user()->id)
            ->get();
}else{
     $antecedentes = DB::table('test_fagerstrom')
            ->join('usuarios', 'test_fagerstrom.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
}
        return view('admin.consulta.parte2.consulta_historia_test_fagerstrom', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getTestFagerstrom($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("test_fagerstrom")
                        ->where("id_test",$id)
                        ->get();

        $validado = DB::table('test_fagerstrom')
            ->where('id_test', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('test_fagerstrom')
            ->where('id_test', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte2.consulta_test_fagerstrom', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateTestFagerstrom(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('test_fagerstrom')
                ->where('id_test', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();
              // dd($verificar);
            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;
            $data['id_test'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('test_fagerstrom')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = TestFagerston::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
 
       public function showDiagramaRiesgo($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('diagrama_riesgo')
            ->join('usuarios', 'diagrama_riesgo.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('diagrama_riesgo.ultimo_usuario',Auth::user()->id)
            ->get();
}else{

        $antecedentes = DB::table('diagrama_riesgo')
            ->join('usuarios', 'diagrama_riesgo.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
}
        return view('admin.consulta.parte2.consulta_historia_diagrama_riesgo', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getDiagramaRiesgo($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("diagrama_riesgo")
                        ->where("id_diagrama_riesgo",$id)
                        ->get();

        $validado = DB::table('diagrama_riesgo')
            ->where('id_diagrama_riesgo', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('diagrama_riesgo')
            ->where('id_diagrama_riesgo', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte2.consulta_diagrama_riesgo', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateDiagramaRiesgo(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('diagrama_riesgo')
                ->where('id_diagrama_riesgo', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();
              // dd($verificar);
            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;
            $data['id_diagrama_riesgo'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('diagrama_riesgo')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = DiagramaRiesgo::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarDiagramaRiesgo(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('diagrama_riesgo')
                ->where('id_diagrama_riesgo', $req->input('id_enfermedad'))
                ->update([
                    'validar'  => '1',
                    'profesor' => Auth::user()->id,
                    'fecha_validacion' => $today
                ]);

            return 'validado';

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
        public function showControlPlaca($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('control_placa')
            ->join('usuarios', 'control_placa.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('control_placa.ultimo_usuario',Auth::user()->id)
            ->get();

        }else{
             $antecedentes = DB::table('control_placa')
            ->join('usuarios', 'control_placa.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
         //   dd($antecedentes);
        }
        return view('admin.consulta.parte2.consulta_historia_control_placa', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getControlPlaca($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("control_placa")
                        ->where("id_control_placa",$id)
                        ->get();
        $dientes = DB::table('dientes_con_placa')
                    ->where('control_placa_id', $id)
                    ->get();
        $validado = DB::table('control_placa')
            ->where('id_control_placa', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('control_placa')
            ->where('id_control_placa', $id)
            ->pluck('consulta_id');

    
        //dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte2.consulta_control_placa', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'dientes'                       => $dientes,
            'consulta'                      => $consulta[0],
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateControlPlaca(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('control_placa')
                ->where('id_control_placa', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();
             //  dd($verificar);
            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;
            $data['id_control_placa'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);

                DB::table('dientes_con_placa')
                    ->where('control_placa_id', $data['id_control_placa'])
                    ->delete();

                DB::table('control_placa')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

                 DB::table('control_placa')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = ControlPlaca::create($data);

          if($data['dientes']){
            //dd($data['dientes']);
            $array = [];
            $array = json_decode($data['dientes']);
            //dd($array);

                foreach ($array as $key => $value) {
                    DB::table('dientes_con_placa')
                    ->insert([
                        'valor_diente'=>$value->diente,
                        'cara_diente'=>$value->cara,
                        'estado_diente'=>$value->estado,
                        'tipo_diente'=>$value->tipo,
                        'control_placa_id'=>$consulta2->id_control_placa,
                        ]);
                    
                }
                 
            }


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();


    }
    public function validarControlPlaca(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('control_placa')
                ->where('id_control_placa', $req->input('id_enfermedad'))
                ->update([
                    'validar'  => '1',
                    'profesor' => Auth::user()->id,
                    'fecha_validacion' => $today
                ]);

            return 'validado';

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }


}