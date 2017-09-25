@extends('admin-layout.sidebarAdmin') 
@section('content')

    <link type="text/css" href="{{url('jqueryui/jquery-ui.css')}}" rel="Stylesheet" />
    <script type="text/javascript" src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ url('jqueryui/jquery-ui.min.js')}}"></script>
    <script src="{{url('/libDsiaV3/public/js/bootstrap/ie-emulation-modes-warning.js')}}"></script>
    <style type="text/css">
 #container2 { position: relative; }
      #imageView { border: 1px solid #000; }
      #imageTemp { position: absolute; top: 1px; left: 1px; }
       #container3 { position: relative; }
      #imageView2 { border: 1px solid #000; }
      #imageTemp2 { position: absolute; top: 1px; left: 1px; }
       #container4 { position: relative; }
      #imageView3{ border: 1px solid #000; }
      #imageTemp3 { position: absolute; top: 1px; left: 1px; }
     #container5 { position: relative; }
      #imageView4{ border: 1px solid #000; }
      #imageTemp4 { position: absolute; top: 1px; left: 1px; }
      .wPaint-theme-classic .wPaint-menu-holder {
    display:none !important;
}
#wPaint-demo1 {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/images_radiologia.png") !important;
    background-repeat: no-repeat !important;
    width: 900px !important;
    height: 300px !important;
    top: 30px !important;
    left: 10%;
}
#imageView {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/images_radiologia.png") !important;
    background-repeat: no-repeat !important;
    top: 30px !important;
    left: 10%;
   
}
#imageView2 {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/images_radiologia.png") !important;
    background-repeat: no-repeat !important;
    top: 30px !important;
    left: 10%;
   
}
#imageView3 {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/images_radiologia.png") !important;
    background-repeat: no-repeat !important;
    top: 30px !important;
    left: 10%;
   
}
#imageView4 {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/images_radiologia.png") !important;
    background-repeat: no-repeat !important;
    top: 30px !important;
    left: 10%;
   
}
#wPaint-demo2 {
    background-color: #fff !important;
    background-image: url("/sihco/public/images/images_radiologia.png") !important;
    background-repeat: no-repeat !important;
    width: 900px !important;
    height: 300px !important;
    top: 30px !important;
    left: 10%;
}

