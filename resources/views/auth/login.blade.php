@extends('layouts.app')

@section('content')
<style type="text/css">
    
    .navbar-default {
    background-color: #993399 !important;
    border-color: #993399 !important;
    color: black;
}
.navbar-default .navbar-brand {
    color: white !important;
}
.navbar-default .navbar-nav>li>a {
    color: white;
}
</style>
<section style="height: 700px">
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <img style="width: 100%;height: 150px;" src="{{url('landing/img/Odo_hcgf.png')}}">

        <p style="margin-top:10%; font-size: 1.2em; text-align: justify; ">La Facultad de Odontolog&iacute;a tiene como propósito formar integralmente a los profesionales de la odontología y al personal técnico mediante la integración de las áreas docencia-asistencial, investigación y extensión en los niveles de pregrado y postgrado; caracterizados por ser de alta calidad y prestigio, con sensibilidad social y calor humano, valores éticos y universales, críticos y generadores de conocimientos; capaces de prevenir y dar respuesta a las necesidades de salud bucal como parte de la salud general de la población en el ámbito regional, nacional e inclusive internacional
        </p>

    </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Acceder</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Direccion E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button style="background-color: #993399 !important; color: white" type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Entrar
                                </button>

                                <a style=" color: black"  class="btn btn-link" href="{{ url('/password/reset') }}">Olvido su Contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<section style="height: 150px; background-color: #993399">
    <!-- Main Footer -->
<footer class="main-footer" >
    <!-- To the right -->
    <div class="">
    <div class="col-md-4">
        
        <img style="width: 30%" src="{{url('landing/img/odontología-diapo.png')}}">
     <a href="#" style="font-size: 15px; color: white"></a><b style="font-size: 15px; color: white">Facultad de Odontolog&iacute;a. </b></a>
 
    </div>
      </div>
    <!-- Default to the left -->
    <div class="col-md-6" style="    float: right;
    margin-top: 4%;">
         <strong style="font-size: 13px; color: white">Copyright &copy; 2017. Universidad de Los Andes. M&eacute;rida, Venezuela
    </div>
   
</footer>
</section>
@endsection
