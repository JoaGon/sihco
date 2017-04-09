@extends('admin-layout.sidebarAdmin') 

@section('content')

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
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<div class="container">

    <!-- /.row -->
    <div class="row" ng-app="AdminDashboard" ng-controller="AdminController">
        <div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-1">
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
                <form class="form-horizontal" id="form_familiares" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/antecedente_familiar') }}">
                    {{ csrf_field() }} 
                    <input type="hidden"  name="consulta_id" value={{$consulta}}>
                    <input type="hidden"   name="paciente_id" value="{{$paciente->id_paciente}}"> 
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
                            <input class="form-control" id="fecha_consulta" type="text" class="form-control" name="fecha_consulta" value="{{ old('fecha_consulta') }}">
                        </div>
                    </div>
                    <div class="row row_border ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <input type="checkbox" name="enfer_cardiov" id="enfer_cardiov"  onchange="insertar_cardiovascular();" value="S"> 1-Enfermedades Cardiovasculares
                        </div>

                        <div class="col-lg-6">
                            <select ng-model="enfer" class="form-control" name="tipo_enfermedad"  style="width: auto;" id="tipo_enfermedad"  >

                               <option ng-repeat="(i,res) in cardiovasculares" value="[[res.id_enfermedad_cardiovascular]]">[[res.enfermedad]]</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <select ng-model="valor" class="form-control" name="circulo_familiar"  style="width: auto;" id="circulo_familiar"  >
                                <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                            </select>
                        </div>
                        <a  name="button_agregar" id="button_agregar" ng-click="add_enfermerdad({{$consulta}},{{$paciente->id_paciente}})" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Agregar </a>
                        <div ng-hide="(!enfermedades)">
                             <table  ng-hide="(!enfermedades)" class="table">
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

                        <div ng-hide="(!enfer_renal)">
                             <table  ng-hide="(!enfer_renal)" class="table">
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

                        <div ng-hide="(!enfer_alergica)">
                             <table  ng-hide="(!enfer_alergica)" class="table">
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

                        <div ng-hide="(!enfer_cancer)">
                             <table  ng-hide="(!enfer_cancer)" class="table">
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

                        <div ng-hide="(!enfer_infecciosa)">
                             <table  ng-hide="(!enfer_infecciosa)" class="table">
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

                        <div ng-hide="(!enfer_trans_sexual)">
                             <table  ng-hide="(!enfer_trans_sexual)" class="table">
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
                            <textarea name="espec_otro" id="otros" placeholder="Otros" class="form-control" style="height: 100px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" onclick="insertar_antecedente()" class="btn btn-primary">
							<i class="fa fa-btn fa-user"></i> Registrar </button>
                            <button type="submit" href="{{ url('antecedente_personal')}}" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Siguiente </button>
                              <a type="submit" href="{{ URL::previous() }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Volver </a>
                            <a type="submit" href="#" onclick="insertar_cardiovascular()" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Insertar Enfermedad Cardiovascular </a>


                            <!--button type="submit" onclick="motive_submit('{{$paciente->id_paciente}}', '{{$paciente->nro_historia}}')" class="btn btn-primary">
                  Guardar
                </button-->
                            <!--  <a class="btn btn-link" href="{{ url('/password/reset') }}" style="color:#3c763d">Olvido su contraseña?</a>-->
                        </div>
                        @endforeach
                    </div>
                    <!-- /.col-lg-12 -->
                </form>
            </div>

        </div>