.wPaint-theme-classic .wPaint-menu-holder {
    border-color: #dadada !important;
    background-color: #f0f0f0 !important;
    top: -35px !important;
}
    </style>
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
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">
                <div style="font-size: 20px; text-align: center; color:#59bddd;">
                    Examen de la Oclusion
                </div>
                @if(session('status'))
            <div class="alert alert-success text-center notification">
                <ul style="list-style:none;">
                    <li style="font-size:16px;">{{ session('status') }}</li>
                </ul>
            </div>
            @endif
            @foreach ($pacientes as $paciente)

                <fieldset>
                <form class="form-horizontal" id="form_familiares">
                 {{ csrf_field() }}
                        <input type="hidden" name="consulta_id" value={{$consulta}}>
                    <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}"> <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
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
                                   1. Fremilus
                                </label> 
                            </div>
                            <div class="col-lg-12">
                                <textarea name="fremilus" id="fremilus" placeholder="Especifique" data-validation="required" data-validation-error-msg="Debe especificar" class="form-control" style="height: 100px;"></textarea>
                            </div>
                        </div>
                      
                        <div class="row row_border ">
                        <div class="col-lg-12">
                               <label>
                                  2. Oclusion
                               </label> 
                           </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                          1- Normoclusion <input type="checkbox" name="normoclusion" id="normoclusion" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                          2- Clase II <input type="checkbox" name="clase_dos" id="clase_dos" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                          3- Clase III <input type="checkbox" name="clase_tres" id="clase_tres" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                         4-  Abierta:
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                          5- A tope: 
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                         6- Cruzada:
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Anterior <input type="checkbox" name="abierta_anterior" id="abierta_anterior" value="S">
                           
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                            Anterior <input type="checkbox" name="a_tope_anterior" id="a_tope_anterior" value="S">
                           </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                            Anterior <input type="checkbox" name="cruzada_anterior" id="cruzada_anterior" value="S">
                        </div>
                      
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Posterior: Derecha <input type="checkbox" name="abierta_posterior_derecha" id="abierta_posterior_derecha" value="S">
                           Izquierda <input type="checkbox" name="abierta_posterior_izquierda" id="abierta_posterior_izquierda" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Posterior: Derecha <input type="checkbox" name="a_tope_posterior_derecha" id="a_tope_posterior_derecha" value="S">
                           Izquierda <input type="checkbox" name="a_tope_posterior_izquierda" id="a_tope_posterior_izquierda" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Posterior: Derecha <input type="checkbox" name="cruzada_posterior_derecha" id="cruzada_posterior_derecha" value="S">
                           Izquierda <input type="checkbox" name="cruzada_posterior_izquierda" id="cruzada_posterior_izquierda" value="S">
                       </div>
                       </div>
                
                       <div class="row row_border ">
                       <div class="col-lg-12">
                               <label>
                                   3. Sobremordida
                               </label> 
                           </div>
                           <div class="col-lg-6">Horizontal
                               <input type="text" id="sobremordida_horizontal" name="sobremordida_horizontal" class="form-control" placeholder="mm">
                           </div>
                           <div class="col-lg-6">Vertical
                               <input type="text" id="sobremordida_vertical" name="sobremordida_vertical" class="form-control" placeholder="mm">
                           </div>
                       </div>
                            <div class="row row_border ">
                       <div class="col-lg-12">
                               <label>
                                   4. Desviacion de la linea media dental:
                               </label> 
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4">
                           Ninguna <input type="checkbox" name="desviacion_ninguna" id="desviacion_ninguna" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Hacia la Derecha <input type="checkbox" name="desviacion_derecha" id="desviacion_derecha" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Hacia la Izquierda <input type="checkbox" name="desviacion_izquierda" id="desviacion_izquierda" value="S">
                       </div>
                       </div>
                       <div class="row row_border ">
                       <div class="col-lg-12">
                               <label>
                                  5. Dimension Vertical:
                               </label> 
                           </div>
                           <div class="col-lg-4">Normal
                           <input type="text" id="dimension_normal" name="dimension_normal" class="form-control" placeholder="mm">
                       </div>
                       <div class="col-lg-4">Aumentada
                           <input type="text" id="dimension_aumentada" name="dimension_aumentada" class="form-control" placeholder="mm">
                       </div>
                       <div class="col-lg-4">Disminuida
                           <input type="text" id="dimension_disminuida" name="dimension_disminuida" class="form-control" placeholder="mm">
                       </div>
                       <div class="col-lg-12">Espacio Libre:
                       D.V.R<input type="text" id="dvr" name="dvr" class="form-control" placeholder="mm">
                           D.V.O<input id="dvo" name="dvo" type="text" class="form-control" placeholder="mm">
                           =<input type="text" class="form-control" placeholder="mm">
                           
                       </div>

                       </div>
                  
                       <div class="row">
                             <div class="col-lg-12">
                               <label>
                                  6. Incluya en un circulo los contactos prematuros en relacion centrica
                               </label> 
                           </div>
                       <div id="wPaint-demo1" class="col-lg-10" style="position:relative; width:500px; height:200px; background-color:#7a7a7a; margin:70px auto 20px auto;"></div>
                       <div><a type="button" onclick="clean()" class="btn btn-primary">Clear</a></div>
                           <center id="wPaint-img"></center>
                       </div>

                  
                       <div class="row row_border ">
                       <div class="col-lg-12">
                               <label>
                                   7. Deslizamiento en centrica:
                               </label> 
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4">
                           Anterior (> de 2mm)<input type="checkbox" name="deslizamiento_anterior" id="deslizamiento_anterior" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Derecha<input type="checkbox" name="deslizamiento_derecha" id="deslizamiento_derecha" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Izquierda<input type="checkbox" name="deslizamiento_izquierda" id="deslizamiento_izquierda" value="S">
                       </div>
                       </div>

                       <div class="row">
                        <div class="col-lg-12">
                               <label>
                                   8. Incluya en un circulo los contactos en maxima intercuspidacion:
                               </label> 
                           </div>
                       <p><label>Drawing tool: 
                       <select id="dtool">
                        <option value="line">Line</option>
                        <option value="rect">Rectangle</option>
                        <option value="pencil">Pencil</option>
                        <option value="circle">Circle</option>
                        </select></label></p>

                    <div id="container2" width="400" height="300" class="col-lg-10 col-sm-8">
                      <canvas  id="imageView" style="left:100px" width="750" height="300">
                        <p>Unfortunately, your browser is currently unsupported by our web
                        application.  We are sorry for the inconvenience. Please use one of the
                        supported browsers listed below, or draw the image you want using an
                        offline tool.</p>
                        <p>Supported browsers: <a href="http://www.opera.com">Opera</a>, <a
                          href="http://www.mozilla.com">Firefox</a>, <a
                          href="http://www.apple.com/safari">Safari</a>, and <a
                          href="http://www.konqueror.org">Konqueror</a>.</p>
                      </canvas>
                    </div>   

               </div>
                       <div class="row">
                     <div class="col-lg-12">
                               <label>
                                   9. Incluya en un circulo  interferencias en lateralidad: Derecho
                               </label> 
                           </div>
                       <p><label>Drawing tool: 
                       <select id="dtool">
                        <option value="line">Line</option>
                        <option value="rect">Rectangle</option>
                        <option value="pencil">Pencil</option>
                        <option value="circle">Circle</option>
                        </select></label></p>

                    <div id="container3" width="400" height="300" class="col-lg-10 col-sm-8">
                      <canvas  id="imageView2" style="left:100px" width="750" height="300">
                        <p>Unfortunately, your browser is currently unsupported by our web
                        application.  We are sorry for the inconvenience. Please use one of the
                        supported browsers listed below, or draw the image you want using an
                        offline tool.</p>
                        <p>Supported browsers: <a href="http://www.opera.com">Opera</a>, <a
                          href="http://www.mozilla.com">Firefox</a>, <a
                          href="http://www.apple.com/safari">Safari</a>, and <a
                          href="http://www.konqueror.org">Konqueror</a>.</p>
                      </canvas>
                    </div>
                    </div>  
                       <div class="row">
                     <div class="col-lg-12">
                               <label>
                                   9. Incluya en un circulo  interferencias en lateralidad: Izquierdo
                               </label> 
                           </div>
                       <p><label>Drawing tool: 
                       <select id="dtool">
                        <option value="line">Line</option>
                        <option value="rect">Rectangle</option>
                        <option value="pencil">Pencil</option>
                        <option value="circle">Circle</option>
                        </select></label></p>

                    <div id="container4" width="400" height="300" class="col-lg-10 col-sm-8">
                      <canvas  id="imageView3" style="left:100px" width="750" height="300">
                        <p>Unfortunately, your browser is currently unsupported by our web
                        application.  We are sorry for the inconvenience. Please use one of the
                        supported browsers listed below, or draw the image you want using an
                        offline tool.</p>
                        <p>Supported browsers: <a href="http://www.opera.com">Opera</a>, <a
                          href="http://www.mozilla.com">Firefox</a>, <a
                          href="http://www.apple.com/safari">Safari</a>, and <a
                          href="http://www.konqueror.org">Konqueror</a>.</p>
                      </canvas>
                    </div>
                    </div>  
                         <div class="row">
                     <div class="col-lg-12">
                               <label>
                                   10. Incluya en un circulo la interferencia en el movimiento protrusivo
                               </label> 
                           </div>
                       <p><label>Drawing tool: 
                       <select id="dtool">
                        <option value="line">Line</option>
                        <option value="rect">Rectangle</option>
                        <option value="pencil">Pencil</option>
                        <option value="circle">Circle</option>
                        </select></label></p>

                    <div id="container5" width="400" height="300" class="col-lg-10 col-sm-8">
                      <canvas  id="imageView4" style="left:100px" width="750" height="300">
                        <p>Unfortunately, your browser is currently unsupported by our web
                        application.  We are sorry for the inconvenience. Please use one of the
                        supported browsers listed below, or draw the image you want using an
                        offline tool.</p>
                        <p>Supported browsers: <a href="http://www.opera.com">Opera</a>, <a
                          href="http://www.mozilla.com">Firefox</a>, <a
                          href="http://www.apple.com/safari">Safari</a>, and <a
                          href="http://www.konqueror.org">Konqueror</a>.</p>
                      </canvas>
                    </div>
                    </div>  
  
                       <div class="row row_border ">
                       <div class="col-lg-12">
                               <label>
                                   11. Guia Oclusal:
                               </label> 
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4">
                           Funcion de Grupo <input type="checkbox" name="funcion_grupo" id="funcion_grupo" value="S">
                       </div> 
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Guia Canina <input type="checkbox" name="guia_canina" id="guia_canina" value="S">
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           Guia Incisiva <input type="checkbox" name="guia_incisiva" id="guia_incisiva" value="S">
                       </div>
                       </div>
           
                       <div class="row row_border ">
                       <div class="col-lg-12">
                               <label>
                                   13. Movimientos Limites
                               </label> 
                           </div>
            
                           <div class="col-lg-6">Maxima Apertura
                               <input type="text" id="maxima_apertura" name="maxima_apertura" class="form-control" placeholder="mm">
                           </div>
                           <div class="col-lg-6">Maxima Lateralidad Derecha
                               <input type="text" id="maxima_lat_derecha" name="maxima_lat_derecha" class="form-control" placeholder="mm">
                           </div>
                              <div class="col-lg-6">Maxima Lateralidad Izquierda
                               <input type="text" id="deslizamiento_izquierda" name="deslizamiento_izquierda" class="form-control" placeholder="mm">
