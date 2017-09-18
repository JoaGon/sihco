@extends('admin-layout.sidebarAdmin') @section('content') 
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
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
				<div style="font-size: 20px; text-align: center; color:#59bddd;">
					 Examen Clinico
				</div>
				<form class="form-horizontal" id="form_familiares">
					 {{ csrf_field() }} <input type="hidden" name="consulta_id" value={{$consulta}}>
					<input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}"> <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
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
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Piel
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="piel" id="piel" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Cabeza
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="cabeza" id="cabeza" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Cara
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="cara" id="cara" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Cuello
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="cuello" id="cuello" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Labios
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="labios" id="labios" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Carrillos
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="carrillos" id="carrillos" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Mucosa Labial y Bucal
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="mucosa_labial_bucal" id="mucosa_labial_bucal" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Lengua
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="lengua" id="lengua" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Piso de la Boca
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="piso_boca" id="piso_boca" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Paladar Duro y Blando
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="paladar_duro_blando" id="paladar_duro_blando" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Orofaringe
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="orofaringe" id="orofaringe" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Pigmentacion Dentarias Exogenas
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="pigmentacion" id="pignmentacion" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
					 	<label>
								Viscosidad
						</label> 
							<select style="color: black" name="viscosidad"  data-validation="required" data-validation-error-msg="Debe indicar que tipo">
								<option value="" selected>Selecione..</option>
								<option value="serosa">Serosa</option>
								<option value="mucosa">Mucosa</option>
								<option value="abundante">Abundante</option>
								<option value="normal">Normal</option>
								<option value="escasa">Escasa</option>
							</select>
					</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Observaciones
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="observaciones" id="observaciones" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
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
<script src="{{ url('js/list.min.js')}}"></script>
<script>
$(document).ready(function () {
  $("#fecha").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
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
function insertar_historia(){

	 var myLanguage = {              
            errorTitle: 'El formulario fallo en enviarse',
            requiredFields: 'No se ha introducido datos',
            badTime: 'No ha dado una hora correcta',
            badEmail: 'No ha dado una direccion de email correcta',
            badTelephone: 'No ha dado un numero de telefono correcto',
          
       }
          
    $.validate({
    modules : 'logic',
    language: myLanguage,
    form : '#form_familiares',
    onError : function($form) {
     // alert('Validation of form '+$form.attr('id')+' failed!');
    },
    onSuccess : function($form) {
      //alert('The form '+$form.attr('id')+' is valid!');
      //return false; // Will stop the submission of the form
      console.log($("#form_familiares")[0]);
      var formData = new FormData($("#form_familiares")[0]);

          $.ajax({
            url: "{{ url('/examen_clinico') }}",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(){
                //popover_show();
                new PNotify({
                      title: 'Registro Exitoso',
                      text: 'El examen Clinico han sido almacenado!',
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
    
    onElementValidate : function(valid, $el, $form, errorMess) {
      console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
    }
  });
	
                
}
</script>
@endsection