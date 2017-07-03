<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

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
            ->get();
        //  dd($consulta);

        return view('admin.consulta.consultas_paciente', [
            'consultas' => $consulta,
            'pacientes' => $paciente,
        ]);

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

        $antecedentes = DB::table('antecedentes_familiares')
            ->join('usuarios', 'antecedentes_familiares.ultimo_usuario', '=', 'usuarios.id')
            ->join('persona', 'persona.id_persona', '=', 'usuarios.persona_id')
            ->where('paciente_id', $paciente)
            ->get();
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
            ->get();
        //dd($enfermedades_cardiovasculares);
        $enfer_renal = DB::table('paciente_enfer_renal')
            ->join('enfermedades_renales', 'paciente_enfer_renal.enfermedad_renal_id', '=', 'enfermedades_renales.id_enfermedad_renal')
            ->join('valores_listas', 'paciente_enfer_renal.circulo_hereditario', '=', 'valores_listas.id_valor')
            ->where('consulta_id', $consulta[0])
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

            $consulta2 = DB::table('antecedentes_familiares')->insert($data);

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

        try {

            $verificar = DB::table('antecedentes_familiares')
                ->where('id_antecedente_familiar', $req->input('id_enfermedad'))
                ->update([
                    'validar'  => 'validado',
                    'profesor' => Auth::user()->id,
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
