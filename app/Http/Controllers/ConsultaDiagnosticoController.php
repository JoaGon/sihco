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

class ConsultaDiagnosticoController extends Controller
{
     public function showDiagnosticoClinico($paciente)
    {
        //dd($paciente);
     
        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

       //dd($persona);
        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('diagnosticos')
                        ->join('usuarios', 'diagnosticos.ultimo_usuario', '=', 'usuarios.id')
                        ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
                        ->where('paciente_id', $paciente)
                        ->where('diagnostico.ultimo_usuario',Auth::user()->id)
                        ->where('tipo','clinico')
                        ->get();
}else{
     $antecedentes = DB::table('diagnosticos')
                        ->join('usuarios', 'diagnosticos.ultimo_usuario', '=', 'usuarios.id')
                        ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
                        ->where('paciente_id', $paciente)
                        ->where('tipo','clinico')
                        ->get();
}

          // dd($antecedentes);

        return view('admin.consulta.diagnosticos.consulta_historia_diagnostico_clinico', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
     public function getDiagnosticoClinico($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

      /* $antecedentes = DB::table('diagnosticos')
            ->join('usuarios', 'diagnosticos.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->join('diagnostico', 'id_diagnosticos', '=', 'diagnostico_id')
            ->where('paciente_id', $paciente)
            ->where('id_diagnosticos', $id)
            ->where('diagnosticos.tipo', 'clinico')
             ->get();
         //    dd($antecedentes);*/

        $diagnostico = DB::table('diagnosticos')
                        ->where('id_diagnosticos',$id)
                        ->get();
            // dd($diagnostico);
        $validado = DB::table('diagnosticos')
            ->where('id_diagnosticos', $id)
            ->select('validar')
            ->get();
        // dd($validado);
        $consulta = DB::table('diagnosticos')
            ->where('id_diagnosticos', $id)
            ->pluck('consulta_id');
           // dd($consulta);


        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.diagnosticos.consulta_diagnostico_clinico', [
            'pacientes'                     => $paciente2,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
            'diagnostico'                   => $diagnostico,

        ]);

    }
    public function getDiagnosticos($id,$paciente,$especialidad)
    {

      $antecedentes = DB::table('diagnosticos')
            ->join('usuarios', 'diagnosticos.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->join('diagnostico', 'id_diagnosticos', '=', 'diagnostico_id')
            ->where('paciente_id', $paciente)
            ->where('id_diagnosticos', $id)
            ->where('diagnosticos.tipo', 'clinico')
            ->where('diagnostico.especialidad', $especialidad)

            ->get();

       // dd($antecedentes);

        return json_encode($antecedentes);

    }



      public function updateDiagnosticoClinico(Request $req)
    {
        //dd($req->input('id_enfermedad'));
        $data = $req->all();
       // dd($data);
        try {

            $verificar = DB::table('diagnosticos')
                ->where('id_diagnosticos', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();
            $diagnosticos = $data['diagnosticos'];
            $fechas = $data['fechas'];
            $data['tipo'] = 'clinico';
            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;

            $data['id_diagnosticos'] = $req->input('id_enfermedad');
            $tipo2 = $data['especialidad'];
            unset($data['_token']);
            unset($data['historia']);
            unset($data['fechas']);
            unset($data['diagnosticos']);
            unset($data['historia']);


            $verificar = DB::table('diagnosticos')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->where('tipo', 'clinico')
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
               // dd($verificar);
            if ($verificar2 > 0) {

                $id = DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'clinico')
                    ->pluck('diagnosticos.id_diagnosticos');

                $data['id_diagnosticos'] = $id[0];

                 $del = DB::table('diagnostico')
                    ->where('diagnostico_id',$id[0])
                    ->where('especialidad', $tipo2)
                    ->delete();

               /* DB::table('diagnosticos')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->where('tipo', 'clinico')
                    ->delete();*/

            }
             // dd($data);
          // dd($data['fecha'],$data['consulta_id'], $data['paciente_id'], $data['validar'], $data['fecha_validacion'], $data['profesor']);
           
           // $consulta2 =  Diagnosticos::create($data);
            // dd($consulta2->id_tratamientos);
                          // dd($consulta2);
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


  }