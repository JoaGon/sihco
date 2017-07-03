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
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Frio
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Calor
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Masticacion
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Palpacion
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Percusion Vertical
                    </div>
                   
                  </div>
                   <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                      Dolor
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Localizado
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Difuso
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Provocado
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Espontaneo
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Constante 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Intermitente 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Palpitante 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Referido 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Ausencia de Dolor 
                    </div>
                   
                  </div>
                   <div class="row row_border ">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              Diente a Tratar
                            </div>
                            <div class="col-lg-12">
                               <input type="text" class="form-control" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value=""> 
                            </div>
                  </div>
            
                 <div class="row row_border ">
                            
                            <div class="col-lg-12">
                                <textarea name="rho_1" id="rho_1" placeholder="Observaciones" data-validation="required" data-validation-error-msg="Debe especificar el resumen" class="form-control" style="height: 100px;"></textarea>
                            </div>
                  </div>
                   <div class="row row_border">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Clinico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Inflamacion Intraoral
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Inflamacion Extraoral
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Fistula
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Caries
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Obsturaciones
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Coronas de metal
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Fractura Coronal
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Fisura
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Cambio de Color
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Movilidad
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Polipo pulpar
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Facetas Articulares
                    </div>
                   
                  </div>
                   <div class="row row_border">                  
                       <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Estomatologico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Labios
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Lengua
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Paladar duro
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Paladar blando
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Frenillos
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Mucosa oral
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Piso de boca
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Glandulas Salivales
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Sist, Litifatico regional
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Mucsculos masticatorios
                      </div>
                  </div>
                   
                 <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Periodontal:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Placa
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Calculos
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Gingivitis
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Periodontitis
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Bolsa periodontal (sondaje)
                    </div>
                   
                  </div>
                      <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Pruebas de Sensibilidad:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Test de la cavidad
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Prueba electrica
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Frio
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Calor
                    </div>
                   
                  </div>
                     <div class="row row_border">                  
                       <div class="col-lg-12 col-md-12 col-sm-12">
                      Examen Radiografico:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Espacio periodontal normal
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Perdida de la cortical alveolar
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Zona radiolucida Apical
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Zona radiolucida Lateral
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Zona radiolucida Furca
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Reabsorcion Interna
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Reabsorcion Externa
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Radiopacidad Apical
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Raiz en Formacion
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Nucleo
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="dolor_reciente_dentadura" id="dolor_reciente_dentadura" value="S"> Fractura radicular
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Tratamiento Endodontico
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Otros
                      </div>
                  </div>
                 <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Etiologia:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Bacteriana
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Quimica
                      </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="nervios_tratamiento" id="nervios_tratamiento" value="S"> Fisica
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="reaccion_anestesico" id="reaccion_anestesico" value="S"> Trauma
                    </div>
                   
                  </div>               

                <div class="row row_border">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      Finalidad del Tratamiento:
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="afectando_salud" id="afectando_salud" value="S"> Fines protesicos
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <input type="checkbox" name="apariencia_dientes" id="apariencia_dientes" value="S">Fines Terapeuticos
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
            url: "{{ url('/resumen_odontologico') }}",
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
</script>

@endsection
