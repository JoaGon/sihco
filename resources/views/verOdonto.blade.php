

    <link type="text/css" href="{{url('jqueryui/jquery-ui.css')}}" rel="Stylesheet" />
    <script type="text/javascript" src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
     <link href="{{ url('js/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{ url('js/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{ url('js/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">

    <script>
    jQuery.noConflict();
    </script>
    <script type="text/javascript" src="{{ url('jqueryui/jquery-ui.min.js')}}"></script>
    <script src="{{url('/libDsiaV3/public/js/bootstrap/ie-emulation-modes-warning.js')}}"></script>
     <script src="{{ url('js/pnotify/dist/pnotify.js')}}"></script>/
    <script src="{{ url('js/pnotify/dist/pnotify.buttons.js')}}"></script>
    <script src="{{ url('js/pnotify/dist/pnotify.nonblock.js')}}"></script>
    <script src="{{ url('js/form-validator/jquery.form-validator.min.js') }}"></script>

    <style type="text/css">
    body {
        /*background-color: #E3E0F9;*/
        font-family: sans-serif;
        /*font-size: 0.875em;*/
    }
    
    .btn-warning {
        color: #fff;
        background-color: #ffe5bf!important;
        border-color: #eea236;
    }
    
    .botonletra {
        /*
  background-color: #E3E0F9;
  font-size: 2px;
  padding: 5px;
  z-index: 5000;
  border: 1px solid;
  width: 30px;
  */
    }
    
    .botonesletras {
        width: 30px;
    }
    
    .dialogletra {
        cursor: move;
        font-size: 1em;
        text-align: center;
        padding-top: 1px;
        z-index: 50;
        font-size: 1em;
        position: absolute !important;
        width: auto !important;
        height: auto !important;
    }
    
    .elemSeleccionado {
        / *background: #E3E0F9;
        height: 100%;
        position: absolute;
        width: 80%;
        left: 15px;
        top: 3px;
    }
    </style>
    <script>
    var array = [];

    function test(idMover) {
        var x = jQuery(document);
        x.ready(inicio);

        function inicio() {
            var x = jQuery("#" + idMover);
            x.draggable({
                containment: 'parent',
                drag: function(event, ui) {
                    jQuery("#posx").text(ui.position.left);
                    jQuery("#posy").text(ui.position.top);

                    jQuery("#offsetx").text(ui.offset.left);
                    jQuery("#offsety").text(ui.offset.top);
                }
            });

        }
    }

    function dibujar() {
        elementos = jQuery("#imagenesSel").val();
        //alert('con: '+elementos);
        arrayElementos = elementos.split(';');
        for (var i in arrayElementos) {
            //      document.write(ss[i]);
            //      document.write("<br/>");
            arrayElementos1 = arrayElementos[i].split(':');
            arrayElementos2 = arrayElementos1[0].split('_');
            console.log(arrayElementos1, arrayElementos2)
            if (arrayElementos2[1] != undefined) {
                posLeft = arrayElementos1[1];
                posTop = arrayElementos1[2];
                cad = '<div ondblclick="eliminar(this.id)" id="' + arrayElementos1[0] + '" class="dialogletra" title="Pulsado" style="position:relative;left:' + posLeft + ';top:' + posTop + '"><img src="../../imgOdont/' + arrayElementos2[1] + '.gif"></div>';
                //\       document.write(cad);
                jQuery("#elementoSeleccionado").append(cad);
            }
        }
        arrayElementos1 = elementos.split(':');
        nomImagen = arrayElementos1
    }

    function eliminar(valDiv) {
        jQuery("#" + valDiv).remove();
        valElemento = parseInt(valElemento) - 1;
        jQuery("#numElemento").val(valElemento);
    }
    jQuery(document).ready(function() {

  jQuery("#fecha").datepicker({dateFormat: "yy-mm-dd", changeYear: true, changeMonth: true});

        var letras = ['abajo', 'abfraccion', 'abrasion', 'absceso', 'abstraccion', 'arriba', 'atricion',
            'bifurcacion', 'caries', 'cariesmed', 'cariespeq', 'cavidades', 'contacto', 'coronaB', 'coronaD', 'cuspide',
            'diastemas', 'e_cerrado', 'empaquetam', 'endo_realizado', 'endodontico', 'erosion',
            'extruccion', 'f_derecha', 'f_izquierda', 'fistula', 'hemopus', 'hemorragia',
            'i', 'ii', 'iii', 'inclinacion', 'intruccion', 'iv', 'pausente',
            'protesis_d', 'puente_fijo', 'puente_remo', 'pus', 'rd', 'rebordes', 'restauraciones',
            'ri', 'rpresentes', 'serosidad', 'trifurcacion', 'rd', 'rebordes', 'restauraciones'
        ];
        n = letras.length;
        n1 = parseInt(n / 2);
        for (i = 0; i < n1; i++) {
            //        letraActual = jQuery('<span class="botonletra"><img src="imgOdont/' + letras[i] + '.gif"></span>');
            letraActual = jQuery('<button type="button" class="botonletra btn btn-warning"><img src="../../imgOdont/' + letras[i] + '.gif"></button>');
            letraActual.data("letra", letras[i]);
            letraActual.button();
            jQuery("#botonesletras1").append(letraActual);
        }
        for (i = n1; i < n; i++) {
            //      letraActual = jQuery('<span class="botonletra"><img src="imgOdont/' + letras[i] + '.gif"></span>');
            letraActual = jQuery('<button type="button" class="botonletra btn btn-warning"><img src="../../imgOdont/' + letras[i] + '.gif"></button>');
            letraActual.data("letra", letras[i]);
            letraActual.button();
            jQuery("#botonesletras2").append(letraActual);
        }
        jQuery(".botonletra").click(function() {
            valElemento = jQuery("#numElemento").val();
            var caja = jQuery('<div id="arrastrable' + valElemento + '_' + jQuery(this).data("letra") +
                '" ondblclick="eliminar(this.id)" class="dialogletra" title="Pulsado"><img src="../../imgOdont/' +
                jQuery(this).data("letra") + '.gif"></div>').prependTo('#elementoSeleccionado');
            test("arrastrable" + valElemento + '_' + jQuery(this).data("letra"));
            valElemento = parseInt(valElemento) + 1;
            jQuery("#numElemento").val(valElemento);
        })
        jQuery("#btnGuardar").click(function() {
            numElemento = jQuery("#numElemento").val() - 1;
          //  alert("aca estoy con " + numElemento);
            valor = '';
            array = []
            jQuery(".dialogletra").each(function() {
                var elemento = this;
                var posicion = jQuery(this).position();
                valor = valor + ';' + elemento.id + ':' + posicion.left + ':' + posicion.top;
                //alert("elemento.id=" + elemento.id + "left: " + posicion.left + ", top: " + posicion.top);
                var obj = {
                    'elemento': elemento.id,
                    'left': posicion.left,
                    'top': posicion.top
                }
                array.push(obj);
            });
            jQuery("#imagenesSel").val(valor);
            console.log(jQuery("#imagenesSel").val(), array);
            var formData = new FormData(jQuery("#form_familiares")[0]);
            formData.append('elementos', JSON.stringify(array));

           jQuery.ajax({
                url: "{{ url('/save_odonto') }}",
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
                        text: 'El Odontodiageama ha sido almacenado!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    console.log('exito')
                },
                error: function(e) {
                    console.log('Error!!!', e);
                }
            });

        })
    });
    </script>
