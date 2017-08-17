<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

//use Illuminate\Support\Facades\DB;

use Auth;

use App\Paciente as Paciente;
use App\Lista as Lista;
use App\Valores_listas as Valores_listas;
use App\CoronasPuentes as CoronasPuentes;
use App\DentadurasTotales as DentadurasTotales;
use App\Cirugia as Cirugia;
use App\Endodoncia as Endodoncia;
use App\Parciales as Parciales;
use App\Operatoria as Operatoria;

use DB;
use Illuminate\Http\Request;

class Historia3Controller extends Controller
{
       public function coronapuenteIndex($paciente_id, $consulta)
    {
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte3Historia.corona_puente_fijo', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
    public function coronapuente(Request $req)
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

            $verificar = DB::table('coronas_puentes')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('coronas_puentes')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('coronas_puentes.id_coronas');

                $data['id_coronas'] = $id[0];

                DB::table('coronas_puentes')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
            $consulta2 = CoronasPuentes::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function endodonciaIndex($paciente_id, $consulta)
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

        return view('admin.parte3Historia.endodoncia', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
       public function endodoncia(Request $req)
    {

        $data = $req->all();
      //  dd($data);

            //$consulta2 = Endodoncia::all();
           // dd($consulta2);
        DB::beginTransaction();


        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';
      
            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('endodoncia')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('endodoncia')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('endodoncia.id_endodoncia');

                $data['id_endodoncia'] = $id[0];

                DB::table('endodoncia')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
           // dd($data);
            $consulta2 = Endodoncia::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
   
    public function cirugiaIndex($paciente_id, $consulta)
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

        return view('admin.parte3Historia.cirugia', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
     public function cirugia(Request $req)
    {

        $data = $req->all();
       // dd($data);

            //$consulta2 = Cirugia::all();
            //dd($consulta2);
        DB::beginTransaction();


        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';
            $data['fecha_validacion']        = '';

      
            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('cirugia')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('cirugia')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('cirugia.id_cirugia');

                $data['id_cirugia'] = $id[0];

                DB::table('cirugia')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
         //  dd($data);
            $consulta2 = Cirugia::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function operatoriaIndex($paciente_id, $consulta)
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

        return view('admin.parte3Historia.operatoria', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
          public function operatoria(Request $req)
    {

        $data = $req->all();
      //  dd($data);

            //$consulta2 = Endodoncia::all();
           // dd($consulta2);
        DB::beginTransaction();


        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';
            $data['fecha_validacion']        = '';
      
      
            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('operatoria')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('operatoria')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('operatoria.id_operatoria');

                $data['id_operatoria'] = $id[0];

                DB::table('operatoria')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
           // dd($data);
            $consulta2 = Operatoria::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
   
    public function totalesIndex($paciente_id, $consulta)
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

        return view('admin.parte3Historia.totales', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
      public function totales(Request $req)
    {

        $data = $req->all();
      //  dd($data);

            //$consulta2 = DentadurasTotales::all();
            //dd($consulta2);
        DB::beginTransaction();


        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor']       = Auth::user()->id;
            $data['validar']        = '';
            $data['fecha_validacion']        = '';

            unset($data['_token']);
            unset($data['historia']);

            $verificar = DB::table('dentaduras_totales')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->count();

            if ($verificar > 0) {

                $id = DB::table('dentaduras_totales')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->pluck('dentaduras_totales.id_dentadura_total');

                $data['id_dentadura_total'] = $id[0];

                DB::table('dentaduras_totales')
                    ->where('paciente_id', $data['paciente_id'])
                    ->where('consulta_id', $data['consulta_id'])
                    ->where('fecha', $data['fecha'])
                    ->delete();

            }
           // dd($data);
            $consulta2 = DentadurasTotales::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
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

        return view('admin.diagnostico_clinico', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }
     public function parcialesIndex($paciente_id, $consulta)
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

        return view('admin.parte3Historia.parciales', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }

}
