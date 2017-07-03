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
                    <!--div class="row row_border">
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
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">b. SI ha usado 
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
                    h.Forma de los dientes:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Con cuspide</option>
                       <option>Sin cuspide</option>
                     </select>
                    </div>
                       <div class="col-lg-6 col-md-6 col-sm-4">
                    i.Material de base de la dentadura:
                    </div>
                    <div class="  col-lg-4 col-md-4 col-sm-4">
                     <select class="form-control">
                       <option>Acrilicos</option>
                       <option>Porcelana</option>
                       <option>Otros</option>
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
                   
                   
                   
                   
                  </div>
                   <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                      Dolor
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Localizado
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Difuso
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Provocado
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Espontaneo
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Constante 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Intermitente 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Palpitante 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Referido 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Ausencia de Dolor 
                    </div>
                   
                  </div>
                   <div class="row row_border ">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              Diente a Tratar
                            </div>
                            <div class="col-lg-12">
                               <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value=""> 
                            </div>
                  </div>
            
                 <div class="row row_border ">
                            
                            <div class="col-lg-12">
                                <textarea name="rho_1" id="rho_1" placeholder="Observaciones" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                            </div>
                  </div>
                   <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Clinico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Inflamacion Intraoral
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Inflamacion Extraoral
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Fistula
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Caries
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Obsturaciones
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Coronas de metal
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Fractura Coronal
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Fisura
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Cambio de Color
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Movilidad
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Polipo pulpar
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Facetas Articulares
                    </div>
                   
                  </div>
                   <div class="row row_border">                  
                       <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Estomatologico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Labios
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Lengua
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Paladar duro
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Paladar blando
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Frenillos
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Mucosa oral
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Piso de boca
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Glandulas Salivales
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Sist, Litifatico regional
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Mucsculos masticatorios
                      </div>
                  </div>
                   
                 <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Periodontal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Placa
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Calculos
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Gingivitis
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Periodontitis
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Bolsa periodontal (sondaje)
                    </div>
                   
                  </div>
                      <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Pruebas de Sensibilidad:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Test de la cavidad
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Prueba electrica
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Frio
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Calor
                    </div>
                   
                  </div>
                     <div class="row row_border">                  
                       <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Radiografico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Espacio periodontal normal
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Perdida de la cortical alveolar
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Zona radiolucida Apical
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Zona radiolucida Lateral
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Zona radiolucida Furca
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Reabsorcion Interna
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Reabsorcion Externa
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Radiopacidad Apical
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Raiz en Formacion
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Nucleo
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Fractura radicular
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Tratamiento Endodontico
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Otros
                      </div>
                  </div>
                 <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Etiologia:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Bacteriana
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Quimica
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Fisica
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Trauma
                    </div>
                   
                  </div>               

                <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Finalidad del Tratamiento:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Fines protesicos
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Fines Terapeuticos
                      </div>
                   
                  </div-->
                    <div class="row row_border">
                        <form method="POST" action="" onsubmit="return Validar(this)" language="JavaScript" name="FrontPage_Form1">
                            <p align="left">
                                <font><b>1 Historia de Extracciones</b></font>
                            </p>
                            <div align="center">
                                <center>
                                    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width: 0; border-right-width: 0" bordercolor="#FFFF00" id="AutoNumber1" width="761">
                                        <tbody>
                                            <tr>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>Maxilares</font>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-4">
                                                    <p style="line-height: 200%">
                                                        <font>Enfermedad periodontal&nbsp;&nbsp;&nbsp;&nbsp; </font>
                                                        <select size="1" name="dtotales6">
                                                            <option selected=""></option>
                                                            <option>Si</option>
                                                            <option>No</option>
                                                        </select>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>caries&nbsp; </font>
                                                        <select size="1" name="dtotales7">
                                                            <option selected=""></option>
                                                            <option>Si</option>
                                                            <option>No</option>
                                                        </select>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>ambas</font>
                                                        <select size="1" name="dtotales8">
                                                            <option selected=""></option>
                                                            <option>Si</option>
                                                            <option>No</option>
                                                        </select>
                                                        <font>&nbsp;&nbsp; </font>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>Accidente&nbsp; </font>
                                                        <select size="1" name="dtotales9">
                                                            <option selected=""></option>
                                                            <option>Si</option>
                                                            <option>No</option>
                                                        </select>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>años&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" name="dtotales10" size="5">
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>Mandibulares</font>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-4">
                                                    <p style="line-height: 200%">
                                                        <font>Enfermedad periodontal&nbsp;&nbsp;&nbsp;&nbsp; </font>
                                                        <select size="1" name="dtotales6">
                                                            <option selected=""></option>
                                                            <option>Si</option>
                                                            <option>No</option>
                                                        </select>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>caries&nbsp; </font>
                                                        <select size="1" name="dtotales7">
                                                            <option selected=""></option>
                                                            <option>Si</option>
                                                            <option>No</option>
                                                        </select>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>ambas</font>
                                                        <select size="1" name="dtotales8">
                                                            <option selected=""></option>
                                                            <option>Si</option>
                                                            <option>No</option>
                                                        </select>
                                                        <font>&nbsp;&nbsp; </font>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>Accidente&nbsp; </font>
                                                        <select size="1" name="dtotales9">
                                                            <option selected=""></option>
                                                            <option>Si</option>
                                                            <option>No</option>
                                                        </select>
                                                    </p>
                                                </td>
                                                <td class="td-totales" class="col-lg-2">
                                                    <p style="line-height: 200%">
                                                        <font>años&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" name="dtotales10" size="5">
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <p align="left">
                                <font><b>2 Experiencia anterior con dentaduras</b></font>
                            </p>
                            <div align="center">
                                <center>
                                    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width: 0; border-right-width: 0; border-bottom-width:0" bordercolor="#FFFF00" id="AutoNumber1" width="814">
                                        <tbody>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00" class="col-lg-12">
                                                    <p style="line-height: 200%">
                                                        <font>a.- Ninguna</font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" class="col-lg-6">
                                                    <p style="line-height: 200%">
                                                        <font>
                                                            <input type="checkbox" name="dtotales11" value="Si">
                                                        </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="129">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="89">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="81">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="144">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00" width="270">
                                                    <p style="line-height: 200%">
                                                        <font>b.- Si ha usado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="101">
                                                    <p style="line-height: 200%">
                                                        <font>
                                                            <input type="checkbox" name="dtotales12" value="Si">
                                                        </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="129">
                                                    <p style="line-height: 200%">
                                                        <font>cuántas?&nbsp;&nbsp;
                                                            <input type="text" name="dtotales13" size="5">&nbsp;&nbsp; </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="89">
                                                    <p style="line-height: 200%">
                                                        <font>buena&nbsp;&nbsp;
                                                            <input type="checkbox" name="dtotales14" value="Si">&nbsp; </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="81">
                                                    <p style="line-height: 200%" align="left">
                                                        <font>mala&nbsp;&nbsp;
                                                            <input type="checkbox" name="dtotales15" value="Si">
                                                        </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="144">
                                                    <p style="line-height: 200%">
                                                        <font>años de uso&nbsp;
                                                            <input type="text" name="dtotales16" size="5">
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00" width="270">
                                                    <p style="line-height: 200%">
                                                        <font>c.- Razón para el reemplazo:
                                                        </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="230" colspan="2">
                                                    <p style="line-height: 200%">
                                                        <font>
                                                            <input type="text" name="dtotales17" size="20">
                                                        </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="89">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="81">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="144">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00" width="496" colspan="3">
                                                    <p style="line-height: 200%">
                                                        <font>d.- Tiempo de uso de la última dentadura&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" name="dtotales18" size="20">
                                                        </font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="89">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="81">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="144">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00" width="270">
                                                    <p style="line-height: 200%">
                                                        <font>e.- Tipo de dentadura</font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="101">
                                                    <font>
                                                        <select class="form-control" ssize="1" name="dtotales19">
                                                            <option>Superior</option>
                                                            <option>Inferior</option>
                                                            <option>Ambas</option>
                                                            <option selected="">Ninguna</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="129">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="89">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="81">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="144">
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00" width="270">
                                                    <p style="line-height: 200%">
                                                        <font>f.- :Uso de la dentadura</font>
                                                    </p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="101">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales20">
                                                            <option>Constante</option>
                                                            <option>Solo de día</option>
                                                            <option>Raramente</option>
                                                            <option>Nunca</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="129">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="89">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="81">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="144">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="270">
                                                    <p style="line-height: 200%">
                                                        <font>g.- Material de los dientes:</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="101">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales21">
                                                            <option>Acrílicos</option>
                                                            <option>Porcelana</option>
                                                            <option>Otros</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="129">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="89">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="81">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00" width="144">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="270">
                                                    <font>h.- Forma de los dientes</font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="101">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales22">
                                                            <option>Con cúspide</option>
                                                            <option>Sin cúspide</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="129">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="89">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="81">
                                                    &nbsp;</td>
                                                <td class="td2" bordercolor="#FFFF00" width="144">
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="270">
                                                    <font>i.- Material de base de la dentadura:</font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" width="101">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales23">
                                                            <option>Resina</option>
                                                            <option>Otra</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; " bordercolor="#FFFF00" colspan="4" width="443">
                                                    <p style="line-height: 200%">
                                                        <font>Especifique:
                                                            <textarea rows="1" name="dtotales24" cols="41"></textarea>
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <p align="left">
                                <font><b>3 Evaluación del Paciente</b></font>
                            </p>
                            <div align="center">
                                <center>
                                    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width: 0; border-right-width: 0" bordercolor="#FFFF00" id="AutoNumber2" width="297">
                                        <tbody>
                                            <tr>
                                                <td class="td2" align="left" bordercolor="#FFFF00" width="155">
                                                    <p style="line-height: 200%">
                                                        <font>a.- Comodidad</font>
                                                    </p>
                                                </td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="38">
                                                    &nbsp;</td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="73">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales25">
                                                            <option>Buena</option>
                                                            <option>Mala</option>
                                                            <option>Regular</option>
                                                        </select>
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" align="left" bordercolor="#FFFF00" width="193" colspan="2">
                                                    <p style="line-height: 200%">
                                                        <font>b.- Eficiencia masticatoria</font>
                                                    </p>
                                                </td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="73">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales26">
                                                            <option>Buena</option>
                                                            <option>Mala</option>
                                                            <option>Regular</option>
                                                        </select>
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" align="left" bordercolor="#FFFF00" width="155">
                                                    <p style="line-height: 200%">
                                                        <font>c.- Estética</font>
                                                    </p>
                                                </td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="38">
                                                    &nbsp;</td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="73">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales27">
                                                            <option>Buena</option>
                                                            <option>Mala</option>
                                                            <option>Regular</option>
                                                        </select>
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" align="left" bordercolor="#FFFF00" width="155">
                                                    <p style="line-height: 200%">
                                                        <font>d.- Pronunciación</font>
                                                    </p>
                                                </td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="38">
                                                    &nbsp;</td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="73">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales28">
                                                            <option>Buena</option>
                                                            <option>Mala</option>
                                                            <option>Regular</option>
                                                        </select>
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" align="left" bordercolor="#FFFF00" width="155">
                                                    <font>e.- Dolor</font>
                                                </td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="38">
                                                    &nbsp;</td>
                                                <td align="center" class="td2" bordercolor="#FFFF00" width="73">
                                                    <font>
                                                        <select class="form-control" size="1" name="dtotales29">
                                                            <option>Intenso</option>
                                                            <option>Moderado</option>
                                                            <option>Leve</option>
                                                        </select>
                                                    </font>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <p align="left">
                                <font><b>4 Evaluación de las Dentaduras:</b></font>
                            </p>
                            <div align="center">
                                <center>
                                    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width: 0; border-right-width: 0; border-bottom-width:0" bordercolor="#FFFF00" id="AutoNumber1" width="543">
                                        <tbody>
                                            <tr>
                                                <td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1; border-bottom-style:solid; border-bottom-width:1" bordercolor="#FFFF00" width="187">
                                                    <p style="line-height: 200%">
                                                        <font>a.- Distancia interoclusal</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1; border-bottom-style:solid; border-bottom-width:1" bordercolor="#FFFF00" width="20">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1; border-bottom-style:solid; border-bottom-width:1" bordercolor="#FFFF00" width="124">
                                                    <p style="line-height: 200%">
                                                        <font>adecuada
                                                            <input type="text" name="dtotales30" size="6">
                                                        </font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium" bordercolor="#FFFF00" align="center" width="7">
                                                    &nbsp;</td>
                                                <td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium" align="center" bordercolor="#FFFF00" width="105" colspan="3">
                                                    <p align="left">
                                                        <font>(+)&nbsp;
                                                            <input type="text" name="dtotales31" size="6">
                                                        </font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1; border-bottom-style:solid; border-bottom-width:1" align="center" bordercolor="#FFFF00" width="4">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1; border-bottom-style:solid; border-bottom-width:1" align="center" bordercolor="#FFFF00" width="88">
                                                    <p style="line-height: 200%">
                                                        <font>(-)&nbsp;
                                                            <input type="text" name="dtotales32" size="6">
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style:solid; border-top-width:1" bordercolor="#FFFF00" width="189">
                                                    <p style="line-height: 200%">
                                                        <font>b.- Estabilidad</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style:solid; border-top-width:1" bordercolor="#FFFF00" width="21">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style:solid; border-top-width:1" bordercolor="#FFFF00" width="125">
                                                    <font>
                                                        <select size="1" name="dtotales33">
                                                            <option>Satisfactoria</option>
                                                            <option>Defectuosa</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style:solid; border-top-width:1" bordercolor="#FFFF00" align="center" colspan="6" width="208">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="189">
                                                    <p style="line-height: 200%">
                                                        <font>c.- Oclusión</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="21">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="125">
                                                    <font>
                                                        <select size="1" name="dtotales34">
                                                            <option>Correcta</option>
                                                            <option>Incorrecta</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" align="center" colspan="6" width="208">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="189">
                                                    <p style="line-height: 200%">
                                                        <font>d.- Retención</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="21">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="125">
                                                    <font>
                                                        <select size="1" name="dtotales35">
                                                            <option>Satisfactoria</option>
                                                            <option>Defectuosa</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" align="center" colspan="6" width="208">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="189">
                                                    <p style="line-height: 200%">
                                                        <font>e.- Extensión</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="21">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="125">
                                                    <font>
                                                        <select size="1" name="dtotales36">
                                                            <option>Correcta</option>
                                                            <option>Incorrecta</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" align="center" colspan="6" width="208">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="189">
                                                    <p style="line-height: 200%">
                                                        <font>f.- :Estética</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="21">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="125">
                                                    <select size="1" name="dtotales37">
                                                        <option>Adecuada</option>
                                                        <option>Inadecuada</option>
                                                    </select>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" align="center" colspan="6" width="208">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="189">
                                                    <font>g.- Dimensión vertical</font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="21">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="125">
                                                    <font>
                                                        <select size="1" name="dtotales38">
                                                            <option>Correcta</option>
                                                            <option>Alta</option>
                                                            <option>Baja</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" align="center" colspan="6" width="208">
                                                    <font>mm.
                                                        <input type="text" name="dtotales39" size="6">
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" width="189">
                                                    <p style="line-height: 200%">
                                                        <font>h.- Presenta cámara de succión</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" align="center" bordercolor="#FFFF00" width="21">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" align="left" bordercolor="#FFFF00" width="125">
                                                    <font>Si
                                                        <input type="radio" name="dtotales40" value="Si"> No
                                                        <input type="radio" name="dtotales40" value="No">
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" align="left" bordercolor="#FFFF00" width="8">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" align="left" bordercolor="#FFFF00" width="89">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" align="left" bordercolor="#FFFF00" width="13">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" align="left" bordercolor="#FFFF00" width="4">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" align="left" bordercolor="#FFFF00" width="5">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium" bordercolor="#FFFF00" align="left" width="89">
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" width="189">
                                                    <p style="line-height: 200%">
                                                        <font>i.- Higiene:</font>
                                                    </p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" width="21">
                                                    <p style="line-height: 200%">&nbsp;</p>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" width="125">
                                                    <font>
                                                        <select size="1" name="dtotales41">
                                                            <option>Buena</option>
                                                            <option>Regular</option>
                                                            <option>Mala</option>
                                                        </select>
                                                    </font>
                                                </td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" align="center" width="8">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" width="89">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" width="13">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" align="center" width="4">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" width="5">
                                                    &nbsp;</td>
                                                <td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-color:#FFFF00; border-bottom-width:1" bordercolor="#FFFF00" width="89">
                                                    &nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
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
                            <p align="left">
                                <font><b>5 Información Clínica: </b></font>
                            </p>
                            <div align="center">
                                <center>
                                    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width: 0; border-right-width: 0" bordercolor="#FFFF00" id="AutoNumber21" height="498">
                                        <tbody>
                                            <tr>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>a.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Expresión Facial</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales44">
                                                                <option>Sin Alteraciones</option>
                                                                <option>Alterada</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>b.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Labios</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales45">
                                                                <option>Delgados</option>
                                                                <option>Gruesos</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales46">
                                                                <option>Cortos</option>
                                                                <option>Largos</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales47">
                                                                <option>Tensos</option>
                                                                <option>Activos</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Relación labio alveolar</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales48">
                                                                <option>Buena</option>
                                                                <option>Regular</option>
                                                                <option>Mala</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>c.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Reabsorción</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales49">
                                                                <option>Ligera</option>
                                                                <option>Desigual</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <input type="hidden" name="dtotales50" size="20">
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>d.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Relación de reborde</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales50">
                                                                <option>Normal</option>
                                                                <option>Protruida</option>
                                                                <option>Retruida</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>e.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Piso de la boca</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales51">
                                                                <option>Alto</option>
                                                                <option>Medio</option>
                                                                <option>Bajo</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>f.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Inserción Musculares</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Superior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales52">
                                                                <option>Altas</option>
                                                                <option>Medias</option>
                                                                <option>Bajas</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Inferior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales53">
                                                                <option>Altas</option>
                                                                <option>Medias</option>
                                                                <option>Bajas</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>g.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Mucosa oral (códigos)</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Superior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales54">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Inferior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales55">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>h.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            Resiliencia de la mucosa </font>
                                                    </p>
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            (códigos)</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Superior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales56">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Inferior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales57">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>i.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Abertura de la boca</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales58">
                                                                <option>Grande</option>
                                                                <option>Mediana</option>
                                                                <option>Pequeña</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>j.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Tamaño del arco</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Superior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales59">
                                                                <option>Grande</option>
                                                                <option>Mediano</option>
                                                                <option>Pequeño</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Inferior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="17" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales60">
                                                                <option>Grande</option>
                                                                <option>Mediano</option>
                                                                <option>Pequeño</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" rowspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>k.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" rowspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            Contorno del reborde en </font>
                                                    </p>
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>corte transversal
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Superior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Anterior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales61">
                                                                <option>Redondo</option>
                                                                <option>Filoso</option>
                                                                <option>Plano</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Posterior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales62">
                                                                <option>Redondo</option>
                                                                <option>Filoso</option>
                                                                <option>Plano</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Maxilar Inferior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Anterior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales63">
                                                                <option>Redondo</option>
                                                                <option>Filoso</option>
                                                                <option>Plano</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Posterior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales64">
                                                                <option>Redondo</option>
                                                                <option>Filoso</option>
                                                                <option>Plano</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>l.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Contorno de la bóveda palatina</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales65">
                                                                <option>Plana</option>
                                                                <option>Ojival</option>
                                                                <option>Plana</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>m.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            Contorno del paladar blando </font>
                                                    </p>
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>en sentido antero-posterior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <input type="text" name="dtotales66" size="12">
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>n.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Área del sellado palatino</font>
                                                    </p>
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>&nbsp;posterior</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Anchura</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales67">
                                                                <option>Amplio</option>
                                                                <option>Estrecho</option>
                                                                <option>Promedio</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Depresibilidad</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales68">
                                                                <option>Poco</option>
                                                                <option>Muy</option>
                                                                <option>Medianamente</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" rowspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>o.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" rowspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Torus</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Palatino</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales69">
                                                                <option>Ausente</option>
                                                                <option>Presente</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Tamaño</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales70">
                                                                <option>Grande</option>
                                                                <option>Mediano</option>
                                                                <option>Pequeño</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="10" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Mandibular</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales71">
                                                                <option>Ausente</option>
                                                                <option>Presente</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Tamaño</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales72">
                                                                <option>Grande</option>
                                                                <option>Mediano</option>
                                                                <option>Pequeño</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                                <td align="center" height="9" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>p.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Espacio ínter arcadas</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales73">
                                                                <option>Adecuado</option>
                                                                <option>Indecuado</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Comentario</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <textarea rows="2" name="dtotales74" cols="38"></textarea>
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>q.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>Posición de la lengua</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <select size="1" name="dtotales75">
                                                                <option>Favorable</option>
                                                                <option>Desfavorable</option>
                                                            </select>
                                                        </font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>r.-</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            Síntomas relacionados con </font>
                                                    </p>
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            trastornos de la A.T.M.</font>
                                                    </p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00">
                                                    <p style="margin-top: 1; margin-bottom: 1">&nbsp;</p>
                                                </td>
                                                <td align="center" height="19" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: 1px solid #FFFF00; border-bottom: 1px solid #FFFF00" colspan="7">
                                                    <p style="margin-top: 1; margin-bottom: 1">
                                                        <font>
                                                            <textarea rows="2" name="dtotales76" cols="38"></textarea>
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <p align="left"><b><font size="4">II Toma de Impresión:</font></b></p>
                            <div align="center">
                                <center>
                                    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width: 0; border-right-width: 0" bordercolor="#FFFF00" id="AutoNumber22">
                                        <tbody>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00">
                                                    <font>Selección de la cubeta superior</font>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00">
                                                    <font>
                                                        <textarea rows="2" name="dtotales77" cols="38"></textarea>
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00">
                                                    <font>Selección de la cubeta inferior</font>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00">
                                                    <font>
                                                        <textarea rows="2" name="dtotales78" cols="38"></textarea>
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td2" bordercolor="#FFFF00">
                                                    <font>Material de impresión utilizado</font>
                                                </td>
                                                <td class="td2" bordercolor="#FFFF00">
                                                    <font>
                                                        <textarea rows="2" name="dtotales79" cols="38"></textarea>
                                                    </font>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <p align="left"><b><font size="4">III Análisis de los 
    Modelos de Diagnóstico:</font></b></p>
                            <div align="center">
                                <center>
                                    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width: 0; border-right-width: 0" bordercolor="#FFFF00" id="AutoNumber23" width="736">
                                        <tbody>
                                            <tr>
                                                <td width="257" class="td2">
                                                    <font>Dientes presentes</font>
                                                </td>
                                                <td width="220" class="td2">
                                                    <font>Superior:&nbsp;
                                                        <input type="text" name="dtotales80" size="20">
                                                    </font>
                                                </td>
                                                <td width="255" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1">
                                                    <font>&nbsp;&nbsp; Inferior:
                                                        <input type="text" name="dtotales81" size="20">
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="257" class="td2">
                                                    <font>Relación intermaxilares</font>
                                                </td>
                                                <td colspan="2" width="476" class="td2">
                                                    <font>
                                                        <input type="text" name="dtotales82" size="40">
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="257" class="td2">
                                                    <font>Relación de los bordes</font>
                                                </td>
                                                <td colspan="2" width="476" class="td2">
                                                    <font>
                                                        <input type="text" name="dtotales83" size="40">
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="257" class="td2">
                                                    <font>Espacio disponible para los dientes</font>
                                                </td>
                                                <td colspan="2" width="476" class="td2">
                                                    <font>
                                                        <input type="text" name="dtotales84" size="40">
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="257" class="td2">
                                                    <font>Espacio disponible para el apoyo oclusal</font>
                                                </td>
                                                <td colspan="2" width="476" class="td2">
                                                    <font>
                                                        <input type="text" name="dtotales85" size="40">
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="257" class="td2">
                                                    <font>Selección dientes artificiales</font>
                                                </td>
                                                <td colspan="2" width="476" class="td2">
                                                    <font>Color:&nbsp;
                                                        <input type="text" name="dtotales86" size="20">&nbsp;&nbsp;&nbsp; Marca:&nbsp;&nbsp;
                                                        <input type="text" name="dtotales87" size="20">
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="257" class="td2">
                                                    <font>Formula</font>
                                                </td>
                                                <td colspan="2" width="476" class="td2">
                                                    <font>Anteriores:
                                                        <input type="text" name="dtotales88" size="20">&nbsp;&nbsp; Posteriores:
                                                        <input type="text" name="dtotales89" size="20">
                                                    </font>
                                                    <p align="center">
                                                        <font>Marca:&nbsp;&nbsp;
                                                            <input type="text" name="dtotales90" size="20">
                                                        </font>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <p align="center">&nbsp;</p>
                            <p align="center">
                                <font>
                                    <input type="submit" value="Guardar" name="B1">&nbsp;
                                    <input type="reset" value="Cancelar" name="B2">
                                </font>
                            </p>
                        </form>
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
