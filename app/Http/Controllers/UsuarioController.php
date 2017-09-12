<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paciente as Paciente;
use App\Persona as Persona;
use App\Usuario as Usuario;

class UsuarioController extends Controller
{

    public function index()
    {
       
        $usuario = DB::table('persona')
            ->join('usuarios', 'persona.ci', '=', 'usuarios.ci')
            ->join('roles', 'usuarios.rol_id', '=', 'roles.id_rol')
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
        Persona::where('id_persona', '=', $request->input('persona_id'))->update([
            'nombre'           => $request->input('name_edit'),
            'ci'               => $request->input('cedula_edit'),
            'apellido'         => $request->input('apellido_edit'),
            'telefono'         => $request->input('telefono_edit'),
            'genero'           => $request->input('sexo_edit'),
            'celular'          => $request->input('celular_edit'),
            'fecha_nacimiento' => $request->input('nacimiento_edit'),
            'direccion'        => $request->input('direccion_edit'),
        ]);

        Usuario::where('id', '=', $request->input('id_edit'))
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
        Usuario::where('id', $id)->delete();
        Persona::where('id_persona', $usuario[0])->delete();

        return redirect('/usuarios')->with('status', 'El Usuario ha sido eliminado');
    }
}
