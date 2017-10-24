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

<!-- Morris Charts CSS -->
<link href="template/vendor/morrisjs/morris.css" rel="stylesheet">
<!-- Morris Charts JavaScript -->
<script src="template/vendor/raphael/raphael.min.js"></script>
<script src="template/vendor/morrisjs/morris.min.js"></script>

<script src="{{url('js/graficas.js')}}"></script>
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
               
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Seleccione el rango de fecha</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


<div  class="row" style="margin-bottom: 15px" >
<div class="col-md-4">
                  <label>Desde</label>
                 
                  <input type="text" class="form-control" name="datepicker1" id="datepicker1">

</div>


<div class="col-md-4">
                  <label>Hasta</label>
                 
                    <input type="text" class="form-control"  name="datepicker2" id="datepicker2">
</div>
<div class="col-md-4">
                   <button type="button" onclick="buscar()" class="btn btn-default dropdown-toggle">
                                Buscar
                        </button>
</div>
</div>
  <form id="area1">
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Citas Registrados
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Accion
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a name="imprimir" target="_blank" value="Imprimir" onclick="printDiv('area1')">Imprimir</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                  
        </div>
          <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Pacientes 
                             <ul id="list10">
                            </ul> 
                    <!-- table responsive -->
                </div>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                  
        </div>
        <!-- /.col-lg-12 -->
        </form>
    </div>
    <!-- /.row -->
</div>
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
   
  $("#datepicker1").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true,
onSelect: function(dateText, inst){
     $("#datepicker2").datepicker("option","minDate",
     $("#datepicker1").datepicker("getDate"));
  }});
  $("#datepicker2").datepicker({

    dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true,



});
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
function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;
   

      var WindowObject = window.open("", "PrintWindow",
    "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.writeln(contenido);
    WindowObject.document.close();
    WindowObject.focus();
    WindowObject.print();
    WindowObject.close();

     //document.body.innerHTML = contenidoOriginal;
}
// #myInput is a <input type="text"> element

</script>
@endsection