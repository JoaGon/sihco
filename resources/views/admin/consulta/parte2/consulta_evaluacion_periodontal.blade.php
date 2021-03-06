@extends('admin-layout.sidebarAdmin') @section('content') 
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{ url('css/admin.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<script>

var valido = <?php echo json_encode($validado); ?>;

var antecendetes = <?php echo json_encode($ante); ?>;
console.log(antecendetes)
</script>
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
					 Evaluacion Periodontal
				</div>
				 <fieldset>
				<form class="form-horizontal" id="form_familiares">
					 {{ csrf_field() }} <input type="hidden" name="consulta_id" value={{$consulta}}>
					<input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}"> <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">

                    <input type="hidden" name="id_enfermedad" id="id_enfermedad">
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
								Color
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="color" id="color" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Consistencia
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="consistencia" id="consistencia" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Contorno
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="contorno" id="contorno" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Textura
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="textura" id="textura" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Grosor
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="grosor" id="grosor" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Ancho de Encia Insertada
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="ancho_encia" id="ancho_encia" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Posicion
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="posicion" id="posicion" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							Sangramiento
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<input type="text" name="sangramiento" style="color: black" id="sangramiento" data-validation="required" data-validation-error-msg="Debe especificar" > 
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							Cepillado
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<input type="text" name="cepillado" style="color: black" id="cepillado" data-validation="required"  data-validation-error-msg="Debe especificar" > 
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							Espontaneo
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<input type="text" name="espontaneo" style="color: black" id="espontaneo" data-validation="required" data-validation-error-msg="Debe especificar" > 
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							Otros
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<input type="text" name="otro" style="color: black" id="otro" data-validation="required" data-validation-error-msg="Debe especificar" > 
						</div>
						</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Haliatosis
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="haliatosis" id="haliatosis" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					<div class="row row_border ">
					<div class="col-lg-12">
							<label>
								Sensibilidad
							</label> 
						</div>
						<div class="col-lg-12">
							<textarea name="sensibilidad" id="sensibilidad" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
						 @if( Auth::user()->rol_id == 1 or Auth::user()->rol_id == 2 or Auth::user()->rol_id == 3 )
               <a type="submit" id="validar-button" onclick="validar();" class="btn btn-primary">Validar</a>
             @endif   
								<button id="registrar-button" type="submit " onclick="insertar_historia(); " class="btn btn-primary ">Registrar
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
 $.each(antecendetes, function(i, val) {
        console.log("val",val)

        $('#ancho_encia').val(val.ancho_encia);
        $('#cepillado').val(val.cepillado);
        $('#color').val(val.color);
        $('#consistencia').val(val.consistencia);
        $('#contorno').val(val.contorno);
        $('#espontaneo').val(val.espontaneo);
        $('#grosor').val(val.grosor);
        $('#haliatosis').val(val.haliatosis);
        $('#otro').val(val.otro);
        $('#posicion').val(val.posicion);
        $('#sangramiento').val(val.sangramiento);
        $('#sensibilidad').val(val.sensibilidad);
        $('#textura').val(val.textura);
        $('#id_enfermedad').val(val.id_evaluacion_periodontal);
        $('#fecha').val(val.fecha);


    });

    function check(elem, val) {
        if (elem == val) {
            return true;
        } else {
            return false;
        }

    }

 });
function validar() {
    var id_enfermedad = $('#id_enfermedad').val()
    console.log(id_enfermedad, "<?php echo csrf_token(); ?>")
    $.ajax({

        url: "{{ url('/validar_examen_clinico') }}",
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            id_enfermedad: id_enfermedad
        },
        success: function(data) {
            PNotify.removeAll();
            new PNotify({
                title: 'Validacion Exitosa',
                text: 'La evaluacion Periodontal ha sido validado!',
                type: 'success',
                styling: 'bootstrap3'
            });
             new PNotify({
                title: 'Historia Validada',
                text: 'Esta Historia ha sido validada',
                hide: false,
                type: 'success',
                styling: 'bootstrap3'
            });
            console.log('exito')


        },
        error: function() {
            alert("error!!!!");
        }

    });


}
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
            url: "{{ url('/update_examenClinico') }}",
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
                      text: 'La evaluacion periodontal ha sido almacenada!',
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