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
<script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
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
					 Pronostico
				</div>
				 <fieldset>
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
					<!--div class="row row_border ">
						<div class="col-lg-12">
							 <textarea  name="editor1"  id="editor1" rows="10" cols="80">
                        </textarea>
						</div>
					</divp-->
          <div class="row row_border ">

            <label>Inserte la especialidad</label>
            <div class="col-lg-12">
               <select name="especialidad" class="form-control">
                  <option value="1">Periodoncia</option>       
                  <option  value="2">Estomatologia</option>
                  <option  value="3">Endodoncia</option>              
               </select>
            </div>
          </div>
          <div id="diagnostico" class="col-lg-12" style="margin-bottom: 15px">
            
             <div class="col-md-12 ">
                      <textarea name="pronostico" id="pronostico" placeholder="Introduzca el pronostico general" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
                
              </div>
              </div>
              <div id="diagnostico" class="col-lg-12" style="margin-bottom: 15px">
            
             <div class="col-md-12 ">
                      <textarea name="pronostico_individual" id="pronostico" placeholder="Introduzca el pronostico indivudial" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
                
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
  var iCnt = 0;
 
// Crear un elemento div añadiendo estilos CSS
var container = $(document.createElement('div')).css({
padding: '5px',
borderTopColor: '#999', borderBottomColor: '#999',
borderLeftColor: '#999', borderRightColor: '#999'
});
 
$('#btAdd').click(function() {
if (iCnt <= 19) {
 
iCnt = iCnt + 1;
 
// Añadir caja de texto.
$(container).append('<div class="col-md-12 elementos" id=tb' + iCnt+' style="margin-bottom:15px" ><div class="col-md-4">  <label for="motivo" class="">Fecha diagnostico</label><input class="form-control" id="fechas[]" name="fechas[]" type="date" class="form-control" /></div><div class="col-md-8"><textarea  name="diagnosticos[]" id="diagnostico[]" placeholder="Introduzca el diagnostico" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea></div></div>');

 
if (iCnt == 1) {
 
var divSubmit = $(document.createElement('div'));
$(divSubmit).append('<div></div>');
 
}
 
$('#diagnostico').after(container, divSubmit);
}
else { //se establece un limite para añadir elementos, 20 es el limite
 
$(container).append('<label>Limite Alcanzado</label>');
$('#btAdd').attr('class', 'bt-disable');
$('#btAdd').attr('disabled', 'disabled');
 
}
});
 
$('#btRemove').click(function() { // Elimina un elemento por click
if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
 
if (iCnt == 0) { $(container).empty();
 
$(container).remove();
$('#btSubmit').remove();
$('#btAdd').removeAttr('disabled');
$('#btAdd').attr('class', 'bt btn btn-primary')
 
}
});
 
$('#btRemoveAll').click(function() { // Elimina todos los elementos del contenedor
 
$(container).empty();
$(container).remove();
$('#btSubmit').remove(); iCnt = 0;
$('#btAdd').removeAttr('disabled');
$('#btAdd').attr('class', 'bt btn btn-primary');
 
});

  $("#fecha").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
  $("#fecha_diagnostico").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
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

 var editor =  CKEDITOR.replace('editor1');
    editor.on( 'change', function( evt ) {
       console.log(evt.editor.getData());
    });

function insertar_historia(){

	 var myLanguage = {              
            errorTitle: 'El formulario fallo en enviarse',
            requiredFields: 'No se ha introducido datos',
            badTime: 'No ha dado una hora correcta',
            badEmail: 'No ha dado una direccion de email correcta',
            badTelephone: 'No ha dado un numero de telefono correcto',
          
       }
          
          /*var ele = $('.elementos').val();
          console.log(ele);*/
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
      	$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
          $.ajax({
            url: "{{ url('/pronostico') }}",
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
                      text: 'El Diagnostico ha sido almacenado!',
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

 
// Obtiene los valores de los textbox al dar click en el boton "Enviar"
var divValue, values = '';
 
function GetTextValue() {
 
$(divValue).empty();
$(divValue).remove(); values = '';
 
$('.input').each(function() {
divValue = $(document.createElement('div')).css({
padding:'5px', width:'200px'
});
values += this.value + '<br />'
});
 
$(divValue).append('<p><b>Tus valores añadidos</b></p>' + values);
$('body').append(divValue);
 
}

</script>
@endsection