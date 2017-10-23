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
                    Test de Fagerstrom
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
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Test
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" style=" color: #000;">
                                                <thead>
                                                    <tr>
                                                        <th>Preguntas</th>
                                                        <th>Respuestas</th>
                                                        <th>Puntos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td ROWSPAN="4">
                                                            Cuanto tiempo pasa entre que se fuma su primer cigarrillo?
                                                        </td>
                                                        <td>
                                                            <input type="radio" value="3" id="primer_cigarrillo_3" name="primer_cigarrillo" checked> Hata 5 minutos
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" value="2" id="primer_cigarrillo_2" name="primer_cigarrillo"> entre 6 - 30 minutos
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" value="1" id="primer_cigarrillo_1" name="primer_cigarrillo"> 31 - 60 minutos
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" value="0" id="primer_cigarrillo_1" name="primer_cigarrillo"> Mas de 60 minutos
                                                        </td>
                                                        <td>
                                                            0
                                                        </td>
                                                    </tr>4
                                                    <tr>
                                                        <td ROWSPAN="2">
                                                            Encuentra dificil no fumar en lugares donde esta prohibido, como la biblioteca o el cine?
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="fumar_en_lugares_1" value="1" name="fumar_en_lugares" checked> Si
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" id="fumar_en_lugares_0" value="0" name="fumar_en_lugares"> No
                                                        </td>
                                                        <td>
                                                            0
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td ROWSPAN="2">
                                                            Que cigarrillo le molesta mas dejar de fumar?
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="molesta_mas_1" value="1" name="molesta_mas" checked> El primero de la manana?
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" id="molesta_mas_0" value="0" name="molesta_mas"> Cualquier Otro
                                                        </td>
                                                        <td>
                                                            0
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td ROWSPAN="4">
                                                            Cuantos cigarros fuma cada dia?
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="cigarro_por_dia_0" value="0" name="cigarro_por_dia" checked> 10 o menos
                                                        </td>
                                                        <td>
                                                            0
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" id="cigarro_por_dia_1" value="1" name="cigarro_por_dia"> 11 - 20
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" id="cigarro_por_dia_2" value="2" name="cigarro_por_dia"> 21 - 30
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" id="cigarro_por_dia_3" value="3" name="cigarro_por_dia"> 31 o mas
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                    </tr>4
                                                    <tr>
                                                        <tr>
                                                            <td ROWSPAN="2">
                                                                Fuma con mas frecuencia durante las primeras horas despues de levantarse que durante el resto del dia?
                                                            </td>
                                                            <td>
                                                                <input type="radio" id="fuma_frecuencia_1" value="1" name="fuma_frecuencia" checked> Si
                                                            </td>
                                                            <td>
                                                                1
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" id="fuma_frecuencia_0" value="0" name="fuma_frecuencia"> No
                                                            </td>
                                                            <td>
                                                                0
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td ROWSPAN="2">
                                                                Fuma aunque este tan enfermo que tenga que guardar cama la mayor parte del dia?
                                                            </td>
                                                            <td>
                                                                <input type="radio" value="1" id="fuma_enfermo_1" name="fuma_enfermo" checked> Si
                                                            </td>
                                                            <td>
                                                                1
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" value="0" id="fuma_enfermo_0" name="fuma_enfermo"> No
                                                            </td>
                                                            <td>
                                                                0
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                Puntuacion Total
                                                                <a onclick="calcular()" class="btn btn-primary">Calcular</a>
                                                            </td>
                                                            <td>
                                                                <input type='text' id="total" name="total" />
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
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

        $( "#fuma_enfermo_"+val.fuma_enfermo).prop( "checked", true );
        $( "#cigarro_por_dia_"+val.cigarro_por_dia).prop( "checked", true );
        $( "#fuma_frecuencia_"+val.fuma_frecuencia).prop( "checked", true );
        $( "#fumar_en_lugares_"+val.fumar_en_lugares).prop( "checked", true );
        $( "#molesta_mas_"+val.molesta_mas).prop( "checked", true );
        $( "#primer_cigarrillo_"+val.primer_cigarrillo).prop( "checked", true );
      

        $('#total').val(val.total);
        $('#id_enfermedad').val(val.id_test);
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

$("#total").val('0');

function calcular() {

    var value = parseInt($('input:radio[name=primer_cigarrillo]:checked').val()) + parseInt($('input:radio[name=fumar_en_lugares]:checked').val()) + parseInt($('input:radio[name=molesta_mas]:checked').val()) + parseInt($('input:radio[name=cigarro_por_dia]:checked').val()) + parseInt($('input:radio[name=fuma_frecuencia]:checked').val()) + parseInt($('input:radio[name=fuma_enfermo]:checked').val())

    $("#total").val(value);


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
                url: "{{ url('/update_testFagerstrom') }}",
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
                        text: 'El test ha sido almacenado!',
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
