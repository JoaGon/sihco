@extends('admin-layout.sidebarAdmin') @section('content')
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<div class="container">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-1">
            @if(session('status'))
            <div class="alert alert-success text-center notification">
                <ul style="list-style:none;">
                    <li style="font-size:16px;">{{ session('status') }}</li>
                </ul>
            </div>
            @endif @foreach ($pacientes as $paciente) @endforeach
            <ul class="nav nav-pills" style="margin-top: 15px;">
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>I al VII<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="{{ url('antecedentefamiliar', array($paciente->id_paciente, $consulta)) }}" tabindex="0">III) Ant. Familiares</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('antecedentepersonal', array($paciente->id_paciente, $consulta)) }}" tabindex="0">IV) Ant. Personales</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('datosclinicos', array($paciente->id_paciente, $consulta)) }}" tabindex="0">V) Datos Clinicos Seleccionados</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('resumenclinica', array($paciente->id_paciente, $consulta)) }}" tabindex="0">Res. de la Historia Medica</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('signosvitales', array($paciente->id_paciente, $consulta)) }}" tabindex="0">VI) Signos Vitales</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('historiaodontologica', array($paciente->id_paciente, $consulta)) }}" tabindex="0">VII) Historia Odontologica</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('resumenodontologica', array($paciente->id_paciente, $consulta)) }}" tabindex="0">Res. de la Historia Odontologica</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>VIII al XIII<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="{{ url('examen_clinico', array($paciente->id_paciente, $consulta)) }}" tabindex="0">VIII) Examen Clinico</a></li>
                        <li class="dropdown-submenu"><a  href="{{ url('evaluacion_periodontal', array($paciente->id_paciente, $consulta)) }}" tabindex="0">IX) Evaluacion Periodontal</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('odontograma', array($paciente->id_paciente, $consulta)) }}" tabindex="0">X) Odontodiagrama</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('control_placa', array($paciente->id_paciente, $consulta)) }}" tabindex="0">XI) Control de Placa</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XII) Imageneologia</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XIII) Examen de la Oclusion</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('examen_muscular', array($paciente->id_paciente, $consulta)) }}" tabindex="0">XIV) Examen Muscular y Articular</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('modelo_diagnostico', array($paciente->id_paciente, $consulta)) }}"  tabindex="0">XV) Modelos de Diagnosticos</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XVI) Examenes Complementarios</a></li>
                        <li class="dropdown-submenu"><a  href="{{ url('corona_puente', array($paciente->id_paciente, $consulta)) }}" tabindex="0">XVII) Coronas y Puentes Fijos</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>XIII al XXIV<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a tabindex="0">VIII) Dentaduras Totales</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">IV) Protesis Parcial Removible</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">V) Endodoncia</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">Operatoria</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">VI) Anestesiologia y Cidugia Estomatologica</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>Diagnostico/Pronostico<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="{{ url('consulta/'.$paciente->nro_historia) }}" tabindex="0">I y II)Motivo de la Consulta/ Enfer. Actual</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">Diagnostico Clinico</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">Diagnostico Definivo</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">Pronostico</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>Tratamiento<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a tabindex="0">Plan de Tratamiento</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">Reg. de Actividades Clinicas</a></li>
                    </ul>
            </ul>
         
            </ul>
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px; padding-bottom: 25px;">
                <div style="font-size: 20px; text-align: center; color:#59bddd; padding-bottom: 25px; padding-top: 15px">
                    Consultar Datos del Paciente
                </div>
                @foreach ($pacientes as $paciente) {{ csrf_field() }}
                <div class="form-group" style="margin-right: 10px">
                    <div class="col-md-4">
                        <label for="nombre" class="">Nombre</label>
                        <textarea cols="25" disabled class="form-control" rows="1" name="nombre">{{$paciente->nombre }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="apellido" class="">Apellido</label>
                        <textarea class="form-control" cols="25" disabled rows="1" name="apellido"> {{ $paciente->apellido }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="sexo" class="">Sexo</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="sexo">{{ $paciente->genero}}</textarea>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 10px">
                    <div class="col-md-4">
                        <label for="ci" class="">C.I:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->ci }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="ci" class="">Fecha de Nacimiento:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->ci }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="ci" class="">Ocupacion:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->ocupacion }}</textarea>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 10px">
                    <div class="col-md-4">
                        <label for="ci" class="">Grupo Sanguineo:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->grupo_sanguineo }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="ci" class="">Telefono:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->telefono }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="ci" class="">Celular:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->celular }}</textarea>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 10px">
                    <div class="col-md-4">
                        <label for="ci" class="">Direccion:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->direccion }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="ci" class="">Familiar Cercano:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->familiar_cercano }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="ci" class="">Telefono Familiar:</label>
                        <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="ci">{{ $paciente->telefono_familiar }}</textarea>
                    </div>
                </div>
            </div>
            <!--div class="col-md-6 col-md-offset-4">
                <a href="{{ url('consulta/'.$paciente->nro_historia) }}" " class="btn btn-primary "> <i class="fa fa-btn fa-user "></i> Registrar </a>
			</div-->
		</div>
			<!-- /.col-lg-12 -->
			 @endforeach
		</div>
		<!-- /.row -->
	</div>

<!--<script src="{{ url( 'bower_components/jquery/dist/jquery.min.js') }} "></script>-->
<!-- jQuery -->
<script src="{{url( 'bower_components/jquery/dist/jquery.min.js')}} "></script>
<script src="{{ url( 'template/vendor/datatables/js/jquery.dataTables.min.js')}} "></script>
<script src="{{ url( 'template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}} "></script>
<script src="{{ url( 'template/vendor/datatables-responsive/dataTables.responsive.js')}} "></script>
<script src="{{url( 'template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}} "></script>
<script src="{{ url( 'js/list.min.js')}} "></script>
<script>
$(document).ready(function () {
  $("#fecha_consulta ").datepicker({dateFormat: "yy-mm-dd ", changeYear: true, changeMonth: true});
  $(".notification ").fadeTo(3000, 500).slideUp(500, function(){
      $(".notification ").slideUp(500);
  });
  var monkeyList = new List('pacientes', {
    valueNames: ['name'],
    page: 3,
    pagination: true
  });
var monthNames = [ "January ", "February ", "March ", "April ", "May ", "June ",
    "July ", "August ", "September ", "October ", "November ", "December " ];
var dayNames= ["Sunday ","Monday ","Tuesday ","Wednesday ","Thursday ","Friday ","Saturday "]
var newDate = new Date();
newDate.setDate(newDate.getDate() + 1);    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
var myLanguage = {              
            errorTitle: 'El formulario fallo en enviarse',
            requiredFields: 'No se ha introducido datos',
            badTime: 'No ha dado una hora correcta',
            badEmail: 'No ha dado una direccion de email correcta',
            badTelephone: 'No ha dado un numero de telefono correcto',
       }
            $.validate({
               language: myLanguage,
        });
 });
// #myInput is a <input type="text "> element
function register_imagen(id_consulta)
    {
      $.ajax({
                data: {},
                type: 'get',
                url: "{{ url( 'imagen') }} ",
                success:function(data)
                {
                },
                error: function(e) {
                    console.log('Error!!!',e);
                }
            });    
    }
 
</script>
@endsection