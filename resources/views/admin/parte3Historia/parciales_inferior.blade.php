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
<link href="{{ url('js/file-upload/themes/explorer/theme.css')}}" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
.file-preview-image {
    width: 50% !important;
    height: 80px !important;
    float: left;
}

.file-zoom-detail {
    width: auto !important;
    height: auto !important;
    max-width: 100 !important%;
    max-height: 100 !important%;
}

.kv-avatar .file-preview-frame,
.kv-avatar .file-preview-frame:hover {
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

.fileinput-remove-button {
    width: 10% !important;
}

.fileinput-upload-button {
    width: 10% !important;
}

.btn-file {
    width: 30% !important;
}

.krajee-default.file-preview-frame .file-thumbnail-footer {
    top: -100px;
    float: left;
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

.hidden-xs {
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

#wPaint-demo1 {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/inferior.png") !important;
    background-repeat: no-repeat !important;
    width: 350px !important;
    height: 300px !important;
    top: 30px !important;
    left: 20%;
}
#wPaint-demo2 {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/inferior.png") !important;
    background-repeat: no-repeat !important;
    width: 350px !important;
    height: 300px !important;
    top: 30px !important;
    left: 20%;
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
                        Protesis Parcial Removible Inferior
                    </div>
                    <fieldset>
                        <form class="form-horizontal" id="form_familiares">
                            {{ csrf_field() }}
                            <input type="hidden" name="consulta_id" value={{$consulta}}>
                            <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
                            <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
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
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            </div>
                  <div class="row">
                  <div class="col-lg-12">
                     
                                 <div class="row row_border">
                                    <h4>Modelo Superior</h4>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    Clasificacion de Kennedy:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <input class="form-control" style="width: 100% !important" type="text" name="clasificacion_kennedy" placeholder="" id="clasificacion_kennedy" value=""> 
                                      </div>
                                   <div class="col-lg-2 col-md-2 col-sm-2">
                                    Posicion:
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                   <input class="form-control" style="width: 100% !important" type="text" name="posicion_h" placeholder="H" id="posicion_h" value=""> 
                                    </div>
                                     <div class="col-lg-2 col-md-2 col-sm-2">
                                   <input class="form-control" style="width: 100% !important" type="text" name="posicion_a" placeholder="A" id="posicion_a" value=""> 
                                    </div> 
                                     <div class="col-lg-2 col-md-2 col-sm-2">
                                   <input class="form-control" style="width: 100% !important" type="text" name="posicion_p" placeholder="P" id="posicion_p" value=""> 
                                    </div> 
                                     <div class="col-lg-2 col-md-2 col-sm-2">
                                   <input class="form-control" style="width: 100% !important" type="text" name="posicion_ld" placeholder="L.D" id="posicion_ld" value=""> 
                                    </div> 
                                     <div class="col-lg-2 col-md-2 col-sm-2">
                                   <input class="form-control" style="width: 100% !important" type="text" name="posicion_li" placeholder="L.I" id="posicion_li" value=""> 
                                    </div> 
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    Dientes Pilares:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <input class="form-control" style="width: 100% !important" type="text" name="dientes_pilares" placeholder="" id="dientes_pilares" value=""> 
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-4">
                                    Localizacion de Retenciones:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <textarea name="localizacion_retenciones" id="localizacion_retenciones" placeholder="" class="form-control" data-validation="required" data-validation-depends-on="otro" data-validation-error-msg="Debe especificar otra enfermedad" style="height: 100px;"></textarea>
                                      </div> 
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                    Retenedores Directos:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <textarea name="retenedores_directos" id="retenedores_directos" placeholder="" class="form-control" data-validation="required" data-validation-depends-on="otro" data-validation-error-msg="Debe especificar otra enfermedad" style="height: 100px;"></textarea>
                                      </div> 
                                      <div class="col-lg-4 col-md-4 col-sm-4">
                                    Apoyos:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <input class="form-control" style="width: 100% !important" type="text" name="apoyos" placeholder="" id="apoyos" value=""> 
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-4">
                                    Retenedores Indirectos:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <input class="form-control" style="width: 100% !important" type="text" name="retenedores_indirectos" placeholder="" id="retenedores_indirectos" value=""> 
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-4">
                                    Planos Guias:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <input class="form-control" style="width: 100% !important" type="text" name="planos_guias" placeholder="" id="planos_guias" value=""> 
                                      </div>
                                       <div class="col-lg-4 col-md-4 col-sm-4">
                                    C. Mayor:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <input class="form-control" style="width: 100% !important" type="text" name="c_mayor" placeholder="" id="c_mayor" value=""> 
                                      </div>
                                       <div class="col-lg-4 col-md-4 col-sm-4">
                                    Bases:
                                    </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                         <input class="form-control" style="width: 100% !important" type="text" name="bases" placeholder="" id="bases" value=""> 
                                      </div>
                                       <div id="wPaint-demo1" class="col-lg-6" style="position:relative; width:500px; height:200px; background-color:#7a7a7a; margin:70px auto 20px auto;"></div>
                                      <div class="col-lg-6">
                                        <center  style="margin-bottom: 50px;">
                                            <input type="button" value="toggle menu" onclick="console.log($('#wPaint-demo1').wPaint('menuOrientation')); $('#wPaint-demo1').wPaint('menuOrientation', $('#wPaint-demo1').wPaint('menuOrientation') === 'vertical' ? 'horizontal' : 'vertical');" />
                                        </center>
                                        <center id="wPaint-img"></center>
                                      </div>

                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                    Observaciones:
                                    </div>
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                         <textarea name="observaciones" id="observaciones" placeholder="" class="form-control" data-validation="required" data-validation-depends-on="otro" data-validation-error-msg="Debe especificar otra enfermedad" style="height: 100px;"></textarea>
                                      </div> 

                                 </div>
                         
                         
                    <!-- /.panel -->
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
$(document).ready(function(){
  $("#fecha").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
})  

function big_imaging(ruta, id) {
    console.log(id);
    var direccion_img = '{!!url("/")!!}' + '/' + ruta;
    $('#img_imagenologico').remove();
    $("#imagenologico").append("<img id='img_imagenologico' name='" + id + "' src='" + direccion_img + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
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
function insertar_historia() {
    var c5=document.getElementById("test");
    var d5=c5.toDataURL("image/png");


    var myLanguage = {
        errorTitle: 'El formulario fallo en enviarse',
        requiredFields: 'No se ha introducido datos',
        badTime: 'No ha dado una hora correcta',
        badEmail: 'No ha dado una direccion de email correcta',
        badTelephone: 'No ha dado un numero de telefono correcto',

    }

    $.validate({
        modules: 'logic',
        language: myLanguage,
        form: '#form_familiares',
        onError: function($form) {
          //  alert('Validation of form '+$form.attr('id')+' failed!');
        },
        onSuccess: function($form) {
            //alert('The form '+$form.attr('id')+' is valid!');
            //return false; // Will stop the submission of the form
            console.log($("#form_familiares")[0]);
            var formData = new FormData($("#form_familiares")[0]);
            formData.append('imagen', d5);

            $.ajax({
                url: "{{ url('/parciales_inferior') }}",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function() {
                    //popover_show();
                    new PNotify({
                        title: 'Registro Exitoso',
                        text: 'El registro ha sido almacenado!',
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

        onElementValidate: function(valid, $el, $form, errorMess) {
            console.log('Input ' + $el.attr('name') + ' is ' + (valid ? 'VALID' : 'NOT VALID'));
        }
    });


}


function eliminar() {

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
    $.post("{{ url('/delete_image') }}", {
            ruta: value

        }, function() {
            location.reload();
        }

    );
}

var images = [
    '/test/uploads/wPaint.png',
];

function saveImg(image) {
    var _this = this;
    console.log(image)
    $.ajax({
        type: 'POST',
        url: "{{url('/register_imaging')}}",
        data: {
            image: image
        },
        success: function(resp) {

            // internal function for displaying status messages in the canvas
            _this._displayStatus('Image saved successfully');

            // doesn't have to be json, can be anything
            // returned from server after upload as long
            // as it contains the path to the image url
            // or a base64 encoded png, either will work
            resp = resp;
            console.log(resp)
                // update images array / object or whatever
                // is being used to keep track of the images
                // can store path or base64 here (but path is better since it's much smaller)
            images.push(resp.img);

            // do something with the image
            $('#wPaint-img').append($('<img/>').attr('src', image));
        }
    });
}
function saveImg2(image) {
    var _this = this;
    console.log(image)
    $.ajax({
        type: 'POST',
        url: "{{url('/register_imaging')}}",
        data: {
            image: image
        },
        success: function(resp) {

            // internal function for displaying status messages in the canvas
            _this._displayStatus('Image saved successfully');

            // doesn't have to be json, can be anything
            // returned from server after upload as long
            // as it contains the path to the image url
            // or a base64 encoded png, either will work
            resp = resp;
            console.log(resp)
                // update images array / object or whatever
                // is being used to keep track of the images
                // can store path or base64 here (but path is better since it's much smaller)
            images.push(resp.img);

            // do something with the image
            $('#wPaint-img2').append($('<img/>').attr('src', image));
        }
    });
}


function loadImgBg() {

    // internal function for displaying background images modal
    // where images is an array of images (base64 or url path)
    // NOTE: that if you can't see the bg image changing it's probably
    // becasue the foregroud image is not transparent.
    this._showFileModal('bg', images);
}
function loadImgBg2() {

    // internal function for displaying background images modal
    // where images is an array of images (base64 or url path)
    // NOTE: that if you can't see the bg image changing it's probably
    // becasue the foregroud image is not transparent.
    this._showFileModal('bg', images);
}

function loadImgFg() {

    // internal function for displaying foreground images modal
    // where images is an array of images (base64 or url path)
    this._showFileModal('fg', images);
}
function loadImgFg2() {

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
function createCallback2(cbName) {
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
$('#wPaint-demo2').wPaint({
    menuOffsetLeft: -35,
    menuOffsetTop: -50,
    saveImg: saveImg2,
    loadImgBg: loadImgBg2,
    loadImgFg: loadImgFg2,
    onShapeDown: createCallback2('onShapeDown'),
    onShapeUp: createCallback2('onShapeUp'),
    onShapeMove: createCallback2('onShapeDMove')
});
</script>
@endsection
p