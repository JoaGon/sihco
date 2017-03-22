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
    public function index($consulta,$paciente){
        
        $imagen = DB::table('registros_imageneologicos')
                ->where('paciente_id',$paciente)
                ->where('consulta_id',$consulta)
                ->get();
        $nombre = DB::table('paciente')
                ->where('id_paciente',$paciente)
                ->first();

        return view('admin.imagen_paciente',['consulta_id'=>$consulta,'paciente_id'=>$paciente,
            'imagen'=>$imagen,'nombre'=>$nombre->nombre,'apellido'=>$nombre->apellido]);
    }

    public function safeImaging(Request $req){

    	$file = $_FILES['imagen_'];
	    $dir_upload = 'images/';
	    $new_name = time() . '-' .$file['name'];
	    $copied = copy($file['tmp_name'], $dir_upload . $new_name);

	    //echo "<pre>"; print_r($req->input('title')); echo "</pre>"; die();
       
       
            /*$imagenologia = new RegistroImageneologia;
            $imagenologia->ruta = $dir_upload. $new_name;
            $imagenologia->fecha = date('Y-m-d',time());
            $imagenologia->usuario_id = Auth::user()->id;
            $imagenologia->paciente_id = $req->input('paciente_id');
            $imagenologia->consulta_id = $req->input('consulta_id');
            $imagenologia->titulo_imagen = '';
            $imagenologia->save();*/
             DB::beginTransaction();
             try{
            DB::table('registros_imageneologicos')->insert(
		    	['ruta' => $dir_upload. $new_name,
		    	 'fecha' => date('Y-m-d',time()),
		    	 'usuario_id' => Auth::user()->id,
		    	 'paciente_id' => $req->input('paciente_id'),
		    	 'consulta_id' => $req->input('consulta_id'),
		    	 'titulo_imagen' => $req->input('title')
		    	 ]
			);
			 } catch (\Exception $ex) {
            DB::rollback();
        }
        DB::commit();
        
        return redirect('/imagen/'.$req->input('consulta_id').'/'.$req->input('paciente_id'));
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
