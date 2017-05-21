<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Paciente as Paciente;
use App\ResumenMedica;
use App\Enfermedades_renales as Enfer_Renal;
use App\Enfermedades_cardiovasculares as Enfer_Cardiovascular;
use App\Enfermedades_patologicas as Enfer_Patologica;
use App\Lista as Lista;
use App\Paciente_enfer_patologica as Paciente_Enfer_Patologica;
use App\ResumenOdontologico;
use App\DatosClinicos;
use App\CondicionSexual;
use App\HistoriaOdontologica;
use App\AntecedentesFamiliares;
use App\Valores_listas as Valores_listas;
use Auth;

class HistoriaController extends Controller
{

    public function antecedentefamiliar(Request $req)
    {	
    	$data = $req->all();
      //  dd($data['consulta_id']);

        DB::beginTransaction();

        try {

        	$consulta = intval($req->input('consulta_id'));

   

                $data['ultimo_usuario'] = Auth::user()->id;
                $data['profesor'] = Auth::user()->id;
                $data['validar'] = '';

                unset($data['_token']);
                unset($data['historia']);
                unset($data['tipo_enfermedad']);
                unset($data['circulo_familiar']);
                unset($data['enfer_cardiov']);
                unset($data['enfer_renal']);
                unset($data['enfer_alergica']);

                $verificar = DB::table('antecedentes_familiares')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

                if($verificar > 0){
                    $id = DB::table('antecedentes_familiares')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('antecedentes_familiares.id_antecedente_familiar');

                        $data['id_antecedente_familiar'] = $id[0];

                        DB::table('antecedentes_familiares')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();
                }

                $consulta2 = DB::table('antecedentes_familiares')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();
        


    }

    public function antecedentepersonal(Request $req)
    {	
    	$data = $req->all();
         DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor'] = Auth::user()->id;
            $data['validar'] = '';

            unset($data['_token']);
            unset($data['historia']);
            unset($data['tipo_enfermedad']);
            unset($data['circulo_familiar']);
            unset($data['enfer_cardiov']);
            unset($data['enfer_renal']);
            unset($data['enfer_alergica']);

            $verificar = DB::table('antecedentes_personales')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

            if($verificar > 0){

                $id = DB::table('antecedentes_personales')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('antecedentes_personales.id_antecedente_personal');

                        $data['id_antecedente_personal'] = $id[0];

                        DB::table('antecedentes_personales')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();

            }
            $consulta2 = DB::table('antecedentes_personales')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();


    }

    public function cardiovasculares(){


        $cardiovascular = Enfer_Cardiovascular::all();

         return $cardiovascular;
    }
    public function renales(){


       
         $renal = Enfer_Renal::all();

         return $renal;
    }
    public function alergicas(){


       
         $alergica = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','alergicas')
         ->get();


         return $alergica;
    }
    public function transmision_sexual(){


       
         $transmision_sexual = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','transmision_sexual')
         ->get();


         return $transmision_sexual;
    }
    public function infecciosas(){


       
         $infecciosas = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','infecciosas')
         ->get();


         return $infecciosas;
    }
    public function cancer(){


       
         $cancer = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','cancer')
         ->get();


         return $cancer;
    }



    public function circulo(){


        $circulo = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'circulo_familiar') 
                        ->get();

         return $circulo;
    }

       public function antecedentefamiliarIndex($paciente_id,$consulta)
    
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
      //  $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();


        $cardiovascular = DB::table('enfermedades_cardiovasculares')
         ->get();

