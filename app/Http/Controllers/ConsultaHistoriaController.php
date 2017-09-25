<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

use App\Paciente as Paciente;
use App\Persona as Persona;
use App\Paciente_enfer_cardiovascular as Paciente_enfer_cardiovascular;
use App\Paciente_enfer_patologica as Paciente_Enfer_Patologica;
use App\Paciente_enfer_renal as Paciente_Enfer_renal;
use App\ResumenMedica as ResumenMedica;
use App\ResumenOdontologico as ResumenOdontologico;
use App\Enfermedades_renales as Enfer_Renal;
use App\Enfermedades_cardiovasculares as Enfer_Cardiovascular;
use App\Enfermedades_patologicas as Enfer_Patologica;
use App\Lista as Lista;
use App\DatosClinicos as DatosClinicos;
use App\CondicionSexual as CondicionSexual;
use App\HistoriaOdontologica as HistoriaOdontologica;
use App\AntecedenteFamiliar as AntecedentesFamiliares;
use App\AntecedentePersonal as AntecedentePersonal;
use App\Valores_listas as Valores_listas;
use App\SignosVitales as SignosVitales;

use Illuminate\Support\Facades\DB;

class ConsultaHistoriaController extends Controller
{

    public function index()
    {

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.ci', '=', 'paciente.ci')
            ->get();
        return view('admin.consulta.paciente', ['pacientes' => $paciente]);

    }
    public function showPaciente($nro_historia)
    {

        $persona = DB::table('paciente')
            ->where('nro_historia', $nro_historia)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $consulta = DB::table('consulta')
            ->join('usuarios', 'consulta.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('nro_historia', $nro_historia)
            ->orderBy('fecha_consulta','desc')
            ->select('consulta.id', 'persona.*', 'consulta.*')
            ->get();
         //dd($consulta);

        return view('admin.consulta.consultas_paciente', [
            'consultas' => $consulta,
            'pacientes' => $paciente,
        ]);

    }

    public function showConsult(Request $req)
    {

        //$data = $req->all()
        $consulta = $req['consulta'];
     //   dd($consulta);

        $antecedentes = DB::table('consulta')
            ->where('consulta.id', $consulta)
            ->get();
        
        return $antecedentes;

    }

    public function validarConsult(Request $req)
    {


        $consulta = $req['consulta'];
        $today = date("Y-m-d");

        try {

            $verificar = DB::table('consulta')
                ->where('id', $consulta)
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

        return $antecedentes;

    }
    public function showAntecedenteFamiliar($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();


        if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

        
        $antecedentes = DB::table('antecedentes_familiares')
            ->join('usuarios', 'antecedentes_familiares.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('antecedentes_familiares.ultimo_usuario', Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
           // dd($antecedentes);

        }else{
             $antecedentes = DB::table('antecedentes_familiares')
            ->join('usuarios', 'antecedentes_familiares.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
           // dd($antecedentes);
        }
        return view('admin.consulta.consulta_historia_antecedentes', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }

    public function getAntecedenteFamiliar($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('antecedentes_familiares')
            ->where('id_antecedente_familiar', $id)
            ->get();
        $validado = DB::table('antecedentes_familiares')
            ->where('id_antecedente_familiar', $id)
            ->select('validar')
            ->get();
        // dd($validado);
        $consulta = DB::table('antecedentes_familiares')
            ->where('id_antecedente_familiar', $id)
            ->pluck('consulta_id');
//dd($consulta);
        $enfermedades_cardiovasculares = DB::table('paciente_enfer_cardiovascular')
            ->join('enfermedades_cardiovasculares', 'enfermedades_cardiovasculares.id_enfermedad_cardiovascular', '=', 'paciente_enfer_cardiovascular.enfermedad_cardiovascular_id')
            ->join('valores_listas', 'valores_listas.id_valor', '=', 'paciente_enfer_cardiovascular.circulo_hereditario')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'familiar')
            ->get();
        //dd($enfermedades_cardiovasculares);
        $enfer_renal = DB::table('paciente_enfer_renal')
            ->join('enfermedades_renales', 'paciente_enfer_renal.enfermedad_renal_id', '=', 'enfermedades_renales.id_enfermedad_renal')
            ->join('valores_listas', 'paciente_enfer_renal.circulo_hereditario', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'familiar')
            ->get();

        $id_categorias = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'categorias_patologicas')
            ->where('valores_listas.codigo', 'alergicas')
            ->pluck('valores_listas.id_valor');

        $enfer_alergicas = DB::table('paciente_enfer_patologicas')
            ->join('enfermedades_patologicas', 'paciente_enfer_patologicas.enfermedad_patologica_id', '=', 'enfermedades_patologicas.id_enfermedad_patologica')
            ->join('valores_listas', 'paciente_enfer_patologicas.circulo_familiar_id', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('enfermedades_patologicas.valor_id', $id_categorias[0])
            ->where('antecedente', 'familiar')
            ->get();

        $id_categorias2 = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'categorias_patologicas')
            ->where('valores_listas.codigo', 'infecciosas')
            ->pluck('valores_listas.id_valor');

        $enfer_infecciosas = DB::table('paciente_enfer_patologicas')
            ->join('enfermedades_patologicas', 'paciente_enfer_patologicas.enfermedad_patologica_id', '=', 'enfermedades_patologicas.id_enfermedad_patologica')
            ->join('valores_listas', 'paciente_enfer_patologicas.circulo_familiar_id', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('enfermedades_patologicas.valor_id', $id_categorias2[0])
            ->where('antecedente', 'familiar')
            ->get();

        $id_categorias3 = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'categorias_patologicas')
            ->where('valores_listas.codigo', 'transmision_sexual')
            ->pluck('valores_listas.id_valor');

        $enfer_sexual = DB::table('paciente_enfer_patologicas')
            ->join('enfermedades_patologicas', 'paciente_enfer_patologicas.enfermedad_patologica_id', '=', 'enfermedades_patologicas.id_enfermedad_patologica')
            ->join('valores_listas', 'paciente_enfer_patologicas.circulo_familiar_id', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('enfermedades_patologicas.valor_id', $id_categorias3[0])
            ->where('antecedente', 'familiar')
            ->get();

        $id_categorias4 = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'categorias_patologicas')
            ->where('valores_listas.codigo', 'cancer')
            ->pluck('valores_listas.id_valor');

        $enfer_cancer = DB::table('paciente_enfer_patologicas')
            ->join('enfermedades_patologicas', 'paciente_enfer_patologicas.enfermedad_patologica_id', '=', 'enfermedades_patologicas.id_enfermedad_patologica')
            ->join('valores_listas', 'paciente_enfer_patologicas.circulo_familiar_id', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'familiar')
            ->where('enfermedades_patologicas.valor_id', $id_categorias4[0])
            ->get();

        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_antecedente_familia', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'enfermedades_cardiovasculares' => $enfermedades_cardiovasculares,
            'enfermedades_renales'          => $enfer_renal,
            'enfermedades_alergicas'        => $enfer_alergicas,
            'enfermedades_infecciosas'      => $enfer_infecciosas,
            'enfermedades_sexuales'         => $enfer_sexual,
            'enfermedades_cancer'           => $enfer_cancer,
            'validado'                      => $validado,

        ]);

    }

