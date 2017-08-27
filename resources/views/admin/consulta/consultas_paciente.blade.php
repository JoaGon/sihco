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
        <div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
            @if(session('status'))
            <div class="alert alert-success text-center notification">
                <ul style="list-style:none;">
                    <li style="font-size:16px;">{{ session('status') }}</li>
                </ul>
            </div>
            @endif @foreach ($pacientes as $paciente) 
            <ul class="nav nav-pills" style="margin-top: 15px;">
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>I al VII<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="{{ url('consulta_antecedentefamiliar', array($paciente->id_paciente)) }}" tabindex="0">III) Ant. Familiares</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('consulta_antecedentepersonal', array($paciente->id_paciente)) }}" tabindex="0">IV) Ant. Personales</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('consulta_datosclinicos', array($paciente->id_paciente)) }}" tabindex="0">V) Datos Clinicos Seleccionados</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('consulta_resumenmedico', array($paciente->id_paciente)) }}" tabindex="0">Res. de la Historia Medica</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('consulta_signosvitales', array($paciente->id_paciente)) }}" tabindex="0">VI) Signos Vitales</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('consulta_historiaOdontologica', array($paciente->id_paciente)) }}" tabindex="0">VII) Historia Odontologica</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('consulta_resumenodontologico', array($paciente->id_paciente)) }}" tabindex="0">Res. de la Historia Odontologica</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>VIII al XIII<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="{{ url('consulta_examenClinico', array($paciente->id_paciente)) }}" tabindex="0">VIII) Examen Clinico</a></li>
                        <li class="dropdown-submenu"><a  href="{{ url('consulta_evaluacionPeriodontal', array($paciente->id_paciente)) }}" tabindex="0">IX) Evaluacion Periodontal</a></li>
                        <li class="dropdown-submenu"><a  href="{{ url('test_fagerstrom', array($paciente->id_paciente)) }}" tabindex="0"> Test de Fagerström</a></li>
                        <li class="dropdown-submenu"><a  href="{{url('diagrama_riesgo', array($paciente->id_paciente))}}" tabindex="0"> Diagrama de Riesgo</a></li>  
                        <li class="dropdown-submenu"><a href="{{ url('odontograma', array($paciente->id_paciente)) }}" tabindex="0">X) Odontograma</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('control_placa', array($paciente->id_paciente)) }}" tabindex="0">XI) Control de Placa</a></li>
                        <li class="dropdown-submenu"><a  href="{{ url('registro_imageneologico', array($paciente->id_paciente)) }}" tabindex="0">XII) Imageneologia</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XIII) Examen de la Oclusion</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('consulta_examenMuscular', array($paciente->id_paciente)) }}" tabindex="0">XIV) Examen Muscular y Articular</a></li>
                        <li class="dropdown-submenu"><a href="{{ url('modelo_diagnostico', array($paciente->id_paciente)) }}"  tabindex="0">XV) Modelos de Diagnosticos</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XVI) Examenes Complementarios</a></li>
                       
                    </ul>
                </li>
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>XIII al XXIV<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a  href="{{ url('corona_puente', array($paciente->id_paciente)) }}" tabindex="0">XVII) Coronas y Puentes Fijos</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XVIII) Dentaduras Totales</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XIX) Protesis Parcial Removible</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XX) Endodoncia</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XXI) Operatoria</a></li>
                        <li class="dropdown-submenu"><a tabindex="0">XII) Anestesiologia y Cirugia Estomatologica</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a tabindex="0" data-toggle="dropdown" data-submenu>Diagnostico/Pronostico<span class="caret"></span></a>
                    <ul class="dropdown-menu">
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
         
            @endforeach
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px; padding-bottom: 25px;">
             @foreach ($pacientes as $paciente)
            <div class="form-group">
                <div class="col-md-4">
                    <label for="motivo">Nombre</label>
                    <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="nombre">{{$paciente->nombre }} {{ $paciente->apellido }}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="motivo" class="">C.I:</label>
                    <textarea class="form-control" disabled cols="75" autofocus="true" rows="1" name="ci">{{ $paciente->ci }}</textarea>
                </div>
            </div>
            @endforeach
                <div class="col-sm-12" style="font-size: 20px; text-align: center; color:#59bddd; padding-bottom: 25px; padding-top: 15px">
                    Consultas del Paciente
                </div>
                <div class="col-lg-12">
					<div class="panel-body" id="consultas">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
						<tr>
							<th>
								ID consulta
							</th>
							<th>
								Motivo Consulta
							</th>
							<th>
								Enfermedad Actual
							</th>
                            <th>
                                Atendido por
                            </th>
							<th>
								Fecha
							</th>
							
						</tr>
						</thead>
						<tbody class="list">
						 @foreach($consultas as $con)
						<tr>
							<td>
								<strong>
								<a href="{{ url('consulta_paciente_/'.$con->id) }}" class="btn btn-link" style="font-weight: bold" data-toggle="tooltip" title="Cita"> {{$con->id}} </a>
								</strong>
							</td>
							<td class="name">
								{{$con->motivo_consulta}}
							</td>
							<td>
								{{$con->enfermedad_actual}}
							</td>
                            <td>
                                {{$con->nombre}} {{$con->apellido}}
                            </td>
							<td>
								{{$con->fecha_consulta}}
							</td>
						</tr>
						 @endforeach
						</tbody>
						</table>
						<!-- /.table-responsive -->
					</div>
					<!-- table responsive -->
					<ul class="pagination">
					</ul>
				</div>
				<!-- /.panel-body -->
					</div>
            </div>
            <!--div class="col-md-6 col-md-offset-4">
                <a href="{{ url('consulta/'.$paciente->nro_historia) }}" " class="btn btn-primary "> <i class="fa fa-btn fa-user "></i> Registrar </a>
			</div-->
		</div>
			<!-- /.col-lg-12 -->
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
 
  var monkeyList = new List('consultas', {
	  valueNames: ['name'],
	  page: 10,
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