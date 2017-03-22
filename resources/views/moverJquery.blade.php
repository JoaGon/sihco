
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
    >
<html lang="es">
<head>
    <title>Probando el comportamiento droppable de jQueryUI</title>
   <link type="text/css" href="{{url('jqueryui/jquery-ui.css')}}" rel="Stylesheet" />
   <script type="text/javascript" src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
   <script type="text/javascript" src="{{ url('jqueryui/jquery-ui.min.js')}}"></script>   
	<style type="text/css">
	body{
		background-color: #fc9;
		font-family: sans-serif;
		font-size: 0.875em;
	}
	#arrastrable{
		padding: 10px;
		background-color: #ff9;
		border: 1px solid #ccc;
		width: 100px;
		height: 30px;
		text-align: center;
		font-size: 0.75em;
	}
	#soltable{
		padding: 10px;
		background-color: #f90;
		border: 1px solid #ccc;
		width: 150px;
		height: 80px;
		text-align: center;
		margin-left: 200px;
	}
	.sueltaaqui{
		text-shadow: #0f0 1px 1px 5px;
		background-color: #fc9;
		font-weight: bold;
	}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#arrastrable").draggable({
				start: function(){
					$(this).html("Muy bien, ahora suéltalo allí!");
				},
				stop: function(){
					$(this).html("Este elemento lo puedes arrastrar...");
					alert('test');
				}
			});
			$("#soltable").droppable({
				tolerance: "fit",
				accept: ".tarea",
				drop: function( event, ui ) {
					$(this).html("Lo soltaste!!!");
				},
				out: function( event, ui ) {
					$(this).html("Ahora saliste...");
				}
			});
			
			$("#soltable").droppable("option", "activeClass", "sueltaaqui");
		})
	</script>
</head>
<body>
    <h1>Probando el comportamiento droppable de jQueryUI</h1>
	<div id="arrastrable" class="tarea">
		Este elemento lo puedes arrastrar...
	</div>
	<div id="soltable">
		Suelta el elemento arrastrable sobre este otro.
	</div>
</body>
</html>
