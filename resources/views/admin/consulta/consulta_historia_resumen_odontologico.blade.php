@extends('admin-layout.sidebarAdmin') @section('content')
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ url('bootstrap-submenu-2.0.4/dist/css/bootstrap-submenu.min.css') }}">
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
            <div class="form-group">
                <div class="col-md-4">
                    <label for="motivo">Nombre</label>
                    <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="nombre">{{$paciente->nombre }} {{ $paciente->apellido }}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="motivo" class="">C.I:</label>
                    <textarea class="form-control" disabled cols="75" autofocus="true" rows="1" name="ci">{{ $paciente->ci }}</textarea>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                <div style="font-size: 20px; text-align: center; color:#59bddd;">
                    Resumen Historia Odontologica
                </div>
                <div class="panel-body" id="consultas">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>
                                        ID resumen
                                    </th>
                                    <th>
                                        Nro Consulta
                                    </th>
                                    <th>
                                        Atendido Por
                                    </th>
                                    <th>
                                        Fecha
                                    </th>

                                     <th>
                                        Estatus
                                    </th>                                    
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($antecedentes as $ante)
                                <tr>
                                    <td>
                                        <strong>
                                <a href="{{ url('consulta_resumenodontologico/'.$ante->id_resumen_historia_odontologica.'/'.$ante->paciente_id) }}" class="btn btn-link" style="font-weight: bold" data-toggle="tooltip" title="Cita"> {{$ante->id_resumen_historia_odontologica}} </a>
                                </strong>
                                    </td>
                                    <td class="name">
                                        {{$ante->consulta_id}}
                                    </td>
                                    <td>
                                        {{$ante->nombre}} {{$ante->apellido}}
                                    </td>
                                    <td>
                                        {{$ante->fecha}}
                                    </td>
                                   <td>

                                    @if ($ante->validar == 1)
                                        Validado
                                    @else
                                    No Validado
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- table responsive -->
                    <ul class="pagination">
                    </ul>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
              
                        <a type="submit" href="{{ url('consulta_paciente', array($paciente->nro_historia)) }}" class="btn btn-primary">
                            Volver </a>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
<!-- jQuery -->
<script src="{{url('template/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('js/list.min.js')}}"></script>
<script src="{{ url('bootstrap-submenu-2.0.4/dist/js/bootstrap-submenu.min.js')}}" defer></script>
<script>
$(document).ready(function() {
    
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
    var monkeyList = new List('pacientes', {
        valueNames: ['name'],
        page: 3,
        pagination: true
    });
    $('[data-submenu]').submenupicker();
});
// #myInput is a <input type="text"> element
</script>
@endsection