<div id="myModal"class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Insertar Enfermedad Cardiovascular</h4>
        </div>
        <div class="modal-body" style = "height: 530px;">
          
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Insertar</label>
            <div class="col-sm-10">
              <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
            </div>
          </div>
                <div class="col-md-4">
                    <select ng-model="enfer" class="form-control" name="tipo_enfermedad"  style="width: auto;" id="tipo_enfermedad"  >

                       <option ng-repeat="(i,res) in cardiovasculares" value="[[res.id_enfermedad_cardiovascular]]">[[res.enfermedad]]</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select ng-model="valor" class="form-control" name="circulo_familiar"  style="width: auto;" id="circulo_familiar"  >
                        <option ng-repeat="(i,res) in circulos_renal" value="[[res.id_valor]]">[[res.valor]]</option>
                    </select>
                </div>

                <a  name="button_agregar" id="button_agregar" ng-click="add_enfermerdad({{$consulta}},{{$paciente->id_paciente}})" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Agregar 
                </a>
                <div ng-hide="(!cardiovasculares)">
                     <table  ng-hide="(!cardiovasculares)" class="table">
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
                                <tr ng-repeat="(i,res) in cardiovasculares">
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


        </div>

        <div class="modal-footer">
        <a class="btn btn-primary" ng-click="insertarEnfermedad()">Insertar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
        </div>

      </div><!-- /.modal-content -->
      {!! Form::close() !!}
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="myModalRenal"class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Insertar Enfermedad Renal</h4>
        </div>
        <div class="modal-body" style = "height: 530px;">
          
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Insertar</label>
            <div class="col-sm-10">
              <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_renal" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
            </div>
          </div>
                <div class="col-md-4">
                    <select ng-model="enf_renal" class="form-control" name="tipo_enfermedad"  style="width: auto;" id="tipo_enfermedad"  >

                       <option ng-repeat="(i,res) in renales" value="[[res.id_enfermedad_renal]]">[[res.enfermedad]]</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select ng-model="valor_renal" class="form-control" name="circulo_familiar"  style="width: auto;" id="circulo_familiar"  >
                        <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                    </select>
                </div>

                <a  name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_renal({{$consulta}},{{$paciente->id_paciente}})" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Agregar 
                </a>
                <div ng-hide="(!renales)">
                     <table  ng-hide="(!renales)" class="table">
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
                                <tr ng-repeat="(i,res) in renales">
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
        <a class="btn btn-primary" ng-click="insertarEnfermedadRenal()">Insertar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
        </div>

      </div><!-- /.modal-content -->
      {!! Form::close() !!}
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<div id="myModalAlergica"class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Insertar Enfermedad Alergica</h4>
        </div>
        <div class="modal-body" style = "height: 530px;">
          
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Insertar</label>
            <div class="col-sm-10">
              <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_alergica" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
            </div>
          </div>
                <div class="col-md-4">
                    <select ng-model="enf_alergica" class="form-control" name="tipo_enfermedad"  style="width: auto;" id="tipo_enfermedad"  >

                       <option ng-repeat="(i,res) in alergicas" value="[[res.id_enfermedad_patologica]]">[[res.enfermedad]]</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select ng-model="valor_alergica" class="form-control" name="circulo_familiar"  style="width: auto;" id="circulo_familiar"  >
                        <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                    </select>
                </div>

                <a  name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_alergica({{$consulta}},{{$paciente->id_paciente}})" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Agregar 
                </a>
                <div ng-hide="(!alergicas)">
                     <table  ng-hide="(!alergicas)" class="table">
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
        <a class="btn btn-primary" ng-click="insertarEnfermedadAlergica()">Insertar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
        </div>

      </div><!-- /.modal-content -->
      {!! Form::close() !!}
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="myModalInfecciosa"class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Insertar Enfermedad Infecciosa</h4>
        </div>
        <div class="modal-body" style = "height: 530px;">
          
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Insertar</label>
            <div class="col-sm-10">
              <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_infecciosa" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
            </div>
          </div>
                <div class="col-md-4">
                    <select ng-model="enf_infecciosa" class="form-control" name="tipo_enfermedad"  style="width: auto;" id="tipo_enfermedad"  >

                       <option ng-repeat="(i,res) in infecciosas" value="[[res.id_enfermedad_patologica]]">[[res.enfermedad]]</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select ng-model="valor_infecciosa" class="form-control" name="circulo_familiar"  style="width: auto;" id="circulo_familiar"  >
                        <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                    </select>
                </div>

                <a  name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_infecciosa({{$consulta}},{{$paciente->id_paciente}})" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Agregar 
                </a>
                <div ng-hide="(!infecciosas)">
                     <table  ng-hide="(!infecciosas)" class="table">
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
        <a class="btn btn-primary" ng-click="insertarEnfermedadInfecciosa()">Insertar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
        </div>

      </div><!-- /.modal-content -->
      {!! Form::close() !!}
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="myModalCancer"class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Insertar Cancer</h4>
        </div>
        <div class="modal-body" style = "height: 530px;">
          
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Insertar</label>
            <div class="col-sm-10">
              <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_cancer" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
            </div>
          </div>
                <div class="col-md-4">
                    <select ng-model="enf_cancer" class="form-control" name="tipo_enfermedad"  style="width: auto;" id="tipo_enfermedad"  >

                       <option ng-repeat="(i,res) in cancer" value="[[res.id_enfermedad_patologica]]">[[res.enfermedad]]</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select ng-model="valor_cancer" class="form-control" name="circulo_familiar"  style="width: auto;" id="circulo_familiar"  >
                        <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                    </select>
                </div>

                <a  name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_cancer({{$consulta}},{{$paciente->id_paciente}})" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Agregar 
                </a>
                <div ng-hide="(!cancer)">
                     <table  ng-hide="(!cancer)" class="table">
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
        <a class="btn btn-primary" ng-click="insertarEnfermedadCancer()">Insertar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
        </div>

      </div><!-- /.modal-content -->
      {!! Form::close() !!}
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div id="myModalSexual"class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Insertar Enfermedad de Transmision Sexual</h4>
        </div>
        <div class="modal-body" style = "height: 530px;">
          
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Insertar</label>
            <div class="col-sm-10">
              <input style="margin-bottom: 15px;" type="text" ng-model="nombre_enfermedad_transmision_sexual" class="form-control" id="name_edit" name="name_edit" placeholder="nombre de la enfermedad">
            </div>
          </div>
                <div class="col-md-4">
                    <select ng-model="enf_trans_sexual" class="form-control" name="tipo_enfermedad"  style="width: auto;" id="tipo_enfermedad"  >

                       <option ng-repeat="(i,res) in transmision_sexual" value="[[res.id_enfermedad_patologica]]">[[res.enfermedad]]</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select ng-model="valor_transm_sexual" class="form-control" name="circulo_familiar"  style="width: auto;" id="circulo_familiar"  >
                        <option ng-repeat="(i,res) in circulos" value="[[res.id_valor]]">[[res.valor]]</option>
                    </select>
                </div>

                <a  name="button_agregar" id="button_agregar" ng-click="add_enfermerdad_transm_sexual({{$consulta}},{{$paciente->id_paciente}})" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Agregar 
                </a>
                <div ng-hide="(!transmision_sexual)">
                     <table  ng-hide="(!transmision_sexual)" class="table">
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
        <a class="btn btn-primary" ng-click="insertarEnfermedadTransmSexual()">Insertar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
        </div>

      </div><!-- /.modal-content -->
      {!! Form::close() !!}
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


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
        var monkeyList = new List('pacientes', {
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
    function show_select(){
                    if($('#enfer_cardiov:checked').length){
                       $('#tipo_enfermedad').css('display','inline');
                        $('#circulo_familiar').css('display','inline');
                        $('#button_agregar').css('display','inline');

                    }else{
                        $('#tipo_enfermedad').css('display','none');
                        $('#circulo_familiar').css('display','none');
                        $('#button_agregar').css('display','none');


                    }
                    
                }
       function show(nro_historia, consulta) {
                /*var x = document.getElementById("stauts");
                setTimeout(function(){ x.value="2 seconds" }, 2000);*/
                console.log('entro ' + nro_historia + consulta );
                //var url = $('#try').attr("data-link");
                //var _token = $(this).data("data-token");
                 $('#enfermedad_modal').modal('show');
                /*console.log(url);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        id: val
                    },
                    success: function(data) {
                       
                       
                        $('#edit_modal').modal('show');
                    },
                    error: function() {
                        alert("error!!!!");
                    }
                });*/ //end of ajax
            }
             function guardar(nro_historia, consulta) {
                /*var x = document.getElementById("stauts");
                setTimeout(function(){ x.value="2 seconds" }, 2000);*/
                console.log('entraa ' + nro_historia + consulta );
                var url = $('#try').attr("data-link");
                console.log('url',url);
                //var _token = $(this).data("data-token");
                 $('#enfermedad_modal').modal('show');
                console.log(url);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        id: nro_historia
                    },
                    success: function(data) {
                    
                        $('#enfermedad_modal').modal('show');
                    },
                    error: function() {
                        alert("error!!!!");
                    }
                });
                //end of ajax
            }
function insertar_antecedente(){
    $('#form_familiares').submit();    
}

function insertar_cardiovascular(){
      $('#myModal').modal('show');
}

function insertar_renal(){
      $('#myModalRenal').modal('show');
}
function insertar_alergica(){
      $('#myModalAlergica').modal('show');
}
function insertar_infecciosa(){
      $('#myModalInfecciosa').modal('show');
}
function insertar_sexual(){
      $('#myModalSexual').modal('show');
}
function insertar_cancer(){
      $('#myModalCancer').modal('show');
}
</script>
@endsection