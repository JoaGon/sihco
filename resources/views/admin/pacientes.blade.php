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
        <div class="col-lg-10 col-sm-8 col-xs-8 col-sm-offset-4 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
            @if(session('status'))
            <div class="alert alert-success text-center notification">
                <ul style="list-style:none;">
                    <li style="font-size:16px;">{{ session('status') }}</li>
                </ul>
            </div>
            @endif
            <div class="panel panel-default" style="margin-top: 15px;">
                <div class="panel-heading">
                    Pacientes
                </div>
                <!-- /.panel-heading -->
                <div id="paciente_table" class="panel-body">
                    <div class="table-responsive">
                        <input type="text" placeholder="Buscar Paciente" style="margin: 10px;" class="search" />
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <button class="sort" data-sort="name, ci">
                                Ordenar Por Nombre
                            </button>
                            <thead>
                                <tr>
                                    <th>Hist. Nro</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Sexo</th>
                                    <th>C.I</th>
                                    <th>Celular</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Direccion</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($pacientes as $paciente)
                                <tr>
                                    <td>{{$paciente->nro_historia}}</td>
                                    <td class="name">{{$paciente->nombre}}</td>
                                    <td>{{$paciente->apellido}}</td>
                                    <td>{{$paciente->genero}}</td>
                                    <td class="ci">{{$paciente->ci}}</td>
                                    <td>{{$paciente->celular}}</td>
                                    <td>{{$paciente->fecha_nacimiento}}</td>
                                    <td>{{$paciente->direccion}}</td>
                                    <td>{{$paciente->fecha_ingreso}}</td>
                                    <td>
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'POST', 'url' => array('paciente/delete', $paciente->id_paciente))) !!}
                                        <a class="btn btn-success btn-xs" href="#" id="try" onclick="edit_patient('{{$paciente->id_paciente}}')" data-link="{{ url('/edit/paciente') }}">
                                            Editar
                                        </a> {!! Form::submit('Borrar', array('class' => 'btn btn-danger btn-xs')) !!} {!! Form::close() !!}
                                        <!-- Standard button -->
                                        <input type="hidden" name="_Token" value="{{ csrf_token() }}">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                        <ul class="pagination">
                        </ul>
                    </div>
                    <!-- table responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Datos del Paciente</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <form class="form-horizontal" id="edit_patient_form" role="form" method="POST" action="{{ url('/paciente/edit') }}">
                            {{ csrf_field() }}
                            <input style="display:none" type="text" class="form-control" id="id_edit" name="id_edit">
                            <input style="display:none" type="text" class="form-control" id="persona_id" name="persona_id">
                            <div class="form-group">
                                <div class="form-group col-md-4">
                                   <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Nro Historia</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" class="form-control" disabled name="nro_edit" id="nro_edit" placeholder="numero de historia">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="col-sm-2 control-label">Nombre</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir un nombre" class="form-control" id="name_edit" name="name_edit" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                   <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Apellido</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" data-validation="required" data-validation-error-msg="Debe Introducir el apellido" type="text" class="form-control" name="apellido_edit" id="apellido_edit" placeholder="Apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group  col-md-4">
                                   <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Cedula</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir la Cedula de Identidad" class="form-control" name="cedula_edit" id="cedula_edit" placeholder="Nro de Cedula">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                   <div class="col-md-10">
                                        <label for="name_edit" class="control-label">Sexo</label>
                                    
                                    <div>
                                        <select class="form-control" data-validation="required" data-validation-error-msg="Debe Introducir un Genero" name="sexo_edit" class="form-control" id="sexo_edit">
                                            <option value="">Seleccione...</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                           


                                <div class="form-group col-md-4 ">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Telefono</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" data-validation="required" data-validation-error-msg="Debe Introducir un numero de Telefono" type="text" class="form-control" name="telefono_edit" id="telefono_edit" placeholder="Nro de Telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-4">
                                 <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Celular</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir un numero Celular" class="form-control" name="celular_edit" id="celular_edit" placeholder="Nro de Cedular">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Direccion</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir una Direccion" class="form-control" name="direccion_edit" id="direccion_edit" placeholder="Direccion">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                     <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Grupo sanguineo</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="grupo_sanguineo" data-validation="required" data-validation-error-msg="Debe seleccionar un valor" name="grupo_sanguineo" value="{{ old('grupo_sanguineo') }}">
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
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Estado civil</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="estado_civil" data-validation="required" data-validation-error-msg="Debe Introducir un Estado Civil" name="estado_civil" value="{{ old('estado_civil') }}">
                                            <option value="" selected>Selecione..</option>
                                            <option value="s">Soltero/a</option>
                                            <option value="c">Casado/a</option>
                                            <option value="d">Divorciado/a</option>
                                            <option value="v">Viudo/a</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                   <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Ocupacion</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir una Ocupacion" class="form-control" name="ocupacion_edit" id="ocupacion_edit" placeholder="Ocupacion">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                   <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Fecha Ingreso</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir una fecha de Ingreso" class="form-control" name="ingreso_edit" id="ingreso_edit" placeholder="Fecha de Ingreso">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Fecha de nacimiento</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir una fecha de Nacimiento" class="form-control" name="nacimiento_edit" id="nacimiento_edit" placeholder="Fecha de Nacimiento">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Lugar de nacimiento</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir un lugar" class="form-control" name="lugar_nacimiento" id="lugar_nacimiento" placeholder="Familiar cercano">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-sm-10">
                                        <label for="nivel_educacional" class="">Nivel Educacional</label>
                                        <select class="form-control" id="nivel_educacional" data-validation="required" data-validation-error-msg="Debe ingrear un valor" name="nivel_educacional" value="{{ old('nivel_educacional') }}">
                                            <option value="" selected>Selecione..</option>
                                            @foreach($niveles as $nivel)
                                            <option value="{{$nivel->id_valor}}">
                                                {{$nivel->valor}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="form-group col-md-4">
                                    <div class="col-sm-10">
                                        <label for="convive" class="">Convive</label>
                                        <select class="form-control" id="convive" data-validation="required" data-validation-error-msg="Debe seleccionar un valor" name="convive" value="{{ old('estado_civil') }}">
                                            @foreach($convives as $convive)
                                            <option value="{{$convive->id_valor}}">
                                                {{$convive->valor}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-sm-10">
                                        <label for="situacion_laboral" class="">Situacion Laboral</label>
                                        <select class="form-control" id="situacion_laboral" data-validation="required" data-validation-error-msg="Debe seleccionar un valor" name="situacion_laboral" value="{{ old('estado_civil') }}">
                                            <option value="" selected>Selecione..</option>
                                            @foreach($situaciones as $situacion)
                                            <option value="{{$situacion->id_valor}}">
                                                {{$situacion->valor}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-sm-10">
                                        <label for="zona_residencia" class="">Zona de Residencia</label>
                                        <select class="form-control" id="zona_residencia" data-validation="required" data-validation-error-msg="Debe introducir una zona" name="zona_residencia" value="{{ old('zona_residencia') }}">
                                            <option value="" selected>Selecione..</option>
                                            @foreach($zonas as $zona)
                                            <option value="{{$zona->id_valor}}">
                                                {{$zona->valor}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                               
                                <div class="form-group col-md-4">
                                    <div class="col-sm-10">
                                        <label for="email" class="">Lee / Escribe</label>
                                        <select class="form-control" id="lee_escribe" data-validation="required" data-validation-error-msg="Debe ingrear un valor" name="lee_escribe" value="{{ old('lee_escribe') }}">
                                            <option value="" selected>Selecione..</option>
                                            @foreach($lees as $lee)
                                            <option value="{{$lee->id_valor}}">
                                                {{$lee->valor}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" style="text-align: center;">
                        
                            <label>Datos del Familiar</label>
                            </div>
                            <hr class="col-lg-12" style="border-top: 3px solid #6d6262 !important; width:90%!important;">
                             <div class="form-group">
                               <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Nombre Familiar cercano</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir un nombre" class="form-control" name="familiar_cercano" id="familiar_cercano" placeholder="Familiar cercano">
                                    </div>
                                </div>
                               
                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Direccion del familiar</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir una fecha de Nacimiento" class="form-control" name="direccion_familiar" id="direccion_familiar" placeholder="Direccion del familiar">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Nro telef. del Familiar</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir un numero de telefono" class="form-control" name="telefono_familiar" id="telefono_familiar" placeholder="Telefono del familiar">
                                    </div>
                                </div>
                            </div>
                             <div class="form-group">
                               <div class="form-group col-md-4">
                                   <div class="col-md-12">
                                        <label for="name_edit" class="control-label">Parentesco</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" data-validation="required" data-validation-error-msg="Debe Introducir una fecha de Nacimiento" class="form-control" name="parentesco" id="parentesco" placeholder="parentesco">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" onclick="$('#edit_patient_form').submit();" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
    <!-- jQuery -->
    <script src="{{url('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ url('js/list.min.js')}}"></script>
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

        var monkeyList = new List('paciente_table', {
            valueNames: ['name', 'ci'],
            page: 5,
            pagination: true
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

    function edit_patient(val) {

        /*var x = document.getElementById("stauts");
        setTimeout(function(){ x.value="2 seconds" }, 2000);*/

        console.log('entro ' + val);
        var url = $('#try').attr("data-link");
        //var _token = $(this).data("data-token");
        console.log(url);
        $.ajax({

            url: url,

            type: "POST",

            data: {
                '_token': $('input[name=_token]').val(),
                id_cita: val
            },

            success: function(data) {

                console.log(data);

               /* document.getElementById("id_edit").value = data[0].id_paciente;

                document.getElementById("persona_id").value = data[0].id_persona;

                document.getElementById("name_edit").value = data[0].nombre;

                document.getElementById("apellido_edit").value = data[0].apellido;

                document.getElementById("cedula_edit").value = data[0].ci;

                document.getElementById("sexo_edit").value = data[0].genero;

                document.getElementById("telefono_edit").value = data[0].telefono;

                document.getElementById("celular_edit").value = data[0].celular;

                document.getElementById("nacimiento_edit").value = data[0].fecha_nacimiento;

                document.getElementById("direccion_edit").value = data[0].direccion;

                document.getElementById("ingreso_edit").value = data[0].fecha_ingreso;

                document.getElementById("ocupacion_edit").value = data[0].ocupacion;

                document.getElementById("grupo_sanguineo").value = data[0].grupo_sanguineo;

                document.getElementById("nro_edit").value = data[0].nro_historia;

                document.getElementById("convive").value = data[0].convive;

                document.getElementById("direccion_familiar").value = data[0].direccion_familiar;

                document.getElementById("estado_civil").value = data[0].estado_civil;

                document.getElementById("familiar_cercano").value = data[0].familiar_cercano;

                document.getElementById("lee_escribe").value = data[0].lee_escribe;

                document.getElementById("lugar_nacimiento").value = data[0].lugar_nacimiento;

                document.getElementById("parentesco").value = data[0].parentesco;

                document.getElementById("situacion_laboral").value = data[0].situacion_laboral;

                document.getElementById("telefono_familiar").value = data[0].telefono_familiar;

                document.getElementById("zona_residencia").value = data[0].zona_residencia;

                document.getElementById("nivel_educacional").value = data[0].nivel_educacional;*/




                $('#edit_modal').modal('show');


            },
            error: function() {

                alert("error!!!!");

            }

        }); //end of ajax

    }
    </script>
    @endsection