</div>
                           <div class="col-lg-6">Maxima protusion
                               <input type="text" id="maxima_protrusion" name="maxima_protrusion"  class="form-control" placeholder="mm">
                           </div>
                       </div>
                       <div class="row row_border ">
                       <div class="col-lg-12">
                               <label>
                                   14. Presencia de Dolor Articular
                               </label> 
                           </div>
                           <div class="col-lg-6">Maxima Apertura
                               <select  class="form-control"  name="max_apertura" id="max_apertura">
                                   <option value="1">Si</option>
                                   <option value="2">No</option>
                                   
                               </select>
                           </div>
                           <div class="col-lg-6">Maxima Lateralidad Derecha
                           <select  class="form-control"  name="maxima_lat_derecha" id="maxima_lat_derecha">
                               <option value="1">Si</option>
                               <option value="2">No</option>
                               
                           </select>
                       </div>
                       <div class="col-lg-6">Maxima Lateralidad Izquierda
                               <select class="form-control" name="max_lat_izquierda" id="max_lat_izquierda">
                                   <option value="1">Si</option>
                                   <option value="2">No</option>
                                
                               </select>
                           </div>
                           <div class="col-lg-6">Maxima protusion
                           <select  class="form-control"  name="max_protrusion" id="max_protrusion">
                               <option value="1">Si</option>
                               <option value="2">No</option>
                               
                           </select>
                       </div>
                           
                       </div>
                       
                       
                       <div class="form-group">
                           <div class="col-md-6 col-md-offset-4">
                           
                               <button id="registrar-button" type="submit" onclick="insertar_historia();" class="btn btn-primary">Registrar
                               </button>
                               <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
                           </div>
                         
                       </div>
                       <!-- /.col-lg-12 -->
                   </form>

                         @endforeach

