@extends('admin-layout.sidebarAdmin') @section('content') 
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<meta name="csrf-token" content="<?php echo csrf_token() ?>">
<div class="container">
	<!-- /.row -->
	<div class="row">
		<form  class="form-horizontal" role="form" id="form_delete" enctype="multipart/form-data">
		<div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-2">
			 @if(session('status'))
			<div class="alert alert-success text-center notification">
				<ul style="list-style:none;">
					<li style="font-size:16px;">{{ session('status') }}</li>
				</ul>
			</div>
			 @endif
			<div class="col-lg-10 col-sm-8 col-sm-offset-2 col-lg-offset-2 col-md-offset-4" style=" background-color:white;padding-left:0; margin-top: 25px">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:white;padding-left:0">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="background-color:white;padding-left:0">
						<section>
						<?php
                    foreach ($imagen as $im) {
                        $ruta_temp = url('/') . '/' . $im->ruta; ?>
                        
						<div style="clear:both;" onclick="big_imaging('{!!$im->ruta!!}', '{!!$im->id_registro_imageneologico!!}');"> <img  src="{!!url('/').'/'.$im->ruta!!}" class="btn" style="float: left; width: 70px; higth: 70px;"> <label style="margin-left: 20%;">
							<?php
                                if ($im->titulo_imagen) { echo $im->titulo_imagen; } else { echo 'Sin titulo'; } ?> </label>
						</div>
						<br>
						<?php } ?>
						</section>
					</div>
					<div id="imagenologico" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background-color:white;padding-left:0; text-align: center;">
						<img id="img_imagenologico" src='' style="display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px;">
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="background-color:white;padding-left:0">
					<div style="color:#59bddd;">
						<p>
							T&iacute;tulo de la imagen
						</p>
						<input type="text" name="title" id="title" class="form-control" placeholder="">
					</div>
					<br>
					<br>
					<br>
					<br>
					<input type="hidden" name="consulta_id" value="{!!$consulta!!}">
					<input type="hidden" name="paciente_id" value="{!!$id_paciente!!}">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<input type="hidden" name="ruta" id="ruta_imaging">
					<div style="width: 100%">
						<a class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal_imaging">Agregar imagen</a>
						<a class="btn btn-primary" onclick="eliminar()" >Eliminar imagen</a>
						<!--button class="btn btn-primary" onclick="validar_imag();">Agregar estudio</button-->
					</div>
				</div>
			</div>
		</div>
		</form>
		<form class="form-horizontal" role="form" id="form_imaging" enctype="multipart/form-data" action="{{url('/register/imaging')}}" method="POST">
			<div id="modal_imaging" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelI" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content" id="modal_content" style="padding: 30px;">
						<div class="form-group">
							<input type="file" value="perio" name="imagen_" id="imagen_" class="filestyle" style="width: 50% ;" placeholder="Buscar">
						</div>
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						<input type="hidden" name="consulta_id" value="{!!$consulta!!}">
						<input type="hidden" name="paciente_id" value="{!!$id_paciente!!}">
						<div class="modal-footer">
							<button type="submit" class="btn btn-default">Guardar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
</div>
<!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
<!-- jQuery -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('js/list.min.js')}}"></script>
<script type="text/javascript" src="{!!url('bootstrap-filestyle/src/bootstrap-filestyle.min.js')!!}"></script>

<script>
    function big_imaging(ruta, id) {
    	console.log(id);
        var direccion_img = '{!!url("/")!!}' + '/' + ruta;
        $('#img_imagenologico').remove();
        $("#imagenologico").append("<img id='img_imagenologico' name='"+id+"' src='" + direccion_img + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
        $('#ruta_imaging').val(ruta);
    }
    function validar_imag() {
        if ($('#ruta_imaging').val()) {
            $('#form_imaging_study').submit();
        } else {
            alert('Seleccion\u00e9 una imagen');
            event.preventDefault();
        }
     }    
     function eliminar(){

     	  /*$.ajax({
            url: "{{ url('/delete_image') }}",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(){
                //popover_show();
              //  location.reload();
                console.log('exito')
            },
            error: function(e) {
                console.log('Error!!!', e);
            }
          });*/
          var value = $('#ruta_imaging').val();
          $.post("{{ url('/delete_image') }}",
          		{
        			ruta: value

          		},function(){
               location.reload();
            }
          	
          	);
     }
</script>
@endsection