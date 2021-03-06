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
var datos_clinicos = <?php echo json_encode($ante); ?>;
var valido = <?php echo json_encode($validado); ?>;



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
                    Datos Clinicos Seleccionados
                </div>
                <form class="form-horizontal" id="form_familiares">
                    {{ csrf_field() }}
                    <input type="hidden" name="consulta_id" value=<?php echo $consulta; ?> >
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
                            <input class="form-control" id="fecha_consulta" type="text" class="form-control" data-validation="required" data-validation-error-msg="Debe ingrear una fecha" name="fecha" value="{{ old('fecha') }}">
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="examinado_ultimo_ayo" id="examinado_ultimo_ayo" value="S"> 1-¿Ha sido usted examinado por su medico durante el ultimo AÑO?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="cambio_salud_ultimo_ayo" id="cambio_salud_ultimo_ayo" value="S"> 2- ¿Ha habido algun cambio en su salud durante el ultimo AÑO?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="sangra_largo_tiempo" id="sangra_largo_tiempo" value="S"> 3- ¿Sangre usted por largo tiempo cuando se corta?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="cicatrizacion_lenta" id="cicatrizacion_lenta" value="S"> 4- ¿Su proceso de cicatrizacion es lento?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="perdida_peso" id="perdida_peso" value="S"> 5-¿Ha perdido usted peso sin hacer dieta durante los ultimos meses?
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <input type="checkbox" name="grave_enfermo" id="grave_enfermo" value="S"> 6- ¿Ha estado usted gravemente enfermo?
                        </div>
                        <div class="col-lg-12">
                            <textarea name="espec_grav_enfermo" id="espec_grav_enfermo" placeholder="Especifique" class="form-control" data-validation="required" data-validation-depends-on="grave_enfermo" data-validation-error-msg="Debe especificar" style="height: 100px;"></textarea>
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input type="checkbox" name="hospitalizado" id="hospitalizado" value="S"> 7- ¿Ha estado usted hospitalizado alguna vez?
                        </div>
                        <div class="col-lg-12">
                            <textarea name="espec_fecha_hospitalizacion" id="espec_fecha_hospitalizacion" placeholder="Especifique" data-validation="required" data-validation-depends-on="hospitalizado" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="marcapaso" id="marcapaso" value="S"> 8- ¿Posee usted marcapasos?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="tranfusion_sanguinea" id="tranfusion_sanguinea" value="S"> 9. ¿Le han hecho transfusiones sanguineas?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="asma" id="asma" value="S"> 10. ¿Ha sufrido o sufre usted de asma?
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>11- ¿Ha tenido usted alguna reaccion ante el uso de los siguientes medicamentos: ?</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="aspirina" id="aspirina" value="S">Aspirina
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="penicilina" id="penicilina" value="S">Penicilina
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="yodo" id="yodo" value="S">Yodo
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="sulfonamida" id="sulfonamida" value="S"> Sulfonamidas
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="barbituricos" id="barbituricos" value="S">Barbituricos
                        </div>
                        <div class="col-lg-12">
                            <input type="checkbox" name="otros_medicamentos" id="otros_medicamentos" value="S"> Otros
                        </div>
                        <div class="col-lg-12">
                            <textarea name="espec_otros_medicamentos" id="espec_otros_medicamentos" placeholder="Especifique otros medicamentos" class="form-control" data-validation="required" data-validation-depends-on="otros_medicamentos" data-validation-error-msg="Debe especificar" style="height: 100px;"></textarea>
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="trastorno_visual" id="trastorno_visual" value="S"> 13- Sufre usted algun trastorno visual?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="sinusitis" id="sinusitis" value="S"> 14- ¿Sufre usted de Sinusitis?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="hemorragia_nasal" id="hemorragia_nasal" value="S"> 15. ¿Sufre usted de Hemorragias Nasales?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="dolor_pecho" id="dolor_pecho" value="S"> 16- ¿Siente usted dolor en el pecho cuando realiza un esfuerzo moderado?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="tos" id="tos" value="S"> 17- ¿Tiene usted una tos persistente?
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="tos_sangre" id="tos_sangre" value="S"> 18- ¿Tose usted algunas veces con sangre?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="dificultad_tragar" id="dificultad_tragar" value="S"> 19- ¿Tiene usted alguna dificultad para tragar?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="indigestion" id="indigestion" value="S"> 20- ¿Sufre usted de Indigestion frecuente?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="vomito" id="vomito" value="S">21- ¿Vomita con frecuencia?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="orines" id="orines" value="S"> 22- ¿Orina usted mas de seis veces al dia?
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="sediento" id="sediento" value="S"> 23- ¿Esta usted siempre sediento?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="desmayo" id="desmayo" value="S"> 24- ¿Tiende usted tendencia a Desmayarse?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="moretones" id="moretones" value="S"> 25- ¿Se le producen moretones o magulladuras con facilidad?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="desorden_sangre" id="desorden_sangre" value="S">26- ¿Tiene usted algun desorden en la sangre, tal como la Anemia?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="cansancio" id="cansancio" value="S"> 27- ¿Se cansa usted facilmente?
                        </div>
                    </div>
                    <div id="mujer" class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>28- MUJERES:</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="embarazo" id="embarazo" value="S"> ¿Esta usted Emabarazada?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="pastilla_anticonceptiva" id="edema_miembro_inf" value="S"> ¿Esta usted tomando pastillas anticonceptivas actualmente?
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="desarreglos_mensuales" id="desarreglos_mensuales" value="S"> ¿Sufre usted de desarreglos menstruales?
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                         @if( Auth::user()->rol_id == 1 or Auth::user()->rol_id == 2 or Auth::user()->rol_id == 3 )
                            <a type="submit" id="validar-button" onclick="validar();" class="btn btn-primary">Validar</a>
                        @endif
                            <button id="registrar-button" type="submit" onclick="insertar_datos_clinicos();" class="btn btn-primary">Registrar
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
<script>
console.log(<?php echo $genero; ?>);

