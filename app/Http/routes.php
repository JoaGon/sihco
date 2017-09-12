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
Route::get('canvas', function(){
  return view('admin.canvas2');
});
Route::get('/', 'HomeController@index');


Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

//Route::get('od/{paciente_id}/{consulta_id}','Historia2Controller@odontoIndex');
//Route::post('save_odonto','Historia2Controller@odonto');



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

Route::post('/register_imaging','ImagenController@safeRadio');
Route::post('/delete/avatar','ImagenController@deleteAvatar');


Route::get('datos/consulta/{nro_historia}','ConsultaController@consulta_paciente');
Route::get('consulta', 'ConsultaController@index');
Route::post('motivo_consulta','ConsultaController@save');
Route::get('consulta/{nro_historia}','ConsultaController@show_details');

Route::get('registro_imageneologico/{paciente_id}/{consulta_id}','ImagenController@index');
Route::post('/register/imaging','ImagenController@safeImaging');
Route::post('delete_image', 'ImagenController@deleteImaging');  
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
Route::post("eliminar/enfermedad_renal",'HistoriaController@Eliminar_enfermedad_renal');

Route::get("renales",'HistoriaController@renales');
Route::post("enfermedad_renal/",'HistoriaController@enfermedadRenal');
Route::post("eliminar/paciente/enfermedad_renal/",'HistoriaController@EliminarEnfermedadRenal');
Route::get("insertar_renal",'HistoriaController@InsertarEnfermedadRenal');


Route::get("alergicas",'HistoriaController@alergicas');
Route::post("insertar/enfermedad_alergica/",'HistoriaController@InsertarEnfermedadAlergica');
Route::post("eliminar/enfermedad_alergica/",'HistoriaController@EliminarAlergica');
Route::post("enfermedad_alergica/",'HistoriaController@enfermedadAlergica');
Route::post("eliminar/paciente/enfermedad_alergica/",'HistoriaController@EliminarEnfermedadAlergica');


Route::get("infecciosas",'HistoriaController@infecciosas');
Route::post("insertar/enfermedad_infecciosa/",'HistoriaController@InsertarEnfermedadInfecciosa');
Route::post("eliminar/enfermedad_infecciosa/",'HistoriaController@EliminarInfecciosa');
Route::post("enfermedad_infecciosa/",'HistoriaController@enfermedadInfecciosa');
Route::post("eliminar/paciente/enfermedad_infecciosa/",'HistoriaController@EliminarEnfermedadInfecciosa');


Route::get("transmision_sexual",'HistoriaController@transmision_sexual');
Route::post("insertar/enfermedad_transmision_sexual",'HistoriaController@InsertarEnfermedadTransmSexual');
Route::post("eliminar/enfermedad_transmision_sexual/",'HistoriaController@EliminarTransmSexual');
Route::post("enfermedad_transmision_sexual",'HistoriaController@enfermedadTransmSexual');
Route::post("eliminar/paciente/enfermedad_transmision_sexual/",'HistoriaController@EliminarEnfermedadTransmSexual');

Route::get("cancer",'HistoriaController@cancer');
Route::post("insertar/enfermedad_cancer/",'HistoriaController@InsertarEnfermedadCancer');
Route::post("eliminar/enfermedad_cancer/",'HistoriaController@EliminarCancer');
Route::post("enfermedad_cancer/",'HistoriaController@enfermedadCancer');
Route::post("eliminar/paciente/enfermedad_cancer/",'HistoriaController@EliminarEnfermedadCancer');


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

Route::get("examen_clinico/{paciente_id}/{consulta_id}",'Historia2Controller@examenClinicoIndex');
Route::post("examen_clinico",'Historia2Controller@examenClinico');

Route::get("evaluacion_periodontal/{paciente_id}/{consulta_id}",'Historia2Controller@evaluacionperiodontalIndex');
Route::post("evaluacion_periodontal",'Historia2Controller@evaluacionperiodontal');

Route::get("control_placa/{paciente_id}/{consulta_id}",'Historia2Controller@controlplacaIndex');
Route::post("control_placa",'Historia2Controller@control_placa');

Route::get("odontograma/{paciente_id}/{consulta_id}",'Historia2Controller@odontoIndex');
Route::post("save_odonto",'Historia2Controller@odonto');

