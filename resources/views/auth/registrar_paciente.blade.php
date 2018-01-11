    @extends('admin-layout.sidebarAdmin')

    @section('content')




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
            <div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-1">
                <div class="panel panel-default" style="margin-top: 15px">
                    <div class="panel-heading">Registrar Paciente</div>
                     <p> *Nota: todos los campos son obligatorios</p>
                    <div class="panel-body">
                        <form class="form-horizontal" id="register_patient" role="form" method="POST" action="{{ url('/auth/paciente/registrado') }}">
                            {{ csrf_field() }}

                            <div class="form-group" style="margin-right: 10px">

                              <div class="col-md-4">
                               <label for="nombre" class="">Nombre</label>
                               <input id="nombre" type="text" data-validation="required" data-validation-error-msg="Debe Introducir un nombre" class="form-control" name="nombre" value="{{ old('nombre') }}">

                               @if ($errors->has('nombre'))
                               <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif  

                        </div>
                         <div class="col-md-4">
                            <label for="apellido" class="">Apellido</label>

                            <input id="apellido" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir el apellido" name="apellido" value="{{ old('apellido') }}">

                            @if ($errors->has('apellido'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                        <label for="ci" class="">Cedula</label>

                        <input id="ci" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir la Cedula de Identidad" name="ci" value="{{ old('ci') }}">

                        @if ($errors->has('ci'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ci') }}</strong>
                        </span>
                        @endif
                        </div>
                       

                   
                </div>

                <div class="form-group" style="margin-right: 10px">

                
                <div class="col-md-4">
                   <label for="telefono" class="">Telefono</label>

                   <input id="telefono" type="text" class="form-control"  name="telefono" value="{{ old('telefono') }}">

                   @if ($errors->has('telefono'))
                   <span class="help-block">
                    <strong>{{ $errors->first('telefono') }}</strong>
                </span>
                @endif
            </div>
                  <div class="col-md-4">
                   <label for="nivel_educacional" class="">Nivel Educacional</label>

                     <select class="form-control" id="nivel_educacional"  data-validation="required" data-validation-error-msg="Debe ingrear un valor" name="nivel_educacional" value="{{ old('nivel_educacional') }}">
                            <option value="" selected>Selecione..</option>
                                      @foreach($niveles as $nivel)

                                      <option value="{{$nivel->id_valor}}">
                                          {{$nivel->valor}}
                                      </option>
                                      @endforeach

                        </select>
                    @if ($errors->has('nivel_educacional'))
                   <span class="help-block">
                    <strong>{{ $errors->first('nivel_educacional') }}</strong>
                </span>
                @endif

                </div>  
                  <div class="col-md-4">
              <label for="ocupacion" class="">Ocupacion</label>

              <textarea id="ocupacion" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir una Ocupacion" name="ocupacion" value="{{ old('ocupacion') }}"></textarea>

              @if ($errors->has('ocupacion'))
              <span class="help-block">
                <strong>{{ $errors->first('ocupacion') }}</strong>
            </span>
            @endif
            </div>

             

            </div>

              
            <div class="form-group" style="margin-right: 10px" >
               <div class="col-md-4">     
                   <label for="email" class="">Lee / Escribe</label>

                  <select class="form-control" id="lee_escribe"  data-validation="required" data-validation-error-msg="Debe ingrear un valor" name="lee_escribe" value="{{ old('lee_escribe') }}">
        <option value="" selected>Selecione..</option>

                             @foreach($lees as $lee)
                                      <option value="{{$lee->id_valor}}">
                                          {{$lee->valor}}
                                      </option>
                                      @endforeach

                        </select>
                 @if ($errors->has('email'))
                   <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
           
            <div class="col-md-4">

                <label for="sexo" class=""> Genero</label>

                <select class="form-control" id="sexo"  data-validation="required" data-validation-error-msg="Debe Introducir un Genero" name="sexo" value="{{ old('sexo') }}">
                    <option value="" selected>Selecione..</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
            </div> 
             <div class="col-md-4">

                        <label for="direccion" class="">Direccion</label>

                        <textarea id="direccion" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir una Direccion" name="direccion" value="{{ old('direccion') }}"></textarea>
                        @if ($errors->has('direccion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </span>
                        @endif
                    </div> 
            </div>
                 <div class="form-group" style="margin-right: 10px">
        <div class="col-md-4">
                          <label for="fecha_nacimiento" class="">Fecha de Nacimiento</label>

                          <input id="fecha_nacimiento" type="text" placeholder="yyyy-mm-dd"  data-validation="date" data-validation-error-msg="Debe escribir en formato correcto"  data-validation-format="yyyy-mm-dd" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">

                          @if ($errors->has('fecha_nacimiento'))
                          <span class="help-block">
                            <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                        </span>
                        @endif


                    </div>


        <div class="col-md-4">

            <label for="celular" class="">Celular</label>


            <input id="celular" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir un numero Celular" name="celular" value="{{ old('celular') }}">

            @if ($errors->has('celular'))
            <span class="help-block">
                <strong>{{ $errors->first('celular') }}</strong>
            </span>
            @endif
            </div>

        <div class="col-md-4">
        <label for="grupo_sanguineo" class="">Grupo Sanguineo</label>
 <select class="form-control" id="grupo_sanguineo"   name="grupo_sanguineo" value="{{ old('grupo_sanguineo') }}">
       
        <option value="" selected>Selecione..</option>
            <option value="A+">A+</option>
            <option value="B+">B+</option>
            <option value="AB+">AB+</option>
            <option value="O+">O+</option>
             <option value="A-">A-</option>
            <option value="B-">B-</option>
            <option value="AB-">AB-</option>
            <option value="O-">O-</option>
</select>
        @if ($errors->has('grupo_sanguineo'))
        <span class="help-block">
            <strong>{{ $errors->first('grupo_sanguineo') }}</strong>
        </span>
        @endif
        </div>
        </div>
        
            
        <div class="form-group" style="margin-right: 10px">
           <div class="col-md-4"> 
        <label for="zona_residencia" class="">Zona de Residencia</label>

         <select class="form-control" id="zona_residencia"  data-validation="required" data-validation-error-msg="Debe introducir una zona" name="zona_residencia" value="{{ old('zona_residencia') }}">
        <option value="" selected>Selecione..</option>

                         @foreach($zonas as $zona)
                          <option value="{{$zona->id_valor}}">
                              {{$zona->valor}}
                          </option>
                          @endforeach

        </select>
       
        @if ($errors->has('zona_residencia'))
        <span class="help-block">
            <strong>{{ $errors->first('zona_residencia') }}</strong>
        </span>
        @endif  
        </div>
         <div class="col-md-4">
           <label for="lugar_nacimiento" class="">Lugar de Nacimiento</label>
           <input id="lugar_nacimiento" type="text" data-validation="required" data-validation-error-msg="Debe Introducir un nombre" class="form-control" name="lugar_nacimiento" value="{{ old('lugar_nacimiento') }}">

           @if ($errors->has('lugar_nacimiento'))
           <span class="help-block">
            <strong>{{ $errors->first('lugar_nacimiento') }}</strong>
        </span>
        @endif  

    </div>
       
        <div class="col-md-4">
        <label for="estado_civil" class="">Estado Civil</label>

        <select class="form-control" id="estado_civil"  data-validation="required" data-validation-error-msg="Debe Introducir un Estado Civil" name="estado_civil" value="{{ old('estado_civil') }}">
            <option value="" selected>Selecione..</option>
            <option value="s">Soltero/a</option>
            <option value="c">Casado/a</option>
            <option value="d">Divorciado/a</option>
            <option value="v">Viudo/a</option>

        </select>
        @if ($errors->has('estado_civil'))
        <span class="help-block">
            <strong>{{ $errors->first('estado_civil') }}</strong>
        </span>
        @endif
        </div>


        </div >
         <div class="form-group" style="margin-right: 10px">
         <div class="col-md-4">
        <label for="fecha_ingreso" class="">Fecha de Ingreso</label>

        <input id="fecha_ingreso" type="text"  data-validation="required" data-validation-error-msg="Debe Introducir una fecha de Ingreso" class="form-control" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}">

        @if ($errors->has('fecha_ingreso'))
        <span class="help-block">
            <strong>{{ $errors->first('fecha_ingreso') }}</strong>
        </span>
        @endif
        </div>

        <div class="col-md-4">
        <label for="convive" class="">Convive</label>

        <select class="form-control" id="convive"  data-validation="required" data-validation-error-msg="Debe seleccionar un valor" name="convive" value="{{ old('estado_civil') }}">
             @foreach($convives as $convive)
              <option value="{{$convive->id_valor}}">
                  {{$convive->valor}}
              </option>
              @endforeach

        </select>
        @if ($errors->has('convive'))
        <span class="help-block">
            <strong>{{ $errors->first('convive') }}</strong>
        </span>
        @endif
        </div>

        <div class="col-md-4">
        <label for="situacion_laboral" class="">Situacion Laboral</label>

        <select class="form-control" id="situacion_laboral"  data-validation="required" data-validation-error-msg="Debe seleccionar un valor" name="situacion_laboral" value="{{ old('estado_civil') }}">
        <option value="" selected>Selecione..</option>
        
           @foreach($situaciones as $situacion)
              <option value="{{$situacion->id_valor}}">
                  {{$situacion->valor}}
              </option>
          @endforeach

        </select>
        @if ($errors->has('situacion_laboral'))
        <span class="help-block">
            <strong>{{ $errors->first('situacion_laboral') }}</strong>
        </span>
        @endif
        </div>
        </div>

         <div class="col-lg-12" style="text-align: center;">
    
    <label>Datos del Familiar</label>
    </div>
    <hr class="col-lg-12" style="border-top: 3px solid #6d6262 !important; width:90%!important;">
   

<div class="form-group" style="margin-right: 10px">
          
            <div class="col-md-4">
                <label for="familiar_cercano" class="">Nombre de Familiar mas cercano</label>

                <input id="familiar_cercano" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir un Nombre" name="familiar_cercano" value="{{ old('familiar_cercano') }}">

                @if ($errors->has('familiar_cercano'))
                <span class="help-block">
                    <strong>{{ $errors->first('familiar_cercano') }}</strong>
                </span>
                @endif
            </div>
            <div class="col-md-4">
                <label for="telefono_familiar" class="">Telefono Familiar</label>

                <input id="telefono_familiar" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir un numero de Telefono" name="telefono_familiar" value="{{ old('telefono_familiar') }}">

                @if ($errors->has('telefono_familiar'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefono_familiar') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-md-4">
                  <label for="direccion_familiar" class="">Direcion (familiar cercano)</label>

                  <textarea id="direccion_familiar" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir una Direccion" name="direccion_familiar" value="{{ old('direccion_familiar') }}"></textarea>

                  @if ($errors->has('direccion_familiar'))
                  <span class="help-block">
                    <strong>{{ $errors->first('direccion_familiar') }}</strong>
                </span>
                @endif  
                </div>
            </div>
        <div class="form-group" style="margin-right: 10px">
     <div class="col-md-4">
        <label for="parentesco" class="">Parentesco</label>

        <input id="parentesco" type="text" class="form-control"  data-validation="required" data-validation-error-msg="Debe Introducir un parentesco" name="parentesco" value="{{ old('parentesco') }}">

        @if ($errors->has('parentesco'))
        <span class="help-block">
            <strong>{{ $errors->first('parentesco') }}</strong>
        </span>
        @endif
        </div>
         
</div>

         <div class="form-group">
        <div class="col-md-6 col-md-offset-4">

            <button type="submit" onclick="$('#register_patient').submit();" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i> Registrar Paciente
            </button>
        </div>
    </div>


   
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ url('js/form-validator/jquery.form-validator.min.js') }}"></script>



    <script>

      $(document).ready(function () {
      /*  $("#fecha_nacimiento").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});*/
        $("#fecha_ingreso").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});

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
