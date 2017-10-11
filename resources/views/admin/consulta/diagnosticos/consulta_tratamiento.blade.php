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
<script>

var valido = <?php echo json_encode($validado); ?>;
var diagnostico = <?php echo json_encode($diagnostico); ?>;

//console.log(antecendetes)
</script>
<div class="container">
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
					 {{ csrf_field() }} 
          <input type="hidden" id="consulta_id" name="consulta_id" value={{$consulta}}>
					<input type="hidden" id="paciente_id" name="paciente_id" value="{{$paciente->id_paciente}}"> 
          <input type="hidden" id="historia" name="historia" value="{{$paciente->nro_historia}}">
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
					<!--div class="row row_border ">
						<div class="col-lg-12">
							 <textarea  name="editor1"  id="editor1" rows="10" cols="80">
                        </textarea>
						</div>
					</divp-->
       <div class="row row_border ">

            <label>Fase de Emergencia</label>
            <div class="col-lg-12">
                 <textarea name="fase_emergencia" id="fase_emergencia" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
        </div>
          </div>
          <div class="row row_border ">

            <label>Fase Sistemica</label>
            <div class="col-lg-12">
                 <textarea name="fase_sistemica" id="fase_sistemica" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
        </div>
          </div>
          <div class="row row_border ">

            <label>Fase Inicial</label>
            <div class="col-lg-12">
                 <textarea name="fase_inicial" id="fase_inicial" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
        </div>
          </div>

<div class="row row_border ">

            <label>Fase Correctiva:</label>
             <textarea name="fase_correctiva" id="fase_correctiva" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
          
            <div class="col-lg-12">
             <label>Tratamiento periodontal</label>
            <div class="col-lg-12">
                 <textarea name="t_periodontal" id="t_periodontal" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
              </div>

                      </div>
                      <div class="col-lg-12">
             <label>Tratamiento Endodontico</label>
            <div class="col-lg-12">
                 <textarea name="t_endodontico" id="t_endodontico" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
              </div>

                      </div>
                      <div class="col-lg-12">
             <label>Tratamiento Restaurativo</label>
            <div class="col-lg-12">
                 <textarea name="t_restaurativo" id="t_restaurativo" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
              </div>

                      </div>
                      <div class="col-lg-12">
             <label>Tratamiento Quirurgico</label>
            <div class="col-lg-12">
                 <textarea name="t_quirurgico" id="t_quirurgico" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
              </div>

                      </div>
                      <div class="col-lg-12">
             <label>Tratamiento Protesico</label>
            <div class="col-lg-12">
                 <textarea name="t_protesico" id="t_protesico" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
              </div>

                      </div>

          </div>


           <div class="row row_border ">

            <label>Fase Mantenimiento</label>
            <div class="col-lg-12">
                 <textarea name="fase_mantenimiento" id="fase_mantenimiento" placeholder="Introduzca el tratamiento" data-validation="required" data-validation-error-msg="Debe especificar el diagnostico" class="form-control" style="height: 100px;"></textarea>
        </div>
          </div>
        

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
            @if( Auth::user()->rol_id == 1 or Auth::user()->rol_id == 2 or Auth::user()->rol_id == 3 )
                          <a type="button" id="validar-button" onclick="validar();" class="btn btn-primary">Validar</a>
                        @endif
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
  // Crear un elemento div añadiendo estilos CSS
var container = $(document.createElement('div')).css({
padding: '5px',
borderTopColor: '#999', borderBottomColor: '#999',
borderLeftColor: '#999', borderRightColor: '#999'
});
  var divSubmit = $(document.createElement('div'));
$(divSubmit).append('<div></div>');
var iCnt = 0;


$(document).ready(function () {


$.each(diagnostico, function(i, val) {

     $('#id_enfermedad').val(val.id_tratamientos);
     $('#fase_emergencia').val(val.fase_emergencia);
     $('#fase_sistemica').val(val.fase_sistemica);
     $('#fase_mantenimiento').val(val.fase_mantenimiento);

     $('#fase_inicial').val(val.fase_inicial);
     $('#fase_correctiva').val(val.fase_correctiva);
     $('#t_restaurativo').val(val.t_restaurativo);
     $('#t_periodontal').val(val.t_periodontal);
     $('#t_quirurgico').val(val.t_quirurgico);
     $('#t_endodontico').val(val.t_endodontico);
     $('#t_protesico').val(val.t_protesico);




      $('#fecha').val(val.fecha);

});

  console.log("llega", $('#especialidad').val())
  var especialidad = $('#especialidad').val();
  var id= $('#id_enfermedad').val();
  var paciente_id = $('#paciente_id').val();
  var url = '../'
 

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
            url: "{{ url('/update_tratamiento') }}",
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
                      text: 'El Pronostico ha sido almacenado!',
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

function validar() {
    var id_enfermedad = $('#id_enfermedad').val()
    console.log(id_enfermedad, "<?php echo csrf_token(); ?>")
    $.ajax({

        url: "{{ url('/validar_tratamiento') }}",
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            id_enfermedad: id_enfermedad
        },
        success: function(data) {
            PNotify.removeAll();
            new PNotify({
                title: 'Validacion Exitosa',
                text: 'El tratamiento ha sido validado!',
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