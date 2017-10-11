@extends('admin-layout.sidebarAdmin') @section('content')
<!-- DataTables CSS -->
<link href="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ url('template/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ url('template/dist/css/sb-admin-2.css')}} " rel="stylesheet">
<link href="{{ url('css/styles.css')}} " rel="stylesheet">
<link href="{{ url('css/admin.css')}} " rel="stylesheet">
<link href="{{url ('template/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<script>

var valido = <?php echo json_encode($validado); ?>;

var antecendetes = <?php echo json_encode($ante); ?>;
console.log(antecendetes)
</script>
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
            @endif @foreach ($pacientes as $paciente)
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">
                <div style="font-size: 20px; text-align: center; color:#59bddd;">
                    Examen Muscular
                </div>
                <fieldset>
                    <form class="form-horizontal" id="form_familiares">
                        {{ csrf_field() }}
                        <input type="hidden" name="consulta_id" value={{$consulta}}>
                        <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
                        <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
                        
                    <input type="hidden" name="id_enfermedad" id="id_enfermedad">
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
                                <input class="form-control" id="fecha" type="text" class="form-control" name="fecha" data-validation="required" data-validation-error-msg="Debe ingrear una fecha" value="{{ old('fecha') }}">
                            </div>
                        </div>
                        <div class="row row_border ">
                            <div class="col-lg-12">
                                <label>
                                    A. Palpación de los músculos extraorales: (use una presión de 1 kg. Marque el código en el sitio correspondiente utilizando la siguiente escala para medir el dolor: 0 = Ausencia de dolor / presión solamente; 1 = Dolor leve; 2 = Dolor moderado; 3 = Dolor severo)
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width:0; border-right-width:0" bordercolor="#FFFF00" id="AutoNumber1" width="650">
                                    <tbody>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>1</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Temporal posterior (detrás de la 
							      sien)</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      Der.<input type="text" id="temporal_posterio_der" name="temporal_posterio_der" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" size="2" style=" width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      Izq.<input type="text" id="temporal_posterio_izq" name="temporal_posterio_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="189" rowspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1; margin-left: ">
                                                <p align="center">
                                                    <img border="0" src="{{ url('/images/temporal_DP.jpg')}}" style="margin: 15px" width="189" height="203"> Temporal/Digastrico posterior
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>2</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Temporal medio (centro de la 
							      sien)
							      </font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="temporar_medio_der" name="temporar_medio_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="temporar_medio_izq" name="temporar_medio_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>3</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Temporal anterior (delante de la 
							      sien)</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="temporal_anterior_der" name="temporal_anterior_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="temporal_anterior_izq" name="temporal_anterior_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>4</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Origen del masetero (debajo del 
							      arco zigomático)</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="origen_masetero_der" name="origen_masetero_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="origen_masetero_izq" name="origen_masetero_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>5</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Cuerpo del masetero (en la 
							      mejilla)</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="cuerpo_masetero_der" name="cuerpo_masetero_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="cuerpo_masetero_izq" name="cuerpo_masetero_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>6</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>
							      Inserción del masetero (angulo de la mandibula)</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="insercion_masetero_der" name="insercion_masetero_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="insercion_masetero_izq" name="insercion_masetero_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="189" rowspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
                                                <p align="center">
                                                    <img border="0" src="{{ url('/images/masetero_da.jpg')}}" width="189" style="margin: 15px" height="198"> Masetero/Digastrico anterior
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>7</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Región mandibular posterior (estilohiodeo/digástrico 
							      post.)</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="region_mandibular_der" name="region_mandibular_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="region_mandibular_izq" name="region_mandibular_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>8</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Región submandib. (pterigoideo medio/Suprahiodeo /Digastrico anterior)</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="region_submandibular_der" name="region_submandibular_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="region_submandibular_izq" name="region_submandibular_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>9</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Esternocleidomastoideo (a lo 
							      largo de todo el músculo)</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="esternocleidomastoideo_der" name="esternocleidomastoideo_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="esternocleidomastoideo_izq" name="esternocleidomastoideo_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="16" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>10</font></b></td>
                                            <td width="393" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Musculatura posterior del cuello y cervical</font></b></td>
                                            <td width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="musculatura_der" name="musculatura_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="22" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="musculatura_izq" name="musculatura_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row row_border ">
                            <div class="col-lg-12">
                                <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber2">
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                                <img border="0" src="{{ url('/images/esternocle.jpg')}}" width="187" height="245"></td>
                                            <td align="center">
                                                <img border="0" src="{{ url('/images/musculatura_PC.jpg')}}" width="194" height="238"></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><b><font>
						        Esternocleidomastoideo</font></b></td>
                                            <td align="center"><b><font>Musculatura 
						        posterior del cuello</font></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row row_border ">
                            <div class="col-lg-12">
                                <label>
                                    B. Palpación de los músculos intraorales: (use una presión de 0.5 kg. Marque el código en el sitio correspondiente utilizando la siguiente escala para medir el dolor: 0 = Ausencia de dolor / presión solamente; 1 = Dolor leve; 2 = Dolor moderado; 3 = Dolor severo)
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <table border="1" cellpadding="0" cellspacing="0" style="border-width:0; border-collapse: collapse" bordercolor="#FFFF00" id="AutoNumber1" width="693">
                                    <tbody>
                                        <tr>
                                            <td align="center" width="35" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>
							      1</font></b></td>
                                            <td width="432" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
                                                <font><b>
							      Área del pterigoideo lateral (por encima de los molares superiores)</b></font>
                                            </td>
                                            <td width="28" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>Der.
							      <input type="text" id="area_pterigoide_der" name="area_pterigoide_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="23" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      Izq.<input type="text" id="area_pterigoide_izq" name="area_pterigoide_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black;text-align: center"></b></font>
                                            </td>
                                            <td width="175" rowspan="5" style="border-style: none; border-width: medium">
                                                <p>
                                                    <img border="0" src="{{ url('/images/plerigoideo.jpg')}}" width="190" style="margin: 15px" height="230"> Pterigoideo lateral</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="35" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>
							      2</font></b></td>
                                            <td width="432" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
                                                <font><b>
							      Tendón del temporal (tendón)</b></font>
                                            </td>
                                            <td width="28" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="tendon_temp_der" name="tendon_temp_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="23" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="tendon_temp_izq" name="tendon_temp_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="35" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
                                            <td width="432" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
                                            <td width="28" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium" align="center">&nbsp;</td>
                                            <td width="23" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="35" style="border-style: none; border-width: medium">&nbsp;</td>
                                            <td width="432" style="border-style: none; border-width: medium">&nbsp;</td>
                                            <td width="28" style="border-style: none; border-width: medium" align="center">&nbsp;</td>
                                            <td width="23" style="border-style: none; border-width: medium" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="35" style="border-style: none; border-width: medium">&nbsp;</td>
                                            <td width="432" style="border-style: none; border-width: medium">&nbsp;</td>
                                            <td width="28" style="border-style: none; border-width: medium" align="center">&nbsp;</td>
                                            <td width="23" style="border-style: none; border-width: medium" align="center">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row row_border ">
                            <div>
                                <label>
                                    C. Región articular: (use una presión de 0.5 kg.
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <table border="1" cellpadding="0" cellspacing="0" style="border-width:0; border-collapse: collapse" bordercolor="#FFFF00" id="AutoNumber1" width="693">
                                    <tbody>
                                        <tr>
                                            <td align="center" width="35" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>
							      1</font></b></td>
                                            <td width="432" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
                                                <font><b>
							      Polo lateral (por la parte externa)</b></font>
                                            </td>
                                            <td width="28" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      Der.<input type="text" id="polo_lateral_der" name="polo_lateral_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="23" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      Izq.<input type="text" id="polo_lateral_izq" name="polo_lateral_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="175" rowspan="5" style="border-style: none; border-width: medium">
                                                <p>
                                                    <img border="0" src="{{ url('/images/tendon_temp.jpg')}}" style="margin: 15px" width="198" height="236"> Tendon Temporal</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="35" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>
							      2</font></b></td>
                                            <td width="432" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
                                                <font><b>
							      Inserción posterior (dentro del oído)</b></font>
                                            </td>
                                            <td width="28" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="insercion_pos_der" name="insercion_pos_der" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                            <td width="23" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" align="center">
                                                <font><b>
							      <input type="text" id="insercion_pos_izq" name="insercion_pos_izq" size="2" data-validation="number" data-validation-allowing="range[0;3]" data-validation-error-msg="Invalido" style="width: 100%; color: black; text-align: center"></b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="35" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
                                            <td width="432" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
                                            <td width="28" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium" align="center">&nbsp;</td>
                                            <td width="23" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="35" style="border-style: none; border-width: medium">&nbsp;</td>
                                            <td width="432" style="border-style: none; border-width: medium">&nbsp;</td>
                                            <td width="28" style="border-style: none; border-width: medium" align="center">&nbsp;</td>
                                            <td width="23" style="border-style: none; border-width: medium" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="35" style="border-style: none; border-width: medium">&nbsp;</td>
                                            <td width="432" style="border-style: none; border-width: medium">&nbsp;</td>
                                            <td width="28" style="border-style: none; border-width: medium" align="center">&nbsp;</td>
                                            <td width="23" style="border-style: none; border-width: medium" align="center">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row row_border ">
                            <div class="col-lg-12">
                                <label>
                                    D. Evaluación de sonidos articulares:
                                    <br> Sonidos en la ATM derecha:
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width:0; border-right-width:0; border-bottom-width:0" bordercolor="#FFFF00" id="AutoNumber3">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="border-top:1px solid #FFFF00; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: solid; border-bottom-width: 1">&nbsp;</td>
                                            <td align="center" style="border-top:1px solid #FFFF00; border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; ">&nbsp;</td>
                                            <td align="center" style="border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; ">&nbsp;</td>
                                            <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; ">&nbsp;</td>
                                            <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-color:#FFFF00; border-bottom-style:solid; border-bottom-width:1">&nbsp;</td>
                                            <td align="center" style="border-top:1px solid #FFFF00; border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; ">
                                                &nbsp;</td>
                                            <td align="center" rowspan="6" style="border-bottom:1px solid #FFFF00; border-top:1px solid #FFFF00; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; ">
                                                <p>
                                                    <img border="0" src="{{ url('/images/atm.jpg')}}" width="185" style="margin: 15px" height="218"> ATM
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>En apertura</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_apertura_der" name="atm_apertura_der" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>En cierre</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_cierre_der" name="atm_cierre_der" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Lateralidad derecha</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_lateralidad_der" name="atm_lateralidad_der" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Lateralidad izquierda</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_lateralidad_izq" name="atm_lateralidad_izq" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-bottom:1px solid #FFFF00; border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; "><b><font>Protrusión</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_protrusion_der" name="atm_protrusion_der" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row row_border ">
                            <div class="col-lg-12">
                                <label>
                                    Sonidos en la ATM izquierda:
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width:0; border-right-width:0; border-bottom-width:0" bordercolor="#FFFF00" id="AutoNumber4">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="border-top:1px solid #FFFF00; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: solid; border-bottom-width: 1">&nbsp;</td>
                                            <td align="center" style="border-top:1px solid #FFFF00; border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; ">&nbsp;</td>
                                            <td align="center" style="border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; ">&nbsp;</td>
                                            <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; ">&nbsp;</td>
                                            <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-color:#FFFF00; border-bottom-style:solid; border-bottom-width:1">&nbsp;</td>
                                            <td align="center" style="border-top:1px solid #FFFF00; border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; ">
                                                &nbsp;</td>
                                            <td align="center" rowspan="6" style="border-bottom:1px solid #FFFF00; border-top:1px solid #FFFF00; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; ">
                                                <p>
                                                    <img border="0" src="{{ url('/images/atm_izq.jpg')}}" width="185" style="margin: 15px" height="215"> ATM
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-left-style: none; border-left-width: medium; border-bottom-style: solid; border-bottom-width: 1"><b><font>En apertura</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style:solid; border-top-width:1" colspan="5">
                                                <select size="1" id="atm_apertura_izq" name="atm_apertura_izq" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>En cierre</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_cierre_izq" name="atm_cierre_izq" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Lateralidad derecha</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_izq_lateralidad_der" name="atm_izq_lateralidad_der" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><b><font>Lateralidad izquierda</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_izq_lateralidad_izq" name="atm_izq_lateralidad_izq" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="border-bottom:1px solid #FFFF00; border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1; "><b><font>Protrusión</font></b></td>
                                            <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; " colspan="5">
                                                <select size="1" id="atm_protrusion_izq" name="atm_protrusion_izq" style="color: black">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Clic">Clic</option>
                                                    <option value="Crepitus marcado">Crépitus marcado</option>
                                                    <option value="Crepitus Fino">Crépitus Fino</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                 @if( Auth::user()->rol_id == 1 or Auth::user()->rol_id == 2 or Auth::user()->rol_id == 3 )
               <a type="submit" id="validar-button" onclick="validar();" class="btn btn-primary">Validar</a>
             @endif   
                    <button id="registrar-button" type="submit " onclick="insertar_historia(); " class="btn btn-primary ">Registrar
              </button>
                    <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
                </div>
                @endforeach
            </div>
            <!-- /.col-lg-12 -->
            </form>
            </fieldset>
        </div>
    </div>
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
   
    $("#fecha").datepicker({
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
     $.each(antecendetes, function(i, val) {
        console.log("val",val)

        $('#area_pterigoide_der').val(val.area_pterigoide_der);
        $('#area_pterigoide_izq').val(val.area_pterigoide_izq);
        $('#atm_apertura_der').val(val.atm_apertura_der);
        $('#atm_apertura_izq').val(val.atm_apertura_izq);
        $('#atm_cierre_der').val(val.atm_cierre_der);
        $('#atm_cierre_izq').val(val.atm_cierre_izq);
        $('#atm_izq_lateralidad_der').val(val.atm_izq_lateralidad_der);
        $('#atm_izq_lateralidad_izq').val(val.atm_izq_lateralidad_izq);
        $('#atm_lateralidad_der').val(val.atm_lateralidad_der);
        $('#atm_lateralidad_izq').val(val.atm_lateralidad_izq);
        $('#atm_protrusion_der').val(val.atm_protrusion_der);
        $('#atm_protrusion_izq').val(val.atm_protrusion_izq);
        $('#cuerpo_masetero_izq').val(val.cuerpo_masetero_izq);
        $('#cuerpo_masetero_der').val(val.cuerpo_masetero_der);
        $('#esternocleidomastoideo_der').val(val.esternocleidomastoideo_der);
        $('#esternocleidomastoideo_izq').val(val.esternocleidomastoideo_izq);
        $('#insercion_masetero_der').val(val.insercion_masetero_der);
        $('#insercion_masetero_izq').val(val.insercion_masetero_izq);
        $('#insercion_pos_der').val(val.insercion_pos_der);
        $('#insercion_pos_izq').val(val.insercion_pos_izq);
        $('#musculatura_der').val(val.musculatura_der);
        $('#musculatura_izq').val(val.musculatura_izq);
        $('#origen_masetero_der').val(val.origen_masetero_der);
        $('#origen_masetero_izq').val(val.origen_masetero_izq);
        $('#polo_lateral_der').val(val.polo_lateral_der);
        $('#polo_lateral_izq').val(val.polo_lateral_izq);
        $('#region_mandibular_der').val(val.region_mandibular_der);
        $('#region_mandibular_izq').val(val.region_mandibular_izq);
        $('#region_submandibular_der').val(val.region_submandibular_der);
        $('#region_submandibular_izq').val(val.region_submandibular_izq);
        $('#temporal_anterior_der').val(val.temporal_anterior_der);
        $('#temporal_anterior_izq').val(val.temporal_anterior_izq);
        $('#temporal_posterio_der').val(val.temporal_posterio_der);
        $('#temporal_posterio_izq').val(val.temporal_posterio_izq);
        $('#temporar_medio_der').val(val.temporar_medio_der);
        $('#temporar_medio_izq').val(val.temporar_medio_izq);
        $('#tendon_temp_der').val(val.tendon_temp_der);
        $('#tendon_temp_izq').val(val.tendon_temp_izq);
    
        $('#id_enfermedad').val(val.id_examen_muscular);
        $('#fecha').val(val.fecha);


    });

    function check(elem, val) {
        if (elem == val) {
            return true;
        } else {
            return false;
        }

    }


});
function validar() {
    var id_enfermedad = $('#id_enfermedad').val()
    console.log(id_enfermedad, "<?php echo csrf_token(); ?>")
    $.ajax({

        url: "{{ url('/validar_examen_muscular') }}",
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            id_enfermedad: id_enfermedad
        },
        success: function(data) {
            PNotify.removeAll();
            new PNotify({
                title: 'Validacion Exitosa',
                text: 'El examen Muscular ha sido validado!',
                type: 'success',
                styling: 'bootstrap3'
            });
             new PNotify({
                title: 'Historia Validada',
                text: 'Esta Historia ha sido validada',
                hide: false,
                type: 'success',
                styling: 'bootstrap3'
            });
            console.log('exito')


        },
        error: function() {
            alert("error!!!!");
        }

    });


}
function insertar_historia() {

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
                url: "{{ url('/update_examenMuscular') }}",
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
                        text: 'El examen muscular ha sido almacenado!',
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
</script>
@endsection
