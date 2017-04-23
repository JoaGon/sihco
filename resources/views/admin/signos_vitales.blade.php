@extends('admin-layout.sidebarAdmin')

@section('content')

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
      <div class="col-lg-12 col-md-offset-1">

      @if(session('status'))
        <div class="alert alert-success text-center notification">
            <ul style="list-style:none;">

                <li style="font-size:16px;">{{ session('status') }}</li>

            </ul>
        </div>
      @endif
     
                @foreach ($pacientes as $paciente)
    
      <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">    
        
                
                <div style="font-size: 20px; text-align: center; color:#59bddd;"> Signos Vitales</div>
                    
               <form class="form-horizontal" id="form_familiares" role="form" method="POST" action="{{ url('/signos_vitales') }}">
                {{ csrf_field() }}
                <input type="hidden" name="consulta_id" value=<?php echo $consulta; ?> >
                <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
                <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
               
                <div class="form-group">  
                    <div class="col-md-4">              
                    <label for="motivo">Nombre</label>
                               <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="nombre">{{$paciente->nombre }} {{ $paciente->apellido }}</textarea>
                    </div>  
                    <div class="col-md-4">    
                      <label for="motivo" class="">C.I:</label>           
                                <textarea class="form-control"  disabled cols="75" autofocus="true" rows="1" name="ci">{{ $paciente->ci }}</textarea>

                    </div>
                    <div class="col-md-4">
                    <label for="motivo" class="">Fecha Consulta</label>            
                                    <input class="form-control" id="fecha_consulta" type="text" class="form-control" name="fecha_consulta" value="{{ old('fecha_consulta') }}">
                     </div>       
                </div>
                <div class="row row_border ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Presion Sanguinea                           
                                <input type="text" style="color: black; margin: 15px" name="presion_sanguinea" id="enfer_cardiov" >mm/Hg
                                </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Pulso
                                <input type="text" style="color: black; margin: 15px" name="pulso" id="enfer_renal" >p/min
                            </div>
                            </div>
                <div class="row row_border ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Temperatura
                                <input type="text" style="color: black; margin: 15px" name="temperatura" id="enfer_cardiov" >C                       
                                </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Frecuencia Respiratoria
                                <input type="text" style="color: black; margin: 15px" name="frecuencia_respiratoria" id="enfer_renal" ">ppm
                            </div>
                           
                  </div>
              
            

            <div class="form-group">

              <div class="col-md-6 col-md-offset-4">
              <button type="submit" onclick="$('#form_familiares').submit();" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i> Registrar
            </button>
             <button type="submit" href="{{ url('antecedente_personal')}}" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i> Siguiente
            </button>
                <!--button type="submit" onclick="motive_submit('{{$paciente->id_paciente}}', '{{$paciente->nro_historia}}')" class="btn btn-primary">
                  Guardar
                </button-->

                <!--  <a class="btn btn-link" href="{{ url('/password/reset') }}" style="color:#3c763d">Olvido su contraseña?</a>-->
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

$(document).ready(function () {
  $("#fecha_consulta").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
  $(".notification").fadeTo(3000, 500).slideUp(500, function(){
      $(".notification").slideUp(500);
  });
  var monkeyList = new List('pacientes', {
    valueNames: ['name'],
    page: 3,
    pagination: true
  });

var monthNames = [ "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December" ];
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

var newDate = new Date();
newDate.setDate(newDate.getDate() + 1);    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());


 });
  
</script>

@endsection
