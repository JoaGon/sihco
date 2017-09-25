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
                <div style="font-size: 20px; text-align: center; color:#59bddd;"> Modelos de Diagnosticos</div>
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
                            <input class="form-control" id="fecha" type="text" class="form-control" name="fecha" data-validation="required" data-validation-error-msg="Debe ingrear una fecha" value="{{ old('fecha_consulta') }}">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-12">
                            <label>
                                1. Arcos
                            </label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="col-lg-12">
                                <label>
                                    Superior
                                </label>
                            </div>
                            <div class="col-lg-2">Forma</div>
                            <div class="col-lg-12">
                                <select class="form-control" style="color: black" name="forma_su">
                                    <option value="triangular">Triangular</option>
                                    <option value="ovalado">Ovalado</option>
                                    <option value="cuadrado">Cuadrado</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                Simetria
                                <select class="form-control" style="color: black" name="simetria_su">
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="col-lg-12">
                                <label>
                                    Inferior
                                </label>
                            </div>
                            <div class="col-lg-2">Forma</div>
                            <div class="col-lg-12">
                                <select class="form-control" style="color: black" name="forma_inf">
                                    <option value="triangular">Triangular</option>
                                    <option value="ovalado">Ovalado</option>
                                    <option value="cuadrado">Cuadrado</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                Simetria
                                <select class="form-control" style="color: black" name="simetria_inf">
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-12">
                            <label>Espacios Edentulos</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Dientes Ausentes
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="dientes_ausentes" id="dientes_ausentes">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Grado de Reabsorcion del Reborde
                            <select class="form-control" style="color: black; margin: 15px;" name="grado">
                                <option value="claseI">Clase I</option>
                                <option value="claseII">Clase II</option>
                                <option value="claseIII">Clase III</option>
                            </select>
                        </div>
                        <div class="col-lg-12">Clasificacion de Kennedy:
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <label class="col-lg-2">
                                Superior:
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control" style="color: black" name="kennedy_su">
                                    <option value="claseI">Clase I</option>
                                    <option value="claseII">Clase II</option>
                                    <option value="claseIII">Clase III</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control" style="color: black" name="modif_su">
                                    <option value="modif1">Modif. 1</option>
                                    <option value="modif2">Modif. 2</option>
                                    <option value="modif3">Modif. 3</option>
                                    <option value="modif4">Modif. 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <label class="col-lg-2">
                                Inferior:
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control" style="color: black" name="kennedy_inf">
                                    <option value="claseI">Clase I</option>
                                    <option value="claseII">Clase II</option>
                                    <option value="claseIII">Clase III</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control" style="color: black" name="modif_inf">
                                    <option value="modif1">Modif. 1</option>
                                    <option value="modif2">Modif. 2</option>
                                    <option value="modif3">Modif. 3</option>
                                    <option value="modif4">Modif. 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-12">
                            <label>
                                3. Evaluacion de los Dientes
                            </label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Tama;o de las coronas
                            <select class="form-control" style="color: black" name="corona_tam">
                                <option>Grande</option>
                                <option>Mediana</option>
                                <option>Peque;a</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Forma de las coronas
                            <select class="form-control" style="color: black" name="corona_forma">
                                <option>Globulosa</option>
                                <option>Cilindricas</option>
                                <option>Triangulares</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Giroversiones
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="giroversiones" id="giroversiones">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Migraciones
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="migraciones" id="migraciones">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Extrusiones
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="extrusiones" id="extrusiones">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Inclinados
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="inclinados" id="inclinados">
                        </div>
                        <div class="col-lg-12">Facetas de Desgaste
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="faceta_desgaste" id="faceta_desgaste">
                        </div>
                        <div class="col-lg-12">Rebordes marginales desiguales
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="rebordes" id="rebordes">
                        </div>
                        <div class="col-lg-12">Cuspide del Embolo
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="cuspide" id="cuspide">
                        </div>
                        <div class="col-lg-12">Contactos prematuros permanentes
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="contacto_prematuro" id="contacto_prematuro">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-12">
                            <label>
                                4. Relaciones Intermaxilares
                            </label>
                        </div>
                        <div class="col-lg-12">Relaciones de los bordes
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="relaciones_bordes" id="relaciones_bordes">
                        </div>
                        <div class="col-lg-12">Espacio disponible para los dientes
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="espacio_disponible" id="espacio_disponible">
                        </div>
                        <div class="col-lg-12">Espacio disponible para los apoyos
                            <input class="form-control" type="text" style="color: black; margin: 15px" data-validation="required" data-validation-error-msg="Requerido" name="espacio_apoyo" id="espacio_apoyo">
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

 $.each(antecendetes, function(i, val) {
        console.log("val",val)

        $('#contacto_prematuro').val(val.contacto_prematuro);
        $('#corona_forma').val(val.corona_forma);
        $('#corona_tam').val(val.corona_tam);
        $('#cuspide').val(val.cuspide);
        $('#dientes_ausentes').val(val.dientes_ausentes);
        $('#espacio_apoyo').val(val.espacio_apoyo);
        $('#espacio_disponible').val(val.espacio_disponible);
        $('#extrusiones').val(val.extrusiones);
        $('#faceta_desgaste').val(val.faceta_desgaste);
        $('#forma_inf').val(val.forma_inf);
        $('#forma_su').val(val.forma_su);
        $('#giroversiones').val(val.giroversiones);
        $('#grado').val(val.grado);
        $('#cuerpo_masetero_der').val(val.cuerpo_masetero_der);
        $('#inclinados').val(val.inclinados);
        $('#kennedy_inf').val(val.kennedy_inf);
        $('#kennedy_su').val(val.kennedy_su);
        $('#migraciones').val(val.migraciones);
        $('#modif_inf').val(val.modif_inf);
        $('#modif_su').val(val.modif_su);
        $('#rebordes').val(val.rebordes);
        $('#relaciones_bordes').val(val.relaciones_bordes);
        $('#simetria_inf').val(val.simetria_inf);
        $('#simetria_su').val(val.simetria_su);
        
    
        $('#id_enfermedad').val(val.id_modelo_diagnostico);
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

        url: "{{ url('/validar_modeloDiagnostico') }}",
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            id_enfermedad: id_enfermedad
        },
        success: function(data) {
            PNotify.removeAll();
            new PNotify({
                title: 'Validacion Exitosa',
                text: 'El examen Muscular ha sido validado!',
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
                url: "{{ url('/update_modeloDiagnostico') }}",
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
                        text: 'El modelo de diagnostico ha sido almacenados!',
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
