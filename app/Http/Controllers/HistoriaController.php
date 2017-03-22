<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Paciente as Paciente;
use App\ResumenMedica;
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
    	//$data = $req->all();
    	$consulta = intval($req->input('consulta_id'));
        $consulta2 = DB::table('antecedentes_familiares')->insert(
        	['paciente_id'=>$req->input('paciente_id'),
        	'enfer_cardiov'=>$req->input('enfer_cardiov'),
        	'enfer_renal'=>$req->input('enfer_renal'),
        	'enfer_meta_endocrina'=>$req->input('enfer_meta_endocrina'),
        	'discrasia_sanguinea'=>$req->input('discrasia_sanguinea'),
        	'enfer_alergica'=>$req->input('enfer_alergica'),
        	'artritis_reumatoidea'=>$req->input('artritis_reumatoidea'),
        	'cancer'=>$req->input('cancer'),
        	'enfer_infecciosas'=>$req->input('enfer_infecciosas'),
        	'enfer_trans_sexual'=>$req->input('enfer_trans_sexual'),
        	'otro'=>$req->input('otro'),
        	'espec_otro'=>$req->input('espec_otro'),
        	'espec_enfer_cardi'=>$req->input('espec_enfer_cardi'),
        	'validar'=>'',
        	'profesor'=>Auth::user()->id,
        	'ultimo_usuario'=>Auth::user()->id,
        	'fecha'=>$req->input('fecha_consulta'),
        	'consulta_id'=> $consulta,

        	]);
        	/*unset($data['_token']);
        	$consulta2 = DB::table('antecedente_familiar')->insert($data);
*/
        	//$consulta = DB::table('consulta')->where('nro_historia',$req->input('nro_historia'))->value('id');
          $paciente = Paciente::where('nro_historia', $req->input('historia'))->get();

        return view('admin.antecedente_personal', ['consulta'=>$req->input('consulta_id'),'id_paciente'=>$req->input('id_paciente')], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }

    public function antecedentepersonal(Request $req)
    {	
    	//$data = $req->all();
    	$consulta = intval($req->input('consulta_id'));
        $consulta2 = DB::table('antecedentes_personales')->insert(
        	['paciente_id'=>$req->input('paciente_id'),
        	'enfer_cardiovascular'=>$req->input('enfer_cardiov'),
        	'enfer_renal'=>$req->input('enfer_renal'),
        	'enfer_meta_endocrina'=>$req->input('enfer_meta_endocrina'),
        	'discrasia_sanguinea'=>$req->input('discrasia_sanguinea'),
        	'artritis_reumatoidea'=>$req->input('artritis_reumatoidea'),
        	'enfer_alergica'=>$req->input('enfer_alergica'),
        	'cancer'=>$req->input('cancer'),
        	'adenopatia'=>$req->input('adenopatia'),
        	'enfer_infecciosa'=>$req->input('enfer_infecciosa'),
        	'enfer_transm_sexual'=>$req->input('enfer_trans_sexual'),
        	'otro'=>$req->input('otro'),
        	'espec_otro'=>$req->input('espec_otro'),
        	'cefalea'=>$req->input('cefalea'),
        	'convulsiones'=>$req->input('convulsiones'),
        	'parestesias'=>$req->input('parestesias'),
        	'erupciones_piel'=>$req->input('erupciones_piel'),
        	'ictericia'=>$req->input('ictericia'),
        	'trastorno_audicion'=>$req->input('trastorno_audicion'),
        	'intervencion_quirurgica'=>$req->input('intervencion_quirurgica'),
        	'trauma_accidente'=>$req->input('trauma_accidente'),
        	'fractura'=>$req->input('fractura'),
        	'accidente_transito'=>$req->input('accidente_transito'),
        	'espec_accidente_trans'=>$req->input('espec_accidente_trans'),
        	'espec_trauma_accidente'=>$req->input('espec_trauma_accidente'),
        	'espec_fractura'=>$req->input('espec_fractura'),
        	'espec_accidente_transito'=>$req->input('espec_accidente_transito'),
        	'validar'=>'N',
        	'profesor'=>Auth::user()->id,
        	'ultimo_usuario'=>Auth::user()->id,
        	'fecha'=>$req->input('fecha_consulta'),
        	'consulta_id'=> $consulta,

        	]);
        	/*unset($data['_token']);
        	$consulta2 = DB::table('antecedente_familiar')->insert($data);
*/
        	//$consulta = DB::table('consulta')->where('nro_historia',$req->input('nro_historia'))->value('id');
          $paciente = Paciente::where('nro_historia', $req->input('historia'))->get();

        return view('admin.signos_vitales', ['consulta'=>$req->input('consulta_id'),'id_paciente'=>$req->input('id_paciente')], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
       public function antecedentefamiliarIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
          $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        return view('admin.antecedente_familiar', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
        public function antecedentepersonalIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
          $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        return view('admin.antecedente_personal', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }    
    public function signosvitalesIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
          $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        return view('admin.signos_vitales', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
    public function resumenclinicaIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
          $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        return view('admin.resumen_historia_clinica', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
     public function resumenmedico(Request $req)
    {   
        $consulta = intval($req->input('consulta_id'));
        $resumen = new ResumenMedica;
        $resumen->fecha = $req->input('fecha');
        $resumen->consulta_id = $req->input('consulta_id');
        $resumen->paciente_id = $req->input('paciente_id');
        $resumen->ultimo_usuario = Auth::user()->id;
        $resumen->validar = $req->input('validar');
        $resumen->profesor = $req->input('profesor');
        $resumen->rhm_1 = $req->input('rhm_1');
        $resumen->save();

         $paciente = Paciente::where('nro_historia', $req->input('historia'))->get();



        return view('admin.signos_vitales', ['consulta'=>$consulta,'id_paciente'=>$req->input('id_paciente')], ['pacientes'=> $paciente]);
    }

    public function resumenodontologicaIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
          $paciente = Paciente::where('id_paciente', $paciente_id)->get();

        return view('admin.resumen_historia_odontologica', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
     public function resumenodontologica(Request $req)
    {   
        $consulta = intval($req->input('consulta_id'));
        $resumen = new ResumenOdontologico;
        $resumen->fecha = $req->input('fecha');
        $resumen->consulta_id = $req->input('consulta_id');
        $resumen->paciente_id = $req->input('paciente_id');
        $resumen->ultimo_usuario = Auth::user()->id;
        $resumen->validar = $req->input('validar');
        $resumen->profesor = $req->input('profesor');
        $resumen->rho_1 = $req->input('rho_1');
        $resumen->save();
         $paciente = Paciente::where('nro_historia', $req->input('historia'))->get();


        return view('admin.resumen_historia_odontologica', ['consulta'=>$consulta,'id_paciente'=>$req->input('id_paciente')], ['pacientes'=> $paciente]);
    }

    public function datosclinicosIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
          $paciente = Paciente::where('id_paciente', $paciente_id)->get();
         

        return view('admin.datos_clinicos', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
    public function datosclinicos(Request $req)
    {   
        $consulta = intval($req->input('consulta_id'));
        $datosclinicos = new DatosClinicos;
        $datosclinicos->fecha = $req->input('fecha');
        $datosclinicos->consulta_id = $req->input('consulta_id');
        $datosclinicos->paciente_id = $req->input('paciente_id');
        $datosclinicos->ultimo_usuario = Auth::user()->id;
        $datosclinicos->validar = $req->input('validar');
        $datosclinicos->profesor = $req->input('profesor');
        $datosclinicos->examinado_ultimo_ayo = $req->input('examinado_utlimo_ayo');
        $datosclinicos->cambio_salud_ultimo_ayo = $req->input('cambio_salud_ultimo_ayo');
        $datosclinicos->sangra_largo_tiempo = $req->input('sangra_largo_tiempo');
        $datosclinicos->cicatrizacion_lenta = $req->input('cicatrizacion_lenta');
        $datosclinicos->perdida_peso = $req->input('perdida_peso');
        $datosclinicos->grave_enfermo = $req->input('grave_enfermo');
        $datosclinicos->espec_grav_enfermo = $req->input('espec_grav_enfermo');
        $datosclinicos->hospitalizado = $req->input('hospitalizado');
        $datosclinicos->espec_fecha_hospitalizacion = $req->input('espec_fecha_hospitalizacion');
        $datosclinicos->marcapaso = $req->input('marcapaso');
        $datosclinicos->tranfusion_sanguinea = $req->input('tranfusion_sanguinea');
        $datosclinicos->asma = $req->input('asma');
        $datosclinicos->aspirina = $req->input('aspirina');
        $datosclinicos->penicilina = $req->input('penicilina');
        $datosclinicos->sulfonamida = $req->input('sulfonamidas');
        $datosclinicos->barbiturico = $req->input('barbituricos');
        $datosclinicos->otros_medicamentos = $req->input('otros_medicamentos');
        $datosclinicos->trastorno_visual = $req->input('trastorno_visual');
        $datosclinicos->sinusitis = $req->input('sinusitis');
        $datosclinicos->hemorragia_nasal = $req->input('hemorragia_nasal');
        $datosclinicos->dolor_pecho = $req->input('dolor_pecho');
        $datosclinicos->tos = $req->input('tos');
        $datosclinicos->tos_sangre = $req->input('tos_sangre');
        $datosclinicos->dificultad_tragar = $req->input('dificultad_tragar');
        $datosclinicos->indigestion = $req->input('indigestion');
        $datosclinicos->vomito = $req->input('vomito');
        $datosclinicos->orines = $req->input('orines');
        $datosclinicos->sediento = $req->input('sediento');
        $datosclinicos->desmayo = $req->input('desmayo');
        $datosclinicos->moretones = $req->input('moretones');
        $datosclinicos->desorden_sangre = $req->input('desorden_sangre');
        $datosclinicos->cansancio = $req->input('cansancio');
        $datosclinicos->embarazo = $req->input('embarazo');
        $datosclinicos->pastilla_anticonceptiva = $req->input('pastilla_anticonceptiva');
        $datosclinicos->desarreglos_mensuales = $req->input('desarreglos_mensuales');
       
        $datosclinicos->save();
         $paciente = Paciente::where('nro_historia', $req->input('historia'))->get();


        return view('admin.resumen_historia_clinica', ['consulta'=>$consulta,'id_paciente'=>$req->input('id_paciente')], ['pacientes'=> $paciente]);
    }
    public function historiaodontologicaIndex($paciente_id,$consulta)
    {	
    	//$data = $req->all();
    	$consulta = intval($consulta);
        
        $paciente = Paciente::where('id_paciente', $paciente_id)->get();
        $condicion = DB::table('condicion_sexual')->get();

       
        return view('admin.historia_odontologica', ['consulta'=>$consulta,'id_paciente'=>$paciente_id], ['pacientes'=> $paciente,'condiciones'=>$condicion]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }
     public function historiaodontologica(Request $req)
    {   
        $consulta = intval($req->input('consulta_id'));
        $historiaodontologica = new HistoriaOdontologica;
        $historiaodontologica->fecha = $req->input('fecha');
        $historiaodontologica->consulta_id = $req->input('consulta_id');
        $historiaodontologica->paciente_id = $req->input('paciente_id');
        $historiaodontologica->ultimo_usuario = Auth::user()->id;
        $historiaodontologica->validar = $req->input('validar');
        $historiaodontologica->profesor = $req->input('profesor');
        $historiaodontologica->tratamiento_odontologico = $req->input('tratamiento_odontologico');
        $historiaodontologica->espec_tratamiento_odon = $req->input('espec_tratamiento_odon');
        $historiaodontologica->afectando_salud = $req->input('afectando_salud');
        $historiaodontologica->apariencia_dientes = $req->input('apariencia_dientes');
        $historiaodontologica->nervios_tratamiento = $req->input('nervios_tratamiento');
        $historiaodontologica->reaccion_anestesico = $req->input('reaccion_anestesico');
        $historiaodontologica->dolor_reciente_dentadura = $req->input('dolor_reciente_dentadura');
        $historiaodontologica->sangra_encia = $req->input('sangra_encia');
        $historiaodontologica->control_dental_reg = $req->input('control_dental_reg');
        $historiaodontologica->espec_control_dental = $req->input('espec_control_dental');
        $historiaodontologica->cepillo_dental = $req->input('cepillo_dental');
        $historiaodontologica->tipo_cepillo = $req->input('tipo_cepillo');
        $historiaodontologica->hilo_dental = $req->input('hilo_dental');
        $historiaodontologica->frecuencia_hilo_dental = $req->input('frecuencia_hilo_dental');
        $historiaodontologica->otros_medios = $req->input('otros_medios');
        $historiaodontologica->cuales_medios = $req->input('cuales_medios');
        $historiaodontologica->dieta_habitual = $req->input('dieta_habitual');
        $historiaodontologica->alimento_azucar = $req->input('alimento_azucar');
        $historiaodontologica->frecu_aliment_azucar = $req->input('frecu_aliment_azucar');
        $historiaodontologica->cirugia_cavidad = $req->input('cirugia_cavidad');
        $historiaodontologica->espec_cirugia = $req->input('espec_cirugia');
        $historiaodontologica->exodoncia = $req->input('exodoncia');
        $historiaodontologica->espec_exodoncia = $req->input('espec_exodoncia');
        $historiaodontologica->complic_pos_exo = $req->input('complic_pos_exo');
        $historiaodontologica->tipo_complicacion = $req->input('tipo_complicacion');
        $historiaodontologica->ortodoncia = $req->input('ortodoncia');
        $historiaodontologica->cuando_ortodoncia = $req->input('cuando_ortodoncia');
        $historiaodontologica->endodoncia = $req->input('endodoncia');
        $historiaodontologica->cuales_dientes_endodoncia = $req->input('cuales_dientes_endodoncia');
        $historiaodontologica->tipo_tratamiento = $req->input('tipo_tratamiento');
        $historiaodontologica->fecha_tratamiento = $req->input('fecha_tratamiento');
        $historiaodontologica->protesis_dental = $req->input('protesis_dental');
        $historiaodontologica->tipo_protesis = $req->input('tipo_protesis');
        $historiaodontologica->satisfecho_tratamiento = $req->input('satisfecho_tratamiento');
        $historiaodontologica->mastica_alimentos_blandos = $req->input('mastica_alimentos_blandos');
        $historiaodontologica->mastica_alimentos_duros = $req->input('mastica_alimentos_duros');
        $historiaodontologica->risa_sonrisa = $req->input('risa_sonrisa');
        $historiaodontologica->mastica_solo_lado = $req->input('mastica_solo_lado');   
         $historiaodontologica->razon_mastica = $req->input('razon_matica');
        $historiaodontologica->dificultad_boca = $req->input('dificultad_boca');
        $historiaodontologica->rechina_diente = $req->input('rechina_diente');
        $historiaodontologica->articulacion_temporomandibular = $req->input('articulacion_temporomandibular');
        $historiaodontologica->cuando_articulacion = $req->input('cuando_articulacion');
        $historiaodontologica->dolor_cabeza = $req->input('dolor_cabeza');
        $historiaodontologica->frecuencia_dolor_cabeza = $req->input('frecuencia_dolor_cabeza');
        $historiaodontologica->ciclo_dolor_cabeza = $req->input('ciclo_dolor_cabeza');
        $historiaodontologica->morderse_uyas = $req->input('morderse_uyas');
         $historiaodontologica->morderse_labios = $req->input('morderse_labios');
        $historiaodontologica->morder_fosforos = $req->input('morder_fosforos');
        $historiaodontologica->respirar_boca = $req->input('respirar_boca');
        $historiaodontologica->abre_objeto_dientes = $req->input('abre_objeto_dientes');   
         $historiaodontologica->lengua_contra_dientes = $req->input('lengua_contra_dientes');
        $historiaodontologica->droga = $req->input('droga');
        $historiaodontologica->tabaco = $req->input('tabaco');
        $historiaodontologica->bebida_alcoholica = $req->input('bebida_alcoholica');
        $historiaodontologica->condicion_sexual_id = $req->input('condicion_sexual_id');
         
       
        $historiaodontologica->save();
         $paciente = Paciente::where('nro_historia', $req->input('historia'))->get();


        return view('admin.resumen_historia_odontologica', ['consulta'=>$consulta,'id_paciente'=>$req->input('id_paciente')], ['pacientes'=> $paciente]);
    }

    public function signosvitales(Request $req)
    {	
    	//$data = $req->all();
    	$consulta = intval($req->input('consulta_id'));
        $consulta2 = DB::table('signos_vitales')->insert(
        	['paciente_id'=>$req->input('paciente_id'),
        	'presion_sanguinea'=>$req->input('presion_sanguinea'),
        	'pulso'=>$req->input('pulso'),
        	'temperatura'=>$req->input('temperatura'),
        	'frecuencia_respiratoria'=>$req->input('frecuencia_respiratoria'),
        	'validar'=>'',
        	'profesor'=>Auth::user()->id,
        	'ultimo_usuario'=>Auth::user()->id,
        	'fecha'=>$req->input('fecha_consulta'),
        	'consulta_id'=> $consulta,

        	]);
        	/*unset($data['_token']);
        	$consulta2 = DB::table('antecedente_familiar')->insert($data);
*/
        	//$consulta = DB::table('consulta')->where('nro_historia',$req->input('nro_historia'))->value('id');
          $paciente = Paciente::where('nro_historia', $req->input('historia'))->get();

        return view('admin.signos_vitales', ['consulta'=>$req->input('consulta_id'),'id_paciente'=>$req->input('id_paciente')], ['pacientes'=> $paciente]);
       
      // return redirect('/imagen/'.$consulta.'/'.$req->input('id_paciente'));


    }


}