          $circulo = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'circulo_familiar') 
                        ->get();

        return view('admin.antecedente_familiar', [
            'consulta'=>$consulta,
            'id_paciente'=>$paciente_id,
             'pacientes'=> $paciente,
             'circulos'=>$circulo,
             'cardiovasculares' =>$cardiovascular
             ]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
     public function enfermedadCardiovascular(Request $req)
    {   
       // dd($req);
        DB::table('paciente_enfer_cardiovascular')
              ->insert([
                'paciente_id'=> $req->input('paciente'),
                'enfermedad_cardiovascular_id'=>$req->input('id_enfermedad'),
                'circulo_hereditario'=>$req->input('circulo_id'),
                'consulta_id'=>$req->input('consulta'),
                'ultimo_usuario'=>Auth::user()->id,
                'antecedente'=>$req->input('antecedente')]);

       $enfer = DB::table('paciente_enfer_cardiovascular')
                ->join('enfermedades_cardiovasculares','paciente_enfer_cardiovascular.enfermedad_cardiovascular_id','=','enfermedades_cardiovasculares.id_enfermedad_cardiovascular')
                ->join('valores_listas','paciente_enfer_cardiovascular.circulo_hereditario','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('antecedente',$req->input('antecedente'))
                ->get();
                //dd($enfer);
       return $enfer;


    }
     public function EliminarEnfermedadCardiovascular(Request $req)
    {   
       // dd($req);
        DB::table('paciente_enfer_cardiovascular')
        ->where('id_paciente_enfer_cardiovascular',$req->input('id_paciente_enfer_cardiovascular'))
        ->delete();

        $enfer = DB::table('paciente_enfer_cardiovascular')
                ->join('enfermedades_cardiovasculares','paciente_enfer_cardiovascular.enfermedad_cardiovascular_id','=','enfermedades_cardiovasculares.id_enfermedad_cardiovascular')
                ->join('valores_listas','paciente_enfer_cardiovascular.circulo_hereditario','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('antecedente',$req->input('antecedente'))

                ->get();

                //dd($enfer);
       return $enfer;


    }

    public function EliminarCardiovascular(Request $req){

        DB::table('enfermedades_cardiovasculares')
        ->where('id_enfermedad_cardiovascular',$req->input('id_enfermedad'))
        ->delete();
         $enfer = DB::table('enfermedades_cardiovasculares')
                ->get();

         return $enfer;

    }
        public function InsertarEnfermedadCardiovascular(Request $req)
    
    
    {   
       // dd($req);
        Enfer_Cardiovascular::create([
            'enfermedad'=>$req->input('enfermedad'),
            'ultimo_usuario'=> Auth::user()->id ]);

        $enfer = Enfer_Cardiovascular::all();

                //dd($enfer);
       return $enfer;


    }
    public function enfermedadRenal(Request $req)
    {   
       // dd($req);
        DB::table('paciente_enfer_renal')
              ->insert([
                'paciente_id'=> $req->input('paciente'),
                'enfermedad_renal_id'=>$req->input('id_enfermedad'),
                'circulo_hereditario'=>$req->input('circulo_id'),
                'consulta_id'=>$req->input('consulta'),
                'ultimo_usuario'=> Auth::user()->id,
                'antecedente'=>$req->input('antecedente')]);


       $enfer_ = DB::table('paciente_enfer_renal')
                ->join('enfermedades_renales','paciente_enfer_renal.enfermedad_renal_id','=','enfermedades_renales.id_enfermedad_renal')
                ->join('valores_listas','paciente_enfer_renal.circulo_hereditario','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('antecedente',$req->input('antecedente'))
                ->get();
                //dd($enfer);
       return $enfer_;


    }
      public function EliminarEnfermedadRenal(Request $req)
    {   
       // dd($req);
        DB::table('paciente_enfer_renal')
        ->where('id_paciente_enfer_renal',$req->input('id_paciente_enfer_renal'))
        ->delete();

        $enfer = DB::table('paciente_enfer_renal')
                ->join('enfermedades_renales','paciente_enfer_renal.enfermedad_renal_id','=','enfermedades_renales.id_enfermedad_renal')
                ->join('valores_listas','paciente_enfer_renal.circulo_hereditario','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('antecedente',$req->input('antecedente'))
                ->get();

                //dd($enfer);
       return $enfer;


    }
    public function InsertarEnfermedadRenal(Request $req)
    
    {   
      Enfer_Renal::create([
            'enfermedad'=>$req->input('enfermedad'),
            'ultimo_usuario'=> Auth::user()->id ]);

        $enfer = Enfer_Renal::all();

       return $enfer;

    }
    public function Eliminar_enfermedad_renal(Request $req)
    {
        DB::table('enfermedades_renales')
        ->where('id_enfermedad_renal',$req->input('id_enfermedad'))
        ->delete();
         $enfer = DB::table('enfermedades_renales')
                ->get();

         return $enfer;

    }
/*******************ALergicas******************/

   
    public function InsertarEnfermedadAlergica(Request $req)
    {   
          $id_categorias = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'categorias_patologicas') 
                        ->where('valores_listas.codigo', 'alergicas') 
                        ->pluck('valores_listas.id_valor');



        DB::table('enfermedades_patologicas')
        ->insert([
            'enfermedad'=>$req->input('enfermedad'),
            'valor_id'=>$id_categorias[0],
            'ultimo_usuario'=> Auth::user()->id]);

         $alergica = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','alergicas')
         ->get();


         return $alergica;
    }

    public function EliminarAlergica(Request $req){

        DB::table('enfermedades_patologicas')
        ->where('id_enfermedad_patologica',$req->input('id_enfermedad'))
        ->delete();

          $alergica = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','alergicas')
         ->get();
        return $alergica;
    }

    public function enfermedadAlergica(Request $req)
    {   
        DB::table('paciente_enfer_patologicas')
              ->insert([
                'paciente_id'=> $req->input('paciente'),
                'enfermedad_patologica_id'=>$req->input('id_enfermedad'),
                'circulo_familiar_id'=>$req->input('circulo_id'),
                'consulta_id'=>$req->input('consulta'),
                'ultimo_usuario'=>Auth::user()->id,
                'antecedente'=>$req->input('antecedente')]);
                        //dd($req->input('antecedente'));


       $id_categorias = DB::table('listas')
                ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                ->where('listas.lista', 'categorias_patologicas') 
                ->where('valores_listas.codigo', 'alergicas') 
                ->pluck('valores_listas.id_valor');

        $enfer = DB::table('paciente_enfer_patologicas')
                ->join('enfermedades_patologicas','paciente_enfer_patologicas.enfermedad_patologica_id','=','enfermedades_patologicas.id_enfermedad_patologica')
                ->join('valores_listas','paciente_enfer_patologicas.circulo_familiar_id','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('enfermedades_patologicas.valor_id',$id_categorias[0])
                ->where('antecedente',$req->input('antecedente'))
                ->get();

       return $enfer;

    }

    public function EliminarEnfermedadAlergica(Request $req)
    {   
       // dd($req);
        DB::table('paciente_enfer_patologicas')
        ->where('id_paciente_enfer_patologica',$req->input('id_paciente_enfer'))
        ->delete();

         $id_categorias = DB::table('listas')
                ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                ->where('listas.lista', 'categorias_patologicas') 
                ->where('valores_listas.codigo', 'alergicas') 
                ->pluck('valores_listas.id_valor');

        $enfer = DB::table('paciente_enfer_patologicas')
                ->join('enfermedades_patologicas','paciente_enfer_patologicas.enfermedad_patologica_id','=','enfermedades_patologicas.id_enfermedad_patologica')
                ->join('valores_listas','paciente_enfer_patologicas.circulo_familiar_id','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('enfermedades_patologicas.valor_id',$id_categorias[0])
                ->where('antecedente',$req->input('antecedente'))
                ->get();

       return $enfer;

    }

    /***************************************************************/

    /*******************Infecciosas******************/

   
    public function InsertarEnfermedadInfecciosa(Request $req)
    {   
          $id_categorias = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'categorias_patologicas') 
                        ->where('valores_listas.codigo', 'infecciosas') 
                        ->pluck('valores_listas.id_valor');
                        //dd($id_categorias);

        DB::table('enfermedades_patologicas')
        ->insert([
            'enfermedad'=>$req->input('enfermedad'),
            'valor_id'=>$id_categorias[0],
            'ultimo_usuario'=> Auth::user()->id]);


         $infecciosa = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','infecciosas')
         ->get();


         return $infecciosa;
    }

    public function EliminarInfecciosa(Request $req){

        DB::table('enfermedades_patologicas')
        ->where('id_enfermedad_patologica',$req->input('id_enfermedad'))
        ->delete();

          $infecciosas = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','infecciosas')
         ->get();

        return $infecciosas;
    }

     public function enfermedadInfecciosa(Request $req)
    {   
        DB::table('paciente_enfer_patologicas')
              ->insert([
                'paciente_id'=> $req->input('paciente'),
                'enfermedad_patologica_id'=>$req->input('id_enfermedad'),
                'circulo_familiar_id'=>$req->input('circulo_id'),
                'consulta_id'=>$req->input('consulta'),
                'ultimo_usuario'=>Auth::user()->id,
                'antecedente'=>$req->input('antecedente')]);

       $id_categorias = DB::table('listas')
                ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                ->where('listas.lista', 'categorias_patologicas') 
                ->where('valores_listas.codigo', 'infecciosas') 
                ->pluck('valores_listas.id_valor');

        $enfer = DB::table('paciente_enfer_patologicas')
                ->join('enfermedades_patologicas','paciente_enfer_patologicas.enfermedad_patologica_id','=','enfermedades_patologicas.id_enfermedad_patologica')
                ->join('valores_listas','paciente_enfer_patologicas.circulo_familiar_id','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('enfermedades_patologicas.valor_id',$id_categorias[0])
                ->where('antecedente',$req->input('antecedente'))
                ->get();

       return $enfer;

    }

    public function EliminarEnfermedadInfecciosa(Request $req)
    {   
       // dd($req);
        DB::table('paciente_enfer_patologicas')
        ->where('id_paciente_enfer_patologica',$req->input('id_paciente_enfer'))
        ->delete();

         $id_categorias = DB::table('listas')
                ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                ->where('listas.lista', 'categorias_patologicas') 
                ->where('valores_listas.codigo', 'infecciosas') 
                ->pluck('valores_listas.id_valor');

        $enfer = DB::table('paciente_enfer_patologicas')
                ->join('enfermedades_patologicas','paciente_enfer_patologicas.enfermedad_patologica_id','=','enfermedades_patologicas.id_enfermedad_patologica')
                ->join('valores_listas','paciente_enfer_patologicas.circulo_familiar_id','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('enfermedades_patologicas.valor_id',$id_categorias[0])
                ->where('antecedente',$req->input('antecedente'))
                ->get();

       return $enfer;

    }



    /***************************************************************/

     /*******************Transmision Sexual******************/

   
    public function InsertarEnfermedadTransmSexual(Request $req)
    {   
          $id_categorias = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'categorias_patologicas') 
                        ->where('valores_listas.codigo', 'transmision_sexual') 
                        ->pluck('valores_listas.id_valor');
                        //dd($id_categorias);

        DB::table('enfermedades_patologicas')
        ->insert([
            'enfermedad'=>$req->input('enfermedad'),
            'valor_id'=>$id_categorias[0],
            'ultimo_usuario'=> Auth::user()->id ]);


         $sexual = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','transmision_sexual')
         ->get();


         return $sexual;
    }

    public function EliminarTransmSexual(Request $req){

        DB::table('enfermedades_patologicas')
        ->where('id_enfermedad_patologica',$req->input('id_enfermedad'))
        ->delete();

          $sexual = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','transmision_sexual')
         ->get();
         
        return $sexual;
    }

     public function enfermedadTransmSexual(Request $req)
    {   
        DB::table('paciente_enfer_patologicas')
              ->insert([
                'paciente_id'=> $req->input('paciente'),
                'enfermedad_patologica_id'=>$req->input('id_enfermedad'),
                'circulo_familiar_id'=>$req->input('circulo_id'),
                'consulta_id'=>$req->input('consulta'),
                'ultimo_usuario'=>Auth::user()->id,
                'antecedente'=>$req->input('antecedente')]);

       $id_categorias = DB::table('listas')
                ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                ->where('listas.lista', 'categorias_patologicas') 
                ->where('valores_listas.codigo', 'transmision_sexual') 
                ->pluck('valores_listas.id_valor');

        $enfer = DB::table('paciente_enfer_patologicas')
                ->join('enfermedades_patologicas','paciente_enfer_patologicas.enfermedad_patologica_id','=','enfermedades_patologicas.id_enfermedad_patologica')
                ->join('valores_listas','paciente_enfer_patologicas.circulo_familiar_id','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('enfermedades_patologicas.valor_id',$id_categorias[0])
                ->where('antecedente',$req->input('antecedente'))
                ->get();

       return $enfer;

    }

    public function EliminarEnfermedadTransmSexual(Request $req)
    {   
       // dd($req);
        DB::table('paciente_enfer_patologicas')
        ->where('id_paciente_enfer_patologica',$req->input('id_paciente_enfer'))
        ->delete();

         $id_categorias = DB::table('listas')
                ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                ->where('listas.lista', 'categorias_patologicas') 
                ->where('valores_listas.codigo', 'transmision_sexual') 
                ->pluck('valores_listas.id_valor');

        $enfer = DB::table('paciente_enfer_patologicas')
                ->join('enfermedades_patologicas','paciente_enfer_patologicas.enfermedad_patologica_id','=','enfermedades_patologicas.id_enfermedad_patologica')
                ->join('valores_listas','paciente_enfer_patologicas.circulo_familiar_id','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('enfermedades_patologicas.valor_id',$id_categorias[0])
                ->where('antecedente',$req->input('antecedente'))
                ->get();

       return $enfer;

    }

    /***************************************************************/


     /*******************Cancer******************/

   
    public function InsertarEnfermedadCancer(Request $req)
    {   
          $id_categorias = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'categorias_patologicas') 
                        ->where('valores_listas.codigo', 'cancer') 
                        ->pluck('valores_listas.id_valor');
                        //dd($id_categorias);

        DB::table('enfermedades_patologicas')
        ->insert([
            'enfermedad'=>$req->input('enfermedad'),
            'valor_id'=>$id_categorias[0],
            'ultimo_usuario'=> Auth::user()->id ]);


         $cancer = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','cancer')
         ->get();


         return $cancer;
    }

    public function EliminarCancer(Request $req){

        DB::table('enfermedades_patologicas')
        ->where('id_enfermedad_patologica',$req->input('id_enfermedad'))
        ->delete();

          $cancer = DB::table('enfermedades_patologicas')
         ->join('valores_listas','enfermedades_patologicas.valor_id','=','valores_listas.id_valor')
         ->where('valores_listas.codigo','cancer')
         ->get();
         
        return $cancer;
    }

      public function enfermedadCancer(Request $req)
    {   
        DB::table('paciente_enfer_patologicas')
              ->insert([
                'paciente_id'=> $req->input('paciente'),
                'enfermedad_patologica_id'=>$req->input('id_enfermedad'),
                'circulo_familiar_id'=>$req->input('circulo_id'),
                'consulta_id'=>$req->input('consulta'),
                'ultimo_usuario'=>Auth::user()->id,
                'antecedente'=>$req->input('antecedente')]);

       $id_categorias = DB::table('listas')
                ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                ->where('listas.lista', 'categorias_patologicas') 
                ->where('valores_listas.codigo', 'cancer') 
                ->pluck('valores_listas.id_valor');

        $enfer = DB::table('paciente_enfer_patologicas')
                ->join('enfermedades_patologicas','paciente_enfer_patologicas.enfermedad_patologica_id','=','enfermedades_patologicas.id_enfermedad_patologica')
                ->join('valores_listas','paciente_enfer_patologicas.circulo_familiar_id','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('enfermedades_patologicas.valor_id',$id_categorias[0])
                ->where('antecedente',$req->input('antecedente'))
                ->get();

       return $enfer;

    }

    public function EliminarEnfermedadCancer(Request $req)
    {   
       // dd($req);
        DB::table('paciente_enfer_patologicas')
        ->where('id_paciente_enfer_patologica',$req->input('id_paciente_enfer'))
        ->delete();

         $id_categorias = DB::table('listas')
                ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                ->where('listas.lista', 'categorias_patologicas') 
                ->where('valores_listas.codigo', 'cancer') 
                ->pluck('valores_listas.id_valor');

        $enfer = DB::table('paciente_enfer_patologicas')
                ->join('enfermedades_patologicas','paciente_enfer_patologicas.enfermedad_patologica_id','=','enfermedades_patologicas.id_enfermedad_patologica')
                ->join('valores_listas','paciente_enfer_patologicas.circulo_familiar_id','=','valores_listas.id_valor')
                ->where('paciente_id',$req->input('paciente'))
                ->where('consulta_id',$req->input('consulta'))
                ->where('enfermedades_patologicas.valor_id',$id_categorias[0])
                ->where('antecedente',$req->input('antecedente'))
                ->get();

       return $enfer;

    }



    /***************************************************************/

        public function antecedentepersonalIndex($paciente_id,$consulta)
    {	

        //$data = $req->all();
        $consulta = intval($consulta);
        
      //  $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();


     

        return view('admin.antecedente_personal', [
            'consulta'=>$consulta,
            'id_paciente'=>$paciente_id,
             'pacientes'=> $paciente,
            
             ]);

       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }    
    public function signosvitalesIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	 $consulta = intval($consulta);
        
      //  $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();

        return view('admin.signos_vitales', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       

    }
    public function resumenclinicaIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	 $consulta = intval($consulta);
        
      //  $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();

        return view('admin.resumen_historia_clinica', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
     public function resumenmedico(Request $req)
    {   

        $data = $req->all();
         DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor'] = Auth::user()->id;
            $data['validar'] = '';

            unset($data['_token']);
            unset($data['historia']);
           
            $verificar = DB::table('resumen_historia_medica')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

            if($verificar > 0){

                $id = DB::table('resumen_historia_medica')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('resumen_historia_medica.id_resumen_historia_medica');

                        $data['id_resumen_historia_medica'] = $id[0];

                        DB::table('resumen_historia_medica')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();

            }
            $consulta2 = DB::table('resumen_historia_medica')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();

        
    }

    public function resumenodontologicaIndex($paciente_id,$consulta)
    {	
    	 $consulta = intval($consulta);
        
      //  $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();
        return view('admin.resumen_historia_odontologica', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
     public function resumenodontologica(Request $req)
    {   
      
        $data = $req->all();
         DB::beginTransaction();

        try {

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor'] = Auth::user()->id;
            $data['validar'] = '';

            unset($data['_token']);
            unset($data['historia']);
           
            $verificar = DB::table('resumen_historia_odontologica')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

            if($verificar > 0){

                $id = DB::table('resumen_historia_odontologica')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('resumen_historia_odontologica.id_resumen_historia_odontologica');

                        $data['id_resumen_historia_odontologica'] = $id[0];

                        DB::table('resumen_historia_odontologica')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();

            }
            $consulta2 = DB::table('resumen_historia_odontologica')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();

        
    }

    public function datosclinicosIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
        $consulta = intval($consulta);
        
      //  $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();

            if($paciente[0]->genero == 'M'){
                $genero = 1;
            }else{
                $genero = 0;
            }                        
        return view('admin.datos_clinicos', [
            'consulta'=>$consulta,
            'id_paciente'=>$paciente_id,
             'pacientes'=> $paciente,
             'genero'=>$genero
            
             ]);


    	
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
    public function datosclinicos(Request $req)
    {   

 
         DB::beginTransaction();

        try {

           

            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor'] = Auth::user()->id;
            $data['validar'] = '';

            unset($data['_token']);
            unset($data['historia']);
            unset($data['tipo_enfermedad']);

            $verificar = DB::table('datos_clinicos')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

            if($verificar > 0){

                $id = DB::table('datos_clinicos')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('datos_clinicos.id_dato_clinico');

                        $data['id_dato_clinico'] = $id[0];

                        DB::table('datos_clinicos')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();

            }



            //$consulta2 = DB::table('datos_clinicos')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();

    }
    public function historiaodontologicaIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
        $persona = DB::table('paciente')
              ->where('id_paciente',$paciente_id)
              ->pluck('paciente.persona_id');

         $paciente = DB::table('persona')
         ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
         ->where('persona.id_persona',$persona[0])
         ->get();

       
        $condicion = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'preferencia_sexual') 
                        ->get();

        return view('admin.historia_odontologica', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente,'condiciones'=>$condicion]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
     public function historiaodontologica(Request $req)
    {   

         $data = $req->all();
         DB::beginTransaction();

        try {
             if($data['condicion_sexual_id'] == ''){

                $condicion = DB::table('listas')
                        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
                        ->where('listas.lista', 'preferencia_sexual') 
                        ->where('valores_listas.codigo', 'heterosexual') 
                        ->pluck('valores_listas.id_valor');

                $data['condicion_sexual_id'] = $condicion[0];
             }
            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor'] = Auth::user()->id;
            $data['validar'] = '';

            unset($data['_token']);
            unset($data['historia']);
            unset($data['tipo_enfermedad']);

            $verificar = DB::table('historia_odontologica')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

            if($verificar > 0){

                $id = DB::table('historia_odontologica')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('historia_odontologica.id_historia_odontologica');

                        $data['id_historia_odontologica'] = $id[0];

                        DB::table('historia_odontologica')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();

            }
            $consulta2 = DB::table('historia_odontologica')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();
        
    }

    public function signosvitales(Request $req)
    {	
    	//$data = $req->all();
             $data = $req->all();
         DB::beginTransaction();

        try {
             
            $consulta = intval($req->input('consulta_id'));

            $data['ultimo_usuario'] = Auth::user()->id;
            $data['profesor'] = Auth::user()->id;
            $data['validar'] = '';

            unset($data['_token']);
            unset($data['historia']);
            unset($data['tipo_enfermedad']);

            $verificar = DB::table('signos_vitales')
                ->where('paciente_id',$data['paciente_id'])
                ->where('consulta_id',$data['consulta_id'])
                ->where('fecha',$data['fecha'])
                ->count();

            if($verificar > 0){

                $id = DB::table('signos_vitales')
                        ->where('paciente_id',$data['paciente_id'])
                        ->where('consulta_id',$data['consulta_id'])
                        ->where('fecha',$data['fecha'])
                        ->pluck('signos_vitales.id_signo_vital');

                        $data['id_signo_vital'] = $id[0];

                        DB::table('signos_vitales')
                            ->where('paciente_id',$data['paciente_id'])
                            ->where('consulta_id',$data['consulta_id'])
                            ->where('fecha',$data['fecha'])
                            ->delete();

            }
            $consulta2 = DB::table('signos_vitales')->insert($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }
        
        DB::commit();
    	


    }


}
