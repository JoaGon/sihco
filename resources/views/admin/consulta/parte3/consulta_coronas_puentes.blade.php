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
                    Coronas y Puentes Fijos
                </div>
                <fieldset>
                    <form class="form-horizontal" id="form_familiares">
                        {{ csrf_field() }}
                        <input type="hidden" name="consulta_id" value={{$consulta}}>
                        <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
                        <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">

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
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                1. Coronas:
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                Tipo de Corona
                                <input type="input" class="form-control" name="tipo_corona" id="tipo_corona" style="color:black ">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                Material
                                <input type="input" class="form-control" name="material" id="material" style="color:black ">
                            </div>
                        </div>
                        <div class="row row_border ">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                2. Puente:
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    Tipo de Puente
                                </div>
                                <input type="input" class="form-control" name="tipo_puente" id="tipo_puente" style="color:black ">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    Dientes Pilares
                                </div>
                                <input type="input" class="form-control" name="dientes_pilares" id="dientes_pilares" style="color:black ">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    Retenedores
                                </div>
                                <input type="input" class="form-control" name="retenedores" id="retenedores" style="color:black ">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    Conectores
                                </div>
                                <input type="input" class="form-control" name="conectores" id="conectores" style="color:black ">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    Ponticos
                                </div>
                                <input type="input" class="form-control" name="panticos" id="panticos" style="color:black ">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    Material
                                </div>
                                <input type="input" class="form-control" name="material_puente" id="material_puente" style="color:black ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <button type="submit"  id="registrar-button" onclick="insertar_familiares();" class="btn btn-primary">Registrar</button>
                            @if( Auth::user()->rol_id == 1 or Auth::user()->rol_id == 2 or Auth::user()->rol_id == 3 )
                            <button type="submit"  id="validar-button" onclick="validar();" class="btn btn-primary">Validar</button>
                            @endif
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
$(document).ready(function() {

    $("#fecha").datepicker({
        dateFormat: "yy-mm-dd",
        changeYear: true,
        changeMonth: true
    });
    $(".notification").fadeTo(3000, 500).slideUp(500, function() {
        $(".notification").slideUp(500);
    });
    var monkeyList = new List('pacientes', {
        valueNames: ['name'],
        page: 3,
        pagination: true
    });
    var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
    var newDate = new Date();
    newDate.setDate(newDate.getDate() + 1);
    $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

    $.each(antecendetes, function(i, val) {
        console.log("val",val)

        $('#conectores').val(val.conectores);

        $('#dientes_pilares').val(val.dientes_pilares);
        $('#material').val(val.material);
        $('#material_puente').val(val.material_puente);
        $('#panticos').val(val.panticos);
        $('#retenedores').val(val.retenedores);
        $('#tipo_corona').val(val.tipo_corona);
        $('#tipo_puente').val(val.tipo_puente);

        $('#id_enfermedad').val(val.id_coronas);
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

function insertar_historia() {

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
            // alert('Validation of form '+$form.attr('id')+' failed!');
        },
        onSuccess: function($form) {
            //alert('The form '+$form.attr('id')+' is valid!');
            //return false; // Will stop the submission of the form
            console.log($("#form_familiares")[0]);
            var formData = new FormData($("#form_familiares")[0]);

            $.ajax({
                url: "{{ url('/update_coronasPuentes') }}",
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
                        text: 'Coronas y puentes han sido almacenado!',
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
function validar() {
    var id_enfermedad = $('#id_enfermedad').val()
    console.log(id_enfermedad, "<?php echo csrf_token(); ?>")
    $.ajax({

        url: "{{ url('/validar_coronasPuentes') }}",
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            id_enfermedad: id_enfermedad
        },
        success: function(data) {
            PNotify.removeAll();
            new PNotify({
                title: 'Validacion Exitosa',
                text: 'El control de placa ha sido validado!',
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
</script>
@endsection
