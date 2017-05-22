<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\RegistroImageneologia;

use App\Http\Controller\Auth\AuthController;
use Auth;
use DB;

use App\Http\Requests;

class ImagenController extends Controller
{
    public function index($paciente_id,$consulta){
        
       $consulta = intval($consulta);

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();

         $imagen = DB::table('registros_imageneologicos')
                ->where('paciente_id',$paciente_id)
                ->where('consulta_id',$consulta)
                ->get();

        return view('admin.registro_imageneologica', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente, 'imagen'=>$imagen]);
       
    }

    public function safeImaging(Request $req){

    	$file = $_FILES['imagen_'];
	    $dir_upload = 'images/';
	    $new_name = time() . '-' .$file['name'];
	    $copied = copy($file['tmp_name'], $dir_upload . $new_name);

	    //echo "<pre>"; print_r($req->input('title')); echo "</pre>"; die();
       
             
            DB::table('registros_imageneologicos')->insert(
		    	['ruta' => $dir_upload. $new_name,
		    	 'fecha' => date('Y-m-d',time()),
		    	 'usuario_id' => Auth::user()->id,
		    	 'paciente_id' => $req->input('paciente_id'),
		    	 'consulta_id' => $req->input('consulta_id'),
		    	 'titulo_imagen' => $req->input('title')
		    	 ]
			);
			
        return redirect('/registro_imageneologico/'.$req->input('paciente_id').'/'.$req->input('consulta_id'));
    }
    public function deleteImaging(Request $req){
        
             //dd($req->input('ruta'));
            DB::table('registros_imageneologicos')
                ->where('ruta',$req->input('ruta'))
                ->delete();
                unlink($req->input('ruta'));

        return 1;
    }
    public function safeStudy(){
        $data = Input::all();
        DB::beginTransaction();
        try{
            $result = DB::table('registros_imageneologicos')
                    ->where('ruta',$data['ruta'])
                    ->update(['titulo_imagen'=>$data['title'],'estudio_imagen'=>$data['estudio']]);
        } catch (\Exception $ex) {
            DB::rollback();
        }
        DB::commit();
        return redirect('/imaging/'.$data['consulta_id'].'/'.$data['paciente_id']);
    }
}
