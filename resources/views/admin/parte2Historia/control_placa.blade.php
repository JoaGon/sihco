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
					 Control de Placa
				</div>
				<form class="form-horizontal" id="form_familiares">
					 {{ csrf_field() }} <input type="hidden" name="consulta_id" value={{$consulta}}>
					<input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}"/> 
					<input type="hidden" name="historia" value="{{$paciente->nro_historia}}"/>
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
							<div class="col-lg-12 col-md-6 col-sm-6">
							Indique la cantidad de dientes presentes:
							<input type="input" name="sr" id="sr" style="color:black ">	
							<a href="#" onclick="contar()">Calcular</a>	
							</div>
					</div>
					<div class="row row_border ">
							<div class="col-lg-12 col-md-6 col-sm-6">
							<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" bordercolor="#FFFF00" width="67%" id="AutoNumber3">
							    <tbody><tr>
							      <td width="15%" align="center" style="border-style: none; border-width: medium" rowspan="2">
							      <font color="#FFF">INDICE=</font></td>
							      <td width="43%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1">
							      <font color="#FFF">Nº de superficies con placa</font></td>
							      <td width="11%" align="center" style="border-style:none; border-width:medium; " rowspan="2">
							      <font color="#FFF">x100 =</font></td>
							      <td width="8%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1">
							      <input type="text" name="sp" size="5" style="text-align: center; color: black"></td>
							      <td width="45%" align="center" style="border-style: none; border-width: medium" rowspan="2">
							      <p align="left">
							      <font color="#FFF">x100 =&nbsp; 
							      <input type="text" name="indice" size="5" value="0" style="text-align: center; color: black"> 
							      %</font></p></td>
							    </tr>
							    <tr>
							      <td width="43%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium">
							      <font color="#FFF">Nº total de superficies registradas</font></td>
							      <td width="8%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1; border-bottom-style: none; border-bottom-width: medium">
							      <input type="text" name="ns" size="5" style="text-align: center;color: black "></td>
							    </tr>
							  	</tbody>
						  </table>		
							</div>
					</div>
					<div align="center">
					<table border="1" cellpadding="0" cellspacing="0" style="width: 105%; margin-left: 15px; margin-bottom: 15px" id="AutoNumber2" background="{{url('images/CIRCULO3.gif')}}">
					    <tbody>
					    <tr>
					      <td align="center" colspan="3" style="border-left:1px solid #800080; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" >
					      <b><font>18</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>17</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>16</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>15</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>14</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>13</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>12</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>11</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>21</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>22</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>23</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>24</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>25</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>26</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>27</font></b></td>
					      <td align="center" colspan="3" style="border-right:1px solid #800080; border-left-style: solid; border-left-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>28</font></b></td>
					    </tr>
					    <tr>
					      <td align="center" style="border-left:1px solid #800080; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a0" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a1" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium; padding-left: 5px;" border="">
					      <input type="checkbox" name="a2" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a3" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a4" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a5" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a6" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium; padding-left: 5px;" border="">
					      <input type="checkbox" name="a7" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a8" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium; padding-left: 5px;" border="">
					      <input type="checkbox" name="a9" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a10" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a11" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a12" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a13" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a14" value="checked"></td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      <input type="checkbox" name="a15" value="checked"></td>
					      <td align="center" style="border-right:1px solid #800080; border-left-style: none; border-left-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      &nbsp;</td>
					      </tr>
					    <tr>
					      <td align="center" style="border-left:1px solid #800080; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a16" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a17" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a18" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a19" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a20" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a21" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a22" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a23" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a24" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a25" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a26" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a27" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a28" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a29" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a30" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a31" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a32" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a33" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a34" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a35" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a36" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a37" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a38" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a39" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a40" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a41" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a42" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a43" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a44" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a45" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a46" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-right:1px solid #800080; border-left-style: none; border-left-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a47" value="checked"></td>
					      </tr>
					    <tr>
					      <td align="center" colspan="3" style="border-left:1px solid #800080; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a48" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a49" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a50" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a51" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a52" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a53" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a54" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a55" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a56" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a57" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a58" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a59" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a60" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a61" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a62" value="checked"></td>
					      <td align="center" colspan="3" style="border-right:1px solid #800080; border-left-style: solid; border-left-width: 1; border-top-style: none; border-top-width: medium; " border="">
					      <input type="checkbox" name="a63" value="checked"></td>
					      </tr>
					    <tr>
					      <td align="center" colspan="3" style="border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px ; border-bottom-style: solid; border-bottom-width: 1" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					      <td align="center" colspan="3" style="border-left-style: none; border-left-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" border="">&nbsp;</td>
					    </tr>
					    <tr>
					      <td align="center" colspan="3" style="border-left:1px solid #800080; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a64" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a65" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a66" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a67" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a68" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a69" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a70" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a71" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a72" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a73" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a74" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a75" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a76" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a77" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a78" value="checked"></td>
					      <td align="center" colspan="3" style="border-right:1px solid #800080; border-left-style: solid; border-left-width: 1; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a79" value="checked"></td>
					    </tr>
					    <tr>
					      <td align="center" style="border-left:1px solid #800080; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a80" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a81" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a82" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a83" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a84" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a85" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a86" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a87" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a88" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a89" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a90" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a91" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a92" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a93" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a94" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a95" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a96" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a97" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a98" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a99" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a100" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a101" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a102" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a103" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a104" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a105" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a106" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a107" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a108" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a109" value="checked"></td>
					      <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a110" value="checked"></td>
					      <td align="center" style="border-style: none; border-width: medium" border="">
					      &nbsp;</td>
					      <td align="center" style="border-right:1px solid #800080; border-left-style: none; border-left-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a111" value="checked"></td>
					    </tr>
					    <tr>
					      <td align="center" colspan="3" style="border-left:1px solid #800080; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a112" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a113" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a114" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a115" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a116" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a117" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a118" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a119" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a120" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a121" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a122" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a123" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a124" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a125" value="checked"></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a126" value="checked"></td>
					      <td align="center" colspan="3" style="border-right:1px solid #800080; border-left-style: solid; border-left-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <input type="checkbox" name="a127" value="checked"></td>
					    </tr>
					    <tr>
					      <td align="center" colspan="3" style="border-left:1px solid #800080; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>48</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>47</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>46</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>45</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>44</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>43</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>42</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>41</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>31</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>32</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>33</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>34</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>35</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>36</font></b></td>
					      <td align="center" colspan="3" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>37</font></b></td>
					      <td align="center" colspan="3" style="border-right:1px solid #800080; border-left-style: solid; border-left-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" border="">
					      <b><font>38</font></b></td>
					    </tr>
					  </tbody>
					  </table>
 				 </div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" onclick="insertar_historia();" class="btn btn-primary">Registrar
							</button>
						 	
						 	<a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
							
						</div>
						 @endforeach
					</div>
					<!-- /.col-lg-12 -->
				</form>
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
$(document).ready(function () {
  $("#fecha").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});
  $(".notification").fadeTo(3000, 500).slideUp(500, function(){
      $(".notification").slideUp(500);
  });
  var monkeyList = new List('pacientes', {
    valueNames: ['name'],
    page: 3,
    pagination: true
  });
