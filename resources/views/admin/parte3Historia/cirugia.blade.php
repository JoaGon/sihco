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
                <div style="font-size: 20px; text-align: center; color:#59bddd;">Ficha Clinica Cirugia</div>
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
                    <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5><label>A-GENERALES</label></h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> <labe1>1.-Infecciosas:</labe1> Sufre usted de enfermedades como sifilis, HIV, Infecciones en rinon, corazon, pulmones, otros
                        </div>
                         <div class="col-lg-12">
                            <textarea name="rho_1" id="rho_1" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                        </div>
                      
                    </div>
                    <div class="row row_border">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> <label>2.-Patologicos:</label> Sufre usted de enfermedades:
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Metabolicas
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Cardiovasculares
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Gastrointestinales
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Genito Urinarias
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Neurologicas
                        </div>
                         <div class="col-lg-12">
                            <textarea name="rho_1" id="rho_1" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                        </div>
                        
                    </div>
                     <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> <label>3.-Hospitalarios:</label> Alguna vez lo han hospitalizado?
                        </div>
                        <div class="col-md-4">
                           Fecha Hospitalizacion <input class="form-control" id="fecha_hospitalizacion" type="text" class="form-control" name="fecha" data-validation="required" data-validation-error-msg="Debe ingrear una fecha" value="{{ old('fecha') }}">
                        </div>
                        
                        <div class="col-lg-8">
                           Causa <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                       
                       
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> <label>4.-Quirurgicos:</label> Alguna vez lo han operado?
                        </div>
                        <div class="col-md-4">
                           Fecha Hospitalizacion <input class="form-control" id="fecha_operacion" type="text" class="form-control" name="fecha" data-validation="required" data-validation-error-msg="Debe ingrear una fecha" value="{{ old('fecha') }}">
                        </div>
                        
                        <div class="col-lg-8">
                           Causa <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                          <div class="col-lg-12">
                            Hubo Complicaciones?<textarea name="rho_1" id="rho_1" placeholder="Observaciones" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                        </div>
                       
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> <label>5.-Toxico Alergicos:</label> Tiene alergia a algun medicamento, alimento o sustancia?
                        </div>
                      
                        <div class="col-lg-6">
                           Cual? <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                        <div class="col-lg-6">
                           Dosis: <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> <label>6.-Medicamentos:</label> Ha tomado algun medicamento en los ultimos tres meses?
                        </div>
                      
                        <div class="col-lg-12">
                           Cual? <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                       
                    </div>
                     <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> <label>7.-Hematologicos:</label> Sufre usted de esquimosis, sangrados abundantes, retarda cicatrizacion?
                        </div>
                      
                        <div class="col-lg-12">
                           Sabe usted la causa? <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                       
                    </div>
                     <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> <label>8.-Transfusionales:</label> Alguna vez le han tenido que transfundir sangre?
                        </div>
                      
                        <div class="col-lg-12">
                           Causa <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                       
                    </div>
                     <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>9.-En caso de ser mujer:</label>
                        </div>
                      
                        <div class="col-lg-12">
                           <div class="col-lg-4 col-md-4 col-sm-4">
                                <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Esta embarazada?
                            </div>
                        </div>
                         <div class="col-lg-12 col-md-12 col-sm-12">
                           Otros no especificados
                        </div>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                       
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5><label>B.- ODONTOLOGICOS (QUIRURGICOS)</label></h5>
                        </div>
                        <div class="col-lg-6">
                           <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Le han realizado cirugias en su cavidad bucal?
                            </div>
                        </div>
                         <div class="col-lg-4">
                           Tipo <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                        <div class="col-lg-6">
                           <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Hubo complicaciones?
                            </div>
                        </div>
                         <div class="col-lg-4">
                           Especifique de que tipo (infecciosas, hemorragicas, cicatrizacion, etc) <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
                        </div>
                      
                    </div>
                     <div class="row row_border">
                        
                         <div class="col-lg-12">
                          Examenes complementarios indicados <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="">
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
    $("#fecha_hospitalizacion").datepicker({
        dateFormat: "yy-mm-dd",
        changeYear: true,
        changeMonth: true
    });
    $("#fecha_operacion").datepicker({
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
                url: "{{ url('/resumen_odontologico') }}",
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
                        text: 'El resumen han sido almacenado!',
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
