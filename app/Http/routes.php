<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'HomeController@index');


Route::get('/', function(){
  return view('home');
});
Route::get('/', 'HomeController@index');


Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('odontodiagrama','ConsultaController@odonto');

//Route::get('/auth/register', 'RegistrarController@getRegister');
Route::post('edit','UsuarioController@edit');
Route::post('usuario/edit','UsuarioController@update');
Route::post('usuario/delete/{id}/','UsuarioController@destroy');
Route::get('edit,UsuarioController@update');
Route::get('usuarios','UsuarioController@index');

Route::get('pacientes','PacienteController@index');
Route::post('edit/paciente','PacienteController@edit');
Route::post('paciente/edit','PacienteController@update');
Route::post('paciente/delete/{id}','PacienteController@destroy');
Route::get('/auth/registrar', 'RegistrarController@getRegister');
Route::get('/auth/registrar/paciente', 'RegistrarController@getRegisterPatient');

/*Route::get('/auth/register', function(){
  return "llega";
});*/
Route::get('datos/consulta/{nro_historia}','ConsultaController@consulta_paciente');
Route::get('consulta', 'ConsultaController@index');
Route::post('motivo_consulta','ConsultaController@save');
Route::get('consulta/{nro_historia}','ConsultaController@show_details');
Route::get('imagen/{consulta}/{id_paciente}','ImagenController@index');
Route::post('/register/imaging','ImagenController@safeImaging');
Route::post('/register/imaging/study','ImagenController@safeStudy');

Route::get('datos/paciente/{paciente_id}/{consulta_id}','ConsultaController@datos_principal');

Route::get("antecedentefamiliar/{paciente_id}/{consulta_id}",'HistoriaController@antecedentefamiliarIndex');
Route::post("antecedente_familiar",'HistoriaController@antecedentefamiliar');

Route::post("enfermedad_cardiovascular/",'HistoriaController@enfermedadCardiovascular');
Route::post("eliminar/paciente/enfermedad_cardiovascular/",'HistoriaController@EliminarEnfermedadCardiovascular');
Route::post("insertar/enfermedad_cardiovascular/",'HistoriaController@InsertarEnfermedadCardiovascular');
Route::post("eliminar/enfermedad_cardiovascular/",'HistoriaController@EliminarCardiovascular');

Route::post("cardiovasculares",'HistoriaController@cardiovasculares');
Route::get("circulos",'HistoriaController@circulo');

Route::get("renales",'HistoriaController@renales');
Route::post("enfermedad_renal/",'HistoriaController@enfermedadRenal');
Route::post("eliminar/paciente/enfermedad_renal/",'HistoriaController@EliminarEnfermedadRenal');
Route::post("insertar/enfermedad_renal",'HistoriaController@InsertarEnfermedadRenal');
Route::post("eliminar/enfermedad_cardiovascular/",'HistoriaController@EliminarCardiovascular');







Route::get("antecedentepersonal/{paciente_id}/{consulta_id}",'HistoriaController@antecedentepersonalIndex');
Route::post("antecedente_personal",'HistoriaController@antecedentepersonal');

Route::post("signos_vitales",'HistoriaController@signosvitales');
Route::get("signosvitales/{paciente_id}/{consulta_id}",'HistoriaController@signosvitalesIndex');

Route::get("resumenclinica/{paciente_id}/{consulta_id}",'HistoriaController@resumenclinicaIndex');

Route::get("resumenodontologica/{paciente_id}/{consulta_id}",'HistoriaController@resumenodontologicaIndex');
Route::post("resumen_odontologico",'HistoriaController@resumenodontologica');

Route::get("datosclinicos/{paciente_id}/{consulta_id}",'HistoriaController@datosclinicosIndex');
Route::post("datosclinicos/",'HistoriaController@datosclinicos');


Route::get("historiaodontologica/{paciente_id}/{consulta_id}",'HistoriaController@historiaodontologicaIndex');
Route::post("historiaodontologica/",'HistoriaController@historiaodontologica');


Route::post("resumen_medico",'HistoriaController@resumenmedico');


//Route::post('/auth/register', 'RegistrarController@postRegister');
Route::post('/auth/registrar', 'RegistrarController@postRegister');
Route::post('/auth/paciente/registrado', 'RegistrarController@postRegisterPatient');

Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');


Route::get('/test/', function () {
  $pdf = PDF::loadView('pruebaparapdf');
  return $pdf->stream('pruebapdf.pdf');
});


/*Templates Boostrap*/
Route::get('panels',function(){

    return view('templates.panels-wells');
});
Route::get('index',function(){

    return view('templates.index');
});
Route::get('morris',function(){

    return view('templates.morris');
});

Route::get('flot',function(){

    return view('templates.flot');
});
Route::get('notifications',function(){

    return view('templates.notifications');
});
Route::get('icons',function(){

    return view('templates.icons');
});
Route::get('forms',function(){

    return view('templates.forms');
});
Route::get('grid',function(){

    return view('templates.grid');
});
Route::get('tables',function(){

    return view('templates.tables');
});
//Route::auth();
