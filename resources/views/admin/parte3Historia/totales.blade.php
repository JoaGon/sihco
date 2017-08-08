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
                      <input type="checkbox" name="afectando_salud" id="caries" value="S"> Caries
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Ambas 
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Accidente
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> A&ntilde;os
                    </div>

                     <div class="col-lg-12 col-md-12 col-sm-12">
                    Mandibulares Enfermedad periodontal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Caries
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Ambas 
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Accidente
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> A&ntilde;os
                    </div>
                   
                   
                  </div>
                  <div class="row row_border">
                 
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    2. Experiencia anterios con dentaduras
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> a. Ninguna
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S"> b. Si ha usado 
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    Cuantas
                      <input type="text" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Buena
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Mala
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> A&ntilde;os de uso
                    </div>

                     <div class="col-lg-12 col-md-12 col-sm-12">
                    c. Razon para el reemplazo: <input type="text" name="afectando_salud" class="form-control" id="afectando_salud" value="">
                    </div>
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    d. Tiempo de uso e la ultima dentadura <input type="text" name="afectando_salud" class="form-control" id="afectando_salud" value="">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    e.Tipo de dentadura:
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="">Superior
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Inferior 
                      </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Ambas
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Ninguna
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    f.Uso de la dentadura:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Constante</option>
                       <option>Solo de dia</option>
                       <option>Raramente</option>
                       <option>Nunca</option>
                     </select>
                    </div>
                 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    g.Material de los dientes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Resina</option>
                       <option>Otra</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    h.Forma de los dientes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Con cuspide</option>
                       <option>Sin cuspide</option>
                     </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    i.Material de la base de la Dentadura:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Acrilico</option>
                       <option>Porcelana</option>
                       <option>Otros</option>

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
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    b.Eficiencia masticatoria:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    c.Estetica:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    d.Pronunciacion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    e.Dolor:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Intenso</option>
                       <option>Moderado</option>
                       <option>Leve</option>
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
                      <input type="text" name="apariencia_dientes" placeholder="Adecuada" id="apariencia_dientes" value="">  
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    (+)
                      <input type="text" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    (-)
                      <input type="text" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> 
                    </div>
                   
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    b.Estabilidad:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Satisfactoria</option>
                       <option>Defectuosa</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    c.Oclusion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Correcta</option>
                       <option>Incorrecta</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    d.Retencion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Satisfactoria</option>
                       <option>Defectuosa</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    e.Extension:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Correcta</option>
                       <option>Incorrecta</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    f.Estetica:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Adecuada</option>
                       <option>Inadecuada</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    g.Dimension vertical:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Correcta</option>
                       <option>Alta</option>
                       <option>Baja</option>
                     </select>
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2" style="width: 10% !important">
                      <input style="width: 150% !important" type="text" name="apariencia_dientes" placeholder="m.m" id="apariencia_dientes" value="">  
                      </div>
                    <div class="col-lg-6 col-md-6 col-sm-4">
                    h.Presentacion camara succion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Si</option>
                       <option>No</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    i. Higiene:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Superior</option>
                       <option>Inferior</option>
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
                                                        <select size="1" name="dtotales42">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium" width="64">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td align="center" style="border-right:medium none #FFFF00; border-left-style: none; border-left-width: medium; " width="275" colspan="6">
                                                    <font>
                                                        <select size="1" name="dtotales43">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
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
                     <select class="form-control">
                       <option>Sin alteraciones</option>
                       <option>Alterada</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    b.Labios
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Delgados</option>
                       <option>Gruesos</option>
                       <option>Cortos</option>
                       <option>Largos</option>
                       <option>Tensos</option>
                       <option>Activos</option>
                     </select>
                    </div>
                       <div class="col-lg-6 col-md-6 col-sm-4">
                   Relacion labio alveolar
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
                     </select>
                    </div>
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    c.Reabsorcion:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Ligera</option>
                       <option>Desigual</option>
                       <option>Extensa</option>
                       <option>Marcada</option>
                       <option>Regular</option>
                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control">
                       <option>Ligera</option>
                       <option>Desigual</option>
                       <option>Extensa</option>
                       <option>Marcada</option>
                       <option>Regular</option>
                     </select>
                    </div>  
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    d.Relacion de reborde:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Normal</option>
                       <option>Protruida</option>
                       <option>Retruida</option>

                     </select>
                    </div>                  
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    e.Piso de la boca:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Alto</option>
                       <option>Medio</option>
                       <option>Bajo</option>

                     </select>
                    </div> 
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    h. Resilencia de la Mucosa:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>1</option>
                       <option>2</option>
                       <option>3</option>
                       <option>4</option>
                       <option>5</option>

                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control">
                       <option>1</option>
                       <option>2</option>
                       <option>3</option>
                       <option>4</option>
                       <option>5</option>
                     </select>
                    </div>   
                        <div class="col-lg-12 col-md-12 col-sm-12">
                    f. Insercion Musculares:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Altas</option>
                       <option>Medias</option>
                       <option>Baja</option>
                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control">
                       <option>Altas</option>
                       <option>Medias</option>
                       <option>Baja</option>
                     </select>
                    </div>  
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    i.Abertura de la boca
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Grande</option>
                       <option>Mediana</option>
                       <option>Pequena</option>
                     </select>
                    </div>      
                         <div class="col-lg-12 col-md-12 col-sm-12">
                    j. Tamano del Arco:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Superior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Grande</option>
                       <option>Mediano</option>
                       <option>Pequeno</option>
                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Maxilar Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control">
                       <option>Grande</option>
                       <option>Mediano</option>
                       <option>Pequeno</option>
                     </select>
                    </div>  
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    k.Contorno de la boveda palatina:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Plana</option>
                       <option>Ojival</option>
                       <option>Ovalada</option>

                     </select>
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    l.Contorno del paladar blando en sentido antero-posterior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input class="form-control" style="width: 100% !important" type="text" name="apariencia_dientes" placeholder="" id="apariencia_dientes" value=""> 
                    </div>
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    m. Area del sellado palatino posterior:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    Anchura:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Amplio</option>
                       <option>Estrecho</option>
                       <option>Promedio</option>
                     </select>
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Depresibilidad:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control">
                        <option>Amplio</option>
                       <option>Estrecho</option>
                       <option>Promedio</option>
                     </select>
                    </div> 
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    n. Torus:
                    </div>
                   <div class="col-lg-2 col-md-2 col-sm-2">
                    Palatino:
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                   <input class="form-control" style="width: 100% !important" type="text" name="apariencia_dientes" placeholder="Ausente" id="apariencia_dientes" value=""> 
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2">
                   <input class="form-control" style="width: 100% !important" type="text" name="apariencia_dientes" placeholder="Presente" id="apariencia_dientes" value=""> 
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Tamano
                       <select class="form-control">
                            <option>Grande</option>
                           <option>Mediano</option>
                           <option>Pequeno</option>
                       </select>
                    </div> 

                    <div class="col-lg-2 col-md-2 col-sm-2">
                    Mandibular:
                    </div>
                   <div class="col-lg-2 col-md-2 col-sm-2">
                   <input class="form-control" style="width: 100% !important" type="text" name="apariencia_dientes" placeholder="Ausente" id="apariencia_dientes" value=""> 
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2">
                   <input class="form-control" style="width: 100% !important" type="text" name="apariencia_dientes" placeholder="Presente" id="apariencia_dientes" value=""> 
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Tamano
                       <select class="form-control">
                            <option>Grande</option>
                           <option>Mediano</option>
                           <option>Pequeno</option>
                       </select>
                    </div> 
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    o.Espacio Intercadas:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Adecuado</option>
                       <option>Inadecuado</option>
                     </select>
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2" style="width: 10% !important">
                      <input style="width: 150% !important" type="text" name="apariencia_dientes" placeholder="m.m" id="apariencia_dientes" value="">  
                      </div>
                       <div class="col-lg-12 col-md-12 col-sm-12">
                    p. Posicion de la lengua:
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Favorable</option>
                       <option>Desfavorable</option>
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
                      <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    Seleccion de la cubeta inferior
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-46">
                      <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div><div class="col-lg-6 col-md-6 col-sm-6">
                    Material de impresion utilizado
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-46">
                      <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
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
                       <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div>  
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Inferior:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div> 
                   
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Relacion Intermaxilares:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Relacion de los bordes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                    Espacio disponibles para los dientes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6">
                     Espacio disponible para el apoyo oclusal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div> 
                     <div class="col-lg-4 col-md-4 col-sm-4">
                     Seleccion dientes artificiales:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                       Color<input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div> 
                     <div class="col-lg-4 col-md-4 col-sm-4">
                       Marca<input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-3">
                     Formula:
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                       Anteriores<input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div> 
                     <div class="col-lg-3 col-md-3 col-sm-3">
                       Posteriores<input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                       Marca<input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
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
                       <input type="text" name="afectando_salud" id="afectando_salud" value="" class="form-control">
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
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
                     </select>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-4">
                    b.Eficiencia masticatoria:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    c.Estetica:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
                     </select>
                    </div>
                      <div class="col-lg-6 col-md-6 col-sm-4">
                    d.Pronunciacion:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Buena</option>
                       <option>Regular</option>
                       <option>Mala</option>
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
                url: "{{ url('/resumen_odontologico') }}",
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
                        text: 'El resumen han sido almacenado!',
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
  