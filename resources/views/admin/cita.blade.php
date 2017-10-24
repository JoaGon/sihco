@extends('admin-layout.sidebarAdmin') @section('content')
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ URL('timepicker/jquery.timepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('timepicker/jquery.timepicker.css')}}" />

  <link rel="stylesheet" type="text/css" href="{{ url('plugins/timepicker/lib/bootstrap-datepicker.css')}}" />
<div class="container">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-10 col-sm-8 col-xs-8 col-sm-offset-4 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
            @if(session('status'))
            <div class="alert alert-success text-center notification">
                <ul style="list-style:none;">
                    <li style="font-size:16px;">{{ session('status') }}</li>
                </ul>
            </div>
            @endif
            <div class="panel panel-default" style="margin-top: 15px;">
                <div class="panel-heading">
                    Seleccione el Paciente
                </div>
                <!-- /.panel-heading -->
                <div id="paciente_table" class="panel-body">
                    <div class="table-responsive">
                        <input type="text" placeholder="Buscar Paciente" style="margin: 10px;" class="search" />
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <button class="sort" data-sort="name, ci">
                                Ordenar Por Nombre
                            </button>
                            <a class="btn btn-primary" type="button" style="float: right;" onclick="mostrar_modal();">
                                Agregar Cita
                            </a>
                            <thead>
                                <tr>
                                   <th class="grey-light"></th>
                                    <th>Hist. Nro</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Sexo</th>
                                    <th>C.I</th>
                                    <th>Celular</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Direccion</th>
                                    <th>Fecha de Ingreso</th>
                                  </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($pacientes as $paciente)
                                <tr>
                                <td><input type="radio" name="patient" value="{{ $paciente->id_paciente }}"></td>
                                    <td>{{$paciente->nro_historia}}</td>
                                    <td class="name">{{$paciente->nombre}}</td>
                                    <td>{{$paciente->apellido}}</td>
                                    <td>{{$paciente->genero}}</td>
                                    <td class="ci">{{$paciente->ci}}</td>
                                    <td>{{$paciente->celular}}</td>
                                    <td>{{$paciente->fecha_nacimiento}}</td>
                                    <td>{{$paciente->direccion}}</td>
                                    <td>{{$paciente->fecha_ingreso}}</td>
                                      </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                        <ul class="pagination">
                        </ul>
                    </div>
                    <!-- table responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Datos del Paciente</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <form class="form-horizontal" id="edit_patient_form" role="form" method="POST" action="{{ url('/cita/paciente') }}">
                            {{ csrf_field() }}
                              <input type="hidden" id="paciente_id" name="paciente_id">
                             <input type="hidden" id="nro_historia" name="nro_historia">
                      
                        <h5 id="nota-fecha-cita" style="display: none;padding-left: 15px;">Nota: Solo se puede solicitar la cita con un día de anticipación</h5>
                         <p>Motivo de la cita</p>
                        <input type="text" name="motivo" class="form-control" 
                                id="motivo" 
                                style="width: 100%;">
                        <br>
                        <p>Clinica</p>
                        <select name="clinica" class="form-control" 
                                id="clinica"
                                style="width: 100%;" onchange="buscar()">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Clinica I</option>
                                    <option value="2">Clinica II</option>
                                    <option value="3">Clinica III</option>
                        </select>
                        <br>
                        <p>Especialidad</p>
                        <select name="especialidad" class="form-control" 
                                id="especialidad"
                                style="width: 100%;" >
                        </select>
                        <br>
                        <p>Fecha de la cita</p>
                        <input type="text" 
                               name="date_appointment" id="date_appointment"
                               class="form-control valid"
                               placeholder="Fecha de la cita"
                             style="width: 100%;">
                        <br>
                                <p>Hora</p>

                                <input type="text" name="hour_send" style="width: 100%;" id="hour_send" class="form-control timepicker">

                              
                       <br>
                        
                        <p>Observaciones</p>
                            <input type="text" 
                              class="form-control"
                               name="observacion" id="observacion"
                               style="width: 100%;"> 
                          

                            </form>
                         
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" onclick="$('#edit_patient_form').submit();" class="btn btn-primary">Guardar</button>
                            </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
         

    </div>
    <!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
    <!-- jQuery -->
    <script src="{{url('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ url('js/list.min.js')}}"></script>
    <script src="{{ url('js/form-validator/jquery.form-validator.min.js') }}"></script>

    <script src="{{ url('timepicker2/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('timepicker/jquery.timepicker.js')}}"></script>
    <script>
    $(document).ready(function() {
         //Timepicker
    $('.timepicker').timepicker({
        showInputs: false,
        showDuration: true,
        timeFormat: 'H:i:s',
        step: 60
    })
        $('#especialidad').prop('readonly',true);
        
         var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth();
                var yyyy = today.getFullYear();
                
                $("#date_appointment").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true, minDate: new Date(yyyy, mm, dd), maxDate: "+1m" });
           
         $('#dateModal').on('hidden.bs.modal', function (e) {
                $('#date_form__')[0].reset();
                if(fechas) {
                    $('#date_appointment').val('<?php echo date('Y-m-d', strtotime('+1 days')); ?>');
                }
            });
          //Timepicker
    $('.timepicker').timepicker({
        showInputs: false,
        showDuration: true,
        timeFormat: 'H:i:s',
        step: 60
    })

        $("#nacimiento_edit").datepicker({
            dateFormat: "yy-mm-dd",
            changeYear: true,
            changeMonth: true
        });
        $("#ingreso_edit").datepicker({
            dateFormat: "yy-mm-dd",
            changeYear: true,
            changeMonth: true
        });
        $(".notification").fadeTo(3000, 500).slideUp(500, function() {
            $(".notification").slideUp(500);
        });

        var monkeyList = new List('paciente_table', {
            valueNames: ['name', 'ci'],
            page: 5,
            pagination: true
        });

        var myLanguage = {
            errorTitle: 'El formulario fallo en enviarse',
            requiredFields: 'No se ha introducido datos',
            badTime: 'No ha dado una hora correcta',
            badEmail: 'No ha dado una direccion de email correcta',
            badTelephone: 'No ha dado un numero de telefono correcto',

        }
        $.validate({
            language: myLanguage,

        });

});
    function mostrar_modal(){
        if($('input[name=patient]:checked').val()){
            $('#edit_modal').modal('show');
            $('#paciente_id').val($('input[name=patient]:checked').val());
        }else{
            alert('No ha seleccionado un paciente');
        }
        
    }

