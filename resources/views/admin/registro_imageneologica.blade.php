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
<style type="text/css">
	
.file-preview-image {
    width: 60% !important;
    height: 80px !important;
}

.file-zoom-detail {

	width: auto !important;
    height: auto !important;
    max-width: 100 !important%;
    max-height: 100 !important%;
}
.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}

.fileinput-remove-button{
	width: 10% !important;
}
.fileinput-upload-button {
	width: 10% !important;
}
.btn-file{
	width: 30% !important;
}

.krajee-default.file-preview-frame .file-thumbnail-footer {
    top: -100px;
}
.krajee-default.file-preview-frame:not(.file-preview-error):hover {
    box-shadow: 3px 3px 5px 0 #fff;
}
.file-drop-zone-title {
    color: #aaa;
    font-size: 10px;
    padding: 85px 10px;
    cursor: default;
}
.krajee-default.file-preview-frame {
    position: absolute;
    /* display: table; */

    box-shadow: 1px 1px 5px 0 #fff;
     width: 120px;
 	margin: 0px; 
    border: 0px; 
    box-shadow: 0;
     padding: 0px;
     float: left; 
    text-align: center;
}
.hidden-xs{
	display: none;
}
.krajee-default .file-footer-buttons {
     float: none; 
    margin-left: 25px;
}
.file-preview {
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 5px;
    width: 70%;
    margin-bottom: 5px;
}

.file-drop-zone {
    border: 1px dashed #aaa;
    border-radius: 4px;
    height: 100%;
    text-align: center;
    margin: 0px;
    /* padding: 5px; */
    height: 180px;
}
.krajee-default .file-actions {
    margin-top: 15px;
    width: 150%;
}

.krajee-default .file-footer-caption {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100px;
    text-align: center;
    padding-top: 4px;
    font-size: 11px;
    color: #777;
    margin: 5px auto;
}
  
#wPaint-demo1{
  background-color: #fff !important;
  background-image: url("/sihco/public/images/images_radiologia.png") !important;
  background-repeat: no-repeat !important;
  width: 900px !important;
  height: 300px !important;
  top: 30px !important;
  left: 10%;
}
.wPaint-theme-classic .wPaint-menu-holder {
    border-color: #dadada !important;
    background-color: #f0f0f0 !important;
    top: -35px !important;
}

</style>

<meta name="csrf-token" content="<?php echo csrf_token() ?>">
<div class="container">
	<!-- /.row -->
	<div class="row ">
	<div class="container kv-main">
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
					 Imageneologia
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
					<div class="row">
						<div class="col-lg-12">


							<form enctype="multipart/form-data">
						      
						        <div class="form-group col-lg-3"  >
						            <input id="file-1" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
						        </div>
						        <div class="form-group col-lg-3" >
						            <input id="file-2" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-ount="1">
						        </div>
						        <div class="form-group col-lg-3"  >
						            <input id="file-3" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
						        </div>
						        <div class="form-group col-lg-3"  >
						            <input id="file-4" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-ount="1">
						        </div>
						         <div class="form-group col-lg-3"  >
						            <input id="file-5" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
						        </div>
						        <div class="form-group col-lg-3" >
						            <input id="file-6" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-ount="1">
						        </div>
						        <div class="form-group col-lg-3"  >
						            <input id="file-7" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
						        </div>
						        <div class="form-group col-lg-3"  >
						            <input id="file-8" name="imagen_" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-ount="1">
						        </div>
						       
						    </form>
						</div>

						 <div id="wPaint-demo1" class="col-lg-10" style="position:relative; width:500px; height:200px; background-color:#7a7a7a; margin:70px auto 20px auto;"></div>

						  <center style="margin-bottom: 50px;">
						    <input type="button" value="toggle menu" onclick="console.log($('#wPaint-demo1').wPaint('menuOrientation')); $('#wPaint-demo1').wPaint('menuOrientation', $('#wPaint-demo1').wPaint('menuOrientation') === 'vertical' ? 'horizontal' : 'vertical');"/>
						  </center>

						  <center id="wPaint-img"></center>
						
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
<!-- jQuery UI -->
  <script type="text/javascript" src="{{ url('lib/jquery.ui.core.1.10.3.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('lib/jquery.ui.widget.1.10.3.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('lib/jquery.ui.mouse.1.10.3.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('lib/jquery.ui.draggable.1.10.3.min.js')}}"></script>
  
  <!-- wColorPicker -->
  <link rel="Stylesheet" type="text/css" href="{{url('lib/wColorPicker.min.css')}}" />
  <script type="text/javascript" src="{{ url('lib/wColorPicker.min.js')}}"></script>

  <!-- wPaint -->
  <link rel="Stylesheet" type="text/css" href="{{ url('src/wPaint.css')}}" />
  <script type="text/javascript" src="{{ url('src/wPaint.utils.js')}}"></script>
  <script type="text/javascript" src="{{ url('src/wPaint.js')}}"></script>

  <!-- wPaint main -->
  <script type="text/javascript" src="{{ url('plugins/main/src/fillArea.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('plugins/main/src/wPaint.menu.main.js')}}"></script>

  <!-- wPaint text -->
  <script type="text/javascript" src="{{ url('plugins/text/src/wPaint.menu.text.js')}}"></script>

  <!-- wPaint shapes -->
  <script type="text/javascript" src="{{ url('plugins/shapes/src/shapes.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('/plugins/shapes/src/wPaint.menu.main.shapes.js')}}"></script>

  <!-- wPaint file -->
  <script type="text/javascript" src="{{ url('plugins/file/src/wPaint.menu.main.file.js')}}"></script>


