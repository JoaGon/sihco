<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\Roles;
use App\Terreno;
use App\Desc_Uso;
use App\Inmueble;
use App\Vulnerabilidad;
use App\Vuln;
use App\Persona;

//use App\Pais;

class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getUltimoDiaMes($elAnio,$elMes) {
       return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
   }


   
   public function todos_usuarios($anio,$mes)
   {
    //dd($anio);
    $primer_dia=1;
    $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
    $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
    $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
    $Persona=Persona::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
            ->get();
    $ct=count($Persona);

    for($d=1;$d<=$ultimo_dia;$d++){
        $registros[$d]=0;     
    }

    foreach($Persona as $Personas){
        $diasel=intval(date("d",strtotime($Personas->created_at) ) );
        $registros[$diasel]++;    
    }

      foreach($registros as $key=>$value){
      $string[]=array('x'=>$key,'y'=>$value);
      }
   // dd($string);
   

    //$data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros, "dias"=>$dias);
    return   json_encode(["dias"=>$string]);
}


   public function registro_hoja1($anio,$mes)
   {
    $primer_dia=1;
    $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
    $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
    $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
    $inmueble=Inmueble::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->where('estado','Hoja1_completada')->get();
    $ct=count($inmueble);

    for($d=1;$d<=$ultimo_dia;$d++){
        $registros[$d]=0;     
    }

    foreach($inmueble as $inmuebles){
        $diasel=intval(date("d",strtotime($inmuebles->created_at) ) );
        $registros[$diasel]++;    
    }


    $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
    return   json_encode($data);
}




public function registro_hoja2($anio,$mes)
{
    $primer_dia=1;
    $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
    $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
    $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
    $inmueble=Inmueble::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->where('estado','Hoja2_Completada.')->get();
        //dd($inmueble);
    $ct=count($inmueble);

    for($d=1;$d<=$ultimo_dia;$d++){
        $registros[$d]=0;     
    }

    foreach($inmueble as $inmuebles){
        $diasel=intval(date("d",strtotime($inmuebles->created_at) ) );
        $registros[$diasel]++;    
    }

    $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        //dd($data);
    return   json_encode($data);
}
public function registro_hoja3($anio,$mes)
{
    $primer_dia=1;
    $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
    $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
    $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
    $inmueble=Inmueble::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->where('estado','Hoja3_Completada.')->get();
    $ct=count($inmueble);

    for($d=1;$d<=$ultimo_dia;$d++){
        $registros[$d]=0;     
    }

    foreach($inmueble as $inmuebles){
        $diasel=intval(date("d",strtotime($inmuebles->created_at) ) );
        $registros[$diasel]++;    
    }

    $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
    return json_encode($data);
}




public function total_publicaciones(){
 DB::table('v_vulnerabilidad')->where('nombre','')->delete();   
 $pu=DB::table('v_vulnerabilidad')->where('nombre','Talud_Excesiva')->select('nombre','id')->first();
 $pu1=DB::table('v_vulnerabilidad')->where('nombre','Torre_Alta_Tension')->select('nombre','id')->first();
 $pu2=DB::table('v_vulnerabilidad')->where('nombre','Arbol_con_riesgo')->select('nombre','id')->first();
 $pu3=DB::table('v_vulnerabilidad')->where('nombre','Cauce_Desbordable')->select('nombre','id')->first();
 $pu4=DB::table('v_vulnerabilidad')->where('nombre','Condiciones_de_Borde')->select('nombre','id')->first();
 $pu5=DB::table('v_vulnerabilidad')->where('nombre','Follaje_Seco')->select('nombre','id')->first();
 $pu6=DB::table('v_vulnerabilidad')->where('nombre','Grieta_o_fractura')->select('nombre','id')->first();
 $pu7=DB::table('v_vulnerabilidad')->where('nombre','Pendiente_Excesiva')->select('nombre','id')->first();
 $pu8=DB::table('v_vulnerabilidad')->where('nombre','Red_Pluvial_Reducida')->select('nombre','id')->first();
 $pu9=DB::table('v_vulnerabilidad')->where('nombre','Relleno')->select('nombre','id')->first();
 $pu10=DB::table('v_vulnerabilidad')->where('nombre','Relleno_Sanitario')->select('nombre','id')->first();

 $tipospublicacion=[$pu,$pu1,$pu2,$pu3,$pu4,$pu5,$pu6,$pu7,$pu8,$pu9,$pu10];



 
        //dd($tipospublicacion);
 $ctp=count($tipospublicacion);
         //dd($ctp);
        //$publicaciones=DB::table('v_vulnerabilidad')->get();
 
 $publicaciones=Vulnerabilidad::all();
 
       // $tipospublicacion=Vulnerabilidad::all();
        // dd($publicaciones);
 $ct =count($publicaciones);
 //dd($ct);
 for($i=0;$i<=$ctp-1;$i++){
   $idTP=$tipospublicacion[$i]->nombre;

   $numerodepubli[$idTP]=0;

}

for($i=0;$i<=$ct-1;$i++){
   $idTP=$publicaciones[$i]->nombre;
   $numerodepubli[$idTP]++;
//dd($numerodepubli);
   
   
}

$data=array("totaltipos"=>$ctp,"tipos"=>$tipospublicacion, "numerodepubli"=>$numerodepubli);
        //dd($data);
return json_encode($data);
}



public function total_publicaciones1(){
   DB::table('v_vuln')->where('nombre','')->delete();   
   $pu=DB::table('v_vuln')->where('nombre','Filtraciones')->select('nombre','id')->first();
   $pu1=DB::table('v_vuln')->where('nombre','Bombona_de_Gas')->select('nombre','id')->first();
   $pu2=DB::table('v_vuln')->where('nombre','Fragilidad_en_Techo')->select('nombre','id')->first();
   $pu3=DB::table('v_vuln')->where('nombre','Grietas_en_Paredes')->select('nombre','id')->first();
   $pu4=DB::table('v_vuln')->where('nombre','Grietas_en_Pisos')->select('nombre','id')->first();
   $pu5=DB::table('v_vuln')->where('nombre','Inst_Electricas')->select('nombre','id')->first();
   $pu6=DB::table('v_vuln')->where('nombre','Tanque_de_Agua')->select('nombre','id')->first();
   $pu7=DB::table('v_vuln')->where('nombre','Tanque_de_Gas')->select('nombre','id')->first();


   $tipospublicacion=[$pu,$pu1,$pu2,$pu3,$pu4,$pu5,$pu6,$pu7];



   
        //dd($tipospublicacion1);
   $ctp=count($tipospublicacion);
         //dd($ctp);
        //$publicaciones=DB::table('v_vulnerabilidad')->get();
   
   $publicaciones=Vuln::all();
   
       // $tipospublicacion=Vulnerabilidad::all();
        // dd($publicaciones);
   $ct =count($publicaciones);
 //dd($ct);
   for($i=0;$i<=$ctp-1;$i++){
       $idTP=$tipospublicacion[$i]->nombre;

       $numerodepubli[$idTP]=0;

   }

   for($i=0;$i<=$ct-1;$i++){
       $idTP=$publicaciones[$i]->nombre;
         //dd($idTP);
       $numerodepubli[$idTP]++;

       
       
   }

   $data=array("totaltipos"=>$ctp,"tipos"=>$tipospublicacion, "numerodepubli"=>$numerodepubli);
        //dd($data);
   return json_encode($data);
}

public function index()
{
    $anio=date("Y");
    $mes=date("m");
    return view("listados.listado_graficas")
    ->with("anio",$anio)
    ->with("mes",$mes);
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("admin.graficas");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
