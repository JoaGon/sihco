<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

      <script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>

      <script src="{{url('jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
      <!-- Bootstrap Core CSS -->
      <link href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    
    <link href="{{url('jquery-ui-1.12.1.custom/jquery-ui.css')}}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>

<body id="app-layout">

    
          <nav class="navbar navbar-default navbar-static-top" id="barra" role="navigation" style="margin-bottom: 0; background: #68ada1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/')}}">SIHCO v2.0</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Ver Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }} "><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>

    @yield('content')

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <!-- Bootstrap Core JavaScript -->
  <script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{url('bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

  <!-- DataTables JavaScript -->
  <script src="{{url('bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

</body>
</html>
