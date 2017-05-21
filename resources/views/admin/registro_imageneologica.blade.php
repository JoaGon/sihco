@extends('admin-layout.sidebarAdmin') @section('content') 
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

<link href="{{ url('css/admin.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ url('css/file-input/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ url('js/file-upload/themes/explorer/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>


<meta name="csrf-token" content="<?php echo csrf_token() ?>">
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
					 Resumen Historia Medica
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
						<div class="col-lg-12">
							<form enctype="multipart/form-data">
						      
						        <div class="form-group">
						            <input id="file-1" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
						        </div>
						        <hr>
						        <div class="form-group">
						            <input id="file-2" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
						        </div>
						      
						       
						    </form>
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

<script src="{{ url('js/file-upload/plugins/canvas-to-blob.min.js')}}" type="text/javascript"></script>
<script src="{{ url('js/file-upload/plugins/sortable.min.js')}}" type="text/javascript"></script>
<script src="{{ url('js/file-upload/plugins/purify.min.js')}}" type="text/javascript"></script>
<script src="{{ url('js/file-upload/fileinput.min.js')}}"></script>
<script src="{{ url('js/file-upload/themes/fa/theme.js')}}"></script>
<script src="{{ url('js/file-upload/locales/es.js')}}"></script>
<script src="{{ url('js/file-upload/locales/fr.js')}}"></script>


<script>
$("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
$("#file-2").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
$("#input-700").fileinput({
    uploadUrl: "http://localhost/file-upload-single/1", // server upload action
    uploadAsync: true,
    maxFileCount: 5
});
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