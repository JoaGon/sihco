<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Consulta as Consulta;

use Illuminate\Http\Request;

class CitasController extends Controller
{
   
    public function cargarCitas($clinica = null,$especialidad =null, $date=null)
    {
    	/*if ($consultorio !== null) {
            $buscar = $consultorio;
        } else {
            $buscar = DB::table('consultorios_usuarios')->where('usuario_id',Auth::user()->id_usuario)->pluck('consultorio_id');
        }*/
       // dd($clinica);
        if($date!=null)
        {
            $search=$date;
        }else{
            $search= date('Y-m-d');
        }
    	//dd('aqui', $search);

     	$appointments=DB::table('citas')
                ->leftJoin('paciente','citas.paciente_id','=','paciente.id_paciente')
                ->leftJoin('persona','paciente.persona_id','=','persona.id_persona')
                ->where('citas.clinica',$clinica)
             	->where('citas.especialidad',$especialidad)
                ->where('citas.fecha_cita',$search)
                ->where('estatus','solicitada')
               	->get();

       	$appointments_dates=DB::table('citas')
       	->where('citas.clinica',$clinica)
       	->where('citas.especialidad',$especialidad)
        ->orderBy('citas.fecha_cita')
        ->where('citas.estatus','solicitada')
        ->lists('citas.fecha_cita');
         foreach($appointments_dates as $i => $appointments_d)
        {
          $appointments_dates[$i] = date("m-d-Y", strtotime($appointments_d));
        }

            $current_month=date('m');
            $current_year=date('Y');
         
           //  dd($appointments);

     	return view ('admin.Vercita',[
            'clinica'=>$clinica,
            'date'=>$search,
          	'appointments'=>$appointments,
            'especialidad'=>$especialidad,
            'current_month'=>$current_month,
            'current_year'=>$current_year,
            'appointments_dates'=>$appointments_dates,
           
        ]);
    }

     public function editCita(Request $req)
    {
        
       // dd($req->all());

        $appointments=DB::table('citas')
                ->leftJoin('paciente','citas.paciente_id','=','paciente.id_paciente')
                ->leftJoin('persona','paciente.persona_id','=','persona.id_persona')
                ->where('citas.id_cita',$req->input('id_cita'))
                ->get();

       
         // dd($appointments);

        return $appointments;
    }
    public function updateCita(Request $req)
    {
        
       // dd($req->all());

        $appointments=DB::table('citas')
                ->where('citas.id_cita',$req->input('id_edit'))
                ->update([
                    'motivo'=>$req->input('motivo'),
                    'clinica'=>$req->input('clinica2'),
                    'especialidad'=>$req->input('especialidad2'),
                    'fecha_cita'=>$req->input('date_appointment'),
                    'hora'=>$req->input('hour_send'),
                    'observacion'=>$req->input('observacion'),


                    ]);

       
         // dd($appointments);

        return redirect('Vercitas/1/1');
    }
}
