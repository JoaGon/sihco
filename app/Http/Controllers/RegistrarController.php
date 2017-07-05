<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Paciente;
use App\Persona;
use App\Usuario;
use Auth;
use DB;
use Illuminate\Http\Request;
use Validator;

class RegistrarController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data, $persona)
    {

        return Usuario::create([
            'email'          => $data['email'],
            'password'       => bcrypt($data['password']),
            'rol_id'         => $data['role'],
            'valor_id'       => $data['valor_id'],
            'ultimo_usuario' => Auth::user()->id,
            'ci'             => $data['ci'],
            'persona_id'     => $persona,
        ]);
    }
    protected function createPerson(array $data)
    {
        $persona_id = DB::table('persona')
            ->where('ci', $data['ci'])
            ->pluck('ci');

        if ($persona_id) {

            return 1;

        } else {

            return Persona::create([
                'ci'               => $data['ci'],
                'ultimo_usuario'   => Auth::user()->id,
                'nombre'           => $data['nombre'],
                'apellido'         => $data['apellido'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
                'genero'           => $data['sexo'],
                'telefono'         => $data['telefono'],
                'celular'          => $data['celular'],
                'direccion'        => $data['direccion'],

            ]);
        }
    }
    protected function createPatient(array $data, $persona)
    {

        /*$nivel = DB::table('listas')
        ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
        ->where('listas.lista', 'nivel_educacional')
        ->where('valores_listas.codigo', $data['nivel_educacional']) // nahum silva
        ->pluck('valores_listas.id_valor');

        dd($nivel);
        $lee=DB::table('valores_listas')
        ->where('codigo',$data['lee_escribe'])
        ->pluck('id_valor');

        $zona=DB::table('valores_listas')
        ->where('codigo',$data['zona_residencia'])
        ->pluck('id_valor');

        $convive=DB::table('valores_listas')
        ->where('codigo',$data['convive'])
        ->pluck('id_valor');

        $situacion_laboral=DB::table('valores_listas')
        ->where('codigo',$data['situacion_laboral'])
        ->pluck('id_valor');*/
        return Paciente::create([
            'ocupacion'          => $data['ocupacion'],
            'fecha_ingreso'      => $data['fecha_ingreso'],
            'lugar_nacimiento'   => $data['lugar_nacimiento'],
            'ci'                 => $data['ci'],
            'ultimo_usuario'     => Auth::user()->id,
            'grupo_sanguineo'    => $data['grupo_sanguineo'],
            'familiar_cercano'   => $data['familiar_cercano'],
            'parentesco'         => $data['parentesco'],
            'telefono_familiar'  => $data['telefono_familiar'],
            'direccion_familiar' => $data['direccion_familiar'],
            'nivel_educacional'  => $data['nivel_educacional'],
            'lee_escribe'        => $data['lee_escribe'],
            'zona_residencia'    => $data['zona_residencia'],
            'convive'            => $data['convive'],
            'situacion_laboral'  => $data['situacion_laboral'],
            'estado_civil'       => $data['estado_civil'],
            'persona_id'         => $persona,

        ]);
    }

    public function getRegister()
    {
        return $this->showRegistrationForm();
    }

    public function getRegisterPatient()
    {
        return $this->showRegistrationFormPatient();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        /*if (property_exists($this, 'registerView')) {
        return view($this->registerView);
        }*/
        DB::beginTransaction();
        $rol = DB::table('roles')
            ->get();

        DB::commit();

        //  return view('auth.register',['roles'=> $rol]);
        return view('auth.registrar_usuario', ['roles' => $rol]);
    }

    public function showRegistrationFormPatient()
    {
        /*if (property_exists($this, 'registerView')) {
        return view($this->registerView);
        }*/
        $nivel = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'nivel_educacional')
            ->get();
        $situacion = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'situacion_laboral')
            ->get();

        $zona = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'zona_residencia')
            ->get();

        $lee_escribe = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'lee_escribe')
            ->get();
        $convive = DB::table('listas')
            ->join('valores_listas', 'listas.id_lista', '=', 'valores_listas.lista_id')
            ->where('listas.lista', 'convive')
            ->get();

        return view('auth.registrar_paciente',
            ['niveles'    => $nivel,
                'situaciones' => $situacion,
                'zonas'       => $zona,
                'lees'        => $lee_escribe,
                'convives'    => $convive,

            ]);
    }
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }

    public function postRegisterPatient(Request $request)
    {
        return $this->registerPatient($request);
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //$validator = $this->validator($request->all());

        /*if ($validator->fails()) {
        $this->throwValidationException(
        $request, $validator
        );
        }*/

        $flag = DB::table('usuarios')
            ->where('ci', $request->input('ci'))
            ->count();

        $flag2 = DB::table('persona')
            ->where('ci', $request->input('ci'))
            ->count();

        $flag3 = DB::table('usuarios')
            ->where('email', $request->input('email'))
            ->count();

        if ($flag) {
            return redirect()->back()->with('duplicated_user', 'El usuario ya existe!');
        }

        if ($flag3) {
            return redirect()->back()->with('user_registered', 'Error email duplicado');
        }

        if ($flag2) {

            $persona = DB::table('persona')
                ->where('ci', $request->input('ci'))
                ->pluck('persona.id_persona');
            $this->create($request->all(), $persona[0]);
            return redirect()->back()->with('user_registered', 'El usuario se creó
        satisfactoriamente');
        }

        $this->createPerson($request->all());
        $persona = DB::table('persona')
            ->where('ci', $request->input('ci'))
            ->pluck('persona.id_persona');

        //  Auth::guard($this->getGuard())->login($this->create($request->all()));
        $this->create($request->all(), $persona[0]);

        return redirect()->back()->with('user_registered', 'El usuario se creó
        satisfactoriamente');
        //  return redirect($this->redirectPath());
    }

    public function registerPatient(Request $request)
    {

        $flag = DB::table('persona')
            ->where('ci', $request->input('ci'))
            ->count();

        $flag2 = DB::table('paciente')
            ->where('ci', $request->input('ci'))
            ->count();

        if ($flag) {
            $persona = DB::table('persona')
                ->where('ci', $request->input('ci'))
                ->pluck('persona.id_persona');

            $this->createPatient($request->all(), $persona[0]);
            return redirect()->back()->with('user_registered', 'El paciente se creó
        satisfactoriamente');
        } else
        if ($flag2) {
            return redirect()->back()->with('user_registered', 'El paciente ya se encuentra registrado');

        } else {
            $this->createPerson($request->all());

            $persona = DB::table('persona')
                ->where('ci', $request->input('ci'))
                ->pluck('persona.id_persona');

            $this->createPatient($request->all(), $persona[0]);

            return redirect()->back()->with('user_registered', 'El paciente se creó
        satisfactoriamente');
            //  return redirect($this->redirectPath());
        }
    }

}