var monthNames = [ "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December" ];
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
var newDate = new Date();
newDate.setDate(newDate.getDate() + 1);    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
 });
function insertar_historia(){

	 var myLanguage = {              
            errorTitle: 'El formulario fallo en enviarse',
            requiredFields: 'No se ha introducido datos',
            badTime: 'No ha dado una hora correcta',
            badEmail: 'No ha dado una direccion de email correcta',
            badTelephone: 'No ha dado un numero de telefono correcto',
          
       }
          
    $.validate({
    modules : 'logic',
    language: myLanguage,
    form : '#form_familiares',
    onError : function($form) {
     // alert('Validation of form '+$form.attr('id')+' failed!');
    },
    onSuccess : function($form) {
      //alert('The form '+$form.attr('id')+' is valid!');
      //return false; // Will stop the submission of the form
      console.log($("#form_familiares")[0]);
      var formData = new FormData($("#form_familiares")[0]);

          $.ajax({
            url: "{{ url('/resumen_medico') }}",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(){
                //popover_show();
                new PNotify({
                      title: 'Registro Exitoso',
                      text: 'El resumen han sido almacenado!',
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
    
    onElementValidate : function(valid, $el, $form, errorMess) {
      console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
    }
  });
	
                
}
function calcular(){
		console.log($("#form_familiares")[0]);
      var formData = new FormData($("#form_familiares")[0]);
}


function contar() 
{	
		var formulario = $("#form_familiares")[0];
		var cont = 0; //Variable que lleva la cuenta de los checkbox pulsados
		for (var x=0; x < 137; x++)
		{
		  if (formulario.elements[x].checked) 
		  {   cont = cont + 1;  }
		}
  if (formulario.sr.value == "")
  {
    alert("Debe ingresar primero un valor en el campo Número de dientes presentes");
    formulario.sr.focus();
    return (false);
  }
  else
  {		
		formulario.elements.sp.value=cont;		
		var sreg=formulario.elements.sr.value*4;
		formulario.elements.ns.value=sreg;
		formulario.elements.indice.value=(cont*100)/sreg;
  }
}

</script>
@endsection