    public function updateAntecedenteFamiliar(Request $req)
    {
        //dd($req->input('id_enfermedad'));
        $data = $req->all();

        try {

            $verificar = DB::table('antecedentes_familiares')
                ->where('id_antecedente_familiar', $req->input('id_enfermedad'))
                ->select('consulta_id', 'paciente_id', 'fecha', 'validar')
                ->get();

            $data['ultimo_usuario']          = Auth::user()->id;
            $data['profesor']                = Auth::user()->id;
            $data['validar']                 = '';
            $data['consulta_id']             = $verificar[0]->consulta_id;
            $data['paciente_id']             = $verificar[0]->paciente_id;
            $data['fecha']                   = $verificar[0]->fecha;
            $data['validar']                 = $verificar[0]->validar;
            $data['id_antecedente_familiar'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['tipo_enfermedad']);
            unset($data['circulo_familiar']);
            unset($data['enfer_cardiov']);
            unset($data['enfer_renal']);
            unset($data['enfer_alergica']);
            unset($data['id_enfermedad']);

            DB::table('antecedentes_familiares')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

            $consulta2 = AntecedentesFamiliares::create($data);

        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function validarAntecedenteFamiliar(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");

        try {

            $verificar = DB::table('antecedentes_familiares')
                ->where('id_antecedente_familiar', $req->input('id_enfermedad'))
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
      public function showAntecedentePersonal($paciente)
    {
        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){

             $antecedentes = DB::table('antecedentes_personales')
            ->join('usuarios', 'antecedentes_personales.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('antecedentes_personales.ultimo_usuario',Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
        }else{

             $antecedentes = DB::table('antecedentes_personales')
            ->join('usuarios', 'antecedentes_personales.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
        }
       

        return view('admin.consulta.consulta_historia_antecedentes_personal', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
        public function getAntecedentePersonal($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $antecedentes = DB::table('antecedentes_personales')
            ->where('id_antecedente_personal', $id)
            ->get();
        $validado = DB::table('antecedentes_personales')
            ->where('id_antecedente_personal', $id)
            ->select('validar')
            ->get();
        // dd($validado);
        $consulta = DB::table('antecedentes_personales')
            ->where('id_antecedente_personal', $id)
            ->pluck('consulta_id');
//dd($consulta);
        $enfermedades_cardiovasculares = DB::table('paciente_enfer_cardiovascular')
            ->join('enfermedades_cardiovasculares', 'enfermedades_cardiovasculares.id_enfermedad_cardiovascular', '=', 'paciente_enfer_cardiovascular.enfermedad_cardiovascular_id')
            ->join('valores_listas', 'valores_listas.id_valor', '=', 'paciente_enfer_cardiovascular.circulo_hereditario')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'personal')
            ->get();
        //dd($enfermedades_cardiovasculares);
        $enfer_renal = DB::table('paciente_enfer_renal')
            ->join('enfermedades_renales', 'paciente_enfer_renal.enfermedad_renal_id', '=', 'enfermedades_renales.id_enfermedad_renal')
            ->join('valores_listas', 'paciente_enfer_renal.circulo_hereditario', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'personal')
            ->get();

        $id_categorias = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'categorias_patologicas')
            ->where('valores_listas.codigo', 'alergicas')
            ->pluck('valores_listas.id_valor');

        $enfer_alergicas = DB::table('paciente_enfer_patologicas')
            ->join('enfermedades_patologicas', 'paciente_enfer_patologicas.enfermedad_patologica_id', '=', 'enfermedades_patologicas.id_enfermedad_patologica')
            ->join('valores_listas', 'paciente_enfer_patologicas.circulo_familiar_id', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'personal')
            ->where('enfermedades_patologicas.valor_id', $id_categorias[0])
            ->get();

        $id_categorias2 = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'categorias_patologicas')
            ->where('valores_listas.codigo', 'infecciosas')
            ->pluck('valores_listas.id_valor');

        $enfer_infecciosas = DB::table('paciente_enfer_patologicas')
            ->join('enfermedades_patologicas', 'paciente_enfer_patologicas.enfermedad_patologica_id', '=', 'enfermedades_patologicas.id_enfermedad_patologica')
            ->join('valores_listas', 'paciente_enfer_patologicas.circulo_familiar_id', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'personal')
            ->where('enfermedades_patologicas.valor_id', $id_categorias2[0])
            ->get();

        $id_categorias3 = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'categorias_patologicas')
            ->where('valores_listas.codigo', 'transmision_sexual')
            ->pluck('valores_listas.id_valor');

        $enfer_sexual = DB::table('paciente_enfer_patologicas')
            ->join('enfermedades_patologicas', 'paciente_enfer_patologicas.enfermedad_patologica_id', '=', 'enfermedades_patologicas.id_enfermedad_patologica')
            ->join('valores_listas', 'paciente_enfer_patologicas.circulo_familiar_id', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'personal')
            ->where('enfermedades_patologicas.valor_id', $id_categorias3[0])
            ->get();

        $id_categorias4 = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'categorias_patologicas')
            ->where('valores_listas.codigo', 'cancer')
            ->pluck('valores_listas.id_valor');

        $enfer_cancer = DB::table('paciente_enfer_patologicas')
            ->join('enfermedades_patologicas', 'paciente_enfer_patologicas.enfermedad_patologica_id', '=', 'enfermedades_patologicas.id_enfermedad_patologica')
            ->join('valores_listas', 'paciente_enfer_patologicas.circulo_familiar_id', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
            ->where('antecedente', 'personal')
            ->where('enfermedades_patologicas.valor_id', $id_categorias4[0])
            ->get();

        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_antecedentes_personal', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'enfermedades_cardiovasculares' => $enfermedades_cardiovasculares,
            'enfermedades_renales'          => $enfer_renal,
            'enfermedades_alergicas'        => $enfer_alergicas,
            'enfermedades_infecciosas'      => $enfer_infecciosas,
            'enfermedades_sexuales'         => $enfer_sexual,
            'enfermedades_cancer'           => $enfer_cancer,
            'validado'                      => $validado,

        ]);

    }

    public function updateAntecedentePersonal(Request $req)
    {
        //dd($req->input('id_enfermedad'));
        $data = $req->all();
                 // dd($data);

        try {

            $verificar = DB::table('antecedentes_personales')
                ->where('id_antecedente_personal', $req->input('id_enfermedad'))
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
            $data['id_antecedente_personal'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['tipo_enfermedad']);
            unset($data['circulo_familiar']);
            unset($data['enfer_cardiov']);
            unset($data['enfer_renal']);
            unset($data['enfer_alergica']);
            unset($data['id_enfermedad']);

            DB::table('antecedentes_personales')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();
          $consulta2 = AntecedentePersonal::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }

    public function validarAntecedentePersonal(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");

        try {

            $verificar = DB::table('antecedentes_personales')
                ->where('id_antecedente_personal', $req->input('id_enfermedad'))
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
         public function getDatosClinicos($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();


        $antecedentes = DB::table("datos_clinicos")
                        ->where("id_dato_clinico",$id)
                        ->get();


        $validado = DB::table('datos_clinicos')
            ->where('id_dato_clinico', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('datos_clinicos')
            ->where('id_dato_clinico', $id)
            ->pluck('consulta_id');
       // dd($consulta);
        if ($paciente2[0]->genero == 'M') {
            $genero = 1;
        } else {
            $genero = 0;
        }
       
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_historia_datos_clinicos', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
            'genero'      => $genero,
        ]);

    }

     public function showDatosClinicos($paciente)
    {
       // dd($paciente);
        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();


        if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){
        $antecedentes = DB::table('datos_clinicos')
            ->join('usuarios', 'datos_clinicos.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('datos_clinicos.ultimo_usuario', Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
        }else{
            $antecedentes = DB::table('datos_clinicos')
            ->join('usuarios', 'datos_clinicos.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get(); 
        }

         //  dd($antecedentes);
        return view('admin.consulta.consulta_datos_clinicos', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
      public function updateDatosClinicos(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('datos_clinicos')
                ->where('id_dato_clinico', $req->input('id_enfermedad'))
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
            $data['id_dato_clinico'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('datos_clinicos')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = DatosClinicos::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
     public function validarDatosClinicos(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('datos_clinicos')
                ->where('id_dato_clinico', $req->input('id_enfermedad'))
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
    public function showResumenMedico($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){
        
        $antecedentes = DB::table('resumen_historia_medica')
            ->join('usuarios', 'resumen_historia_medica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('resumen_historia_medica.ultimo_usuario', Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
        }else{
          $antecedentes = DB::table('resumen_historia_medica')
            ->join('usuarios', 'resumen_historia_medica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();  
        }
        return view('admin.consulta.consulta_historia_resumen_medica', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getResumenMedico($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("resumen_historia_medica")
                        ->where("id_resumen_historia_medica",$id)
                        ->get();

        $validado = DB::table('resumen_historia_medica')
            ->where('id_resumen_historia_medica', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('resumen_historia_medica')
            ->where('id_resumen_historia_medica', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_resumen_medico', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateResumenMedico(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('resumen_historia_medica')
                ->where('id_resumen_historia_medica', $req->input('id_enfermedad'))
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
            $data['id_dato_clinico'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('resumen_historia_medica')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = ResumenMedica::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarResumenMedico(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('resumen_historia_medica')
                ->where('id_resumen_historia_medica', $req->input('id_enfermedad'))
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
     public function showResumenOdontologico($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){
         
        $antecedentes = DB::table('resumen_historia_odontologica')
            ->join('usuarios', 'resumen_historia_odontologica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('resumen_historia_odontologica.ultimo_usuario', Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();
        }else{
             $antecedentes = DB::table('resumen_historia_odontologica')
            ->join('usuarios', 'resumen_historia_odontologica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
        }
        return view('admin.consulta.consulta_historia_resumen_odontologico', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getResumenOdontologico($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("resumen_historia_odontologica")
                        ->where("id_resumen_historia_odontologica",$id)
                        ->get();

        $validado = DB::table('resumen_historia_odontologica')
            ->where('id_resumen_historia_odontologica', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('resumen_historia_odontologica')
            ->where('id_resumen_historia_odontologica', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_resumen_odontologico', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateResumenOdontologico(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('resumen_historia_odontologica')
                ->where('id_resumen_historia_odontologica', $req->input('id_enfermedad'))
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
            $data['id_resumen_historia_odontologica'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('resumen_historia_odontologica')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = ResumenOdontologico::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarResumenOdontologico(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('resumen_historia_odontologica')
                ->where('id_resumen_historia_odontologica', $req->input('id_enfermedad'))
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
       public function showSignosVitales($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){
        
        $antecedentes = DB::table('signos_vitales')
            ->join('usuarios', 'signos_vitales.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('signos_vitales.ultimo_usuario',Auth::user()->id)
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
        }else{

        $antecedentes = DB::table('signos_vitales')
            ->join('usuarios', 'signos_vitales.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
        }
        return view('admin.consulta.consulta_historia_signos_vitales', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getSignosVitales($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("signos_vitales")
                        ->where("id_signo_vital",$id)
                        ->get();

        $validado = DB::table('signos_vitales')
            ->where('id_signo_vital', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('signos_vitales')
            ->where('id_signo_vital', $id)
            ->pluck('consulta_id');
       // dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_signos_vitales', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
           
        ]);

    }
       public function updateSignosVitales(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('signos_vitales')
                ->where('id_signo_vital', $req->input('id_enfermedad'))
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
            $data['id_signo_vital'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('signos_vitales')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = SignosVitales::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarSignosVitales(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('signos_vitales')
                ->where('id_signo_vital', $req->input('id_enfermedad'))
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
        public function showHistoriaOdontologica($paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
    if(Auth::user()->rol_id == 6 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 4){
        
        $antecedentes = DB::table('historia_odontologica')
            ->join('usuarios', 'historia_odontologica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->where('historia_odontologica.ultimo_usuario',Auth::user()->id)
            ->orderBy('fecha','desc')
            ->get();

        }else{
            $antecedentes = DB::table('historia_odontologica')
            ->join('usuarios', 'historia_odontologica.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->orderBy('fecha','desc')
            ->get();
         //   dd($antecedentes);
        }
        return view('admin.consulta.consulta_historia_odontologica', [
            'pacientes'    => $paciente2,
            'antecedentes' => $antecedentes,
        ]);

    }
    public function getHistoriaOdontologica($id, $paciente)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente)
            ->pluck('paciente.persona_id');

        $paciente2 = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();
        $antecedentes = DB::table("historia_odontologica")
                        ->where("id_historia_odontologica",$id)
                        ->get();

        $validado = DB::table('historia_odontologica')
            ->where('id_historia_odontologica', $id)
            ->select('validar')
            ->get();
        //dd($validado);
        $consulta = DB::table('historia_odontologica')
            ->where('id_historia_odontologica', $id)
            ->pluck('consulta_id');

         $condicion = DB::table('listas')
        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
        ->where('listas.lista', 'preferencia_sexual')
        ->get();
        //dd($consulta);
     
        // dd($enfermedades_cardiovasculares);
        return view('admin.consulta.consulta_hist_odontologica', [
            'pacientes'                     => $paciente2,
            'ante'                          => $antecedentes,
            'consulta'                      => $consulta[0],
            'consulta'                      => $consulta[0],
            'validado'                      => $validado,
            'condiciones' => $condicion
           
        ]);

    }
       public function updateHistoriaOdontologica(Request $req)
    {
        $data = $req->all();
       // dd($data);
        DB::beginTransaction();

        try {

             $verificar = DB::table('historia_odontologica')
                ->where('id_historia_odontologica', $req->input('id_enfermedad'))
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
            $data['id_historia_odontologica'] = $req->input('id_enfermedad');

            unset($data['_token']);
            unset($data['historia']);
            unset($data['id_enfermedad']);
 // dd($data);
            DB::table('historia_odontologica')
                ->where('paciente_id', $data['paciente_id'])
                ->where('consulta_id', $data['consulta_id'])
                ->where('fecha', $data['fecha'])
                ->delete();

          $consulta2 = HistoriaOdontologica::create($data);


        } catch (Exception $ex) {
            DB::rollback();
            echo $ex;
            die();
        }

        DB::commit();

    }
    public function validarHistoriaOdontologica(Request $req)
    {
        // dd($req->id_enfermedad);
        $data = $req->all();
        $today = date("Y-m-d");
        try {

            $verificar = DB::table('historia_odontologica')
                ->where('id_historia_odontologica', $req->input('id_enfermedad'))
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