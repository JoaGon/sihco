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
					Historia Odontologica
				</div>
				<form class="form-horizontal" id="form_familiares" role="form" method="POST" action="{{ url('/historiaodontologica') }}">
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
							<input class="form-control" id="fecha_consulta" type="text" class="form-control" name="fecha" value="{{ old('fecha_consulta') }}">
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-12">
							<input type="checkbox" name="tratamiento_odontologico" id="tratamiento_odontologico" value="S"> 1- ¿Esta recibiendo algun tratamiento medico u odontologico actualmente?
						</div>
						<div class="col-lg-12">
							<textarea name="espec_tratamiento_odon" id="espec_tratamiento_odon" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> 2- ¿Cree usted que sus dientes estan afectando su salud en alguna forma?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S"> 3- ¿Esta usted satisfecho con la apariencia de sus dientes?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> 4- ¿Se siente usted nervioso o intranquilo cuando va a recibir tratamiente dental?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> 5- ¿Ha tendio usted alguna reaccion al anestesico dental (Mareos, Desmayos, Dolor de Cabeza)?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> 6- ¿Ha tenido recientemente dolor en su dentadura?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="sangra_encia" id="sangra_encia" value="S"> 7- ¿Le sangran a usted las encias?
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="control_dental_reg" id="control_dental_reg" value="S"> 8- Sigue usted controles dentales regulares?
						</div>
						<div class="col-lg-12">
							<textarea name="espec_control_dental" id="espec_control_dental" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							9- ¿Cuando fue su ultima visita al odontologo?
						</div>
						<div class="col-lg-12">
							<textarea name="ultima_visita_odon" id="ultima_visita_odon" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="cepillo_dental" id="cepillo_dental" value="S"> 10- ¿Usa usted cepillo dental?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 11- ¿Que tipo de cepillo usa?
							<select style="color: black" name="tipo_cepillo">
								<option value="" selected>Selecione..</option>
								<option value="Blando">Blando</option>
								<option value="Mediano">Mediano</option>
								<option value="Duro">Duro</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="hilo_dental" id="hilo_dental" value="S"> 12- ¿Usa hilo Dental?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="text" name="frecuencia_hilo_dental" id="frecuencia_hilo_dental" value="S">  ¿Con que frecuencia?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="otros_medios" id="otros_medios" value="S"> 13- ¿Utiliza usted otros medios para lograr su higiene bucal?
						</div>
						<div class="col-lg-12">
							<label> ¿Cuales medios utiliza y con que frecuencia?</label>
							<textarea name="cuales_medios" id="cuales_medios" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							14- ¿Cual es su dieta normal?
						</div>
						<div class="col-lg-12">
							<textarea name="dieta_habitual" id="dieta_habitual" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="alimento_azucar" id="alimento_azucar" value="S">15- ¿Consume usted alimentos con azucar?
						</div>
						<div class="col-lg-12">
							<textarea name="frecu_aliment_azucar" id="frecu_aliment_azucar" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="cirugia_cavidad" id="cirugia_cavidad" value="S">16- ¿Le han realizado cirugia en la cavidad bucal?
						</div>
						<div class="col-lg-12">
							<textarea name="espec_cirugia" id="espec_cirugia" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="exodoncia" id="exodoncia" value="S">17- ¿Le han realizado exodoncias?
						</div>
						<div class="col-lg-12">
							<textarea name="espec_exodoncia" id="espec_exodoncia" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="complic_pos_exo" id="complic_pos_exo" value="S"> 18. ¿Tuvo alguna complicacion despues de la exodoncia?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 Que tipo de complicacion?
							<select style="color: black" name="tipo_complicacion">
								<option value="" selected>Selecione..</option>
								<option value="Hemorragica">Hemorragica</option>
								<option value="Infeccion">Infeccion</option>
								<option value="Cicatrizacion">Cicatrizacion Tardia</option>
							</select>
						</div>
						
					</div>
						<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="ortodoncia" id="ortodoncia" value="S"> 19- ¿Le han realizado tratamiento de Ortodoncia?
						</div>
						<div class="col-lg-12">
							<textarea name="cuando_ortodoncia" id="cuando_ortodoncia" placeholder="Especifique" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border">
						<div class="col-lg-12">
							<input type="checkbox" name="endodoncia" id="endodoncia" value="S"> 20- ¿Le han realizado tratamiento endodonticos?
						</div>
						<div class="col-lg-12">
							<label>Cuando?</label>
							<textarea name="cuando_endodoncia" id="cuando_endodoncia" class="form-control"></textarea>
						</div>
						<div class="col-lg-12">
							<label>En cuales Dientes?</label>
							<textarea name="cuales_dientes_endodoncia" id="cuales_dientes_endodoncia" placeholder="Otros" class="form-control" style="height:80px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="periodoncia" id="periodoncia" value="S"> 21- ¿Ha recibido tratamiendo periodontal?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 Que tipo de tratamiento?
							<select style="color: black" name="tipo_tratamiento">
								<option value="" selected>Selecione..</option>
								<option value="Cirugia">Cirugia</option>
								<option value="Otros">Otros</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 Fecha del ultimo tratamiento <input type="text" name="fecha_tratamiento" id="fecha_tratamiento" value="S">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="protesis_dental" id="protesis_dental" value="S"> 22- ¿Usa o ha usado protesis dental?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 Que tipo de protesis?
							<select style="color: black" name="tipo_protesis">
								<option value="" selected>Selecione..</option>
								<option value="Total">Total</option>
								<option value="Removible">Removible</option>
								<option value="Fija">Fija</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="satisfecho_tratamiento" id="satisfecho_tratamiento" value="S">23- ¿Esta satisfecho con el tratamiento odontologico recibido?
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-12">
							 24- ¿Presenta usted problemas en la mandibula que le impidan o limiten las funciones siguientes?:
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="mastica_alimentos_blandos" id="mastica_alimentos_blandos" value="S"> Masticacion de alimentos blandos
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="mastica_alimentos_duros" id="mastica_alimentos_duros" value="S"> Masticacion de Alimentos Duros
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="risa_sonrisa" id="risa_sonrisa" value="S"> Sonrisa y/o Risa a carcajadas
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="mastica_solo_lado" id="mastica_solo_lado" value="S"> 25- ¿Mastica usted de un solo lado?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 26- Si mastica de un solo lado, la razon se debe a:
							<select style="color: black" name="razon_matica">
								<option value="" selected>Selecione..</option>
								<option value="Sensibilidad Dental">Sensibilidad dental</option>
								<option value="Dolot ATM derecha">Dolor ATM derecha</option>
								<option value="Dolor ATM Izquierda">Dolor ATM izquierda</option>
								<option value="Ausencia de Dientes">Ausencia de Dientes</option>
								<option value="Otras causas">Otras causas</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="dificultad_boca" id="dificultad_boca" value="S"> 27- ¿Tiene usted dificultad para abrir y/o cerrar la boca?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 28- ¿Aprieta o Rechina los Dientes?
							<select style="color: black" name="rechina_diente">
								<option value="" selected>Selecione..</option>
								<option value="Si">Si</option>
								<option value="No">No</option>
								<option value="No sabe">No sabe</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="articulacion_temporomandibular" id="articulacion_temporomandibular" value="S"> 29- ¿Siente usted sonidos en una o ambas articulaciones temporomandibulares? ¿Cuando?
							<select style="color: black" name="cuando_articulacion">
								<option value="" selected>Selecione..</option>
								<option value="Abrir boca">Al abrir la boca</option>
								<option value="Cerrar Boca">Al cerrar la boca</option>
								<option value="Masticar">Al masticar</option>
								<option value="Bostezar">Al bostezar</option>
								<option value="Reir">Al reir</option>
							</select>
						</div>
					</div>
					<div class="row row_border ">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="checkbox" name="dolor_cabeza" id="dolor_cabeza" value="S">30- ¿Sufre usted de dolores de cabeza?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<input type="text" name="frecuencia_dolor_cabeza" id="frecuencia_dolor_cabeza" value="S"> ¿Frecuencias?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 Especifique ciclo de dolor:
							<select style="color: black" name="ciclo_dolor_cabeza">
								<option value="" selected>Selecione..</option>
								<option value="Persistente">Persistente</option>
								<option value="Recurrente">Recurrente</option>
								<option value="Esporadico">Esporadico</option>
							</select>
						</div>
						<div class="col-lg-12">
							 31- ¿Tiene usted alguno de los siguientes habitos?:
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="morderse_uyas" id="morderse_uyas" value="S"> Morderse las unas
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="morderse_labios" id="morderse_labios" value="S"> Morderse o chuparse los labios
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="morder_fosforos" id="morder_fosforos" value="S"> Morder fosforos, palillos, lapices, o pipas
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="respirar_boca" id="respirar_boca" value="S"> Respirar por la boca
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="abre_objeto_dientes" id="abre_objeto_dientes" value="S"> Abrir objetos con los dientes
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="lengua_contra_dientes" id="lengua_contra_dientes" value="S"> Presionar la lengua con los dientes
						</div>
					</div>
					<div class="row row_border">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="droga" id="droga" value="S"> 32- ¿Consume Droga alucinogena?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="tabaco" id="tabaco" value="S"> 33- ¿Consume tabaco?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input type="checkbox" name="bebida_alcoholica" id="fiebre_reumatica" value="S"> 34- ¿Consume bebidad alcoholicas?
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							 35- Preferencias Sexuales
							 	<select style="color: black" name="condicion_sexual_id">
									<option value="" selected>Selecione..</option>
							  		@foreach ($condiciones as $cond)
                                      <option value="{{$cond->id_condicion_sexual}}">
                                          {{$cond->condicion_sexual}}
                                      </option>
									@endforeach
								</select>
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