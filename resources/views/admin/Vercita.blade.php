@extends('admin-layout.sidebarAdmin') @section('content')
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">

<link href="{{ url('css/cita.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ URL('timepicker/jquery.timepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('timepicker/jquery.timepicker.css')}}" />

  <link rel="stylesheet" type="text/css" href="{{ url('timepicker/lib/bootstrap-datepicker.css')}}" />
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
            
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<?php

function dayOfWeek(){
    switch (date('l')){
        case 'Sunday':
            return 'Domingo';
            break;
        case 'Monday':
            return 'Lunes';
            break;
        case 'Thuesday':
            return 'Martes';
            break;
        case 'Wednesday':
            return 'Miercoles';
            break;
        case 'Thursday':
            return 'Jueves';
            break;
        case 'Friday':
            return 'Viernes';
            break;
        case 'Saturday':
            return 'Sabado';
            break;
    }
     
}

/*foreach ($income as $c => $record)
{
    echo"<br>";
    echo $record[0]->fecha;
}
*///echo"<pre>"; print_r($income); echo"</pre>";die();
?>
   <script>

          var base_url = "{{ url('Vercitas/'.$clinica.'/'.$especialidad ) }}";

    $(document).ready(function() {

     var month=parseInt("{{$current_month}}");
       var year=parseInt("{{$current_year}}");
       var options = $('#income option');

       $('input[name=year]').val(year);
       
       var values = $.map(options ,function(option) {
           
           if(month==option.value)
           {
               $('#option_'+month).prop("selected","selected");
               
           }
        }); 

      var SelectedDates ={!! json_encode($appointments_dates) !!};
        var resultado = [];
        $.each(SelectedDates,function(i,val){
            resultado[val] = val;
            console.log('aqui',val);
        }); 
        $("#calendar_curr_month").datepicker({
            dialog: true, 
            onSelect: function() { 
                var url = base_url+'/'+$(this).val();
                //console.log(url);
                location.href = url;
            },
            dateFormat: 'yy-mm-dd', 
            changeMonth: true, 
            changeYear: true,
            beforeShowDay: function(date) {
                //date = new Date(date);
                //console.log(date);
                //console.log('0'+date.getMonth()+'-0'+date.getDate()+'-'+date.getFullYear());
                var mes = date.getMonth()+1;
                console.log('messs',mes)
                if(mes<10){
                    console.log('mees',date.getMonth());
                    mes = '0'+mes;
                }
                var dia = date.getDate();
                if(date.getDate()<10){
                    console.log(date.getDate());
                    dia = '0'+dia;
                }
                console.log("aq",mes+'-'+dia+'-'+date.getFullYear())
                var Highlight = resultado[mes+'-'+dia+'-'+date.getFullYear()];
                //console.log(Highlight);
                if (Highlight) {
                    console.log('entre');
                    return [true, "Highlighted"];
                }
                else {
                    console.log('entre2');
                    return [true, '', ''];
                }
            },
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        });
         $("#calendar_curr_month").datepicker('setDate',"{!! $date !!}"); 
         

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


function buscar (){


    if($('#clinica').val() == 1){
           $('#especialidad option').remove();
     
            obj =[ 
                {id: 0, value: "seleccione.."},
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
                {id: 0, value: "seleccione.."},
                {id: 1, value: "endodoncia"},             ];
        
         for (var i in obj) {
                $("#especialidad").append($('<option></option>').val(obj[i].id).html(obj[i].value) );
               
            }
      
    }else{
        $('#especialidad option').remove();
             obj =[ 
                {id: 0, value: "seleccione.."},
                {id: 1, value: "cirugia"},
                {id: 2, value: "operatoria"},
             ];
        
         for (var i in obj) {
                $("#especialidad").append($('<option></option>').val(obj[i].id).html(obj[i].value) );
               
            }
      
    }

}

    </script>
    <style>
   /**{
        border: 1px solid red;
    }*/
    .legend
    {
        list-style: none;
    }
    
    .legend li
    {
        float:left;
        margin-right: 10px;
        
    }
    .legend span
    {
        border: 1px solid #ccc; 
        float: left;
        width: 12px;
        height: 12px;
        margin: 2px;
    }
    
    .legend .appointment_requested
    {
        background-color: green;        
    }
    .legend .current_date
    {
        background-color: #6eafbf;        
    }
    
    .modal-dialog {
     width: 60%; 
}
#plane
{
    background-color: white;
    color: black;
    font-weight: bold;
    font-size: 24px;
  
}


</style>
         
<div class="container-fluid col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:10px;padding-left:0" ></div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style=" margin-top:20px">
                
                    
       
                        
                  

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding-left:0;">
                            <select id="clinica" name="clinica" onchange="buscar()" class="form-control">
                                <option value="1">Clinica I</option>
                                <option value="2">Clinica II</option>
                                <option value="3">Clinica III</option>

                            </select>
                            <br>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding-left:0;">
                            <select id="especialidad" name="especialidad" class="form-control">
                                  </select>
                            <br>
                        </div>

                    
                
                <div class="rowcol-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="padding-left:0;border:none">
                <table class="table-striped" style="text-align:left;">
                    <tr>
                        <td class="white" colspan="3"><div style="font-size:18px;color:#696969;margin-top:5px"><span style="color: #3a9ecb;font-size:16px;font-weight: bold; ">Fecha: </span>{{ dayOfWeek() }} {{ date('Y-m-d') }}</div></td>
                    </tr>
                    <tr>
                        <td class="white" colspan="3"><div style="font-size:18px;color:#696969;margin-top:5px"><span style="color: #3a9ecb; font-size:16px;font-weight: bold; ">Hora: </span><span id="hour">{{ date('H:m') }}</span></div></td>
                    </tr>

                    <tr>
                        <td class="white" colspan="3"  style="border:1px solid #e7e7e7">
                            <div class="legend" style="font-size:16px;color:#696969;margin-left:2px;margin-top:5px">
                                <span class="appointment_requested" style=""></span>
                                Fechas de citas solicitadas
                            </div>
                        <td>

                    </tr>
                    <tr>
                        <td class="white" colspan="3"  style="border:1px solid #e7e7e7">
                            <div class="legend" style="font-size:16px;color:#696969;margin-left:2px;margin-top:5px">
                                <span class="current_date" style=""></span>
                                Fecha seleccionada
                            </div> 
                        </td>
                    </tr>
                    <script>
                        function startTime() {
                            var today = new Date();
                            var h = today.getHours();
                            var m = today.getMinutes();
                            var s = today.getSeconds();
                            m = checkTime(m);
                            s = checkTime(s);
                            document.getElementById('hour').innerHTML =
                            h + ":" + m + ":" + s;
                            var t = setTimeout(startTime, 1000);
                        }
                        function checkTime(i) {
                            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                            return i;
                        }
                        $(document).ready(function(){
                            startTime();

                        });
                        
                    </script>
                </table>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div id="calendar_curr_month" style=" margin-top:20px">
                    </div>                
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div id="calendar_prev_month" style=" margin-top:20px">
                    </div>
                </div>
            </div>
            <div style="    margin-top: 10%;" class="row col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
            <div> <center>LISTA DE PACIENTES CITADOS HASTA LA FECHA</center></div>
                        <div class="table-responsive" style="text-align:center">                       
                        <table class="table table-striped"  height="240px">
                        <thead class="titulo-lista" style="width:100%;position:relative">
                            <tr>
                                <td class="grey-light" style="width:1%;"></td>
                                <td class="grey-light" style="width:1%;"><strong>Nº</strong></td>    
                                <td class="grey-light" style="width:29%;"><strong>Apellidos y Nombre</strong></td>
                                 <td class="grey-light" style="width:10%;"><strong>Hora</strong></td>
                                 <td class="grey-light" style="width:29%;"><strong>Motivo</strong></td>
                                 <td class="grey-light" style="width:29%;"><strong>Estatus</strong></td>
                                   <td class="grey-light" style="width:29%;"><strong>Acciones</strong></td>
                                
                            </tr>
                        </thead>
                        <tbody class="list" id="tr" >
                            <?php
                            $counter=0;
                            foreach ($appointments as $c=>  $appointmentRecord) {
                               $counter++; 
                                ?>                                          
                                <tr style="min-height:450px"id="init_pos-<?php echo"$counter"; ?>" data-cita="<?php echo ($appointmentRecord->id_cita); ?>" data-fecha="<?php echo ($appointmentRecord->fecha_cita); ?>">
                                    <td style="width:1%;"><br/><br/><input type="radio" name="appointment_id" value="<?php echo $appointmentRecord->id_cita; ?>"></td>
                                    <td style="width:1%;"><br/><br/><?php echo"$counter"; ?></td>                         
                                    <td class="name" style="width:29%;"><br/><br/><?php echo "$appointmentRecord->apellido, $appointmentRecord->nombre"; ?></td>
                                    <td style="width:4%;"><br/><br/><?php echo (date("H:i", strtotime($appointmentRecord->hora)+ 60*60)); ?></td>
                                     <td style="width:10%;"><br/><br/><?php echo ($appointmentRecord->motivo); ?></td>
                                     <td><br/><br/>
                                        @if($appointmentRecord->estatus=='solicitada')
                                            <i class="glyphicon glyphicon-user" 
                                               data-toggle="tooltip" 
                                               title="En espera de paciente"></i>
                                        @elseif($appointmentRecord->estatus=='asistio')
                                            <i class="glyphicon glyphicon-check" 
                                               data-toggle="tooltip" 
                                               title="Asisti&oacute;"></i>
                                    
                                        @endif
                                          
                                    </td>
                                    <td style="width:4%;"> 
                                       
                                        <a class="btn btn-success btn-xs" href="#" id="try" onclick="edit_patient()" data-link="{{ url('/edit/paciente') }}">
                                            Editar
                                        </a>
                                        <a class="btn btn-success btn-xs" href="#" id="try" onclick="edit_patient()" data-link="{{ url('/edit/paciente') }}">
                                            Repro
                                        </a>
                                        <!-- Standard button -->
                                        <input type="hidden" name="_Token" value="{{ csrf_token() }}">
                                    </td>

                                </tr>
                            <?php } ?> 
                            @if($counter == 0)
                            <tr><td colspan="7">No hay citas registradas.</td><td></td></tr>
                            @endif
                        
                        </tbody>
                       
                    </table>

                </div>
</div>
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
 <script type="text/javascript">
    
            $('#especialidad').change(function () {
                console.log('mem meuv');
                var fecha ="{!! $date !!}";
                var clinica = $('#clinica').val();
                console.log("clini",clinica,fecha)

                if(fecha != ''){
                     var url = "{{url('/Vercitas')}}" + '/' +clinica+ '/' + $(this).val() + '/'+fecha;
                 }else{
                         var url = "{{url('/Vercitas')}}" + '/'  +clinica+ '/' + $(this).val();
              
                 }
                 location.href = url;
                
                    
            //location.href = url;
    });
            $(document).ready(function () {
                var val = "{!! $clinica !!}";
                var val2 = "{!! $especialidad !!}";
        console.log("es",val,val2)
            $('#clinica').val(val);
            $('#especialidad').val(especialidad);
                buscar();

    });
    </script>
    @endsection
