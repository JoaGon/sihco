<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
Use App\RegistroImageneologia;

use Auth;
use DB;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index($paciente_id, $consulta)
    {

        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        $imagen = DB::table('registros_imageneologicos')
            ->where('paciente_id', $paciente_id)
            ->where('consulta_id', $consulta)
            ->get();

        return view('admin.parte2Historia.registro_imageneologica', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente, 'imagen' => $imagen]);

    }

    public function safeImaging(Request $req)
    {

        $file       = $_FILES['imagen_'];
        $dir_upload = 'images/';
        $new_name   = time() . '-' . $file['name'];
        $copied     = copy($file['tmp_name'], $dir_upload . $new_name);

        //echo "<pre>"; print_r($req->input('title')); echo "</pre>"; die();

        DB::table('registros_imageneologicos')->insert(
            ['ruta'         => $dir_upload . $new_name,
                'fecha'         => date('Y-m-d', time()),
                'usuario_id'    => Auth::user()->id,
                'paciente_id'   => $req->input('paciente_id'),
                'consulta_id'   => $req->input('consulta_id'),
                'titulo_imagen' => $req->input('title'),
            ]
        );

        return redirect('/registro_imageneologico/' . $req->input('paciente_id') . '/' . $req->input('consulta_id'));
    }
    public function deleteImaging(Request $req)
    {

        //dd($req->input('ruta'));
        DB::table('registros_imageneologicos')
            ->where('ruta', $req->input('ruta'))
            ->delete();
        unlink($req->input('ruta'));

        return 1;
    }
    public function safeStudy()
    {

        $data = Input::all();
        DB::beginTransaction();
        try {
            $result = DB::table('registros_imageneologicos')
                ->where('ruta', $data['ruta'])
                ->update(['titulo_imagen' => $data['title'], 'estudio_imagen' => $data['estudio']]);
        } catch (\Exception $ex) {
            DB::rollback();
        }
        DB::commit();
        return redirect('/imaging/' . $data['consulta_id'] . '/' . $data['paciente_id']);
    }

    public function safeRadio(Request $req)
    {

        //dd($req->input('image'));

        /*$file = $_FILES['imagen_'];
        $dir_upload = 'images/';
        $new_name = time() . '-' .$file['name'];
        $copied = copy($file['tmp_name'], $dir_upload . $new_name);

        $key = $dir_upload. $new_name;

        $url = 'http://localhost:8088/sihco/public/delete/avatar';
        $respuesta =  json_encode([
        'initialPreview' => [
        "http://localhost:8088/sihco/public/{$key}"
        ],
        'initialPreviewConfig' => [
        ['caption' => "Sports-{$key}", 'size' => 627392, 'width' => '40px', 'url' => $url, 'key' => $key,],
        ],
        'append' => true // whether to append these configurations to initialPreview.
        // if set to false it will overwrite initial preview
        // if set to true it will append to initial preview
        // if this propery not set or passed, it will default to true.
        ]);*/

        return $req->input('image');

    }

    public function deleteAvatar(Request $req)
    {

        unlink($req->input('key'));
        return response()->json(1);

    }
     public function parcialesIndex($paciente_id, $consulta)
    {
        //$data = $req->all();
        $consulta = intval($consulta);

        $persona = DB::table('paciente')
            ->where('id_paciente', $paciente_id)
            ->pluck('paciente.persona_id');

        $paciente = DB::table('persona')
            ->join('paciente', 'persona.id_persona', '=', 'paciente.persona_id')
            ->where('persona.id_persona', $persona[0])
            ->get();

        return view('admin.parte3Historia.parciales', ['consulta' => $consulta, 'id_paciente' => $paciente_id], ['pacientes' => $paciente]);

    }

}
