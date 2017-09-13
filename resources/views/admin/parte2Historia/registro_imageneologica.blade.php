@extends('admin-layout.sidebarAdmin') @section('content')
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ url('css/admin.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ url('css/file-input/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ url('js/file-upload/themes/explorer/theme.css')}}" media="all" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{ url('js/images.js')}}"></script>
<style type="text/css">

.ejemplo3 {
background-color: #3465AD;
color: #FFFFFF;
padding: 10px;
text-align: center;
margin:5px;
float: left;
height: 110px;
width: 130%;
border-radius: 10px;
-moz-border-radius: 20px;
-moz-border-bottom-colors: LightSeaGreen;
-moz-border-left-colors: lightblue;
-moz-border-right-colors: #999999;
-moz-border-top-colors: CornflowerBlue;
}

.ejemplo4 {
background-color: #3465AD;
color: #FFFFFF;
padding: 10px;
text-align: center;
margin:5px;
height: 80px;
float: left;
border-radius: 10px;
-moz-border-radius: 20px;
-moz-border-bottom-colors: LightSeaGreen;
-moz-border-left-colors: lightblue;
-moz-border-right-colors: #999999;
-moz-border-top-colors: CornflowerBlue;
}
.ejemplo5 {
background-color: #3465AD;
color: #FFFFFF;
padding: 10px;
text-align: center;
margin:5px;
float: left;
width: 100%;
height: 200px;
border-radius: 10px;
-moz-border-radius: 20px;
-moz-border-bottom-colors: LightSeaGreen;
-moz-border-left-colors: lightblue;
-moz-border-right-colors: #999999;
-moz-border-top-colors: CornflowerBlue;
}
.file-preview-image {
    width: 50% !important;
    height: 80px !important;
    float: left;
}

.file-zoom-detail {
    width: auto !important;
    height: auto !important;
    max-width: 100 !important%;
    max-height: 100 !important%;
}

.kv-avatar .file-preview-frame,
.kv-avatar .file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}

.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}

.fileinput-remove-button {
    width: 10% !important;
}

.fileinput-upload-button {
    width: 10% !important;
}

.btn-file {
    width: 30% !important;
}

.krajee-default.file-preview-frame .file-thumbnail-footer {
    top: -100px;
    float: left;
}

.krajee-default.file-preview-frame:not(.file-preview-error):hover {
    box-shadow: 3px 3px 5px 0 #fff;
}

.file-drop-zone-title {
    color: #aaa;
    font-size: 10px;
    padding: 85px 10px;
    cursor: default;
}

.krajee-default.file-preview-frame {
    position: absolute;
    /* display: table; */
    box-shadow: 1px 1px 5px 0 #fff;
    width: 120px;
    margin: 0px;
    border: 0px;
    box-shadow: 0;
    padding: 0px;
    float: left;
    text-align: center;
}

.hidden-xs {
    display: none;
}

.krajee-default .file-footer-buttons {
    float: none;
    margin-left: 25px;
}

.file-preview {
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 5px;
    width: 70%;
    margin-bottom: 5px;
}

.file-drop-zone {
    border: 1px dashed #aaa;
    border-radius: 4px;
    height: 100%;
    text-align: center;
    margin: 0px;
    /* padding: 5px; */
    height: 180px;
}

.krajee-default .file-actions {
    margin-top: 15px;
    width: 150%;
}

.krajee-default .file-footer-caption {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100px;
    text-align: center;
    padding-top: 4px;
    font-size: 11px;
    color: #777;
    margin: 5px auto;
}

#wPaint-demo1 {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/images_radiologia.png") !important;
    background-repeat: no-repeat !important;
    width: 900px !important;
    height: 300px !important;
    top: 30px !important;
    left: 10%;
}

