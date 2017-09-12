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
            $data['tipo']        = 'clinico';
            $fechas = $data['fechas'];
            unset($data['fechas']);
            unset($data['diagnosticos']);
            unset($data['historia']);
  
            $verificar = DB::table('diagnosticos')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->where('especialidad', $data['especialidad'])
                ->where('tipo', 'clinico')
                ->count();
               // dd($verificar);

            if ($verificar > 0) {

                $id = DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'clinico')
                    ->where('especialidad', $data['especialidad'])
                    ->pluck('diagnosticos.id_diagnosticos');

                $data['id_diagnosticos'] = $id[0];

                DB::table('diagnostico')
                    ->where('diagnostico_id',$id[0])
                    ->delete();

                DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'clinico')
                    ->where('especialidad', $data['especialidad'])
                    ->delete();

            }
             // dd($data);
          // dd($data['fecha'],$data['consulta_id'], $data['paciente_id'], $data['validar'], $data['fecha_validacion'], $data['profesor']);
           
            $consulta2 =  Diagnosticos::create($data);
            // dd($consulta2->id_tratamientos);
                          // dd($consulta2);
                            for ($i=0; $i < sizeof($diagnosticos); $i++) {
                          //  dd($diagnosticos[$i]);
                                DB::table('diagnostico')
                                ->insert([
                                    'fecha_tratamiento'=>$fechas[$i],
                                    'diagnostico'=>$diagnosticos[$i],
                                    'diagnostico_id'=>$consulta2->id_diagnosticos
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
            $data['tipo']        = 'definitivo';
            unset($data['fechas']);
            unset($data['diagnosticos']);
            unset($data['historia']);
  
            $verificar = DB::table('diagnosticos')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('tipo', 'definitivo')
                ->where('fecha', $data['fecha'])
                ->where('especialidad', $data['especialidad'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'definitivo')
                    ->where('especialidad', $data['especialidad'])
                    ->pluck('diagnosticos.id_diagnosticos');

                $data['id_diagnosticos'] = $id[0];

                DB::table('diagnostico')
                    ->where('diagnostico_id',$id[0])
                    ->delete();

                DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'definitivo')
                    ->where('especialidad', $data['especialidad'])
                    ->delete();

            }
             // dd($data);
          // dd($data['fecha'],$data['consulta_id'], $data['paciente_id'], $data['validar'], $data['fecha_validacion'], $data['profesor']);
           
            $consulta2 =  Diagnosticos::create($data);
            // dd($consulta2->id_tratamientos);
                          // dd($consulta2);
                            for ($i=0; $i < sizeof($diagnosticos); $i++) {
                          //  dd($diagnosticos[$i]);
                                DB::table('diagnostico')
                                ->insert([
                                    'fecha_tratamiento'=>$fechas[$i],
                                    'diagnostico'=>$diagnosticos[$i],
                                    'diagnostico_id'=>$consulta2->id_diagnosticos
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
            $diagnosticos = $data['diagnosticos'];
            $fechas = $data['fechas'];
            unset($data['fechas']);
            unset($data['diagnosticos']);
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
                    ->pluck('coronas_puentes.id_tratamientos');

                $data['id_tratamientos'] = $id[0];

                DB::table('tratamiento')
                    ->where('tratamiento_id',$id[0])
                    ->delete();

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
                            for ($i=0; $i < sizeof($diagnosticos); $i++) {
                          //  dd($diagnosticos[$i]);
                                DB::table('tratamiento')
                                ->insert([
                                    'fecha_tratamiento'=>$fechas[$i],
                                    'tratamiento_realizado'=>$diagnosticos[$i],
                                    'tratamiento_id'=>$consulta2->id_tratamientos
                                    ]);
                            }

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
