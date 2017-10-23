<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

use App\Paciente as Paciente;
use App\Persona as Persona;
use App\Usuario as Usuario;

use App\Valores_listas as Valores_listas;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index()
    {
        /*DB::beginTransaction();

        $usuario = DB::table("users")
        ->get();
        DB::commit();*/
        $nivel = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'nivel_educacional')
            ->get();
        $situacion = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'situacion_laboral')
            ->get();

        $zona = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'zona_residencia')
            ->get();

        $lee_escribe = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'lee_escribe')
            ->get();
        $convive = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'convive')
            ->get();

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.ci', '=', 'paciente.ci')
            ->get();

        //dd($paciente);
        return view('admin.pacientes',
            ['pacientes'  => $paciente,
                'niveles'     => $nivel,
                'situaciones' => $situacion,
                'zonas'       => $zona,
                'lees'        => $lee_escribe,
                'convives'    => $convive,
            ]);

    }

    public function edit(Request $request)
    {
        //echo '<pre>';print_r($request); echo '</pre>'; die();
        $paciente = DB::table('persona')
            ->join('paciente', 'persona.ci', '=', 'paciente.ci')
            ->where('id_paciente', $request->id_paciente)
            ->get();

        return $paciente;
    }

    public function update(Request $request)
    {
        // echo '<pre>';print_r($request->input('rol_edit')); echo '</pre>'; die();
        Persona::where('id_persona', '=', $request->input('persona_id'))->update([
            'nombre'           => $request->input('name_edit'),
            'apellido'         => $request->input('apellido_edit'),
            'telefono'         => $request->input('telefono_edit'),
            'genero'           => $request->input('sexo_edit'),
            'celular'          => $request->input('celular_edit'),
            'fecha_nacimiento' => $request->input('nacimiento_edit'),
            'direccion'        => $request->input('direccion_edit'),
            'ci'               => $request->input('cedula_edit'),
        ]);

        Paciente::where('id_paciente', '=', $request->input('id_edit'))
            ->update([
                'grupo_sanguineo'    => $request->input('grupo_sanguineo'),
                'familiar_cercano'   => $request->input('familiar_cercano'),
                'parentesco'         => $request->input('parentesco'),
                'direccion_familiar' => $request->input('direccion_familiar'),
                'telefono_familiar'  => $request->input('telefono_familiar'),
                'nivel_educacional'  => $request->input('nivel_educacional'),
                'convive'            => $request->input('convive'),
                'lee_escribe'        => $request->input('lee_escribe'),
                'zona_residencia'    => $request->input('zona_residencia'),
                'situacion_laboral'  => $request->input('situacion_laboral'),
                'lugar_nacimiento'   => $request->input('lugar_nacimiento'),
                'ocupacion'          => $request->input('ocupacion_edit'),
                'estado_civil'       => $request->input('estado_civil'),
                'fecha_ingreso'      => $request->input('ingreso_edit'),
                'ultimo_usuario'     => Auth::user()->id,
                'ci'                 => $request->input('cedula_edit'),

            ]);
        return redirect('/pacientes')->with('status', 'El Paciente ha sido actualizado');
    }
    public function destroy($id)
    {
        $paciente = DB::table('paciente')->where('id_paciente', $id)->pluck('paciente.persona_id');
        Paciente::where('id_paciente', $id)->delete();
        Persona::where('id_persona', $paciente[0])->delete();

        return redirect('/pacientes')->with('status', 'El Paciente ha sido eliminado');
    }

      public function cita()
    {
        $nivel = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'nivel_educacional')
            ->get();
        $situacion = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'situacion_laboral')
            ->get();

        $zona = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'zona_residencia')
            ->get();

        $lee_escribe = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'lee_escribe')
            ->get();
        $convive = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'convive')
            ->get();

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.ci', '=', 'paciente.ci')
            ->get();

        //dd($paciente);
        return view('admin.cita',
            ['pacientes'  => $paciente,
                'niveles'     => $nivel,
                'situaciones' => $situacion,
                'zonas'       => $zona,
                'lees'        => $lee_escribe,
                'convives'    => $convive,
            ]);
    }
     public function citaRegister(Request $req)
    {
      // dd($req->all());
       $nro_historia = DB::table('paciente')
       ->where('id_paciente','=',$req->input('paciente_id'))
       ->select('nro_historia')
       ->get();
       $date = $req->input('date_appointment');
     //  dd($req->input('paciente_id'), $req->input('motivo'), $req->input('clinica'), $req->input('especialidad'), $req->input('observacion'), Auth::user()->id, $nro_historia[0]->nro_historia, $date);
       $now = date('Y-m-d H:s:i');
       //dd($now);
       DB::table('citas')->insert(
        [
        'paciente_id' => $req->input('paciente_id'),
        'fecha_cita' => $date,
        'motivo' => $req->input('motivo'),
        'clinica' => $req->input('clinica'),
        'especialidad' => $req->input('especialidad'),
        'observacion' => $req->input('observacion'),
        'ultimo_usuario' => Auth::user()->id, 
        'nro_historia' =>$nro_historia[0]->nro_historia, 
        'estatus' =>'solicitada',
        'profesor' => Auth::user()->id,
        'validar' =>'',
        'hora' => $req->input('hour_send'),
        'created_at'=>$now,
        'updated_at'=>$now

        ]);

           $nivel = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'nivel_educacional')
            ->get();
        $situacion = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'situacion_laboral')
            ->get();

        $zona = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'zona_residencia')
            ->get();

        $lee_escribe = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'lee_escribe')
            ->get();
        $convive = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'convive')
            ->get();

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.ci', '=', 'paciente.ci')
            ->get();

    //dd($paciente);
        return redirect('/cita')->with('status', 'La cita ha sido registrada');;
    }

}