Route::get("corona_puente/{paciente_id}/{consulta_id}",'Historia3Controller@coronapuenteIndex');
Route::post("corona_puente",'Historia3Controller@coronapuente');

Route::get("examen_muscular/{paciente_id}/{consulta_id}",'Historia2Controller@examenmuscularIndex');
Route::post("examen_muscular",'Historia2Controller@examenmuscular');

Route::get("modelo_diagnostico/{paciente_id}/{consulta_id}",'Historia2Controller@modelodiagnosticoIndex');
Route::post("modelo_diagnostico",'Historia2Controller@modelodiagnostico');

Route::get("test_fagerstrom/{paciente_id}/{consulta_id}",'Historia2Controller@testfagerstromIndex');
Route::post("test_fagerstrom",'Historia2Controller@testfagerstrom');

Route::get("diagrama_riesgo/{paciente_id}/{consulta_id}",'Historia2Controller@diagramariesgoIndex');
Route::post("diagrama_riesgo",'Historia2Controller@diagramariesgo');



Route::get("endodoncia/{paciente_id}/{consulta_id}",'Historia3Controller@endodonciaIndex');
Route::post("endodoncia",'Historia3Controller@endodoncia');

Route::get("cirugia/{paciente_id}/{consulta_id}",'Historia3Controller@cirugiaIndex');
Route::post("cirugia",'Historia3Controller@cirugia');

Route::get("operatoria/{paciente_id}/{consulta_id}",'Historia3Controller@operatoriaIndex');
Route::post("operatoria",'Historia3Controller@operatoria');

Route::get("totales/{paciente_id}/{consulta_id}",'Historia3Controller@totalesIndex');
Route::post("totales",'Historia3Controller@totales');

Route::get("parciales/{paciente_id}/{consulta_id}",'ImagenController@parcialesIndex');
Route::post("parciales",'Historia3Controller@parciales');

Route::get("diagnostico/{paciente_id}/{consulta_id}",'DiagnosticoController@diagnosticoIndex');
Route::post("diagnostico",'DiagnosticoController@diagnostico');

Route::get("diagnostico_clinico/{paciente_id}/{consulta_id}",'DiagnosticoController@diagnosticoDefIndex');
Route::post("diagnostico_clinico",'DiagnosticoController@diagnosticoDef');

Route::get("pronostico/{paciente_id}/{consulta_id}",'DiagnosticoController@pronosticoIndex');
Route::post("pronostico",'DiagnosticoController@pronostico');

Route::get("tratamiento/{paciente_id}/{consulta_id}",'DiagnosticoController@tratamientoIndex');
Route::post("tratamiento",'DiagnosticoController@totales');

Route::get("tratamiento/{paciente_id}/{consulta_id}",'DiagnosticoController@tratamientoIndex');
Route::post("tratamiento",'DiagnosticoController@tratamiento');



//Route::post('/auth/register', 'RegistrarController@postRegister');
Route::post('/auth/registrar', 'RegistrarController@postRegister');
Route::post('/auth/paciente/registrado', 'RegistrarController@postRegisterPatient');

Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');


Route::get('consulta_historia_paciente','ConsultaHistoriaController@index');
Route::get('consulta_paciente/{nro_historia}','ConsultaHistoriaController@showPaciente');
Route::get('consulta_paciente_/{consulta}','ConsultaHistoriaController@showAntecedenteFamiliar');


Route::get('consulta_antecedentepersonal/{nro_historia}','ConsultaHistoriaController@showAntecedentePersonal');
Route::get('consulta_ante_personal/{id}/{paciente_id}','ConsultaHistoriaController@getAntecedentePersonal');

Route::post('update_antecedente_personal','ConsultaHistoriaController@updateAntecedentePersonal');
Route::post('validar_antecedente_personal','ConsultaHistoriaController@validarAntecedentePersonal');

Route::get('consulta_antecedentefamiliar/{nro_historia}','ConsultaHistoriaController@showAntecedenteFamiliar');
Route::get('consulta_ante_familiar/{id}/{paciente_id}','ConsultaHistoriaController@getAntecedenteFamiliar');

Route::post('update_antecedente_familiar','ConsultaHistoriaController@updateAntecedenteFamiliar');
Route::post('validar_antecedente_familiar','ConsultaHistoriaController@validarAntecedenteFamiliar');

