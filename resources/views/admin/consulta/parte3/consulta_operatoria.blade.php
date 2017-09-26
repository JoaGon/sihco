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
                <div style="font-size: 20px; text-align: center; color:#59bddd;">Ficha Clinica para Operatoria</div>
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
                    <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            VALORACION DE RIESGO A CARIES
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            FACTORES DE ENFERMEDAD
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Cavidades visibles o penetracion radiografica de la dentina
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="cavidades" id="cavidades" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Lesiones radiograficas interproximales es esmalte (no en dentina)
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="lesiones_radiograficas" id="lesiones_radiograficas" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Lesiones de mancha blanca en en superficies lisas
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="lesiones_mancha" id="lesiones_mancha" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Restauraciones en los ultimos 3 a&ntilde;os
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="restauraciones" id="restauraciones" value="S">
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            FACTORES DE RIESGO
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Recuento de streptococcus y lactobacilos moderado o alto (ambos)
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="recuento" id="recuento" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Abundante biopelicula visible sobre los dientes
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="abundante" id="abundante" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Bocadillos frecuentes (3 veces al dia, durante comidas)
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="bocadillos" id="bocadillos" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Fosas y fisuras profundas
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="fosas" id="fosas" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Drogas de Uso recreacional
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="drogas" id="drogas" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Flujo salival inadecuado por observacion o medicion (** si es medico, anote abajp el nivel de flujo)
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="flujo_salival" id="flujo_salival" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Factores de reduccion de saliva (medicacions, radiacion, sistemicos)
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="factores_reduccion" id="factores_reduccion" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Raices Expuestas
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="raices_expuestas" id="raices_expuestas" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Aparatologia Ortodontica
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="aparatologia" id="aparatologia" value="S">
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            FACTORES PROTECTORES
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Vive / Trabaja / Estudia en comunidad fluorada
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="vive_trabaja" id="vive_trabaja" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Dentrifrico Fluorado al menos 1 vez diaria
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="dentrifrico_una" id="dentrifrico_una" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Dentrifrico Fluorado al menos 2 veces diaria
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="dentrifrico_dos" id="dentrifrico_dos" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Enjuegue Bucal fluorado diariao(0,05% NaF)
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="enjuague_bucal" id="enjuague_bucal" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Dentrifico Fluorado diario (5000 ppm)
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="dentrifico_fluorado" id="dentrifico_fluorado" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Barniz del fluorado en los ultimos 6 meses
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="barniz" id="barniz" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Clorhexidina Preescrita / usada 1 vez a la semana cada 6 meses
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="clorhexidina" id="clorhexidina" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Goma de mascar / pastillas de xilitos 4 veces al dia, los ultimos 6 meses
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="goma_mascar" id="goma_mascar" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Dentifrico de Calcio / Fosfato durante los ultimos 6 meses
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="dentrifrico_de_calcio" id="dentrifrico_de_calcio" value="S">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            Adecuado Flujo salival ( > 1 ml/min Estimulado)
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="adecuado_flujo" id="adecuado_flujo" value="S">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            Flujo Salival (ml/min)
                        </div>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="flujo_salival_ml" id="flujo_salival_ml" value="">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            RIESGO A CARIES
                        </div>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="riesgo_caries" id="riesgo_caries" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                         <a type="button" onclick="validar();" class="btn btn-primary">Validar</a>
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
        $('#abundante').prop('checked', check('S', val.abundante));
        $('#adecuado_flujo').prop('checked', check('S', val.adecuado_flujo));
        $('#aparatologia').prop('checked', check('S', val.aparatologia));
        $('#barniz').prop('checked', check('S', val.barniz));
        $('#bocadillos').prop('checked', check('S', val.bocadillos));
        $('#cavidades').prop('checked', check('S', val.cavidades));
        $('#clorhexidina').prop('checked', check('S', val.clorhexidina));
        $('#dentrifico_fluorado').prop('checked', check('S', val.dentrifico_fluorado));



        $('#flujo_salival_ml').val(val.flujo_salival_ml);
        $('#id_enfermedad').val(val.id_antecedente_personal);


        $('#dentrifrico_de_calcio').prop('checked', check('S', val.dentrifrico_de_calcio));
        $('#dentrifrico_dos').prop('checked', check('S', val.dentrifrico_dos));
        $('#dentrifrico_una').prop('checked', check('S', val.dentrifrico_una));
        $('#drogas').prop('checked', check('S', val.drogas));
        $('#enjuague_bucal').prop('checked', check('S', val.enjuague_bucal));
        $('#factores_reduccion').prop('checked', check('S', val.factores_reduccion));
        $('#flujo_salival').prop('checked', check('S', val.flujo_salival));
        $('#fosas').prop('checked', check('S', val.fosas));
        $('#goma_mascar').prop('checked', check('S', val.goma_mascar));
        $('#lesiones_mancha').prop('checked', check('S', val.lesiones_mancha));
        $('#lesiones_radiograficas').prop('checked', check('S', val.lesiones_radiograficas));
        $('#raices_expuestas').prop('checked', check('S', val.raices_expuestas));

        $('#recuento').prop('checked', check('S', val.recuento));
        $('#restauraciones').prop('checked', check('S', val.restauraciones));
        $('#vive_trabaja').prop('checked', check('S', val.vive_trabaja));


        $('#riesgo_caries').val(val.riesgo_caries);
        
        $('#id_enfermedad').val(val.id_operatoria);
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
function validar() {
    var id_enfermedad = $('#id_enfermedad').val()
    console.log(id_enfermedad, "<?php echo csrf_token(); ?>")
    $.ajax({

        url: "{{ url('/validar_operatoria') }}",
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
                url: "{{ url('/update_operatoria') }}",
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
                        text: 'La historia ha sido almacenada!',
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
