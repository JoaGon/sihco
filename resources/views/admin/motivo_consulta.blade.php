@extends('admin-layout.sidebarAdmin') @section('content')
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
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
                <div style="font-size: 20px; text-align: center; color:#59bddd;"> Motivo de la Consulta</div>
                <form class="form-horizontal" id="register_motivo" enctype="multipart/form-data" method="POST" action="{{ url('/motivo_consulta') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="consulta" value={ {$consulta}}>
                    <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
                    <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
                    <div col-lg-3 col-md-2 col-sm-6 col-xs-12>
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
                                <input class="form-control" id="fecha_consulta" type="text" class="form-control" name="fecha_consulta" value="{{ old('fecha_consulta') }}" data-validation="required" data-validation-error-msg="Introduzca una fecha">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="motivo" class="col-md-8 col-md-offset-1">Motivo de la Consulta</label>
                            <div class="col-md-8 col-md-offset-1">
                                <textarea class="form-control" cols="75" id="motivo" data-validation="required" data-validation-error-msg="Introduzca un motivo de la consulta" autofocus="true" rows="4" name="motivo"></textarea>
                                @if ($errors->has('motivo'))
                                <span class="help-block">
                        <strong>{{ $errors->first('motivo') }}</strong>
                      </span> @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="motivo" class="col-md-8 col-md-offset-1">Enfermedad Actual</label>
                            <div class="col-md-8 col-md-offset-1">
                                <textarea class="form-control" cols="75" id="enfermedad" data-validation="required" data-validation-error-msg="Introduzca una enfermedad actual de la consulta" autofocus="true" rows="4" name="enfermedad"></textarea>
                                @if ($errors->has('enfermedad'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('enfermedad') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" onclick="insertar_motivo()" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Registrar
                            </button>
                            <!--button type="submit" onclick="motive_submit('{{$paciente->id_paciente}}', '{{$paciente->nro_historia}}')" class="btn btn-primary">
                  Guardar
                </button-->
                            <!--  <a class="btn btn-link" href="{{ url('/password/reset') }}" style="color:#3c763d">Olvido su contraseña?</a>-->
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                    @endforeach
                </form>
            </div>
            <a id="info" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Información Guardada" data-content="Los datos del paciente fueron guardados"></a>
            <!-- /.row -->
        </div>
    </div>
</div>
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

function popover_show() {
    $('#info').popover('show');
    setTimeout(function() {
        $('#info').popover('hide');
    }, 1500);
}

function insertar_motivo() {

    $('#register_motivo').submit();

}
</script>
@endsection
