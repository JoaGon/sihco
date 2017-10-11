<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

//use Illuminate\Support\Facades\DB;

use Auth;

use App\Paciente as Paciente;
use App\Lista as Lista;
use App\Valores_listas as Valores_listas;
use App\CoronasPuentes as CoronasPuentes;
use App\Tratamientos as Tratamientos;
use App\Tratamiento as Tratamiento;
use App\Diagnosticos as Diagnosticos;
use App\Diagnostico as Diagnostico;

use App\Pronostico as Pronostico;

use DB;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
     public function diagnosticoIndex($paciente_id, $consulta)
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

        return view('admin.diagnosticos.diagnostico_clinico', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }

    public function diagnosticoDefIndex($paciente_id, $consulta)
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

        return view('admin.diagnosticos.diagnostico_definitivo', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
    public function diagnosticoDef(Request $req)
    {

        $data = $req->all();
        //dd($data);
      
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';
            $data['fecha_validacion']        = '';
            unset($data['_token']);
            $diagnosticos = $data['diagnosticos'];
            $data['tipo']        = 'definitivo';
            $fechas = $data['fechas'];
            $tipo = $data['especialidad'];
            unset($data['fechas']);
            unset($data['diagnosticos']);

            unset($data['especialidad']);
  
            $verificar = DB::table('diagnosticos')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->where('tipo', 'definitivo')
                ->count();


                $verificar2 = DB::table('diagnostico')
                    ->where('diagnostico_id',$id[0])
                    ->where('especialidad', $tipo)
                    ->get();

            if ($verificar2 > 0) {

                $id = DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'definitivo')
                    ->pluck('diagnosticos.id_diagnosticos');

                $data['id_diagnosticos'] = $id[0];

                DB::table('diagnostico')
                    ->where('diagnostico_id',$id[0])
                    ->where('especialidad', $tipo)
                    ->delete();

                /*DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'definitivo')
                    ->delete();*/

            }
             // dd($data);
          // dd($data['fecha'],$data['consulta_id'], $data['paciente_id'], $data['validar'], $data['fecha_validacion'], $data['profesor']);
           
            //$consulta2 =  Diagnosticos::create($data);
            // dd($consulta2->id_tratamientos);
                          // dd($consulta2);
                            for ($i=0; $i < sizeof($diagnosticos); $i++) {
                          //  dd($diagnosticos[$i]);
                                DB::table('diagnostico')
                                ->insert([
                                    'fecha_tratamiento'=>$fechas[$i],
                                    'diagnostico'=>$diagnosticos[$i],
                                    'diagnostico_id'=>$consulta2->id_diagnosticos,
                                    'especialidad' =>$tipo
                                    ]);
                            }

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function diagnostico(Request $req)
    {

        $data = $req->all();

             // dd("aqui");

        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';
            $data['fecha_validacion']        = '';
    
            unset($data['_token']);

            $diagnosticos = $data['diagnosticos'];
            $fechas = $data['fechas'];
            $data['tipo']        = 'clinico';

            $tipo2 = $data['especialidad'];

            unset($data['especialidad']);
  
            unset($data['fechas']);
            unset($data['diagnosticos']);
            unset($data['historia']);


            $verificar = DB::table('diagnosticos')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('tipo', 'clinico')
                ->where('fecha', $data['fecha'])
                ->count();

                $id = DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'clinico')
                    ->pluck('diagnosticos.id_diagnosticos');

              $verificar2 = DB::table('diagnostico')
                    ->where('diagnostico_id',$id[0])
                    ->where('especialidad',$tipo2)
                    ->count();

            if ($verificar2 > 0) {


                $data['id_diagnosticos'] = $id[0];
               // dd($id[0],$tipo2);

                $del = DB::table('diagnostico')
                    ->where('diagnostico_id',$id[0])
                    ->where('especialidad', $tipo2)
                    ->delete();
                   //dd("aq",$del);


               /* DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'clinico')
                    ->delete();*/

            }
           dd($data['fecha'],$data['consulta_id'], $data['paciente_id'], $data['validar'], $data['fecha_validacion'], $data['profesor']);
           
            $consulta2 =  Diagnosticos::create($data);
            // dd("aa");
                            for ($i=0; $i < sizeof($diagnosticos); $i++) {
                          //  dd($diagnosticos[$i]);
                                DB::table('diagnostico')
                                ->insert([
                                    'fecha_tratamiento'=>$fechas[$i],
                                    'diagnostico'=>$diagnosticos[$i],
                                    'diagnostico_id'=>$id[0],
                                    'especialidad' =>$tipo2
                                    ]);
                            }

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function tratamientoIndex($paciente_id, $consulta)
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

        return view('admin.diagnosticos.tratamiento', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
    public function tratamiento(Request $req)
    {

        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';
            $data['fecha_validacion']        = '';
            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('tratamientos')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('tratamientos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('tratamientos.id_tratamientos');

                $data['id_tratamientos'] = $id[0];

                DB::table('tratamientos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
          // dd($data['fecha'],$data['consulta_id'], $data['paciente_id'], $data['validar'], $data['fecha_validacion'], $data['profesor']);
           
            $consulta2 =  Tratamientos::create($data);
            // dd($consulta2->id_tratamientos);
                          // dd($consulta2);
                         

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
     public function pronosticoIndex($paciente_id, $consulta)
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

        return view('admin.diagnosticos.pronostico', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
     public function pronostico(Request $req)
    {

        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';
            $data['fecha_validacion']        = '';
            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('pronostico')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('pronostico')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('pronostico.id_pronostico');

                $data['id_pronostico'] = $id[0];

                DB::table('pronostico')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
          // dd($data['fecha'],$data['consulta_id'], $data['paciente_id'], $data['validar'], $data['fecha_validacion'], $data['profesor']);
           
            $consulta2 =  Pronostico::create($data);
            

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
}
