<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIHCO</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('template/vendor/metisMenu/metisMenu.min.css') }} " rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('template/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('template/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{url('jquery-ui-1.12.1.custom/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{ url('js/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{ url('js/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{ url('js/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">

</head>

<body id="app-layout">

    <div id="wrapper">

        <!-- Navigation -->
        @if( Auth::user()->rol_id == 1 )
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
        @endif

        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" style=" margin-top: -0.5px;" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{ url('/usuarios') }}"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                    </li>
                    <li>
                        <a href="{{ url('/auth/registrar') }}"><i class="fa fa-edit fa-fw"></i> Registrar Usuario</a>
                    </li>
                    <li>
                        <a href="{{ url('/pacientes') }}"><i class="fa fa-user-md   fa-fw"></i> Pacientes</a>
                    </li>
                    <li>
                        <a href="{{ url('/auth/registrar/paciente') }}"><i class="fa fa-edit   fa-fw"></i> Registrar Paciente</a>
                    </li>
                    <!--li>
                            <a href="{{ url('/consulta') }}"><i class="fa fa-edit   fa-fw"></i> Anexar a la Historia</a>
                        </li-->
                    <!--li>
                            <a ><i class="fa fa-edit   fa-fw"></i> Anexar a la Historia<span class="fa arrow" ></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">I al VII <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ url('/consulta') }}">I y II)Motivo de la Consulta/ Enfer. Actual</a>
                                        </li>
                                        <li>
                                            <a href="#">III) Ant. Familiares</a>
                                        </li>
                                        <li>
                                            <a href="#">IV) Ant. Personales </a>
                                        </li>
                                        <li>
                                            <a href="#">V) Datos Clinicos Seleccionados</a>
                                        </li>
                                        <li>
                                            <a href="#">VI) Signos Vitales</a>
                                        </li>
                                        <li>
                                            <a href="#">VII) Historia Odontologica</a>
                                        </li>
                                        <li>
                                            <a href="#">Res. Historia Medica</a>
                                        </li>
                                        <li>
                                            <a href="#">Res. Historia Odontologica</a>
                                        </li>
                                    </ul>                                
                                    </li>
                                <li>
                                    <a href="#">VIII al XIII</a>
                                </li>
                                 <li>
                                    <a href="#">XIII al XXIV</a>
                                </li>
                                <li>
                                    <a href="#">Diagnostico</a>
                                </li>      
                                <li>
                                    <a href="#">Tratamiento</a>
                                </li>   
                                <li>
                                    <a href="#">Cita</a>
                                </li>   
                                <li>
                                    <a href="#">Ayuda</a>
                                </li>   
                                <!--li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                    <!--/li-->
                    <!--/ul>
                            <!-- /.nav-second-level -->
                    <!--/li-->
                    <li>
                        <a href="{{ url('/consulta') }}"><i class="fa fa-dashboard fa-fw"></i> Anexar a la Historia</a>
                    </li>
                    <li>
                        <a href="{{ url('/index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/flot') }}">Flot Charts</a>
                            </li>
                            <li>
                                <a href="{{ url('/morris') }}">Morris.js Charts</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ url('/tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
                    </li>
                    <li>
                        <a href="{{ url('forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('panels')}}">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="{{ url('/notifications') }} ">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="{{ url ('/icons') }} "> Icons</a>
                            </li>
                            <li>
                                <a href="{{ url('/grid') }}">Grid</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
    </div>
    <!-- /.navbar-static-side -->

    @yield('content')
    <!-- jQuery -->
    <script src="{{ url('template/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('template/vendor/metisMenu/metisMenu.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ url('template/dist/js/sb-admin-2.js')}}"></script>
    <script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('js/form-validator/jquery.form-validator.min.js') }}"></script>
    <script src="{{url('jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{ url('js/pnotify/dist/pnotify.js')}}"></script>
    <script src="{{ url('js/pnotify/dist/pnotify.buttons.js')}}"></script>
    <script src="{{ url('js/pnotify/dist/pnotify.nonblock.js')}}"></script>
    <script src="{{ url('js/form-validator/jquery.form-validator.min.js') }}"></script>
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

        });
    </script>
</body>

</html>