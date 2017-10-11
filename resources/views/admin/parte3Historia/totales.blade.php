@extends('admin-layout.sidebarAdmin') @section('content')
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{ url('css/totales.css')}} " rel="stylesheet">
<link href="{{ url('css/admin.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<div class="container">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
            @if(session('status'))
            <div class="alert alert-success text-center notification">
                <ul style="list-style:none;">
                    <li style="font-size:16px;">{{ session('status') }}</li>
                </ul>
            </div>
            @endif @foreach ($pacientes as $paciente)
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">
                <div style="font-size: 20px; text-align: center; color:#59bddd;">Area de Dentaduras Totales</div>
                <form class="form-horizontal" id="form_familiares">
                    {{ csrf_field() }}
                    <input type="hidden" name="consulta_id" value={{$consulta}}>
                    <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
                    <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="motivo">Nombre</label>
                            <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="nombre">{{$paciente->nombre }} {{ $paciente->apellido }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="motivo" class="">C.I:</label>
                            <textarea class="form-control" disabled cols="75" autofocus="true" rows="1" name="ci">{{ $paciente->ci }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="motivo" class="">Fecha Consulta</label>
                            <input class="form-control" id="fecha" type="text" class="form-control" name="fecha" data-validation="required" data-validation-error-msg="Debe ingrear una fecha" value="{{ old('fecha') }}">
                        </div>
                    </div>
                    <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                    1. EVALUACION PROSTODONTICA
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    1. Historia de Extracciones
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    Maxilares Enfermedad periodontal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="maxilar_caries" id="maxilar_caries" value="S"> Caries
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="maxilar_ambas" id="maxilar_ambas" value="S">Ambas 
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="maxilar_accidente" id="maxilar_accidente" value="S"> Accidente
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="maxilar_anos" id="mandibular_anos" value="S"> A&ntilde;os
                    </div>

                     <div class="col-lg-12 col-md-12 col-sm-12">
                    Mandibulares Enfermedad periodontal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="mandibular_caries" id="mandibular_caries" value="S"> Caries
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="mandibular_ambas" id="mandibular_ambas" value="S">Ambas 
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="mandibular_accidente" id="mandibular_accidente" value="S"> Accidente
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="mandibular_anos" id="mandibular_anos" value="S"> A&ntilde;os
                    </div>
                   
                   
                  </div>
                  <div class="row row_border">
                 
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    2. Experiencia anterios con dentaduras
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <input type="checkbox" name="dentadura_ninguna" id="dentadura_ninguna" value="S"> a. Ninguna
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="dentadura_si_usuado" id="dentadura_si_usuado" value="S"> b. Si ha usado 

                      <input type="text" class="form-control" data-validation="required" data-validation-depends-on="dentadura_si_usuado" placeholder="Cuantas" data-validation-error-msg="Debe especificar cuantas" name="dentadura_cuanta" id="dentadura_cuanta" > 
                      </div>
                   
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="dentadura_buena" id="dentadura_buena" value="S"> Buena
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="dentadura_mala" id="dentadura_mala" value="S"> Mala
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="dentadura_uso" id="dentadura_uso" value="S"> A&ntilde;os de uso
                    </div>

                     <div class="col-lg-12 col-md-12 col-sm-12">
                    c. Razon para el reemplazo: <input type="text" name="razon_reemplazo" class="form-control" id="razon_reemplazo" value="">
                    </div>
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    d. Tiempo de uso e la ultima dentadura <input type="text" name="tiempo_uso" class="form-control" id="tiempo_uso" value="">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    e.Tipo de dentadura:
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="tipo_detadura_sup" id="tipo_detadura_sup" value="">Superior
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="tipo_detadura_inf" id="tipo_detadura_inf" value="S">Inferior 
                      </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="tipo_detadura_ambas" id="tipo_detadura_ambas" value="S"> Ambas
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="tipo_detadura_nunguna" id="tipo_detadura_nunguna" value="S"> Ninguna
                    </div>
                  
                             
                   
                  </div>
                  <div class="row row_border">
                       <div class="col-lg-6 col-md-6 col-sm-4">
                    f.Uso de la dentadura:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="uso_dentadura" id="uso_dentadura">
                       <option value="constante">Constante</option>
                       <option value="solo_dia">Solo de dia</option>
                       <option value="raramente">Raramente</option>
                       <option value="nunca">Nunca</option>
                     </select>
                    </div>
                 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    g.Material de los dientes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="material_diente" id="material_diente">
                       <option value="resina">Resina</option>
                       <option value="otra">Otra</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    h.Forma de los dientes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="forma_diente" id="forma_diente">
                       <option value="con_cuspide">Con cuspide</option>
                       <option value="sin_cuspide">Sin cuspide</option>
                     </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    i.Material de la base de la Dentadura:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="material_base" id="material_base">
                       <option value="acrilico">Acrilico</option>
                       <option value="porcelana">Porcelana</option>
                       <option value="otros">Otros</option>

                     </select>
                    </div>                  
                   
                  </div>
                      <div class="row row_border">
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    3. Evaluacion del Paciente
                    </div>
                    
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    a.Comodidad:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_comodidad" id="eval_comodidad">
                       <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    b.Eficiencia masticatoria:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_efic_masticatoria" id="eval_efic_masticatoria">
                      <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    c.Estetica:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_estetica" id="eval_estetica">
                       <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    d.Pronunciacion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_pronunciacion" id="eval_pronunciacion">
                      <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    e.Dolor:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_dolor" id="eval_dolor">
                       <option value="intenso">Intenso</option>
                       <option value="moderado">Moderado</option>
                       <option value="leve">Leve</option>
                     </select>
                    </div>
                  </div>
                   
                  <div class="row row_border">
                   <div class="col-lg-12 col-md-12 col-sm-12">
                   4. Evaluacion de las dentaduras
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                       a. Distancia Interoclusal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="text" class="form-control" name="eval_dist_adecuada" placeholder="Adecuada" id="eval_dist_adecuada" value="">  
                      </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    (+)
                      <input class="form-control" type="text" name="eval_mas" id="eval_mas"> 
                      (-)
                      <input type="text" class="form-control" name="eval_menos" id="eval_menos" > 
                    </div>
               
                   
                     
                  </div>
                  <div class="row row_border">
                    <div class="col-lg-6 col-md-6 col-sm-4">
                    b.Estabilidad:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_estabilidad" id="eval_estabilidad">
                       <option value="satisfactoria">Satisfactoria</option>
                       <option value="defectuosa">Defectuosa</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    c.Oclusion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_oclusion" id="eval_oclusion">
                       <option value="correcta">Correcta</option>
                       <option value="incorrecta">Incorrecta</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    d.Retencion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_retencion" id="eval_retencion">
                       <option value="satisfactoria">Satisfactoria</option>
                       <option value="defectuosa">Defectuosa</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    e.Extension:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_extension" id="eval_extension">
                       <option value="correcta">Correcta</option>
                       <option value="incorrecta">Incorrecta</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    f.Estetica:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_estetica_dent" id="eval_estetica_dent">
                       <option value="adecuada">Adecuada</option>
                       <option value="inadecuada">Inadecuada</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    g.Dimension vertical:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_dimension_vertical" id="eval_dimension_vertical">
                       <option value="correcta">Correcta</option>
                       <option value="alta">Alta</option>
                       <option value="baja">Baja</option>
                     </select>
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2" style="width: 10% !important">
                      <input style="width: 150% !important" type="text" name="mm_vertical" placeholder="m.m" id="mm_vertical" value="">  
                      </div>
                    <div class="col-lg-6 col-md-6 col-sm-4">
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_prese_cam" id="eval_prese_cam">
                       <option value="si">Si</option>
                       <option value="no">No</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    i. Higiene:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eval_higiene" id="eval_higiene">
                       <option value="superior">Superior</option>
                       <option value="inferior">Inferior</option>
                     </select>
                    </div>


                  </div>
                  <div class="row row_border">
                       <p align="left">
                                <font><b>5 Evaluación Total:</b></font>
                            </p>
                            <div align="center">
                                <center>
                                    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width:0; border-right-width:0" bordercolor="#FFFF00" id="AutoNumber3" width="364">
                                        <tbody>
                                            <tr>
                                                <td colspan="7" align="center" style="border-left:medium none #FFFF00; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " width="138">
                                                    <p style="line-height: 200%" align="right">
                                                        <font>Dentadura maxilar</font>
                                                    </p>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " width="20">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td colspan="6" align="center" style="border-right:medium none #FFFF00; border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; " width="193">
                                                    <p style="line-height: 200%">
                                                        <font>Dentadura mandibular</font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="border-left:medium none #FFFF00; border-right-style: none; border-right-width: medium; " width="300" colspan="7">
                                                    <font>
                                                        <select size="1" name="dentadura_maxilar">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium" width="64">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td align="center" style="border-right:medium none #FFFF00; border-left-style: none; border-left-width: medium; " width="275" colspan="6">
                                                    <font>
                                                        <select size="1" name="dentadura_mandibular">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="border-style:none; border-width:medium; " width="26">
                                                    &nbsp;</td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="25">
                                                    <font>1</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="29">
                                                    <font>2</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="21">
                                                    <font>3</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="20">
                                                    <font>4</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="21">
                                                    <font>5</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="20">
                                                    &nbsp;</td>
                                                <td align="center" style="border-style:none; border-width:medium; " width="20">
                                                    &nbsp;</td>
                                                <td align="center" style="border-style:none; border-width:medium; " width="27">
                                                    &nbsp;</td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="26">
                                                    <font>1</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="35">
                                                    <font>2</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="35">
                                                    <font>3</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="35">
                                                    <font>4</font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium" width="35">
                                                    <font>5</font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="border-left:medium none #FFFF00; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; " width="80" colspan="3">
                                                    <p style="line-height: 200%">
                                                        <font>mala</font>
                                                    </p>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; " width="82" colspan="4">
                                                    <p style="line-height: 200%">
                                                        <font>excelente</font>
                                                    </p>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; " width="20">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; " width="53" colspan="2">
                                                    <p style="line-height: 200%" align="right">
                                                        <font>mala</font>
                                                    </p>
                                                </td>
                                                <td align="center" style="border-right:medium none #FFFF00; border-left-style: none; border-left-width: medium; border-top-style: none; border-top-width: medium; " width="140" colspan="4">
                                                    <p style="line-height: 200%" align="right">
                                                        <font>excelente</font>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                  </div>
                  <div class="row row_border">
                 
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    6. Informacion Clinica
                    </div>
                    
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    a.Expresion Facial:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="expresion_facial">
                       <option value="sin_alteraciones">Sin alteraciones</option>
                       <option value="alterada">Alterada</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    b.Labios
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="labios">
                       <option value="delgados">Delgados</option>
                       <option value="gruesos">Gruesos</option>
                       <option value="cortos">Cortos</option>
                       <option value="largos">Largos</option>
                       <option value="tensos">Tensos</option>
                       <option value="activos">Activos</option>
                     </select>
                    </div>
                       <div class="col-lg-6 col-md-6 col-sm-4">
                   Relacion labio alveolar
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="relacion_labio_alveolar" id="relacion_labio_alveolar">
                       <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    c.Reabsorcion:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="reabsorcion_sup" id="reabsorcion_sup">
                       <option value="ligera">Ligera</option>
                       <option value="desigual">Desigual</option>
                       <option value="extensa">Extensa</option>
                       <option value="marcada">Marcada</option>
                       <option value="regular">Regular</option>
                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control" name="reabsorcion_inf" id="reabsorcion_inf">
                       <option value="ligera">Ligera</option>
                       <option value="desigual">Desigual</option>
                       <option value="extensa">Extensa</option>
                       <option value="marcada">Marcada</option>
                       <option value="regular">Regular</option>
                     </select>
                    </div>  
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    d.Relacion de reborde:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="relacion_reborde" id="relacion_reborde">
                       <option value="normal">Normal</option>
                       <option value="protruida">Protruida</option>
                       <option value="retruida">Retruida</option>

                     </select>
                    </div>                  
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    e.Piso de la boca:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="piso_boca" id="piso_boca">
                       <option value="alto">Alto</option>
                       <option value="medio">Medio</option>
                       <option value="bajo">Bajo</option>

                     </select>
                    </div> 
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    h. Resilencia de la Mucosa:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="resilencia_sup" id="resilencia_sup">
                       <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>

                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control" name="resilencia_inf" id="resilencia_inf">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                     </select>
                    </div>   
                        <div class="col-lg-12 col-md-12 col-sm-12">
                    f. Insercion Musculares:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="insercion_sup" id="insercion_sup">
                       <option value="altas">Altas</option>
                       <option value="medias">Medias</option>
                       <option value="baja">Baja</option>
                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control" name="insercion_inf" id="insercion_inf">
                       <option value="altas">Altas</option>
                       <option value="medias">Medias</option>
                       <option value="baja">Baja</option>
                     </select>
                    </div>  
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    i.Abertura de la boca
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="abertura_boca" id="abertura_boca">
                       <option value="grande">Grande</option>
                       <option value="mediana">Mediana</option>
                       <option value="pequena">Peque&ntilde;a</option>
                     </select>
                    </div>      
                         <div class="col-lg-12 col-md-12 col-sm-12">
                    j. Tamano del Arco:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="tam_sup" id="tam_sup">
                       <option value="grande">Grande</option>
                       <option value="mediano">Mediano</option>
                       <option value="pequeno">Pequeno</option>
                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control" name="tam_inf" id="tam_inf">
                       <option value="grande">Grande</option>
                       <option value="mediano">Mediano</option>
                       <option value="pequeno">Pequeno</option>
                     </select>
                    </div>  
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    k.Contorno de la boveda palatina:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="contorno_boveda" id="contorno_boveda">
                       <option value="plana">Plana</option>
                       <option value="ojival">Ojival</option>
                       <option value="ovalada">Ovalada</option>

                     </select>
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    l.Contorno del paladar blando en sentido antero-posterior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input class="form-control" style="width: 100% !important" type="text" name="contorno_paladar" placeholder="" id="contorno_paladar" value=""> 
                    </div>
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    m. Area del sellado palatino posterior:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Anchura:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="anchura" id="anchura">
                       <option value="amplio">Amplio</option>
                       <option value="estrecho">Estrecho</option>
                       <option value="promedio">Promedio</option>
                     </select>
                    </div> 
                        <div class="col-lg-6 col-md-6 col-sm-6">
                    Depresibilidad:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control" name="depresibilidad" id="depresibilidad">
                        <option value="amplio">Amplio</option>
                       <option value="estrecho">Estrecho</option>
                       <option value="promedio">Promedio</option>
                     </select>
                    </div>  
                 
                  </div>
                  <div class="row row_border">
                    
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    n. Torus:
                    </div>
                   <div class="col-lg-2 col-md-2 col-sm-2">
                    Palatino:
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                   <input class="form-control" style="width: 100% !important" type="text" name="palatino_ausente" placeholder="Ausente" id="palatino_ausente" value=""> 
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2">
                   <input class="form-control" style="width: 100% !important" type="text" name="palatino_presente" placeholder="Presente" id="palatino_presente" value="">
                   Tamano
                       <select class="form-control" name="palatino_tam" id="palatino_tam">
                            <option value="grande">Grande</option>
                           <option value="mediano">Mediano</option>
                           <option value="pequeno">Pequeno</option>
                       </select> 
                    </div>  
                     
                    <div class="col-lg-2 col-md-2 col-sm-2">
                    Mandibular:
                    </div>
                   <div class="col-lg-2 col-md-2 col-sm-2">
                   <input class="form-control" style="width: 100% !important" type="text" name="mandibular_ausente" placeholder="Ausente" id="mandibular_ausente" value=""> 
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2">
                   <input class="form-control" style="width: 100% !important" type="text" name="mandibular_presente" placeholder="Presente" id="mandibular_presente" value=""> 
                    Tamano
                       <select class="form-control" name="mandibular_tam" id="mandibular_tam">
                           <option value="grande">Grande</option>
                           <option value="mediano">Mediano</option>
                           <option value="pequeno">Pequeno</option>
                       </select>
                    </div>  
                      
                     
                  </div>
                  <div class="row row_border">
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    o.Espacio Intercadas:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="espacio" id="espacio">
                       <option value="adecuado">Adecuado</option>
                       <option value="inadecuado">Inadecuado</option>
                     </select>
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2" style="width: 10% !important">
                      <input style="width: 150% !important" type="text" name="mm" placeholder="m.m" id="mm" value="">  
                      </div>
                       <div class="col-lg-12 col-md-12 col-sm-12">
                    p. Posicion de la lengua:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="posicion" id="posicion">
                       <option value="favorable">Favorable</option>
                       <option value="desfavorable">Desfavorable</option>
                     </select>
                    </div> 
                  </div>
                   <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                    2. TOMA DE IMPRESION
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    Seleccion de la cubeta superior
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-46">
                      <input type="text" name="seleccion_sup" id="seleccion_sup" value="" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    Seleccion de la cubeta inferior
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-46">
                      <input type="text" name="seleccion_inf" id="seleccion_inf" value="" class="form-control">
                    </div><div class="col-lg-6 col-md-6 col-sm-6">
                    Material de impresion utilizado
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-46">
                      <input type="text" name="material" id="material" value="" class="form-control">
                    </div>
                  
                   
                  </div>
                          <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                    3. ANALISIS DE LOS MODELOS DE DIAGNOSTICOS
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    Dientes Presentes
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="diente_sup" id="diente_sup" value="" class="form-control">
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="diente_inf" id="diente_inf" value="" class="form-control">
                    </div> 
                   
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Relacion Intermaxilares:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="relacion_inter" id="relacion_inter" value="" class="form-control">
                    </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Relacion de los bordes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="relacion_borde" id="relacion_borde" value="" class="form-control">
                    </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Espacio disponibles para los dientes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="espacio_disp" id="espacio_disp" value="" class="form-control">
                    </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Espacio disponible para el apoyo oclusal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="espacion_disp_oclusal" id="espacion_disp_oclusal" value="" class="form-control">
                    </div> 
                     
                  </div>
                  <div class="row row_border">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                     Seleccion dientes artificiales:
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                       Color<input type="text" name="seleccion_arti_color" id="seleccion_arti_color" value="" class="form-control">
                    </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                       Marca<input type="text" name="seleccion_arti_marca" id="seleccion_arti_marca" value="" class="form-control">
                    </div>
                     <div class="col-lg-12 col-md-12 col-sm-12">
                     Formula:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       Anteriores<input type="text" name="formula_anterior" id="formula_anterior" value="" class="form-control">
                    </div> 
                     <div class="col-lg-4 col-md-4 col-sm-4">
                       Posteriores<input type="text" name="formula_posterior" id="formula_posterior" value="" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       Marca<input type="text" name="formula_marca" id="formula_marca" value="" class="form-control">
                    </div>
                   
                  </div>

                <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                    4. ACTIVIDAD CLINICA
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      Numero de citas en la que se realizara el tratamiento
                    </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="numero_cita" id="numero_cita" value="" class="form-control">
                    </div> 
                    </div>
                       <div class="row row_border">
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    5. EVALUACION POST INSERCION POR PARTE DEL PACIENTE
                    </div>
                    
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    a.Comodidad:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="comodidad" id="comodidad">
                       <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    b.Eficiencia masticatoria:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="eficiencia_masticatoria" id="eficiencia_masticatoria">
                       <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    c.Estetica:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="post_estetica" id="post_estetica">
                       <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    d.Pronunciacion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control" name="pronunciacion" id="pronunciacion">
                        <option value="buena">Buena</option>
                       <option value="regular">Regular</option>
                       <option value="mala">Mala</option>
                     </select>
                    </div>
                   
                  </div>
                   



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" onclick="insertar_historia();" class="btn btn-primary">Registrar
                            </button>
                            <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.col-lg-12 -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
<!-- jQuery -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('js/list.min.js')}}"></script>
<script>
$(document).ready(function() {
    $("#fecha").datepicker({
        dateFormat: "yy-mm-dd",
        changeYear: true,
        changeMonth: true
    });
    $(".notification").fadeTo(3000, 500).slideUp(500, function() {
        $(".notification").slideUp(500);
    });
    var monkeyList = new List('pacientes', {
        valueNames: ['name'],
        page: 3,
        pagination: true
    });

    var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]

    var newDate = new Date();
    newDate.setDate(newDate.getDate() + 1);
    $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());


});

