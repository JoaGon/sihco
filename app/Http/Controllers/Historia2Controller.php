<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

//use Illuminate\Support\Facades\DB;

use Auth;

use App\Paciente as Paciente;
use App\Lista as Lista;
use App\Valores_listas as Valores_listas;
use App\ExamenClinico as ExamenClinico;
use App\EvaluacionPeriodontal as EvaluacionPeriodontal;
use App\ExamenMuscular as ExamenMuscular;
use App\ModeloDiagnostico as ModeloDiagnostico;
use App\TestFagerston as TestFagerston;
use App\DiagramaRiesgo as DiagramaRiesgo;
use App\Odontograma as Odontograma;
use App\ControlPlaca as ControlPlaca;
use DB;
use Illuminate\Http\Request;

class Historia2Controller extends Controller
{
    public function examenClinicoIndex($paciente_id, $consulta)
    {
        //$data = $req->all();
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte2Historia.examen_clinico', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
    public function examenClinico(Request $req)
    {

        $data = $req->all();
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';

            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('examen_clinico')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('examen_clinico')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('examen_clinico.id_examen_clinico');

                $data['id_examen_clinico'] = $id[0];

                DB::table('examen_clinico')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
            $consulta2 = ExamenClinico::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function evaluacionperiodontalIndex($paciente_id, $consulta)
    {
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte2Historia.evaluacion_periodontal', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
    public function evaluacionperiodontal(Request $req)
    {

        $data = $req->all();
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';

            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('evaluacion_periodontal')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('evaluacion_periodontal')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('evaluacion_periodontal.id_evaluacion_periodontal');

                $data['id_evaluacion_periodontal'] = $id[0];

                DB::table('evaluacion_periodontal')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
            $consulta2 = EvaluacionPeriodontal::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function controlplacaIndex($paciente_id, $consulta)
    {
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte2Historia.control_placa', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }

     public function control_placa(Request $req){

        $data = $req->all();
       // dd($data);
       //dd(json_decode($data['dientes']),'leedasada');
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';

            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('control_placa')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();
               // dd($verificar);
            if ($verificar > 0) {

                $id = DB::table('control_placa')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('control_placa.id_control_placa');

                $data['id_control_placa'] = $id[0];
                DB::table('dientes_con_placa')
                    ->where('control_placa_id', $id[0])
                    ->delete();

                DB::table('control_placa')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
            $consulta2 = ControlPlaca::create($data);
            //dd($consulta2->id_control_placa);
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
     
 
    public function examenmuscularIndex($paciente_id, $consulta)
    {
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte2Historia.examen_muscular', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
    public function examenmuscular(Request $req)
    {

        $data = $req->all();
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';

            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('examen_muscular')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('examen_muscular')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('examen_muscular.id_examen_muscular');

                $data['id_examen_muscular'] = $id[0];

                DB::table('examen_muscular')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
            $consulta2 = ExamenMuscular::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function modelodiagnosticoIndex($paciente_id, $consulta)
    {
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte2Historia.modelo_diagnostico', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
    public function modelodiagnostico(Request $req)
    {

        $data = $req->all();
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';

            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('modelo_diagnostico')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('modelo_diagnostico')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('modelo_diagnostico.id_modelo_diagnostico');

                $data['id_modelo_diagnostico'] = $id[0];

                DB::table('modelo_diagnostico')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
            $consulta2 = ModeloDiagnostico::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function testfagerstromIndex($paciente_id, $consulta)
    {
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte2Historia.testfargestrom', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }

    public function testfagerstrom(Request $req)
    {

        $data = $req->all();
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';

            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('test_fagerstrom')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('test_fagerstrom')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('test_fagerstrom.id_test');

                $data['id_test'] = $id[0];

                DB::table('test_fagerstrom')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
            $consulta2 = TestFagerston::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function diagramariesgoIndex($paciente_id, $consulta)
    {
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte2Historia.diagramariesgo', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
    public function diagramariesgo(Request $req)
    {

        $data = $req->all();
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';

            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('diagrama_riesgo')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('diagrama_riesgo')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('diagrama_riesgo.id_diagrama_riesgo');

                $data['id_test'] = $id[0];

                DB::table('diagrama_riesgo')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
            $consulta2 = DiagramaRiesgo::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function odontoIndex($paciente_id, $consulta)
    {
        //$data = $req->all();
        $consulta = intval($consulta);
        // dd($consulta);
        //  $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('verOdonto', [
            'consulta'    => $consulta,
            'id_paciente' => $paciente_id,
            'pacientes'   => $paciente,

        ]);

    }
    public function odonto(Request $req)
    {
        // dd($data);
        $data = $req->all();
        //dd();
        DB::beginTransaction();

        try {

            $consulta = intval($data['consulta_id']);

            $data['ultimo_usuario'] = Auth::user()->id;
            //$data['profesor'] = Auth::user()->id;
            // $data['validar'] = '';
            $data['nro_historia'] = $data['historia'];

            unset($data['_token']);
            unset($data['historia']);
            foreach (json_decode($data['elementos']) as $key => $value) {

                $consulta2 = Odontograma::create([
                    'paciente_id'    => $data['paciente_id'],
                    'nro_historia'   => $data['nro_historia'],
                    'consulta_id'    => $data['consulta_id'],
                    'elemento'       => $value->elemento,
                    'posicion_x'     => $value->left,
                    'posicion_y'     => $value->top,
                    'ultimo_usuario' => Auth::user()->id,

                ]);
            }
            /* $verificar = DB::table('odontograma')
        ->where('paciente_id',$data['paciente_id'])
        ->where('consulta_id',$data['consulta_id'])
        //->where('fecha',$data['fecha'])
        ->count();

        if($verificar > 0){

        $id = DB::table('odontograma')
        ->where('paciente_id',$data['paciente_id'])
        ->where('consulta_id',$data['consulta_id'])
        //->where('fecha',$data['fecha'])
        ->pluck('odontograma.id');

        $data['id_test'] = $id[0];

        DB::table('diagrama_riesgo')
        ->where('paciente_id',$data['paciente_id'])
        ->where('consulta_id',$data['consulta_id'])
        ->where('fecha',$data['fecha'])
        ->delete();

        }*/

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

}
