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

        $antecedentes = DB::table('examen_clinico')
            ->join('usuarios', 'examen_clinico.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
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

        $antecedentes = DB::table('evaluacion_periodontal')
            ->join('usuarios', 'evaluacion_periodontal.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();

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

        $antecedentes = DB::table('examen_muscular')
            ->join('usuarios', 'examen_muscular.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();

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
    public function showResumenMedico($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('resumen_historia_medica')
            ->join('usuarios', 'resumen_historia_medica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
        return view('admin.consulta.consulta_historia_resumen_medica', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getResumenMedico($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("resumen_historia_medica")
                        ->where("id_resumen_historia_medica",$id)
                        ->get();

        $validado = DB::table('resumen_historia_medica')
            ->where('id_resumen_historia_medica', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('resumen_historia_medica')
            ->where('id_resumen_historia_medica', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_resumen_medico', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateResumenMedico(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('resumen_historia_medica')
                ->where('id_resumen_historia_medica', $req->input('id_enfermedad'))
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
            $data['id_dato_clinico'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('resumen_historia_medica')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = ResumenMedica::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarResumenMedico(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('resumen_historia_medica')
                ->where('id_resumen_historia_medica', $req->input('id_enfermedad'))
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
     public function showResumenOdontologico($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('resumen_historia_odontologica')
            ->join('usuarios', 'resumen_historia_odontologica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
        return view('admin.consulta.consulta_historia_resumen_odontologico', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getResumenOdontologico($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("resumen_historia_odontologica")
                        ->where("id_resumen_historia_odontologica",$id)
                        ->get();

        $validado = DB::table('resumen_historia_odontologica')
            ->where('id_resumen_historia_odontologica', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('resumen_historia_odontologica')
            ->where('id_resumen_historia_odontologica', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_resumen_odontologico', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateResumenOdontologico(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('resumen_historia_odontologica')
                ->where('id_resumen_historia_odontologica', $req->input('id_enfermedad'))
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
            $data['id_resumen_historia_odontologica'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('resumen_historia_odontologica')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = ResumenOdontologico::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarResumenOdontologico(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('resumen_historia_odontologica')
                ->where('id_resumen_historia_odontologica', $req->input('id_enfermedad'))
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
       public function showSignosVitales($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('signos_vitales')
            ->join('usuarios', 'signos_vitales.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
        return view('admin.consulta.consulta_historia_signos_vitales', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getSignosVitales($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("signos_vitales")
                        ->where("id_signo_vital",$id)
                        ->get();

        $validado = DB::table('signos_vitales')
            ->where('id_signo_vital', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('signos_vitales')
            ->where('id_signo_vital', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_signos_vitales', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateSignosVitales(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('signos_vitales')
                ->where('id_signo_vital', $req->input('id_enfermedad'))
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
            $data['id_signo_vital'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('signos_vitales')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = SignosVitales::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarSignosVitales(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('signos_vitales')
                ->where('id_signo_vital', $req->input('id_enfermedad'))
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
        public function showHistoriaOdontologica($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('historia_odontologica')
            ->join('usuarios', 'historia_odontologica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
         //   dd($antecedentes);
        return view('admin.consulta.consulta_historia_odontologica', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getHistoriaOdontologica($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("historia_odontologica")
                        ->where("id_historia_odontologica",$id)
                        ->get();

        $validado = DB::table('historia_odontologica')
            ->where('id_historia_odontologica', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('historia_odontologica')
            ->where('id_historia_odontologica', $id)
            ->pluck('consulta_id');

         $condicion = DB::table('listas')
        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
        ->where('listas.lista', 'preferencia_sexual')
        ->get();
        //dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_hist_odontologica', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
            'condiciones' => $condicion
           
        ]);

    }
       public function updateHistoriaOdontologica(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('historia_odontologica')
                ->where('id_historia_odontologica', $req->input('id_enfermedad'))
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
            $data['id_historia_odontologica'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('historia_odontologica')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = HistoriaOdontologica::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarHistoriaOdontologica(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('historia_odontologica')
                ->where('id_historia_odontologica', $req->input('id_enfermedad'))
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