<div class="container">
 <div class="row">
        <div class="col-lg-10 col-sm-8 col-sm-offset-4 col-lg-offset-2 col-md-offset-4">
   <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">
                <div style="font-size: 20px; text-align: center; color:#59bddd;">
                    Odontograma
                </div>
    <form class="form-horizontal" id="form_familiares">
    @foreach ($pacientes as $paciente)
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
       
        <input type="hidden" name="consulta_id" value={{$consulta}}>
        <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
        <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
        <input style="display: none" size="200px" id="imagenesSel" value='
;arrastrable2_abrasion:500.00001525878906:171;arrastrable1_abfraccion:450:169;arrastrable0_abajo:80:169' type="text" readonly>
        <input id="numElemento" value='0' type="hidden" readonly>
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1">
                <div id="botonesletras1" class="botonesletras"></div>
            </div>
            <div class="col-xs-9 col-md-9">
                <div id="elementoSeleccionado" class="elemSeleccionado">
                </div>
                <div id="imagenOdontodiagrama"><img src="{{url('imgOdont/CLAVES1.GIF')}}"></div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1">
                <div id="botonesletras2" class="botonesletras"></div>
            </div>
        </div>
        <div class=''></div>
        <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                       <a type="button" id="btnGuardar" class="btn btn-primary">Registrar
                        </a>
                        <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
        @endforeach
    </form>
    </div>
    </div>
    </div>

</div>
<!--     Bootstrap core JavaScript-->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{url('/libDsiaV3/public/js/bootstrap/bootstrap.min.js')}}"></script>
<link href="{{url('/libDsiaV3/public/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{url('/libDsiaV3/public/js/bootstrap/ie10-viewport-bug-workaround.js')}}"></script>
<script>
//dibujar();
</script>