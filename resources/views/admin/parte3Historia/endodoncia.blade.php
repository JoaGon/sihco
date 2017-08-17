@extends('admin-layout.sidebarAdmin')

@section('content')

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
      @endif

      @foreach ($pacientes as $paciente)
   
      <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" background-color:white;padding-left:0; margin-top: 25px">    
        
                
                <div style="font-size: 20px; text-align: center; color:#59bddd;">Ficha Clinica para Endodoncia</div>
                    
               <form class="form-horizontal" id="form_familiares">
                {{ csrf_field() }}
                <input type="hidden" name="consulta_id" value={{$consulta}} >
                <input type="hidden" name="paciente_id" value="{{$paciente->id_paciente}}">
                <input type="hidden" name="historia" value="{{$paciente->nro_historia}}">
               
                <div class="form-group">  
                    <div class="col-md-4">              
                    <label for="motivo">Nombre</label>
                               <textarea class="form-control" disabled cols="25" autofocus="true" rows="1" name="nombre">{{$paciente->nombre }} {{ $paciente->apellido }}</textarea>
                    </div>  
                    <div class="col-md-4">    
                      <label for="motivo" class="">C.I:</label>           
                                <textarea class="form-control"  disabled cols="75" autofocus="true" rows="1" name="ci">{{ $paciente->ci }}</textarea>

                    </div>
                    <div class="col-md-4">
                      <label for="motivo" class="">Fecha Consulta</label>
                      <input class="form-control" id="fecha" type="text" class="form-control" name="fecha" data-validation="required" data-validation-error-msg="Debe ingrear una fecha" value="{{ old('fecha') }}">
                    </div>     
                </div>
                <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                      Reaccion Frente A:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="frio" id="frio" value="S"> Frio
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="calor" id="calor" value="S">Calor
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="masticacion" id="masticacion" value="S"> Masticacion
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="palpacion" id="palpacion" value="S"> Palpacion
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="percusion_vertical" id="percusion_vertical" value="S"> Percusion Vertical
                    </div>
                   
                  </div>
                   <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                      Dolor
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_localizado" id="dolor_localizado" value="S"> Localizado
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_difuso" id="dolor_difuso" value="S">Difuso
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_provocado" id="dolor_provocado" value="S"> Provocado
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_espontaneo" id="dolor_espontaneo" value="S"> Espontaneo
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_constante" id="dolor_constante" value="S"> Constante 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_intermitente" id="dolor_intermitente" value="S"> Intermitente 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_palpitante" id="dolor_palpitante" value="S"> Palpitante 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_referido" id="dolor_referido" value="S"> Referido 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="ausencia_dolor" id="ausencia_dolor" value="S"> Ausencia de Dolor 
                    </div>
                   
                  </div>
                   <div class="row row_border ">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              Diente a Tratar
                            </div>
                            <div class="col-lg-12">
                               <input type="text" class="form-control" name="diente_tratar" id="diente_tratar" value=""> 
                            </div>
                  </div>
            
                 <div class="row row_border ">
                            
                            <div class="col-lg-12">
                                <textarea name="observacion" id="observacion" placeholder="Observaciones" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                            </div>
                  </div>
                   <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Clinico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="infla_intraoral" id="infla_intraoral" value="S"> Inflamacion Intraoral
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="infla_extraoral" id="infla_extraoral" value="S">Inflamacion Extraoral
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="fistula" id="fistula" value="S"> Fistula
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="caries" id="caries" value="S"> Caries
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="obsturaciones" id="obsturaciones" value="S"> Obsturaciones
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="coronas_metal" id="coronas_metal" value="S">Coronas de metal
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="fractura_corona" id="fractura_corona" value="S"> Fractura Coronal
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="fisura" id="fisura" value="S"> Fisura
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="cambio_color" id="cambio_color" value="S"> Cambio de Color
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="movilidad" id="movilidad" value="S">Movilidad
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="polipo_pulpar" id="polipo_pulpar" value="S"> Polipo pulpar
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="faceta_articular" id="faceta_articular" value="S"> Facetas Articulares
                    </div>
                   
                  </div>
                   <div class="row row_border">                  
                       <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Estomatologico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="labios" id="labios" value="S"> Labios
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="lengua" id="lengua" value="S">Lengua
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="paladar_duro" id="paladar_duro" value="S"> Paladar duro
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="paladar_blando" id="paladar_blando" value="S"> Paladar blando
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="frenillos" id="frenillos" value="S"> Frenillos
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="mucosa_oral" id="mucosa_oral" value="S">Mucosa oral
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="piso_boca" id="piso_boca" value="S"> Piso de boca
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="glandulas_salivales" id="glandulas_salivales" value="S"> Glandulas Salivales
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="sist_linfatico" id="sist_linfatico" value="S"> Sist, Litifatico regional
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="musculos_masticatorios" id="musculos_masticatorios" value="S">Mucsculos masticatorios
                      </div>
                  </div>
                   
                 <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Periodontal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="placa" id="placa" value="S"> Placa
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="calculos" id="calculos" value="S">Calculos
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="gingivitis" id="gingivitis" value="S"> Gingivitis
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="periodontitis" id="periodontitis" value="S"> Periodontitis
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="bolsa_periodontal" id="bolsa_periodontal" value="S"> Bolsa periodontal (sondaje)
                    </div>
                   
                  </div>
                      <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Pruebas de Sensibilidad:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="test_cavidad" id="test_cavidad" value="S"> Test de la cavidad
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="prueba_electrica" id="prueba_electrica" value="S">Prueba electrica
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="frio_sensibilidad" id="nervios_tratamiento" value="S"> Frio
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="calor_sensibilidad" id="reaccion_anestesico" value="S"> Calor
                    </div>
                   
                  </div>
                     <div class="row row_border">                  
                       <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Radiografico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="espacio_periodontal" id="espacio_periodontal" value="S"> Espacio periodontal normal
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="perdida_alveolar" id="perdida_alveolar" value="S">Perdida de la cortical alveolar
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="zona_radiolucida" id="zona_radiolucida" value="S"> Zona radiolucida Apical
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="zona_radiolucida_lateral" id="zona_radiolucida_lateral" value="S"> Zona radiolucida Lateral
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="zona_radiolucida_furca" id="zona_radiolucida_furca" value="S"> Zona radiolucida Furca
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reabsorcion_interna" id="reabsorcion_interna" value="S">Reabsorcion Interna
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reabsorcion_externa" id="reabsorcion_externa" value="S"> Reabsorcion Externa
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="radiopacidad_apical" id="radiopacidad_apical" value="S"> Radiopacidad Apical
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="raiz_formacion" id="raiz_formacion" value="S"> Raiz en Formacion
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nucleo" id="nucleo" value="S">Nucleo
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="fractura_radicular" id="fractura_radicular" value="S"> Fractura radicular
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="tratamiento_endodontico" id="tratamiento_endodontico" value="S">Tratamiento Endodontico
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="otros" id="otros" value="S">Otros
                      </div>
                  </div>
                 <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Etiologia:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="bacteriana" id="bacteriana" value="S"> Bacteriana
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="quimica" id="quimica" value="S">Quimica
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="fisica" id="fisica" value="S"> Fisica
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="trauma" id="trauma" value="S"> Trauma
                    </div>
                   
                  </div>               

                <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Finalidad del Tratamiento:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="fines_protesicos" id="fines_protesicos" value="S"> Fines protesicos
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="fines_terapeuticos" id="fines_terapeuticos" value="S">Fines Terapeuticos
                      </div>
                   
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
            url: "{{ url('/endodoncia') }}",
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
                      text: 'La historia ha sido almacenada!',
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
</script>

@endsection
