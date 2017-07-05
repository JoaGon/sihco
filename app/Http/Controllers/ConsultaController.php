<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Consulta as Consulta;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function index()
    {

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.ci', '=', 'paciente.ci')
            ->get();
        return view('admin.consulta_paciente', ['pacientes' => $paciente]);

    }
    public function show_details($nro_historia)
    {
        //echo "<pre>"; print_r($nro_historia); echo "</pre>";

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('paciente.nro_historia', $nro_historia)
            ->get();
        //  echo "<pre>"; print_r($paciente); echo "</pre>";

        return view('admin.motivo_consulta', ['pacientes' => $paciente], ['consulta' => '']);
    }
    public function save(Request $req)
    {
        // dd("lega",$req->input('paciente_id'));
        $data = $req;

        $verificar = DB::table('consulta')
            ->where('paciente_id', $req->input('paciente_id'))
            ->where('fecha_consulta', $req->input('fecha_consulta'))
            ->count();

        if ($verificar > 0) {

            $id = DB::table('consulta')
                ->where('paciente_id', $req->input('paciente_id'))
                ->where('fecha_consulta', $req->input('fecha_consulta'))
                ->pluck('consulta.id');
            //    dd($id);

            Consulta::where('id', $id[0])
                ->update(['id'      => $id[0],
                    'paciente_id'       => $req->input('paciente_id'),
                    'nro_historia'      => $req->input('historia'),
                    'motivo_consulta'   => $req->input('motivo'),
                    'enfermedad_actual' => $req->input('enfermedad'),
                    'fecha_consulta'    => $req->input('fecha_consulta'),
                    'ultimo_usuario'    => Auth::user()->id,
                ]);
            $consulta2 = $id[0];
        } else {

            $consulta = Consulta::create(
                ['paciente_id'      => $req->input('paciente_id'),
                    'nro_historia'      => $req->input('historia'),
                    'motivo_consulta'   => $req->input('motivo'),
                    'enfermedad_actual' => $req->input('enfermedad'),
                    'fecha_consulta'    => $req->input('fecha_consulta'),
                    'ultimo_usuario'    => Auth::user()->id,

                ]);
            $consulta2 = $consulta->id;
            //dd($consulta2->id);
        }

        $persona = DB::table('paciente')
            ->where('nro_historia', $req->input('historia'))
            ->pluck('paciente.persona_id');

        $nro_historia = DB::table('paciente')
            ->where('id_paciente', $req->input('paciente_id'))
            ->pluck('paciente.nro_historia');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $cardiovascular = DB::table('enfermedades_cardiovasculares')
            ->get();

        $circulo = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'circulo_familiar')
            ->get();

        return redirect('/datos/paciente/' . $req->input('paciente_id') . '/' . $consulta2)->with('status', 'Se ha insertado la Consulta');

    }
    public function datos_principal($paciente_id, $consulta_id)
    {

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $cardiovascular = DB::table('enfermedades_cardiovasculares')
            ->get();

        $circulo = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'circulo_familiar')
            ->get();

        return view('admin.consulta_datos_paciente', [
            'consulta'         => $consulta_id,
            'id_paciente'      => $paciente_id,
            'pacientes'        => $paciente,
            'cardiovasculares' => $cardiovascular,
            'circulos'         => $circulo,
        ]);
    }

    public function consulta_paciente($nro_historia)
    {

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.ci', '=', 'paciente.ci')
            ->where('paciente.nro_historia', $nro_historia)
            ->get();

        //  Paciente::where('nro_historia', $nro_historia)->get();

        //  echo "<pre>"; print_r($paciente); echo "</pre>";

        return view('admin.consulta_datos_paciente', ['pacientes' => $paciente]);

    }
}
