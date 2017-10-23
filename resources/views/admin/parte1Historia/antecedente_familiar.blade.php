@extends('admin-layout.sidebarAdmin') @section('content')
<script type="text/javascript" src="{{ url('js/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/AdminDashboard.js') }}"></script>
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{ url('css/admin.css')}} " rel="stylesheet">
<link href="{{ url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<div class="container">
    <!-- /.row -->
    <div class="row" ng-app="AdminDashboard" ng-controller="AdminController">
        <div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
            @if(session('status'))
            <div class="alert alert-success text-center notification">
                <ul style="list-style:none;">
                    <li style="font-size:16px;">{{ session('status') }}</li>
                </ul>
            </div>
            @endif @foreach ($pacientes as $paciente)
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">
                <div style="font-size: 20px; text-align: center; color:#59bddd;">
                    Antecedente Familiar
                </div>
                <form class="form-horizontal" id="form_familiares">
                    {{ csrf_field() }}
                    <input type="hidden" name="consulta_id" value={{$consulta}}>
                    <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
                    <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="motivo">Nombre</label>
                            <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="nombre">{{$paciente->nombre }} {{ $paciente->apellido }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="motivo" class="">C.I:</label>
                            <textarea class="form-control" disabled cols="75" autofocus="true" rows="1" name="ci">{{ $paciente->ci }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="motivo" class="">Fecha Consulta</label>
                            <input ng-model="fecha_" class="form-control" id="fecha_consulta" type="text" data-validation="required" data-validation-error-msg="Debe ingrear una fecha" class="form-control" name="fecha" value="{{ old('fecha_consulta') }}">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <input type="checkbox" name="enfer_cardiov" id="enfer_cardiov" onchange="insertar_cardiovascular();" value="S"> 1-Enfermedades Cardiovasculares
                        </div>
                        <a style="color: white; cursor: pointer; float: left;" ng-hide="(!enfermedades)" onclick="insertar_cardiovascular();"><i class="fa fa-btn fa-user-plus"></i></a>
                        <div ng-hide="(!enfermedades)">
                            <table ng-hide="(!enfermedades)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in enfermedades">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            [[ res.valor ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarEnfermedad(i,res.id_paciente_enfer_cardiovascular, {{$consulta}},{{$paciente->id_paciente}})">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <input type="checkbox" name="enfer_renal" id="enfer_renal" onchange="insertar_renal()" value="S"> 2-Enfermedades Renales
                        </div>
                        <a style="color: white; cursor: pointer; float: left;" ng-hide="(!enfer_renal)" onclick="insertar_renal();"><i class="fa fa-btn fa-user-plus"></i></a>
                        <div ng-hide="(!enfer_renal)">
                            <table ng-hide="(!enfer_renal)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in enfer_renal">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            [[ res.valor ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarRenal(i,res.id_paciente_enfer_renal, {{$consulta}},{{$paciente->id_paciente}})">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="neuropsicopatia" id="neuropsicopatia" value="S"> 3-Neuropsicopatias
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="enfer_meta_endocrina" id="enfer_meta_endocrina" value="S"> 4-Enfer. Metabolicas y Endocrinas
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="discrasia_sanguinea" id="discrasia_sanguinea" value="S"> 5-Discrasias Sanguineas
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <input type="checkbox" name="" id="enfer_alergica" onchange="insertar_alergica()" value="S"> 6-Enfermedades Alergicas
                        </div>
                        <a style="color: white; cursor: pointer; float: left;" ng-hide="(!enfer_alergica)" onclick="insertar_alergica();"><i class="fa fa-btn fa-user-plus"></i></a>
                        <div ng-hide="(!enfer_alergica)">
                            <table ng-hide="(!enfer_alergica)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in enfer_alergica">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            [[ res.valor ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarAlergica(i,res.id_paciente_enfer_patologica, {{$consulta}},{{$paciente->id_paciente}})">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                    <div class="row row_border">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="fiebre_reumatica" id="fiebre_reumatica" value="S"> 7-Fiebre Reumatica
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="checkbox" name="artritis_reumatoidea" id="artritis_reumatoidea" value="S"> 8- Artritis Reumatoidea
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <input type="checkbox" name="" id="enfer_cancer" onchange="insertar_cancer()" value="S"> 9-Cancer
                        </div>
                        <a style="color: white; cursor: pointer; float: left;" ng-hide="(!enfer_cancer)" onclick="insertar_cancer();"><i class="fa fa-btn fa-user-plus"></i></a>
                        <div ng-hide="(!enfer_cancer)">
                            <table ng-hide="(!enfer_cancer)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in enfer_cancer">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            [[ res.valor ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarCancer(i,res.id_paciente_enfer_patologica, {{$consulta}},{{$paciente->id_paciente}})">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <input type="checkbox" name="" id="enfer_infecciosa" onchange="insertar_infecciosa()" value="S"> 10-Enfermedades Infecciosas
                        </div>
                        <a style="color: white; cursor: pointer; float: left;" ng-hide="(!enfer_infecciosa)" onclick="insertar_infecciosa();"><i class="fa fa-btn fa-user-plus"></i></a>
                        <div ng-hide="(!enfer_infecciosa)">
                            <table ng-hide="(!enfer_infecciosa)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in enfer_infecciosa">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            [[ res.valor ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarInfecciosa(i,res.id_paciente_enfer_patologica, {{$consulta}},{{$paciente->id_paciente}})">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                            <input type="checkbox" name="" id="enfer_trasnm_sexual" onchange="insertar_sexual()" value="S"> 11-Enfermedades de Transmision sexual
                        </div>
                        <a style="color: white; cursor: pointer; float: left;" ng-hide="(!enfer_trans_sexual)" onclick="insertar_sexual();"><i class="fa fa-btn fa-user-plus"></i></a>
                        <div ng-hide="(!enfer_trans_sexual)">
                            <table ng-hide="(!enfer_trans_sexual)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in enfer_trans_sexual">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            [[ res.valor ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarTransmSexual(i,res.id_paciente_enfer_patologica, {{$consulta}},{{$paciente->id_paciente}})">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <input type="checkbox" name="otro" id="otro" value="S"> 12- Otro
                        </div>
                        <div class="col-lg-12">
                            <textarea name="espec_otro" id="otros" placeholder="Otros" class="form-control" data-validation="required" data-validation-depends-on="otro" data-validation-error-msg="Debe especificar otra enfermedad" style="height: 100px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" onclick="insertar_familiares();" class="btn btn-primary">Registrar</button>
                            
                            <a type="submit" href="{{ URL::previous() }}" class="btn btn-primary">
                                 Volver </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.col-lg-12 -->
                </form>
            </div>
        </div>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad Cardiovascular</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div ng-hide="(!cardiovasculares)">
                            <label>Buscar Enfermedad:
                                <input ng-model="search">
                            </label>
                            <table ng-hide="(!cardiovasculares)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Seleccione
                                        </th>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo Familiar
                                        </th>
                                        <th>
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr dir-paginate="(x,res) in cardiovasculares | filter:search|itemsPerPage:5">
                                        <td>
                                            <input type="radio" id="[[x]]" name="table_records">
                                        </td>
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <select ng-model="valor" id="[[x]]" class="form-control" name="circulo_familiar" style="width: auto;" id="circulo_familiar">
                                                <option ng-repeat="(i,resp) in circulos_renal" value="[[resp.id_valor]]">[[resp.valor]]</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a name="button_agregar" id="button_agregar" ng-click="add_enfermerdad({{$consulta}},{{$paciente->id_paciente}},[[ res.id_enfermedad_cardiovascular ]], valor )" class="btn btn-success btn-xs">Agregar 
                                      </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true">
                    </dir-pagination-controls>
                    <div class="modal-footer">
                        <a class="btn" data-toggle="modal" data-target="#myModalCardiovascular">Nueva Enfermedad</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalCardiovascular" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad Cardiovascular</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad" class="form-control" id="name_edit" name="name_edit" placeholder="Introduzca nombre de la enfermedad">
                            </div>
                            <a class="btn btn-primary" ng-click="insertarEnfermedad()">Insertar</a>
                        </div>
                        <div ng-hide="(!cardiovasculares)">
                            <label>Buscar Enfermedad:
                                <input ng-model="searchText">
                            </label>
                            <table ng-hide="(!cardiovasculares)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr dir-paginate="res in cardiovasculares | filter:searchText|itemsPerPage:5">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarEnfermedadCardiovascular(res.id_enfermedad_cardiovascular)">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true">
                            </dir-pagination-controls>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalRenal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad Renal</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div ng-hide="(!renales)">
                            <label>Buscar Enfermedad:
                                <input ng-model="searchRenal">
                            </label>
                            <table ng-hide="(!renales)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Seleccione
                                        </th>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo Familiar
                                        </th>
                                        <th>
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in renales | filter:searchRenal">
                                        <td>
                                            <input type="radio" id="[[i]]" name="table_records_renal">
                                        </td>
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <select ng-model="valor_renal" class="form-control" name="circulo_familiar" style="width: auto;" id="circulo_familiar">
                                                <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_renal({{$consulta}},{{$paciente->id_paciente}},[[ res.id_enfermedad_renal ]], valor_renal )" class="btn btn-success btn-xs">Agregar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" data-toggle="modal" data-target="#myModalAddRenal">Nueva Enfermedad</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalAddRenal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad Renal</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_renal" class="form-control" id="name_edit" name="name_edit" placeholder="Introduzaca nombre de la enfermedad">
                            </div>
                            <a class="btn btn-primary" ng-click="insertarEnfermedadRenal()">Insertar</a>
                        </div>
                        <div ng-hide="(!renales)">
                            <label>Buscar Enfermedad:
                                <input ng-model="searchRenal_">
                            </label>
                            <table ng-hide="(!renales)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in renales | filter:searchRenal_">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarEnfermedadRenal(res.id_enfermedad_renal)">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalAlergica" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad Alergica</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div ng-hide="(!alergicas)">
                            <table ng-hide="(!alergicas)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Seleccione
                                        </th>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo Familiar
                                        </th>
                                        <th>
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in alergicas">
                                        <td>
                                            <input type="radio" id="[[i]]" name="table_records_alergicas">
                                        </td>
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <select ng-model="valor_alergica" class="form-control" name="circulo_familiar" style="width: auto;" id="circulo_familiar">
                                                <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_alergica({{$consulta}},{{$paciente->id_paciente}}, [[ res.id_enfermedad_patologica ]], valor_alergica )" class="btn btn-success btn-xs">Agregar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" data-toggle="modal" data-target="#myModalAddAlergica">Nueva Enfermedad</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalAddAlergica" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad Alergica</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_alergica" class="form-control" id="name_edit" name="name_edit" placeholder="Introduzca el nombre de la enfermedad">
                            </div>
                            <a class="btn btn-primary" ng-click="insertarEnfermedadAlergica()">Insertar</a>
                        </div>
                        <div ng-hide="(!alergicas)">
                            <table ng-hide="(!alergicas)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in alergicas">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarEnfermedadAlergica(res.id_enfermedad_patologica)">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalInfecciosa" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad Infecciosa</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div ng-hide="(!infecciosas)">
                            <table ng-hide="(!infecciosas)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Seleccione
                                        </th>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo Familiar
                                        </th>
                                        <th>
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in infecciosas">
                                        <td>
                                            <input type="radio" id="[[i]]" name="table_records_infecciosa">
                                        </td>
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <select ng-model="valor_infecciosa" class="form-control" name="circulo_familiar" style="width: auto;" id="circulo_familiar">
                                                <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_infecciosa({{$consulta}},{{$paciente->id_paciente}},[[ res.id_enfermedad_patologica ]], valor_infecciosa )" class="btn btn-success btn-xs"> Agregar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" data-toggle="modal" data-target="#myModalAddInfecciosa">Nueva Enfermedad</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalAddInfecciosa" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad Infecciosa</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_infecciosa" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
                            </div>
                            <a class="btn btn-primary" ng-click="insertarEnfermedadInfecciosa()">Insertar</a>
                        </div>
                        <div ng-hide="(!infecciosas)">
                            <table ng-hide="(!infecciosas)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in infecciosas">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarEnfermedadInfecciosa(res.id_enfermedad_patologica)">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalCancer" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Cancer</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div ng-hide="(!cancer)">
                            <table ng-hide="(!cancer)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Seleccione
                                        </th>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo Familiar
                                        </th>
                                        <th>
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in cancer">
                                        <td>
                                            <input type="radio" id="[[i]]" name="table_records_cancer">
                                        </td>
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <select ng-model="valor_cancer" class="form-control" name="circulo_familiar" style="width: auto;" id="circulo_familiar">
                                                <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_cancer({{$consulta}},{{$paciente->id_paciente}}, [[ res.id_enfermedad_patologica ]], valor_cancer)" class="btn btn-success btn-xs">Agregar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" data-toggle="modal" data-target="#myModalAddCancer">Nueva Enfermedad</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalAddCancer" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Cancer</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_cancer" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
                            </div>
                            <a class="btn btn-primary" ng-click="insertarEnfermedadCancer()">Insertar</a>
                        </div>
                        <div ng-hide="(!cancer)">
                            <table ng-hide="(!cancer)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in cancer">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarEnfermedadCancer(res.id_enfermedad_patologica)">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalSexual" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Insertar Enfermedad de Transmision Sexual</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div ng-hide="(!transmision_sexual)">
                            <table ng-hide="(!transmision_sexual)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Seleccione
                                        </th>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Circulo Familiar
                                        </th>
                                        <th>
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in transmision_sexual">
                                        <td>
                                            <input type="radio" id="[[i]]" name="table_records_cancer">
                                        </td>
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <select ng-model="valor_transm_sexual" class="form-control" name="circulo_familiar" style="width: auto;" id="circulo_familiar">
                                                <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_transm_sexual({{$consulta}},{{$paciente->id_paciente}},[[ res.id_enfermedad_patologica ]], valor_transm_sexual)" class="btn btn-success btn-xs">Agregar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" data-toggle="modal" data-target="#myModalAddSexual">Nueva Enfermedad</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="myModalAddSexual" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Nueva Enfermedad de Transmision Sexual</h4>
                    </div>
                    <div class="modal-body" style="height: 530px;">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_transmision_sexual" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
                            </div>
                            <a class="btn btn-primary" ng-click="insertarEnfermedadTransmSexual()">Insertar</a>
                        </div>
                        <div ng-hide="(!transmision_sexual)">
                            <table ng-hide="(!transmision_sexual)" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Enfermedad
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(i,res) in transmision_sexual">
                                        <td>
                                            [[ res.enfermedad ]]
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" ng-click="eliminarEnfermedadTransmSexual(res.id_enfermedad_patologica)">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                {!! Form::close() !!}
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</div>
<!-- /.row -->
<!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
<!-- jQuery -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('js/list.min.js')}}"></script>
<script src="{{ url('js/dirPagination.js')}}"></script>
<script>
$(document).ready(function() {
    show_select();
    $("#fecha_consulta").datepicker({
        dateFormat: "yy-mm-dd",
        changeYear: true,
        changeMonth: true
    });
    $(".notification").fadeTo(3000, 500).slideUp(500, function() {
        $(".notification").slideUp(500);
    });
    var monkeyList = new List('list_enfermedad_cardiovascular', {
        valueNames: ['name'],
        page: 3,
        pagination: true
    });
    var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
    var newDate = new Date();
    newDate.setDate(newDate.getDate() + 1);
    $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
});

function show_select() {
    if ($('#enfer_cardiov:checked').length) {
        $('#tipo_enfermedad').css('display', 'inline');
        $('#circulo_familiar').css('display', 'inline');
        $('#button_agregar').css('display', 'inline');
    } else {
        $('#tipo_enfermedad').css('display', 'none');
        $('#circulo_familiar').css('display', 'none');
        $('#button_agregar').css('display', 'none');
    }
}

function insertar_familiares() {
    var myLanguage = {
        errorTitle: 'El formulario fallo en enviarse',
        requiredFields: 'No se ha introducido datos',
        badTime: 'No ha dado una hora correcta',
        badEmail: 'No ha dado una direccion de email correcta',
        badTelephone: 'No ha dado un numero de telefono correcto',
    }
    $.validate({
        modules: 'logic',
        language: myLanguage,
        form: '#form_familiares',
        onError: function($form) {
            // alert('Validation of form '+$form.attr('id')+' failed!');
        },
        onSuccess: function($form) {
            //alert('The form '+$form.attr('id')+' is valid!');
            //return false; // Will stop the submission of the form
            console.log($("#form_familiares")[0]);
            var formData = new FormData($("#form_familiares")[0]);
            $.ajax({
                url: "{{ url('/antecedente_familiar') }}",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function() {
                    //popover_show();
                    new PNotify({
                        title: 'Registro Exitoso',
                        text: 'Los Antecedentes Familiares han sido almacenados!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    console.log('exito')
                },
                error: function(e) {
                    console.log('Error!!!', e);
                }
            });
            return false;
        },
        onElementValidate: function(valid, $el, $form, errorMess) {
            console.log('Input ' + $el.attr('name') + ' is ' + (valid ? 'VALID' : 'NOT VALID'));
        }
    });
}

function insertar_antecedente() {
    $('#form_familiares').submit();
}

function insertar_cardiovascular() {
    $('#myModal').modal('show');
}

function insertar_renal() {
    $('#myModalRenal').modal('show');
}

function insertar_alergica() {
    $('#myModalAlergica').modal('show');
}

function insertar_infecciosa() {
    $('#myModalInfecciosa').modal('show');
}

function insertar_sexual() {
    $('#myModalSexual').modal('show');
}

function insertar_cancer() {
    $('#myModalCancer').modal('show');
}
</script>
@endsection
