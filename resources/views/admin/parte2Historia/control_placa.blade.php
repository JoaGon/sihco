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
<link rel="stylesheet" type="text/css" href="{{url('css/estilosOdontograma.css')}}">

<script type="text/javascript" src="{{ url('js/angular.min.js') }}"></script>
<script src="{{url('js/ControlPlaca.js')}}"></script>

<div class="container" ng-app="ControlPlaca" ng-controller="ControlPlacaController">
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
					 Control de Placa
				</div>
				<form class="form-horizontal" id="form_familiares">
					 {{ csrf_field() }} <input type="hidden" name="consulta_id" value={{$consulta}}>
					<input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}"/> 
					<input type="hidden" name="historia" value="{{$paciente->nro_historia}}"/>
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
					<div class="col-lg-12 col-md-6 col-sm-6">
					Marque la zona afectada por placa
				
					</div>
</div>		

	<center>	
	<div>
		<svg height="50" class="[[i.tipoDiente]]" width="50"  ng-repeat="i in adultoArriva" id="[[i.id]]">
			
		  	<polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
  			<polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
  			<circle cx="30" cy="30" r="16" estado="8" value="8" class="corona"/>
  			<circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia"/>
  			<polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante"/>
  			<polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
  			<polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
  			<polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
  			<polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
  			<polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />
  			<text x="20" y="8" fill="navy" stroke="navy" stroke-width="0.1" style="font-size: 10pt;font-weight:normal">[[i.value]]</text>
		
  		</svg>
	</div>

	
	
	<div>
		<svg height="50" class="[[i.tipoDiente]]" width="50"  ng-repeat="i in adultoAbajo" id="[[i.id]]">
   			<polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
  			<polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
  			<circle cx="30" cy="30" r="16" estado="8" value="8" class="corona"/> 
  			<circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia"/>
  			<polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante"/>	
  			<polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
  			<polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
  			<polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
  			<polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
  			<polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />
  			<text x="20" y="8" fill="navy" stroke="navy" value="[[i.value]]" stroke-width="0.1" style="font-size: 10pt;font-weight:normal">[[i.value]]</text>
			
		</svg>
	</div>			
</center>

					<div class="row row_border ">
							<div class="col-lg-12 col-md-6 col-sm-6">
							Indique la cantidad de dientes presentes:
							<input type="input" name="diente_presentes" id="sr" style="color:black ">	
							
							</div>
					</div>
					<div class="row row_border ">
							<div class="col-lg-12 col-md-6 col-sm-6">
							<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" bordercolor="#FFFF00" width="67%" id="AutoNumber3">
							    <tbody><tr>
							      <td width="15%" align="center" style="border-style: none; border-width: medium" rowspan="2">
							      <font color="#FFF">INDICE=</font></td>
							      <td width="43%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1">
							      <font color="#FFF">Nº de superficies con placa</font></td>
							      <td width="11%" align="center" style="border-style:none; border-width:medium; " rowspan="2">
							      <font color="#FFF">x100 =</font></td>
							      <td width="8%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1">
							      <input type="text" name="sp" size="5" style="text-align: center; color: black"></td>
							      <td width="45%" align="center" style="border-style: none; border-width: medium" rowspan="2">
							      <p align="left">
							      <font color="#FFF">x100 =&nbsp; 
							      <input type="text" name="indice" size="5" value="0" style="text-align: center; color: black"> 
							      %</font></p></td>
							    </tr>
							    <tr>
							      <td width="43%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium">
							      <font color="#FFF">Nº total de superficies registradas</font></td>
							      <td width="8%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium">
							      <input type="text" name="ns" size="5" style="text-align: center;color: black "></td>
							    </tr>
							  	</tbody>
						  </table>		
							</div>
					</div>
					

<input type="radio" id="Decidua" name="tipo" value="1" style="display: none;" checked / >
					
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<a class="btn btn-primary" onclick="contar()">Calcular</a>	
						 	<a class="btn btn-primary" id="limpiar" class="btn btn-primary">Limpiar</a>
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
<script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('js/list.min.js')}}"></script>

<script type="text/javascript" src="{{url('js/jquery-odontograma.js')}}"></script>
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
    	var cantidad = $('#sr').val();
		console.log(cantidad, datos)
		 console.log($("#form_familiares")[0]);
      		var formData = new FormData($("#form_familiares")[0]);
      		formData.append('dientes',JSON.stringify(datos));
      		formData.append('cantidad_dientes_placa',datos.length);

      //alert('The form '+$form.attr('id')+' is valid!');
      //return false; // Will stop the submission of the form
     
    console.log( "<?php echo csrf_token(); ?>")

          $.ajax({
            url: "{{ url('/control_placa') }}",
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
                      text: 'El control de placa ha sido almacenado!',
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

function contar() 
{	
		var formulario = $("#form_familiares")[0];
		
  if (formulario.sr.value == "")
  {
    alert("Debe ingresar primero un valor en el campo Número de dientes presentes");
    formulario.sr.focus();
    return (false);
  }
  else
  {		
  	datos = []
  	$('svg').each(function(){
			var dienteD = $(this).attr('id');
			entrarEach = false;
			$(this).find('.marcado').each(function(){
					console.log('todoa',datos)
				var caraD = $(this).attr('value');
				var estadoD = $(this).attr('estado');
				var tipoD = $('input:radio[name=tipo]:checked').val();
				if ((estadoD == 3 || estadoD == 4 || estadoD == 6 || estadoD == 8)) {
					datos.push({diente:dienteD,cara:caraD,estado:estadoD,tipo:tipoD});
					return false;
				}
				else 
				{
					datos.push({diente:dienteD,cara:caraD,estado:estadoD,tipo:tipoD});
				}
					console.log('todoa',datos)
				
			});
		});	
		console.log('todoa',datos)

		formulario.elements.sp.value=datos.length;		
		var sreg=formulario.elements.sr.value*4;
		formulario.elements.ns.value=sreg;
		formulario.elements.indice.value=(datos.length*100)/sreg;
  }
}

</script>
@endsection