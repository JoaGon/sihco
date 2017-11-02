@extends('admin-layout.sidebarAdmin')

@section('content')

<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">

 <link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

 

@if(session('user_registered'))
<div class="alert alert-success text-center notification">
    <ul style="list-style:none;">

        <li style="font-size:16px;">{{ session('user_registered') }}</li>

    </ul>
</div>
@endif

@if(session('duplicated_user'))
<div class="alert alert-danger notification text-center">
    <ul style="list-style:none;">

        <li style="font-size:16px;">{{ session('duplicated_user') }}</li>

    </ul>
</div>
@endif

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 15px">
                <div class="panel-heading">Registrar Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="register_user_form" role="form" method="POST" action="{{ url('/auth/registrar') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" data-validation="required" data-validation-error-msg="Debe Introducir un nombre" name="nombre" value="{{ old('nombre') }}">

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label for="apellido" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control" data-validation="required" data-validation-error-msg="Debe Introducir un apellido" name="apellido" value="{{ old('apellido') }}">

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                            <label for="ci" class="col-md-4 control-label">Cedula</label>

                            <div class="col-md-6">
                                <input id="ci" type="text" class="form-control" data-validation="required" data-validation-error-msg="Debe Introducir una Cedula" name="ci" value="{{ old('ci') }}">

                                @if ($errors->has('ci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                            <label for="fecha_nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="text" class="form-control" data-validation="date" data-validation-error-msg="Debe Introducir una Fecha Valida" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">

                                @if ($errors->has('fecha_nacimiento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sexo') ?  ' has-error' : '' }}" >
                            <label for="sexo" class="col-md-4 control-label"> Genero</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="sexo" data-validation="required" data-validation-error-msg="Debe Introducir un genero" name="sexo" >
                                        <option value="" selected>Selecione..</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                        </div>

                      <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Direccion</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text" data-validation="required" data-validation-error-msg="Debe Introducir una Direccion" class="form-control" name="direccion" value="{{ old('direccion') }}">

                                    @if ($errors->has('direccion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                      </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" data-validation="required" data-validation-error-msg="Debe Introducir un numero de Telefono" name="telefono" value="{{ old('telefono') }}">

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            <label for="celular" class="col-md-4 control-label">Celular</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control" data-validation="required" data-validation-error-msg="Debe Introducir un numero Celular"name="celular" value="{{ old('celular') }}">

                                @if ($errors->has('celular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('rol_id') ?
                            ' has-error' : '' }}" >
                            <label for="rol_id" class="col-md-4 control-label">
                                Tipo de usuario</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="rol_id" data-validation="required" data-validation-error-msg="Debe Seleccionar una opcion" name="role" >
                                      <option value="" selected>Selecione..</option>
                                      @foreach($roles as $rol)
                                      <option value="{{$rol->id_rol}}">
                                          {{$rol->rol_name}}
                                      </option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('valor_id') ?
                                ' has-error' : '' }}" >
                                <label for="valor_id" class="col-md-4 control-label">
                                    Estatus</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="valor_id"  data-validation="required" data-validation-error-msg="Debe Seleccionar una opcion"  name="valor_id" >
                                            <option value="" selected>Selecione..</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                          </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección de correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" data-validation="email" data-validation-error-msg="Debe Introducir un Email valido"  name="email" value="{{ old('email') }}">

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
                                <input id="password" type="password" class="form-control" data-validation="required" data-validation-error-msg="Debe introducir una Contraseña"  name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div-->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <p>*Nota: todos los campos son obligatorios</p>
                                <button type="submit" onclick="$('#register_user_form').submit();"  class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
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
  <script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{ url('js/form-validator/jquery.form-validator.min.js') }}"></script>
  

<script>

$(document).ready(function () {
  $("#fecha_nacimiento").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});

  $(".notification").fadeTo(3000, 500).slideUp(500, function(){
      $(".notification").slideUp(500);
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

</script>

@endsection
