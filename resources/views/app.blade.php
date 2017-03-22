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
  @if( Auth::user()->rol_id == 4 )
    <nav class="navbar navbar-default navbar-static-top" style="background: #b57fd0">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nombre }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>

                </ul>
            </div>
        </div>
    </nav>
    @endif

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
