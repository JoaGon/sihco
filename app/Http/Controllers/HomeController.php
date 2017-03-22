<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('level1');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  return view('home');
      $acceso = DB::table('roles')
        ->where('id_rol',Auth::user()->rol_id)
        ->pluck('nivel_acceso');

    if ($acceso[0] == 9){
      //echo"<pre>";print_r($acceso);echo"<pre>";die();
        //return redirect('/admin');
        return view('admin.index');
    }else if ($acceso[0] == 8){

        //return redirect('/jefe-clinica');
        return view('jefe.index');
    }else if ($acceso[0] == 7){

        return view('tutor.index');
    }
    else if ($acceso[0] == 5){

        return view('estudiante_4.index');
    }
    else if ($acceso[0] == 4){

        return view('estudiante_3.index');
    }
    else if ($acceso[0] == 3){

        return view('estudiante_2.index');
    }
    else if ($acceso[0] == 1){

        return view('paciente.index');
    }

    }
}