function buscar (){


    if($('#clinica').val() == 1){
           $('#especialidad option').remove();
     
            obj =[ 
                {id: 1, value: "estomatologia"},
                {id: 2, value: "periodoncia"},
             ];
        
         for (var i in obj) {
                $("#especialidad").append($('<option></option>').val(obj[i].id).html(obj[i].value) );
               
            }
           $('#especialidad').prop('readonly',false);
      
    }else if($('#clinica').val() == 2){
            $('#especialidad option').remove();
             obj =[ 
                {id: 1, value: "endodoncia"},             ];
        
         for (var i in obj) {
                $("#especialidad").append($('<option></option>').val(obj[i].id).html(obj[i].value) );
               
            }
      
    }else{
        $('#especialidad option').remove();
             obj =[ 
                {id: 1, value: "cirugia"},
                {id: 2, value: "operatoria"},
             ];
        
         for (var i in obj) {
                $("#especialidad").append($('<option></option>').val(obj[i].id).html(obj[i].value) );
               
            }
      
    }

}
    function edit_patient(val) {

        /*var x = document.getElementById("stauts");
        setTimeout(function(){ x.value="2 seconds" }, 2000);*/

        console.log('entro ' + val);
        var url = $('#try').attr("data-link");
        //var _token = $(this).data("data-token");
        console.log(url);
        $.ajax({

            url: url,

            type: "POST",

            data: {
                '_token': $('input[name=_token]').val(),
                id_paciente: val
            },

            success: function(data) {

                console.log(data);

                document.getElementById("id_edit").value = data[0].id_paciente;

                document.getElementById("persona_id").value = data[0].id_persona;

                document.getElementById("name_edit").value = data[0].nombre;

                document.getElementById("apellido_edit").value = data[0].apellido;

                document.getElementById("cedula_edit").value = data[0].ci;

                document.getElementById("sexo_edit").value = data[0].genero;

                document.getElementById("telefono_edit").value = data[0].telefono;

                document.getElementById("celular_edit").value = data[0].celular;

                document.getElementById("nacimiento_edit").value = data[0].fecha_nacimiento;

                document.getElementById("direccion_edit").value = data[0].direccion;

                document.getElementById("ingreso_edit").value = data[0].fecha_ingreso;

                document.getElementById("ocupacion_edit").value = data[0].ocupacion;

                document.getElementById("grupo_sanguineo").value = data[0].grupo_sanguineo;

                document.getElementById("nro_edit").value = data[0].nro_historia;

                document.getElementById("convive").value = data[0].convive;

                document.getElementById("direccion_familiar").value = data[0].direccion_familiar;

                document.getElementById("estado_civil").value = data[0].estado_civil;

                document.getElementById("familiar_cercano").value = data[0].familiar_cercano;

                document.getElementById("lee_escribe").value = data[0].lee_escribe;

                document.getElementById("lugar_nacimiento").value = data[0].lugar_nacimiento;

                document.getElementById("parentesco").value = data[0].parentesco;

                document.getElementById("situacion_laboral").value = data[0].situacion_laboral;

                document.getElementById("telefono_familiar").value = data[0].telefono_familiar;

                document.getElementById("zona_residencia").value = data[0].zona_residencia;

                document.getElementById("nivel_educacional").value = data[0].nivel_educacional;




                $('#edit_modal').modal('show');


            },
            error: function() {

                alert("error!!!!");

            }

        }); //end of ajax

    }
    </script>
    @endsection