function insertar_historia() {

    var myLanguage = {
        errorTitle: 'El formulario fallo en enviarse',
        requiredFields: 'No se ha introducido datos',
        badTime: 'No ha dado una hora correcta',
        badEmail: 'No ha dado una direccion de email correcta',
        badTelephone: 'No ha dado un numero de telefono correcto',

    }

    $.validate({
        modules: 'logic',
        language: myLanguage,
        form: '#form_familiares',
        onError: function($form) {
            // alert('Validation of form '+$form.attr('id')+' failed!');
        },
        onSuccess: function($form) {
            //alert('The form '+$form.attr('id')+' is valid!');
            //return false; // Will stop the submission of the form
            console.log($("#form_familiares")[0]);
            var formData = new FormData($("#form_familiares")[0]);

            $.ajax({
                url: "{{ url('/totales') }}",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function() {
                    //popover_show();
                    new PNotify({
                        title: 'Registro Exitoso',
                        text: 'La historia ha sido almacenada!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    console.log('exito')
                },
                error: function(e) {
                    console.log('Error!!!', e);
                }
            });
            return false;
        },

        onElementValidate: function(valid, $el, $form, errorMess) {
            console.log('Input ' + $el.attr('name') + ' is ' + (valid ? 'VALID' : 'NOT VALID'));
        }
    });


}
</script>
@endsection
  