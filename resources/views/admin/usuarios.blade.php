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
                    Usuarios
                </div>
                <!-- /.panel-heading -->
                <div id="usuario" class="panel-body">
                    <div class="table-responsive">
                        <input type="text" placeholder="Buscar Usuario" style="margin: 10px;" class="search" />
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <button class="sort" data-sort="name">
                                Ordenar Por Nombre </button>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Sexo</th>
                                    <th>C.I</th>
                                    <th>Celular</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($usuarios as $user)
                                <tr>
                                    <td class="name">{{$user->nombre}}</td>
                                    <td>{{$user->apellido}}</td>
                                    <td>{{$user->genero}}</td>
                                    <td>{{$user->ci}}</td>
                                    <td>{{$user->celular}}</td>
                                    <td>{{$user->fecha_nacimiento}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->rol_name}}</td>
                                    @if($user->valor_id == '1')
                                    <td>Activo</td>
                                    @endif @if($user->valor_id == '2')
                                    <td>Inactivo</td>
                                    @endif
                                    <td>
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'POST', 'url' => array('usuario/delete', $user->id))) !!} <a class="btn btn-success btn-xs" href="#" id="try" onclick="edit_user('{{$user->id}}')" data-link="{{ url('/edit') }}"> Editar </a> {!! Form::submit('Borrar', array('class' => 'btn btn-danger btn-xs')) !!} {!! Form::close() !!}
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
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.row -->
        <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Datos del Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            {!! Form::open(array('method' => 'POST', 'enctype'=>'multipart/form-data', 'action' => array('UsuarioController@update', '1'))) !!}
                            <input type="hidden" name="_Token" value="{{ csrf_token() }}">
                            <input style="display:none" type="text" class="form-control" id="id_edit" name="id_edit">
                            <input style="display:none" type="text" class="form-control" id="persona_id" name="persona_id">
                            <div class="form-group">
                                <label for="name_edit" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input style="margin-bottom: 15px;" type="text" class="form-control" id="name_edit" name="name_edit" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellido_edit" class="col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <input style="margin-bottom: 15px;" type="text" class="form-control" name="apellido_edit" id="apellido_edit" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cedula_edit" class="col-sm-2 control-label">Cedula</label>
                                <div class="col-sm-10">
                                    <input style="margin-bottom: 15px;" type="text" class="form-control" name="cedula_edit" id="cedula_edit" placeholder="Nro de Cedula">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sexo_edit" class="col-sm-2 control-label">Sexo</label>
                                <div>
                                    <select style="width: 200px; margin-left: 103px " name="sexo_edit" class="form-control" id="sexo_edit">
                                        <option value="">Seleccione...</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono_edit" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input style="margin-bottom: 15px;" type="text" class="form-control" name="telefono_edit" id="telefono_edit" placeholder="Nro de Telefono">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="celular_edit" class="col-sm-2 control-label">Celular</label>
                                <div class="col-sm-10">
                                    <input style="margin-bottom: 15px;" type="text" class="form-control" name="celular_edit" id="celular_edit" placeholder="Nro de Cedular">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="direccion_edit" class="col-sm-2 control-label">Direccion</label>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" class="form-control" name="direccion_edit" id="direccion_edit" placeholder="Direccion">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email_edit" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input style="margin-bottom: 15px;" type="text" class="form-control" id="email_edit" name="email_edit" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rol_edit" class="col-sm-2 control-label">Rol</label>
                                    <div>
                                        <select style="width: 250px; margin-bottom: 15px; margin-left: 103px" name="rol_edit" class="form-control" id="rol_edit">
                                            <option value="">Seleccione...</option>
                                            @foreach($roles as $rol)
                                            <option value="{{$rol->id_rol}}"> {{$rol->rol_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="estatus_edit" class="col-sm-2 control-label">Estatus</label>
                                    <div>
                                        <select style="width: 200px; margin-bottom: 15px; margin-left: 103px" name="estatus_edit" class="form-control" id="estatus_edit">
                                            <option value="">Seleccione...</option>
                                            <option value="1" selected>Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="nacimiento_edit" class="col-sm-2 control-label">Fecha de Nacimiento</label>
                                <div class="col-sm-10">
                                    <input style="margin-bottom: 15px;" type="text" class="form-control" name="nacimiento_edit" id="nacimiento_edit" placeholder="Fecha de Nacimiento">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary ']) !!}
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
        <!-- jQuery -->
        <script src="{{url('template/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
        <script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{ url('js/list.min.js')}}"></script>
        <script>
        $(document).ready(function() {
            $("#nacimiento_edit").datepicker({
                dateFormat: "yy-mm-dd",
                changeYear: true,
                changeMonth: true
            });
            $(".notification").fadeTo(3000, 500).slideUp(500, function() {
                $(".notification").slideUp(500);
            });
            var monkeyList = new List('usuario', {
                valueNames: ['name'],
                page: 5,
                pagination: true
            });
        });

        function edit_user(val) {
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
                    id: val
                },
                success: function(data) {
                    console.log(data);
                    document.getElementById("id_edit").value = data[0].id;
                    document.getElementById("persona_id").value = data[0].id_persona;
                    document.getElementById("name_edit").value = data[0].nombre;
                    document.getElementById("apellido_edit").value = data[0].apellido;
                    document.getElementById("cedula_edit").value = data[0].ci;
                    document.getElementById("sexo_edit").value = data[0].genero;
                    document.getElementById("telefono_edit").value = data[0].telefono;
                    document.getElementById("celular_edit").value = data[0].celular;
                    document.getElementById("rol_edit").value = data[0].rol_id;
                    document.getElementById("nacimiento_edit").value = data[0].fecha_nacimiento;
                    document.getElementById("direccion_edit").value = data[0].direccion;
                    document.getElementById("estatus_edit").value = data[0].valor_id;
                    document.getElementById("email_edit").value = data[0].email;
                    $('#edit_modal').modal('show');
                },
                error: function() {
                    alert("error!!!!");
                }
            }); //end of ajax
        }
        </script>
        @endsection
