@extends('admin-layout.sidebarAdmin') @section('content') 
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{ url('css/admin.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<div class="container">
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12 col-md-offset-1">
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
					<li class="dropdown-submenu"><a tabindex="0">VIII) Examen Clinico</a></li>
					<li class="dropdown-submenu"><a tabindex="0">IX) Evaluacion Periodontal</a></li>
					<li class="dropdown-submenu"><a tabindex="0">X) Odontodiagrama</a></li>
					<li class="dropdown-submenu"><a tabindex="0">XI) Control de Placa</a></li>
					<li class="dropdown-submenu"><a tabindex="0">XII) Imageneologia</a></li>
					<li class="dropdown-submenu"><a tabindex="0">XIII) Examen de la Oclusion</a></li>
					<li class="dropdown-submenu"><a tabindex="0">XIV) Examen Muscular y Articular</a></li>
					<li class="dropdown-submenu"><a tabindex="0">XV) Modelos de Diagnosticos</a></li>
					<li class="dropdown-submenu"><a tabindex="0">XVI) Examenes Complementarios</a></li>
					<li class="dropdown-submenu"><a tabindex="0">XVII) Coronas y Puentes Fijos</a></li>
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
					<li class="dropdown-submenu"><a href="{{ url('consulta/'.$paciente->nro_historia) }}" tabindex="0">I y II)Motivo de la Consulta/ Enfer. Actual</a></li>
					<li class="dropdown-submenu"><a tabindex="0">Plan de Tratamiento</a></li>
					<li class="dropdown-submenu"><a tabindex="0">Reg. de Actividades Clinicas</a></li>
				</ul>
			</ul>
			<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">
				<div style="font-size: 20px; text-align: center; color:#59bddd;">
					Antecedente Personal
				</div>
				<form class="form-horizontal" id="form_familiares" role="form" method="POST" action="{{ url('/antecedente_personal') }}">
					 {{ csrf_field() }} <input type="hidden" name="consulta_id" value=<?php echo $consulta; ?> > <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}"> <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
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
							<input class="form-control" id="fecha_consulta" type="text" class="form-control" name="fecha_consulta" value="{{ old('fecha_consulta') }}">
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="enfer_cardiov" id="enfer_cardiov" value="S"> 1-Enfermedades Cardiovasculares
						</div>
						<div class="col-lg-12">
							<textarea name="espec_enfer_cardio" id="espec_enfer_cardi" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="enfer_renal" id="enfer_renal" value="S"> 2-Enfermedades Renales
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="enfer_meta_endocrina" id="enfer_meta_endocrina" value="S"> 3-Enfer. Metabolicas y Endocrinas
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="discrasia_sanguinea" id="discrasia_sanguinea" value="S"> 4-Discrasias Sanguineas
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="fiebre_reumatica" id="fiebre_reumatica" value="S"> 5-Fiebre Reumatica
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="artritis_reumatoidea" id="artritis_reumatoidea" value="S"> 6- Artritis Reumatoidea
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="enfer_alergica" id="enfer_alergica" value="S"> 7-Enfermedades Alergicas
						</div>
					</div>
					<div class="row row_border">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="adenopatia" id="adenopatia" value="S"> 8-Adenopatias
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="cancer" id="cancer" value="S"> 9- Cancer
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="enfer_infecciosa" id="enfer_infecciosa" value="S"> 10-Enfer. Infecciosas
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="enfer_transm_sexual" id="cardiopatias_congenitas" value="S"> 11-Enfer. De trans. Sexual
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="cefalea" id="cefalea" value="S"> 12- Cefalea
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="convulsiones" id="convulsiones" value="S"> 13- Convulsiones
						</div>
					</div>
					<div class="row row_border">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="parestesias" id="parestesias" value="S"> 14- Parestesias
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="edema_miembro_inf" id="edema_miembro_inf" value="S"> 15-Edema de Miembros Inf.
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="erupciones_piel" id="erupciones_piel" value="S"> 16-Erupciones en la Piel
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="ictericia" id="ictericia" value="S"> 17- Ictericia
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="trastorno_audicion" id="trastorno_audicion" value="S"> 18- Trastornos de la Audicion
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="intervencion_quirurgica" id="intervencion_quirurgica" value="S"> 19- Intervenciones Quirurgicas
						</div>
						<div class="col-lg-12">
							<textarea name="espec_interv_quirurgica" id="Especifique" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="trauma_accidente" id="trauma_accidente" value="S"> 20- Traumas por Accidente
						</div>
						<div class="col-lg-12">
							<textarea name="espec_trauma" id="espec_trauma" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="fractura" id="fractura" value="S"> 21- Fracturas
						</div>
						<div class="col-lg-12">
							<textarea name="espec_fractura" id="espec_fractura" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="accidente_transito" id="accidente_transito" value="S"> 22- Accidentes de Transito
						</div>
						<div class="col-lg-12">
							<textarea name="espec_accidente" id="espec_accidente" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="cancer" id="cancer" value="S"> 23-Otro
						</div>
						<div class="col-lg-12">
							<textarea name="espec_otro" id="Especifique" placeholder="Otros" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" onclick="$('#form_familiares').submit();" class="btn btn-primary">
							<i class="fa fa-btn fa-user"></i> Registrar </button>
							<button type="submit" href="{{ url('antecedente_personal')}}" class="btn btn-primary">
							<i class="fa fa-btn fa-user"></i> Siguiente </button>
							<!--button type="submit" onclick="motive_submit('{{$paciente->id_paciente}}', '{{$paciente->nro_historia}}')" class="btn btn-primary">
                  Guardar
                </button-->
							<!--  <a class="btn btn-link" href="{{ url('/password/reset') }}" style="color:#3c763d">Olvido su contraseña?</a>-->
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
$(document).ready(function () {
  $("#fecha_consulta").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
  $(".notification").fadeTo(3000, 500).slideUp(500, function(){
      $(".notification").slideUp(500);
  });
  var monkeyList = new List('pacientes', {
    valueNames: ['name'],
    page: 3,
    pagination: true
  });
var monthNames = [ "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December" ];
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
var newDate = new Date();
newDate.setDate(newDate.getDate() + 1);    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
 });
</script>
@endsection