.wPaint-theme-classic .wPaint-menu-holder {
    border-color: #dadada !important;
    background-color: #f0f0f0 !important;
    top: -35px !important;
}
</style>
<meta name="csrf-token" content="<?php echo csrf_token() ?>">
<div class="container">
    <!-- /.row -->
    <div class="row ">
        <div class="container kv-main">
            <div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
                @if(session('status'))
                <div class="alert alert-success text-center notification">
                    <ul style="list-style:none;">
                        <li style="font-size:16px;">{{ session('status') }}</li>
                    </ul>
                </div>
                @endif @foreach ($pacientes as $paciente)
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">
                    <div style="font-size: 20px; text-align: center; color:#59bddd;">
                        Imageneologia
                    </div>
                    <fieldset>
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
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            </div>
                            <div class="row row_border">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        Ordenado Por:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <select class="form-control" style="color: black" name="corona_tam">
                                            <option>Seleccione..</option>
                                            <option>Radiologia</option>
                                            <option>CIA Periodoncia</option>
                                            <option>CIA Totales</option>
                                            <option>CIA Prostodoncia</option>
                                            <option>Externo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        Motivo del Examen:
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input class="form-control" type="input" name="motivo_examen" id="motivo_examen" style="color:black ">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        Numero y tipo de Imagen:
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <input type="checkbox" name="check[]" id="cambio_salud_ultimo_ayo" value="S">Panoramica
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <input type="checkbox" name="check[]" id="sangra_largo_tiempo" value="S"> Periapicales
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <input type="checkbox" name="check[]" id="cicatrizacion_lenta" value="S"> Interproximales
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <input type="checkbox" name="check[]" id="cicatrizacion_lenta" value="S"> Otros
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <input class="form-control" type="input" name="motivo_examen" id="motivo_examen" style="color:black ">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        Agregar Imagenes
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal" >Agregar</a>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form enctype="multipart/form-data">
                            <!--div class="form-group col-lg-3"  >
						            <input id="file-1" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
						        </div>
						        <div class="form-group col-lg-3" >
						            <input id="file-2" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-ount="1">
						        </div>
						        <div class="form-group col-lg-3"  >
						            <input id="file-3" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
						        </div>
						        <div class="form-group col-lg-3"  >
						            <input id="file-4" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-ount="1">
						        </div>
						         <div class="form-group col-lg-3"  >
						            <input id="file-5" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
						        </div>
						        <div class="form-group col-lg-3" >
						            <input id="file-6" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-ount="1">
						        </div>
						        <div class="form-group col-lg-3"  >
						            <input id="file-7" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
						        </div>
						        <div class="form-group col-lg-3"  >
						            <input id="file-8" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-ount="1">
						        </div-->
                        </form>
                    </div>
                    <div id="wPaint-demo1" class="col-lg-10" style="position:relative; width:500px; height:200px; background-color:#7a7a7a; margin:70px auto 20px auto;"></div>
                    <center style="margin-bottom: 50px;">
                        <input type="button" value="toggle menu" onclick="console.log($('#wPaint-demo1').wPaint('menuOrientation')); $('#wPaint-demo1').wPaint('menuOrientation', $('#wPaint-demo1').wPaint('menuOrientation') === 'vertical' ? 'horizontal' : 'vertical');" />
                    </center>
                    <center id="wPaint-img"></center>
                </div>
                <div class="row row_border ">
                    1. Calidad de la Imagen
                    <div class="col-lg-12">
                        <!--textarea name="calidad_imagen" id="calidad_imagen" placeholder="" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea-->
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="check[]" id="examinado_ultimo_ayo" value="S"> Apta para interpretar
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="check[]" id="cambio_salud_ultimo_ayo" value="S">Alta Densidad
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="check[]" id="sangra_largo_tiempo" value="S"> Baja Densidad
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="check[]" id="cicatrizacion_lenta" value="S"> Borrosa
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="check[]" id="perdida_peso" value="S"> Distorsion
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="checkbox" name="check[]" id="perdida_peso" value="S"> Defectos
                            <input type="text" name="check[]" id="perdida_peso" style="color: black">
                        </div>
                    </div>
                </div>
                <div class="row row_border ">
                    2. Hallazgos radiográficos en estructuras óseas:
                    <div class="col-lg-12">a- Radiolucida
                        <textarea name="oseas" id="oseas" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                    </div>
                    <div class="col-lg-12">b- Radiopaca
                        <textarea name="oseas" id="oseas" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                    </div>
                    <div class="col-lg-12">c- Mixta
                        <textarea name="oseas" id="oseas" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                    </div>
                </div>
                <div class="row row_border ">
                    3.Hallazgos radiográficos en senos, fosas nasales, atm, arco zigomático, espacio aéreo y sombra de tejido blando:
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        a. Seno Maxilar: Discontinuidad de la pared antral
                        <input type="checkbox" name="check[]" id="examinado_ultimo_ayo" value="S">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Lados
                        <select class="form-control" style="color: black" name="corona_tam">
                            <option>Grande</option>
                            <option>Mediana</option>
                            <option>Peque;a</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Bordes
                        <select class="form-control" style="color: black" name="corona_forma">
                            <option>Globulosa</option>
                            <option>Cilindricas</option>
                            <option>Triangulares</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Forma
                        <select class="form-control" style="color: black" name="corona_forma">
                            <option>Globulosa</option>
                            <option>Cilindricas</option>
                            <option>Triangulares</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        b. Condilo - Cuello del condilo mandibular
                        <select class="form-control" style="color: black; width: 33.33%" name="corona_forma">
                            <option>Globulosa</option>
                            <option>Cilindricas</option>
                            <option>Triangulares</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <span class="col-lg-12" style="padding-left: 0px;">c. Fosas Nasales</span>
                        <div class="col-lg-4 col-md-4 col-sm-4">Lados
                            <select class="form-control" style="color: black" name="corona_tam">
                                <option>Grande</option>
                                <option>Mediana</option>
                                <option>Peque;a</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">Bordes
                            <select class="form-control" style="color: black" name="corona_forma">
                                <option>Globulosa</option>
                                <option>Cilindricas</option>
                                <option>Triangulares</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">Forma
                            <select class="form-control" style="color: black" name="corona_forma">
                                <option>Globulosa</option>
                                <option>Cilindricas</option>
                                <option>Triangulares</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <span class="col-lg-12" style="padding-left: 0px;">d. Arco cigomatico</span>
                        <div class="col-lg-12 col-md-12 col-sm-12">Discontinuidad
                            <input type="checkbox" name="check[]" id="examinado_ultimo_ayo" value="S">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">Lado
                            <select class="form-control" style="color: black" name="corona_tam">
                                <option>Grande</option>
                                <option>Mediana</option>
                                <option>Peque;a</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        e. Espacion Aereo, sombra de tejido blando (region del cuello)
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Presencia de Radiopacidad
                        <select class="form-control" style="color: black" name="corona_tam">
                            <option>Grande</option>
                            <option>Mediana</option>
                            <option>Peque;a</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Lado
                        <select class="form-control" style="color: black" name="corona_forma">
                            <option>Globulosa</option>
                            <option>Cilindricas</option>
                            <option>Triangulares</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Bordes
                        <select class="form-control" style="color: black" name="corona_forma">
                            <option>Globulosa</option>
                            <option>Cilindricas</option>
                            <option>Triangulares</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Forma
                        <select class="form-control" style="color: black" name="corona_forma">
                            <option>Globulosa</option>
                            <option>Cilindricas</option>
                            <option>Triangulares</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Numero
                        <select class="form-control" style="color: black" name="corona_forma">
                            <option>Globulosa</option>
                            <option>Cilindricas</option>
                            <option>Triangulares</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">Ubicacion
                        <select class="form-control" style="color: black" name="corona_forma">
                            <option>Globulosa</option>
                            <option>Cilindricas</option>
                            <option>Triangulares</option>
                        </select>
                    </div>
                </div>
                <div class="row row_border ">
                    4. Hallazgos radiográficos en estructuras óseas:
                    <div class="col-lg-12 col-sm-4 col-md-4">a. Anomalias: Anomalia de Tama;o</div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-4 col-sm-4 col-md-4">
                            <select class="form-control" style="color: black; margin: 15px" name="corona_forma">
                                <option>Globulosa</option>
                                <option>Cilindricas</option>
                                <option>Triangulares</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="giroversiones" id="giroversiones">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">SUpemumerarios
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="extrusiones" id="extrusiones">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Taurodontismo
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="inclinados" id="inclinados">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Hipercementosis
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="faceta_desgaste" id="faceta_desgaste">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Otras
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="faceta_desgaste" id="faceta_desgaste">
                    </div>
                    <div class="col-lg-12">b. Radiolucides coronal:
                        <textarea name="oseas" id="oseas" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                    </div>
                </div>
                `
                <div class="row row_border ">
                    5. Región apical
                    <div class="col-lg-12">
                        <textarea name="apical" id="apical" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                    </div>
                </div>
                <div class="row row_border ">
                    6. Cresta alveolar
                    <div class="col-lg-12">
                        <textarea name="cresta" id="cresta" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Dientes Inclinados
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="extrusiones" id="extrusiones">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Espacios Abiertos
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="inclinados" id="inclinados">
                    </div>
                </div>
                <div class="row row_border ">
                    7. Hallazgos adicionales
                    <div class="col-lg-12">
                        <textarea name="adicionales" id="adicionales" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">1:2
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="extrusiones" id="extrusiones">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">1:1
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="inclinados" id="inclinados">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">2:1
                        <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="inclinados" id="inclinados">
                    </div>
                </div>
                <div class="row row_border ">
                    8. Interpretación
                    <div class="col-lg-12">
                        <textarea name="interpretacion" id="interpretacion" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                    </div>
                </div>
                <div class="row row_border ">
                    9. Recomendaciones
                    <div class="col-lg-12">
                        <textarea name="recomendaciones" id="recomendaciones" placeholder="Introduzca el Resumen" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
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
                </fieldset>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Registro de Imagenes</h4>
                    </div>
                    <div class="modal-body">
                    <input id="fileinput" name="imageProfile2" type="file" style="display:none;"/>
                    <input id="fileinput2" name="imageProfile2" type="file" style="display:none;"/>
                    <input id="fileinput3" name="imageProfile2" type="file" style="display:none;"/>
                    <input id="fileinput4" name="imageProfile2" type="file" style="display:none;"/>
                    <input id="fileinput5" name="imageProfile2" type="file" style="display:none;"/>
                    <input id="fileinput6" name="imageProfile2" type="file" style="display:none;"/>
                    <input id="fileinput7" name="imageProfile2" type="file" style="display:none;"/>
                    <input id="fileinput8" name="imageProfile2" type="file" style="display:none;"/>
                  
                    <div class="row">
                        
                            <div class="col-md-1"  style="margin:5px">
                                <div class="ejemplo4 primera" id="primera1">
                                <label id="falseinput" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                            </div>
                            </div> 
                            <div class="col-md-1 primera"  style="margin:5px">
                                <div class="ejemplo4" id="primera2"> 
                                <label id="falseinput2" style="cursor:pointer;">Agregar</label>
                                <label id="ver2"  style="cursor:pointer;">Ver</label>
                                </div>
                               
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo3" id="primera3">
                                <label id="falseinput3" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo3" id="primera4">
                                <label id="falseinput4" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo3" id="primera5">
                                <label id="falseinput5" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo3" id="primera6">
                                <label id="falseinput6" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div> 
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo4" id="primera7">
                                <label id="falseinput7" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo4" id="primera8">
                                <label id="falseinpu8" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div> 

                    </div>
                       <div class="row">
                        
                            <div class="col-md-1"  style="margin:5px">
                                <div class="ejemplo4" id="primera9">
                                <label id="falseinput9" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div>
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo4" id="primera10">
                                <label id="falseinput10" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            
                            <div class="col-md-1" style="margin:5px; float: right; margin-right: 26%;">
                                <div class="ejemplo4" id="primera11">
                                    <label id="falseinput11" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>

                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:5px; float: right; margin-left: 25%;">
                                <div class="ejemplo4" id="primera12"><label id="falseinput12" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div> 

                    </div>  

                       <div class="row">
                        
                            <div class="col-md-1"  style="margin:5px">
                                <div class="ejemplo4" id="primera13">
                                    <label id="falseinput13" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div> 
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo4" id="primera14"><label id="falseinput14" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo3" id="primera215"><label id="falseinput15" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo3" id="primera16"><label id="falseinput16" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo3" id="primera17"><label id="falseinput17" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo3" id="primera18"><label id="falseinput18" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div> 
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo4" id="primera19"><label id="falseinput19" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:5px">
                                <div class="ejemplo4" id="primera20"><label id="falseinput20" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div> 

                    </div>   
                     <div class="row">
                        
                            <div class="col-md-1"  style="margin:15px">
                                <div class="ejemplo4" id="primera21"><label id="falseinput21" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div> 
                            <div class="col-md-1" style="margin:15px">
                                <div class="ejemplo3" id="primera22"><label id="falseinput22" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:15px">
                                <div class="ejemplo3" id="primera23"><label id="falseinput23" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:15px">
                                <div class="ejemplo3" id="primera24"><label id="falseinput24" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div>  
                            
                    </div> 
                    <div class="row">
                        
                            <div class="col-md-1"  style="margin:15px">
                                <div class="ejemplo4" id="primera25"><label id="falseinput25" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div> 
                            <div class="col-md-1" style="margin:15px">
                                <div class="ejemplo3" id="primera26"><label id="falseinput26" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:15px">
                                <div class="ejemplo3" id="primera27"><label id="falseinput27" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label>
                                </div>
                            </div>  
                            <div class="col-md-1" style="margin:15px">
                                <div class="ejemplo3" id="primera28"><label id="falseinput28" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div>  
                            
                    </div> 
                    <div class="row">
                        
                            <div class="col-md-8"  style="margin:15px">
                                <div class="ejemplo5" id="primera29"><label id="falseinput29" style="cursor:pointer;">Agregar</label>
                                <label id="ver"  style="cursor:pointer;">Ver</label></div>
                            </div> 
                            
                    </div>                        
                    </div>                       


                    <div class="modal-footer">
                        <button type="button" class=" btn btn-default" data-dismiss="modal">Cerrar</button> {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary ']) !!}
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            </div>
            <!-- /.modal-dialog -->
            <div id="big-image" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Imagen Completa</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                         <div id="imagenologico" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background-color:white;padding-left:0; text-align: center;     margin-left: 15%;">
                            <img id="img_imagenologico" src='' style="display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px;">
                        </div> 
                    </div>
                     
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary ']) !!}
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
</div>
</div>
<!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
<!-- jQuery -->
<script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('js/list.min.js')}}"></script>
<script type="text/javascript" src="{!!url('bootstrap-filestyle/src/bootstrap-filestyle.min.js')!!}"></script>
<script src="{{ url('js/file-upload/plugins/canvas-to-blob.min.js')}}" type="text/javascript"></script>
<script src="{{ url('js/file-upload/plugins/sortable.min.js')}}" type="text/javascript"></script>
<script src="{{ url('js/file-upload/plugins/purify.min.js')}}" type="text/javascript"></script>
<script src="{{ url('js/file-upload/fileinput.min.js')}}"></script>
<script src="{{ url('js/file-upload/themes/fa/theme.js')}}"></script>
<script src="{{ url('js/file-upload/locales/es.js')}}"></script>
<script src="{{ url('js/file-upload/locales/fr.js')}}"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="{{ url('lib/jquery.ui.core.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ url('lib/jquery.ui.widget.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ url('lib/jquery.ui.mouse.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ url('lib/jquery.ui.draggable.1.10.3.min.js')}}"></script>
<!-- wColorPicker -->
<link rel="Stylesheet" type="text/css" href="{{url('lib/wColorPicker.min.css')}}" />
<script type="text/javascript" src="{{ url('lib/wColorPicker.min.js')}}"></script>
<!-- wPaint -->
<link rel="Stylesheet" type="text/css" href="{{ url('src/wPaint.css')}}" />
<script type="text/javascript" src="{{ url('src/wPaint.utils.js')}}"></script>
<script type="text/javascript" src="{{ url('src/wPaint.js')}}"></script>
<!-- wPaint main -->
<script type="text/javascript" src="{{ url('plugins/main/src/fillArea.min.js')}}"></script>
<script type="text/javascript" src="{{ url('plugins/main/src/wPaint.menu.main.js')}}"></script>
<!-- wPaint text -->
<script type="text/javascript" src="{{ url('plugins/text/src/wPaint.menu.text.js')}}"></script>
<!-- wPaint shapes -->
<script type="text/javascript" src="{{ url('plugins/shapes/src/shapes.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/plugins/shapes/src/wPaint.menu.main.shapes.js')}}"></script>
<!-- wPaint file -->
<script type="text/javascript" src="{{ url('plugins/file/src/wPaint.menu.main.file.js')}}"></script>
<script>
               
            
var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>';


function big_imaging(ruta, id) {
    console.log(id);
    var direccion_img = '{!!url("/")!!}' + '/' + ruta;
    $('#img_imagenologico').remove();
    $("#imagenologico").append("<img id='img_imagenologico' name='" + id + "' src='" + direccion_img + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
    $('#ruta_imaging').val(ruta);
}

function validar_imag() {
    if ($('#ruta_imaging').val()) {
        $('#form_imaging_study').submit();
    } else {
        alert('Seleccion\u00e9 una imagen');
        event.preventDefault();
    }
}

function eliminar() {

    /*$.ajax({
            url: "{{ url('/delete_image') }}",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(){
                //popover_show();
              //  location.reload();
                console.log('exito')
            },
            error: function(e) {
                console.log('Error!!!', e);
            }
          });*/
    var value = $('#ruta_imaging').val();
    $.post("{{ url('/delete_image') }}", {
            ruta: value

        }, function() {
            location.reload();
        }

    );
}

var images = [
    '/test/uploads/wPaint.png',
];

function saveImg(image) {
    var _this = this;
    console.log(image)
    $.ajax({
        type: 'POST',
        url: "{{url('/register_imaging')}}",
        data: {
            image: image
        },
        success: function(resp) {

            // internal function for displaying status messages in the canvas
            _this._displayStatus('Image saved successfully');

            // doesn't have to be json, can be anything
            // returned from server after upload as long
            // as it contains the path to the image url
            // or a base64 encoded png, either will work
            resp = resp;
            console.log(resp)
                // update images array / object or whatever
                // is being used to keep track of the images
                // can store path or base64 here (but path is better since it's much smaller)
            images.push(resp.img);

            // do something with the image
            $('#wPaint-img').append($('<img/>').attr('src', image));
        }
    });
}

function loadImgBg() {

    // internal function for displaying background images modal
    // where images is an array of images (base64 or url path)
    // NOTE: that if you can't see the bg image changing it's probably
    // becasue the foregroud image is not transparent.
    this._showFileModal('bg', images);
}

function loadImgFg() {

    // internal function for displaying foreground images modal
    // where images is an array of images (base64 or url path)
    this._showFileModal('fg', images);
}

function createCallback(cbName) {
    return function() {
        if (console) {
            console.log(cbName, arguments);
        }
    }
}

// init wPaint
$('#wPaint-demo1').wPaint({
    menuOffsetLeft: -35,
    menuOffsetTop: -50,
    saveImg: saveImg,
    loadImgBg: loadImgBg,
    loadImgFg: loadImgFg,
    onShapeDown: createCallback('onShapeDown'),
    onShapeUp: createCallback('onShapeUp'),
    onShapeMove: createCallback('onShapeDMove')
});
</script>
@endsection
