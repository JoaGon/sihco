<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

use App\Paciente as Paciente;
use App\Persona as Persona;
use App\CoronasPuentes as CoronasPuentes;
use App\DentadurasTotales as DentadurasTotales;
use App\Cirugia as Cirugia;
use App\Endodoncia as Endodoncia;
use App\Parciales as Parciales;
use App\Operatoria as Operatoria;



use Illuminate\Support\Facades\DB;

class ConsultaHistoria3Controller extends Controller
{

   
    public function showcoronasPuentes($paciente)
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

        $antecedentes = DB::table('coronas_puentes')
            ->join('usuarios', 'coronas_puentes.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('coronas_puentes.ultimo_usuario',Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
}else{
    $antecedentes = DB::table('coronas_puentes')
            ->join('usuarios', 'coronas_puentes.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
}
        return view('admin.consulta.parte3.consulta_historia_coronas_puentes', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }

    public function getcoronasPuentes($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('coronas_puentes')
            ->where('id_coronas', $id)
            ->get();
        $validado = DB::table('coronas_puentes')
            ->where('id_coronas', $id)
            ->select('validar')
            ->get();
        // dd($validado);
        $consulta = DB::table('coronas_puentes')
            ->where('id_coronas', $id)
            ->pluck('consulta_id');
            //dd($consulta);


        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte3.consulta_coronas_puentes', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,

        ]);

    }

    public function updatecoronasPuentes(Request $req)
    {
        //dd($req->input('id_enfermedad'));
        $data = $req->all();
        try {

            $verificar = DB::table('coronas_puentes')
                ->where('id_coronas', $req->input('id_enfermedad'))
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
            $data['id_coronas'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);

            DB::table('coronas_puentes')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

            $consulta2 = CoronasPuentes::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function validarcoronasPuentes(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");

        try {

            $verificar = DB::table('coronas_puentes')
                ->where('id_coronas', $req->input('id_enfermedad'))
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
      public function showOperatoria($paciente)
    {
        //dd($paciente);
        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');
           // dd($persona);
        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('operatoria')
            ->join('usuarios', 'operatoria.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('operatoria.ultimo_usuario',Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
}else{
    $antecedentes = DB::table('operatoria')
            ->join('usuarios', 'operatoria.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
}
            //dd($antecedentes);
        return view('admin.consulta.parte3.consulta_historia_operatoria', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
        public function getOperatoria($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('operatoria')
            ->where('id_operatoria', $id)
            ->get();
        $validado = DB::table('operatoria')
            ->where('id_operatoria', $id)
            ->select('validar')
            ->get();
        // dd($validado);
        $consulta = DB::table('operatoria')
            ->where('id_operatoria', $id)
            ->pluck('consulta_id');
//dd($consulta);
      
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte3.consulta_operatoria', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,

        ]);

    }

    public function updateOperatoria(Request $req)
    {
        //dd($req->input('id_enfermedad'));
        $data = $req->all();
                 // dd($data);

        try {

            $verificar = DB::table('operatoria')
                ->where('id_operatoria', $req->input('id_enfermedad'))
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
            $data['id_operatoria'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
           

            DB::table('operatoria')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();
          $consulta2 = Operatoria::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function validarOperatoria(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");

        try {

            $verificar = DB::table('operatoria')
                ->where('id_operatoria', $req->input('id_enfermedad'))
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
         public function getCirugia($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("cirugia")
                        ->where("id_cirugia",$id)
                        ->get();


        $validado = DB::table('cirugia')
            ->where('id_cirugia', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('cirugia')
            ->where('id_cirugia', $id)
            ->pluck('consulta_id');
    
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte3.consulta_cirugia', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
            
        ]);

    }

     public function showCirugia($paciente)
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

        $antecedentes = DB::table('cirugia')
            ->join('usuarios', 'cirugia.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('cirugia.ultimo_usuario',Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
}else{
      $antecedentes = DB::table('cirugia')
            ->join('usuarios', 'cirugia.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
}
           //dd($antecedentes);
        return view('admin.consulta.parte3.consulta_historia_cirugia', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
      public function updateCirugia(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('cirugia')
                ->where('id_cirugia', $req->input('id_enfermedad'))
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
            $data['id_cirugia'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);

            DB::table('cirugia')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();
 //dd($data);
          $consulta2 = Cirugia::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
     public function validarCirugia(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('cirugia')
                ->where('id_cirugia', $req->input('id_enfermedad'))
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
    public function showEndodoncia($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('endodoncia')
            ->join('usuarios', 'endodoncia.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('endodoncia.ultimo_usuario',Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
        }else{
            $antecedentes = DB::table('endodoncia')
            ->join('usuarios', 'endodoncia.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
        }
        return view('admin.consulta.parte3.consulta_historia_endodoncia', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getEndodoncia($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("endodoncia")
                        ->where("id_endodoncia",$id)
                        ->get();

        $validado = DB::table('endodoncia')
            ->where('id_endodoncia', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('endodoncia')
            ->where('id_endodoncia', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte3.consulta_endodoncia', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateEndodoncia(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('endodoncia')
                ->where('id_endodoncia', $req->input('id_enfermedad'))
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
            $data['id_endodoncia'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('endodoncia')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = Endodoncia::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarEndodoncia(Request $req)
    {
       // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('endodoncia')
                ->where('id_endodoncia', $req->input('id_enfermedad'))
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
     public function showTotales($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        $antecedentes = DB::table('dentaduras_totales')
            ->join('usuarios', 'dentaduras_totales.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('dentaduras_totales.ultimo_usuario',Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
}else{
     $antecedentes = DB::table('dentaduras_totales')
            ->join('usuarios', 'dentaduras_totales.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
}
        return view('admin.consulta.parte3.consulta_historia_totales', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getTotales($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("dentaduras_totales")
                        ->where("id_dentadura_total",$id)
                        ->get();

        $validado = DB::table('dentaduras_totales')
            ->where('id_dentadura_total', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('dentaduras_totales')
            ->where('id_dentadura_total', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.parte3.consulta_totales', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateTotales(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('dentaduras_totales')
                ->where('id_dentadura_total', $req->input('id_enfermedad'))
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
            $data['id_dentadura_total'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('dentaduras_totales')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = DentadurasTotales::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarTotales(Request $req)
    {
       // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('dentaduras_totales')
                ->where('id_dentadura_total', $req->input('id_enfermedad'))
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
            ->orderBy('fecha','desc')
            ->get();
}else{
     $antecedentes = DB::table('diagrama_riesgo')
            ->join('usuarios', 'diagrama_riesgo.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
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
            ->orderBy('fecha','desc')
            ->get();
}else{
    $antecedentes = DB::table('control_placa')
            ->join('usuarios', 'control_placa.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
}
         //   dd($antecedentes);
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