</fieldset>
</div>
       
</div>
</div>

</div>


<!--     Bootstrap core JavaScript-->
<!-- Placed at the end of the document so the pages load faster -->
<!-- /.row -->
<!--<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
<!-- jQuery -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('template/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{url('template/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('js/list.min.js')}}"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="{{ url('lib/jquery.ui.core.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ url('lib/jquery.ui.widget.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ url('lib/jquery.ui.mouse.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ url('lib/jquery.ui.draggable.1.10.3.min.js')}}"></script>
<!-- wColorPicker -->
<link rel="Stylesheet" type="text/css" href="{{url('lib/wColorPicker.min.css')}}" />
<script type="text/javascript" src="{{ url('lib/wColorPicker.min.js')}}"></script>

<!-- wPaint -->
<link rel="Stylesheet" type="text/css" href="{{ url('src/wPaint.css')}}" />
<script type="text/javascript" src="{{ url('src/wPaint.utils.js')}}"></script>
<script type="text/javascript" src="{{ url('src/wPaint.js')}}"></script>
<!-- wPaint main -->
<script type="text/javascript" src="{{ url('src/plugins/main/src/fillArea.min.js')}}"></script>
<script type="text/javascript" src="{{ url('src/plugins/main/src/wPaint.menu.main2.js')}}"></script>
<!-- wPaint text -->
<script type="text/javascript" src="{{ url('src/plugins/text/src/wPaint.menu.text.js')}}"></script>
<!-- wPaint shapes -->
<script type="text/javascript" src="{{ url('src/plugins/shapes/src/shapes.min.js')}}"></script>
<script type="text/javascript" src="{{ url('src/plugins/shapes/src/wPaint.menu.main.shapes.js')}}"></script>
<!-- wPaint file -->
<script type="text/javascript" src="{{ url('src/plugins/file/src/wPaint.menu.main.file.js')}}"></script>
<script src="{{url('example-5.js')}}"></script>
<script src="{{url('example-6.js')}}"></script>
<script src="{{url('example-7.js')}}"></script>
<script src="{{url('example-8.js')}}"></script>


<script>

$(document).ready(function() {
   // init wPaint
   $('#wPaint-demo1').wPaint({
    menuOffsetLeft: -35,
    menuOffsetTop: -50,
    saveImg: saveImg,
    loadImgBg: loadImgBg,
    path: '../../src/',
    loadImgFg: loadImgFg,
    onShapeDown: createCallback('onShapeDown'),
    onShapeUp: createCallback('onShapeUp'),
    onShapeMove: createCallback('onShapeDMove')
});

$('#wPaint-demo2').wPaint({
    menuOffsetLeft: -35,
    menuOffsetTop: -50,
    saveImg: saveImg,
    path: '../../src/',
    loadImgBg: loadImgBg,
    loadImgFg: loadImgFg,
    onShapeDown: createCallback('onShapeDown'),
    onShapeUp: createCallback('onShapeUp'),
    onShapeMove: createCallback('onShapeDMove')
});
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

        url: "{{ url('/validar_resumen_odontologico') }}",
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            id_enfermedad: id_enfermedad
        },
        success: function(data) {
            PNotify.removeAll();
            new PNotify({
                title: 'Validacion Exitosa',
                text: 'Los Datos Clinicos han sido validados!',
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
function loadImgBg() {

    // internal function for displaying background images modal
    // where images is an array of images (base64 or url path)
    // NOTE: that if you can't see the bg image changing it's probably
    // becasue the foregroud image is not transparent.
    this._showFileModal('bg', images);
}

function loadImgFg() {

    // internal function for displaying foreground images modal
    // where images is an array of images (base64 or url path)
    this._showFileModal('fg', images);
}

function createCallback(cbName) {
    return function() {
        if (console) {
            console.log(cbName, arguments);
        }
    }
}
function clean(){
    console.log("llega")
    $('#wPaint-demo1').css('background-image',"url('/sihco/public/images/images_radiologia.png')"
    )
    var canvas = document.getElementById('wPaint-demo1');
  var context = canvas.getContext('2d');

  // do some drawing
  context.clear();

  // do some more drawing
  context.setTransform(-1, 0, 0, 1, 200, 200);
  // do some drawing with the new transform
  context.clear(true);
}
function saveImg(image) {
    var _this = this;
    console.log(image)
    $.ajax({
        type: 'POST',
        url: "{{url('/register_imaging')}}",
        data: {
            image: image
        },
        success: function(resp) {

            // internal function for displaying status messages in the canvas
            _this._displayStatus('Image saved successfully');

            // doesn't have to be json, can be anything
            // returned from server after upload as long
            // as it contains the path to the image url
            // or a base64 encoded png, either will work
            resp = resp;
            console.log(resp)
                // update images array / object or whatever
                // is being used to keep track of the images
                // can store path or base64 here (but path is better since it's much smaller)
            images.push(resp.img);

            // do something with the image
            $('#wPaint-img').append($('<img/>').attr('src', image));
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
    var c=document.getElementById("imageView");
    var d=c.toDataURL("image/png");
    var c2=document.getElementById("imageView2");
    var d2=c2.toDataURL("image/png");
    var c3=document.getElementById("imageView3");
    var d3=c3.toDataURL("image/png");
    var c4=document.getElementById("imageView4");
    var d4=c4.toDataURL("image/png");

    var c5=document.getElementById("test");
    var d5=c5.toDataURL("image/png");

  

//console.log("a0",d5)

    //var c=document.getElementById("img");
     // w.document.write("<img src='"+d+"' alt='from canvas'/>");

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

            formData.append('interferencia_derecha', d3);
            formData.append('interferencia_izquierda', d4);
            formData.append('contacto_en_maxima', d2);
            formData.append('interferencia_protrusivo', d5);
            formData.append('contacto_prematuro', d);



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/examen_oclusion') }}",
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
                        text: 'El examen ha sido almacenado!',
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