<script>
var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>'; 

$("#file-1").fileinput({
        uploadUrl: "{{url('/register_imaging')}}", // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 1,
        autoReplace: true,
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Remove',
   		 maxFileCount: 1,
      	uploadExtraData: function(previewId, index) {
        	return {key: index};
    	},
		overwriteInitial: false,

		initialPreviewAsData: true // identify if you are sending preview data only and not the markup
        //allowedFileTypes: ['image', 'video', 'flash'],
        /*slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }*/
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
    $("#file-4").fileinput({
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
    $("#file-3").fileinput({
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

 $("#file-5").fileinput({
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
  $("#file-6").fileinput({
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
   $("#file-7").fileinput({
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
    $("#file-8").fileinput({
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

      var images = [
      '/test/uploads/wPaint.png',
    ];

    function saveImg(image) {
      var _this = this;

      $.ajax({
        type: 'POST',
        url: '/test/upload.php',
        data: {image: image},
        success: function (resp) {

          // internal function for displaying status messages in the canvas
          _this._displayStatus('Image saved successfully');

          // doesn't have to be json, can be anything
          // returned from server after upload as long
          // as it contains the path to the image url
          // or a base64 encoded png, either will work
          resp = $.parseJSON(resp);

          // update images array / object or whatever
          // is being used to keep track of the images
          // can store path or base64 here (but path is better since it's much smaller)
          images.push(resp.img);

          // do something with the image
          $('#wPaint-img').append($('<img/>').attr('src', image));
        }
      });
    }

    function loadImgBg () {

      // internal function for displaying background images modal
      // where images is an array of images (base64 or url path)
      // NOTE: that if you can't see the bg image changing it's probably
      // becasue the foregroud image is not transparent.
      this._showFileModal('bg', images);
    }

    function loadImgFg () {

      // internal function for displaying foreground images modal
      // where images is an array of images (base64 or url path)
      this._showFileModal('fg', images);
    }

    function createCallback(cbName) {
      return function() {
        if (console) {
          console.log(cbName, arguments);
        }
      }
    }

    // init wPaint
    $('#wPaint-demo1').wPaint({
      menuOffsetLeft: -35,
      menuOffsetTop: -50,
      saveImg: saveImg,
      loadImgBg: loadImgBg,
      loadImgFg: loadImgFg,
      onShapeDown: createCallback('onShapeDown'),
      onShapeUp: createCallback('onShapeUp'),
      onShapeMove: createCallback('onShapeDMove')
    });
</script>

@endsection