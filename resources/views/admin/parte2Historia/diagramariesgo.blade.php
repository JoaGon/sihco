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
					Diagrama de Riesgo
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
					<div class="row row_border ">
						<div class="col-lg-6">
							<div class="col-lg-12">
							BOP
								<input type="text" placeholder="max. 200" class="form-control" name="bop" style="color: black" id="bop" data-validation="required" data-validation-error-msg="Debe especificar" > 
							</div>
							
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							PD >= 5
							<input type="text" class="form-control" placeholder="max. 25" name="pd" style="color: black" id="pd" data-validation="required" data-validation-error-msg="Debe especificar" >
							</div>
							
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							Tooth loss
							<input type="text" class="form-control" placeholder="max. 25" name="tooth" style="color: black" id="tooth" data-validation="required" data-validation-error-msg="Debe especificar" > 
							</div>
							
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							BL / Age
							<input type="text" class="form-control" placeholder="max. 5" name="bl_age" style="color: black" id="bl_age" data-validation="required" data-validation-error-msg="Debe especificar" > 
							</div>
							
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							Syst / Age
							<input type="text" class="form-control" placeholder="max. 52000" name="sys_age" style="color: black" id="sys_age" data-validation="required" data-validation-error-msg="Debe especificar" > 
							</div>
							
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							Envir.
							<input type="text" class="form-control" placeholder="max. 200" name="envir" style="color: black" id="envir" data-validation="required" data-validation-error-msg="Debe especificar" > 
							</div>
							
						</div>
						<div  class="col-md-6 col-md-offset-4" style="text-align: center; margin-left: 25%; margin-top: 5%">
						 	<a href="#" onclick="verChart()" class="btn btn-primary">Calcular</a>
							
						</div>
						</div>
							<div class="col-lg-12" style="text-align: center;left: 20%; padding-bottom: 15px">
							<div id="chart" style="width: 500px; height: 350px;"></div>
								
							</div>

					<div class="form-group" style="margin-top: 15px">
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
    <script src="{{ url('/js/echart/echarts.min.js')}}"></script>

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



function verChart(){
var BOP = $('#bop').val();
var pd  = $('#pd').val();
var tooth = $('#tooth').val();
var bl_age = $('#bl_age').val();
var sys_age = $('#sys_age').val();
var envir = $('#envir').val();

var chart = document.getElementById('chart');
    		var myChart = echarts.init(chart);
    		var option = {
    			title: { text: 'Diagrama de Riesgo' },
    			tooltip: {  trigger: 'item' },
    			 legend: {
					        orient : 'vertical',
					        x : 'right',
					        y : 'bottom',
					        data:['A']
					    },
    			  toolbox: {
			        show : true,
			        feature : {
			            mark : {show: true},
			            dataView : {show: true, readOnly: false},
			            restore : {show: true},
			            saveAsImage : {show: true}
			        }
			    },
			     polar : [
					       {
					           indicator : [
					               { text: 'BOP', max: 200},
					               { text: 'PD>=5 ', max: 25},
					               { text: 'Tooth loss', max: 25},
					               { text: 'BL/Age', max: 5},
					               { text: 'Syst./Age ', max: 52000},
					               { text: 'Envir.', max: 200}
					            ]
					        }
					    ],
			    calculable : true,
    			series : [
					        {
					            name: 'A',
					            type: 'radar',
					            data : [
					                {
					                    value : [BOP, pd, tooth, bl_age, sys_age, envir],
					                    name : 'A'
					                },
					               
					            ]
					        }
					    ]
    			
    		};
    		myChart.setOption(option);

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
      	$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
          $.ajax({
            url: "{{ url('/diagrama_riesgo') }}",
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
                      text: 'El diagrama ha sido almacenado!',
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