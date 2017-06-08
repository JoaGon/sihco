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
             @endif
            <div class="panel panel-default" style="margin-top: 15px;">
                <div class="panel-heading">
                     Seleccione el Paciente
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" id="pacientes">
                    <input type="text" placeholder="Buscar Paciente" style="margin: 10px;" class="search"/>
                    <button class="sort" data-sort="name">
                    Ordenar por Nombre </button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>
                                Nro Historia
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Apellido
                            </th>
                            <th>
                                C.I
                            </th>
                        </tr>
                        </thead>
                        <tbody class="list">
                         @foreach($pacientes as $paciente)
                        <tr>
                            <td>
                                <strong>
                                <a href="{{ url('consulta_paciente/'.$paciente->nro_historia) }}" class="btn btn-link" style="font-weight: bold" data-toggle="tooltip" title="Cita"> {{$paciente->nro_historia}} </a>
                                </strong>
                            </td>
                            <td class="name">
                                {{$paciente->nombre}}
                            </td>
                            <td>
                                {{$paciente->apellido}}
                            </td>
                            <td>
                                {{$paciente->ci}}
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
$(document).ready(function () {
  $("#nacimiento_edit").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
  $("#ingreso_edit").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
  $(".notification").fadeTo(3000, 500).slideUp(500, function(){
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