if (<?php echo $genero; ?>) {
    $('#mujer').css('display', 'none');

}

$(document).ready(function() {

    $("#fecha_consulta").datepicker({
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


    $.each(datos_clinicos, function(i, val) {
        $('#asma').prop('checked', check('S', val.asma));
        $('#aspirina').prop('checked', check('S', val.aspirina));
        $('#barbituricos').prop('checked', check('S', val.barbituricos));
        $('#cambio_salud_ultimo_ayo').prop('checked', check('S', val.cambio_salud_ultimo_ayo));
        $('#cansancio').prop('checked', check('S', val.cansancio));
        $('#cicatrizacion_lenta').prop('checked', check('S', val.cicatrizacion_lenta));
        $('#desmayo').prop('checked', check('S', val.desmayo));
        $('#desorden_sangre').prop('checked', check('S', val.desorden_sangre));
        $('#dificultad_tragar').prop('checked', check('S', val.dificultad_tragar));
        $('#dolor_pecho').prop('checked', check('S', val.dolor_pecho));
        $('#embarazo').prop('checked', check('S', val.embarazo));
        $('#examinado_ultimo_ayo').prop('checked', check('S', val.examinado_ultimo_ayo));
        $('#grave_enfermo').prop('checked', check('S', val.grave_enfermo));
        $('#hemorragia_nasal').prop('checked', check('S', val.hemorragia_nasal));
        $('#hospitalizado').prop('checked', check('S', val.hospitalizado));
        $('#indigestion').prop('checked', check('S', val.indigestion));
        $('#marcapaso').prop('checked', check('S', val.marcapaso));
        $('#moretones').prop('checked', check('S', val.moretones));
        $('#orines').prop('checked', check('S', val.orines));
        $('#otros_medicamentos').prop('checked', check('S', val.otros_medicamentos));
        $('#pastilla_anticonceptiva').prop('checked', check('S', val.pastilla_anticonceptiva));
        $('#penicilina').prop('checked', check('S', val.penicilina));
        $('#perdida_peso').prop('checked', check('S', val.perdida_peso));
        $('#sangra_largo_tiempo').prop('checked', check('S', val.sangra_largo_tiempo));
        $('#sediento').prop('checked', check('S', val.sediento));
        $('#sinusitis').prop('checked', check('S', val.sinusitis));
        $('#sulfonamida').prop('checked', check('S', val.sulfonamida));
        $('#tos').prop('checked', check('S', val.tos));
        $('#tos_sangre').prop('checked', check('S', val.tos_sangre));
        $('#tranfusion_sanguinea').prop('checked', check('S', val.tranfusion_sanguinea));
        $('#trastorno_visual').prop('checked', check('S', val.trastorno_visual));
        $('#vomito').prop('checked', check('S', val.vomito));
        $('#yodo').prop('checked', check('S', val.yodo));
        $('#espec_fecha_hospitalizacion').val(val.espec_fecha_hospitalizacion);
        $('#espec_grav_enfermo').val(val.espec_grav_enfermo);
        $('#fecha_consulta').val(val.fecha);
        $('#espec_otros_medicamentos').val(val.espec_otros_medicamentos);
        $('#id_enfermedad').val(val.id_dato_clinico);

        console.log(val)
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

        url: "{{ url('/validar_dato_clinico') }}",
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            id_enfermedad: id_enfermedad
        },
        success: function(data) {
            PNotify.removeAll();
            new PNotify({
                title: 'Validacion Exitosa',
                text: 'Los Datos Clinicos han sido validados!',
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

function insertar_datos_clinicos() {
    console.log($("#form_familiares")[0]);

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
                url: "{{ url('/update_dato_clinico') }}",
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
                        text: 'Los Datos Clinicos han sido almacenados!',
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
</script>
@endsection
