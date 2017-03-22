<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd"
>
<html lang="es">
<head>
<title>Probando el comportamiento draggable de jQueryUI</title>
<!--   <link type="text/css" href="css/blitzer/jquery-ui-1.8.16.custom.css" rel="Stylesheet" id="linkestilo" />-->
   <link type="text/css" href="{{url('jqueryui/jquery-ui.css')}}" rel="Stylesheet" />
   <script type="text/javascript" src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
   <script type="text/javascript" src="{{ url('jqueryui/jquery-ui.min.js')}}"></script>   
   <style type="text/css">
   body{
      font-family: sans-serif;
   }
   h1{
      padding: 10px;
      font-size: 30px;
   }
   #contenedor{
      width: 500px;
      height: 300px;
      border: 1px solid #ccc;
      overflow: auto;
      float: left;
   }
   #arrastrame{
      position: relative;
      top: 10px;
      left: 20px;
      width: 160px;
      padding: 7px;
      font-size: 10px;
      font-weight: bold;
      text-align: center;
   }
   #posicion{
      font-size: 12px;
      margin-left: 520px;
      line-height: 150%;
   }
   .ui-draggable{
      background: #feb;
   }
   .ui-draggable-dragging{
      background: #def;
   }
   </style>
<!--   <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>-->
<!--   <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>-->
   <script type="text/javascript">
      $(document).ready(function(){
         $("#arrastrame").draggable({
            containment: 'parent',
            drag: function(event, ui){
               $("#posx").text(ui.position.left);
               $("#posy").text(ui.position.top);
               
               $("#offsetx").text(ui.offset.left);
               $("#offsety").text(ui.offset.top);
            }
         })
      })
   </script>
</head>
<body>
   <h1 class="ui-state-default ui-corner-all">Probando la funcionalidad "draggable"</h1>
   <div id="contenedor">
      <div id="arrastrame" class="ui-corner-all ui-state-highlight">Arrastra esta capa!</div>
   </div>
   <div id="posicion">
      Coordenadas del elemento relativas al contenedor:
      <br>
      X: <span id="posx"></span>
      <br>
      Y: <span id="posy"></span>
      <br>
      <br>
      Coordenadas del elemento absolutas a la página:
      <br>
      X: <span id="offsetx"></span>
      <br>
      Y: <span id="offsety"></span>
   </div>
</body>
</html>