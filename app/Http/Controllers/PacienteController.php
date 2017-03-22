<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Paciente as Paciente;
use App\Persona;

use App\Valores_listas as Valores_listas;
use Auth;
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
            ['pacientes'=> $paciente,
            'niveles'=>$nivel,
            'situaciones'=>$situacion,
            'zonas'=>$zona,
            'lees'=>$lee_escribe,
            'convives'=>$convive
            ]);

    }


    public function edit(Request $request)
    {
    	//echo '<pre>';print_r($request); echo '</pre>'; die();
    	  $paciente=DB::table('persona')
         ->join('paciente', 'persona.ci', '=', 'paciente.ci')
         ->where('id_paciente',$request->id_paciente)
         ->get();
        
        return $paciente;
    }

     public function update(Request $request)
    {
         // echo '<pre>';print_r($request->input('rol_edit')); echo '</pre>'; die();
         DB::table('persona')->where('id_persona','=',$request->input('persona_id'))->update([
                    'nombre'=>$request->input('name_edit'),
                    'apellido'=> $request->input('apellido_edit'),
                    'telefono'=> $request->input('telefono_edit'),
                    'genero' => $request->input('sexo_edit'),
                    'celular' => $request->input('celular_edit'),
                    'fecha_nacimiento' => $request->input('nacimiento_edit'),
                    'direccion' => $request->input('direccion_edit'),
                    'ci' => $request->input('cedula_edit'),
                ]); 

         DB::table('paciente')->where('id_paciente','=',$request->input('id_edit'))
                ->update([
                    'grupo_sanguineo'=>$request->input('grupo_sanguineo'),
                    'familiar_cercano'=> $request->input('familiar_cercano'),
                    'parentesco' => $request->input('parentesco'),
                    'direccion_familiar'=> $request->input('direccion_familiar'),
                    'telefono_familiar' => $request->input('telefono_familiar'),
                    'nivel_educacional' => $request->input('nivel_educacional'),
                    'convive' => $request->input('convive'),
                    'lee_escribe' => $request->input('lee_escribe'),
                    'zona_residencia' => $request->input('zona_residencia'),
                    'situacion_laboral' => $request->input('situacion_laboral'),
                    'lugar_nacimiento' => $request->input('lugar_nacimiento'),
                    'ocupacion' => $request->input('ocupacion_edit'),
                    'estado_civil' => $request->input('estado_civil'),
                    'fecha_ingreso' => $request->input('ingreso_edit'),
                    'ultimo_usuario' => Auth::user()->id,
                    'ci' => $request->input('cedula_edit'),


                    
                ]); 
    	return redirect('/pacientes')->with('status','El Paciente ha sido actualizado');
    }
     public function destroy($id)
        {
            $paciente = DB::table('paciente')->where('id_paciente',$id)->pluck('paciente.persona_id');
            DB::table('paciente')->where('id_paciente',$id)->delete();
            DB::table('persona')->where('id_persona',$paciente[0])->delete();
           
           
            return redirect('/pacientes')->with('status','El Paciente ha sido eliminado');
        }

}