Route::get('consulta_datosclinicos/{nro_historia}','ConsultaHistoriaController@showDatosClinicos');
Route::get('consulta_datosclinicos/{id}/{paciente_id}','ConsultaHistoriaController@getDatosClinicos');

Route::post('update_dato_clinico','ConsultaHistoriaController@updateDatosClinicos');
Route::post('validar_dato_clinico','ConsultaHistoriaController@validarDatosClinicos');

Route::get('consulta_resumenmedico/{nro_historia}','ConsultaHistoriaController@showResumenMedico');
Route::get('consulta_resumenmedico/{id}/{paciente_id}','ConsultaHistoriaController@getResumenMedico');

Route::post('update_resumenMedico','ConsultaHistoriaController@updateResumenMedico');
Route::post('validar_resumen_medico','ConsultaHistoriaController@validarResumenMedico');

Route::get('consulta_resumenodontologico/{nro_historia}','ConsultaHistoriaController@showResumenOdontologico');
Route::get('consulta_resumenodontologico/{id}/{paciente_id}','ConsultaHistoriaController@getResumenOdontologico');

Route::post('update_resumenOdontologico','ConsultaHistoriaController@updateResumenOdontologico');
Route::post('validar_resumen_odontologico','ConsultaHistoriaController@validarResumenOdontologico');

Route::get('consulta_signosvitales/{nro_historia}','ConsultaHistoriaController@showSignosVitales');
Route::get('consulta_signosvitales/{id}/{paciente_id}','ConsultaHistoriaController@getSignosVitales');

Route::post('update_signosvitales','ConsultaHistoriaController@updateSignosVitales');
Route::post('validar_signos_vitales','ConsultaHistoriaController@validarSignosVitales');

Route::get('consulta_historiaOdontologica/{nro_historia}','ConsultaHistoriaController@showHistoriaOdontologica');
Route::get('consulta_historiaOdontologica/{id}/{paciente_id}','ConsultaHistoriaController@getHistoriaOdontologica');

Route::post('update_historiaOdontologica','ConsultaHistoriaController@updateHistoriaOdontologica');
Route::post('validar_historia_odontologica','ConsultaHistoriaController@validarHistoriaOdontologica');

Route::get('consulta_examenClinico/{nro_historia}','ConsultaHistoria2Controller@showExamenClinico');
Route::get('consulta_examenClinico/{id}/{paciente_id}','ConsultaHistoria2Controller@getExamenClinico');

Route::post('update_examenClinico','ConsultaHistoria2Controller@updateExamenClinico');
Route::post('validar_examen_clinico','ConsultaHistoria2Controller@validarExamenClinico');

Route::get('consulta_evaluacionPeriodontal/{nro_historia}','ConsultaHistoria2Controller@showEvaluacionPeriodontal');
Route::get('consulta_evaluacionPeriodontal/{id}/{paciente_id}','ConsultaHistoria2Controller@getEvaluacionPeriodontal');

Route::post('update_examenClinico','ConsultaHistoria2Controller@updateEvaluacionPeriodontal');
Route::post('validar_examen_clinico','ConsultaHistoria2Controller@validarEvaluacionPeriodontal');

Route::get('consulta_examenMuscular/{nro_historia}','ConsultaHistoria2Controller@showExamenMuscular');
Route::get('consulta_examenMuscular/{id}/{paciente_id}','ConsultaHistoria2Controller@getExamenMuscular');

Route::post('update_examenMuscular','ConsultaHistoria2Controller@updateExamenMuscular');
Route::post('validar_examen_muscular','ConsultaHistoria2Controller@validarExamenMuscular');

Route::get('consulta_modeloDiagnostico/{nro_historia}','ConsultaHistoria2Controller@showModeloDiagnostico');
Route::get('consulta_modeloDiagnostico/{id}/{paciente_id}','ConsultaHistoria2Controller@getModeloDiagnostico');

Route::post('update_examenMuscular','ConsultaHistoria2Controller@updateModeloDiagnostico');
Route::post('validar_examen_muscular','ConsultaHistoria2Controller@validarModeloDiagnostico');

