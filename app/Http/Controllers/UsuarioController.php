<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    public function index()
    {
        /*DB::beginTransaction();

        $usuario = DB::table("users")
        ->get();
        DB::commit();*/
        $usuario = DB::table('persona')
            ->join('usuarios', 'persona.ci', '=', 'usuarios.ci')
            ->get();
        $rol = DB::table('roles')
            ->get();

        return view('admin.usuarios', ['usuarios' => $usuario, 'roles' => $rol]);

    }

    public function edit(Request $request)
    {
        //echo '<pre>';print_r($request); echo '</pre>'; die();

        $user = DB::table('persona')
            ->join('usuarios', 'persona.ci', '=', 'usuarios.ci')
            ->where('id', $request->id)
            ->get();
        return $user;
    }

    public function update(Request $request)
    {
        // echo '<pre>';print_r($request->input('rol_edit')); echo '</pre>'; die();
        DB::table('persona')->where('id_persona', '=', $request->input('persona_id'))->update([
            'nombre'           => $request->input('name_edit'),
            'ci'               => $request->input('cedula_edit'),
            'apellido'         => $request->input('apellido_edit'),
            'telefono'         => $request->input('telefono_edit'),
            'genero'           => $request->input('sexo_edit'),
            'celular'          => $request->input('celular_edit'),
            'fecha_nacimiento' => $request->input('nacimiento_edit'),
            'direccion'        => $request->input('direccion_edit'),
        ]);

        DB::table('usuarios')->where('id', '=', $request->input('id_edit'))
            ->update([
                'email'    => $request->input('email_edit'),
                'valor_id' => $request->input('estatus_edit'),
                'rol_id'   => $request->input('rol_edit'),
                'ci'       => $request->input('cedula_edit'),

            ]);

        return redirect('/usuarios')->with('status', 'El Usuario ha sido actualizado');
    }

    public function destroy($id)
    {

        $usuario = DB::table('usuarios')->where('id', $id)->pluck('usuarios.persona_id');
        DB::table('usuarios')->where('id', $id)->delete();
        DB::table('persona')->where('id_persona', $usuario[0])->delete();

        return redirect('/usuarios')->with('status', 'El Usuario ha sido eliminado');
    }
}