Route::get('consulta_testFagerstrom/{nro_historia}','ConsultaHistoria2Controller@showTestFagerstrom');
Route::get('consulta_testFagerstrom/{id}/{paciente_id}','ConsultaHistoria2Controller@getTestFagerstrom');

Route::post('update_testFagerstrom','ConsultaHistoria2Controller@updateTestFagerstrom');

Route::get('consulta_diagramaRiesgo/{nro_historia}','ConsultaHistoria2Controller@showDiagramaRiesgo');
Route::get('consulta_diagramaRiesgo/{id}/{paciente_id}','ConsultaHistoria2Controller@getDiagramaRiesgo');

Route::post('update_diagramaRiesgo','ConsultaHistoria2Controller@updateDiagramaRiesgo');
Route::post('validar_diagramaRiesgo','ConsultaHistoria2Controller@validarDiagramaRiesgo');

Route::get('consulta_controlPlaca/{nro_historia}','ConsultaHistoria2Controller@showControlPlaca');
Route::get('consulta_controlPlaca/{id}/{paciente_id}','ConsultaHistoria2Controller@getControlPlaca');

Route::post('update_controlPlaca','ConsultaHistoria2Controller@updateControlPlaca');
Route::post('validar_controPlaca','ConsultaHistoria2Controller@validarControlPlaca');

Route::get('consulta_coronasPuentes/{nro_historia}','ConsultaHistoria3Controller@showcoronasPuentes');
Route::get('consulta_coronasPuentes/{id}/{paciente_id}','ConsultaHistoria3Controller@getcoronasPuentes');

Route::post('update_coronasPuentes','ConsultaHistoria3Controller@updatecoronasPuentes');
Route::post('validar_coronasPuentes','ConsultaHistoria3Controller@validarcoronasPuentes');

Route::get('consulta_operatoria/{nro_historia}','ConsultaHistoria3Controller@showOperatoria');
Route::get('consulta_operatoria/{id}/{paciente_id}','ConsultaHistoria3Controller@getOperatoria');

Route::post('update_operatoria','ConsultaHistoria3Controller@updateOperatoria');
Route::post('validar_operatoria','ConsultaHistoria3Controller@validarOperatoria');

Route::get('consulta_cirugia/{nro_historia}','ConsultaHistoria3Controller@showCirugia');
Route::get('consulta_cirugia/{id}/{paciente_id}','ConsultaHistoria3Controller@getCirugia');

Route::post('update_cirugia','ConsultaHistoria3Controller@updateCirugia');
Route::post('validar_cirugia','ConsultaHistoria3Controller@validarCirugia');

Route::get('consulta_endondocia/{nro_historia}','ConsultaHistoria3Controller@showEndodoncia');
Route::get('consulta_endondocia/{id}/{paciente_id}','ConsultaHistoria3Controller@getEndodoncia');

Route::post('update_endodoncia','ConsultaHistoria3Controller@updateEndodoncia');
Route::post('validar_endodoncia','ConsultaHistoria3Controller@validarEndodoncia');

Route::get('consulta_totales/{nro_historia}','ConsultaHistoria3Controller@showTotales');
Route::get('consulta_totales/{id}/{paciente_id}','ConsultaHistoria3Controller@getTotales');

Route::post('update_totales','ConsultaHistoria3Controller@updateTotales');
Route::post('validar_totales','ConsultaHistoria3Controller@validarTotales');

Route::get('consulta_diagnostico_clinico/{nro_historia}','ConsultaDiagnosticoController@showDiagnosticoClinico');
Route::get('consulta_diagnostico_clinico/{id}/{paciente_id}','ConsultaDiagnosticoController@getDiagnosticoClinico');

Route::get('diagnosticos/{id}/{paciente_id}/{especialidad}','ConsultaDiagnosticoController@getDiagnosticos');

Route::post('update_diagnostico_clinico','ConsultaDiagnosticoController@updateDiagnosticoClinico');
Route::post('validar_diagnostico_clinico','ConsultaDiagnosticoController@validarDiagnosticoClinico');

Route::get('datos_paciente/{paciente_id}/{consulta_id}','ConsultaHistoriaController@datos_principal');

Route::get('consulta_historia','ConsultaHistoria@index');
Route::get('graficas','GraficasController@show');
Route::get('graficas_user/{anio}/{mes}','GraficasController@todos_usuarios');

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
