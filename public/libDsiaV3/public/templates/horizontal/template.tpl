<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
	<title>{$NOM_PROYECTO}</title>
		
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	
	<link rel="stylesheet" type="text/css" href="{$PATH_TEMPLATE}marco.css" />
	<link rel="stylesheet" type="text/css" href="{$PATH_CSS}formulario.css" />
	<link rel="stylesheet" type="text/css" href="{$PATH_TEMPLATE}menu.css" />
	<link rel="stylesheet" type="text/css" href="{$PATH_CSS}sexylightbox.css" />

<!-- Configuracion del calendario -->
	<link rel='stylesheet' type='text/css' media='all' href='{$PATH_JS}jscalendar/calendar-blue.css' title='winter' />
	<script type='text/javascript' src='{$PATH_JS}jscalendar/calendar.js'></script>
	<script type='text/javascript' src='{$PATH_JS}jscalendar/lang/calendar-es.js'></script>
	<script type='text/javascript' src='{$PATH_JS}jscalendar/calendar-setup.js'></script>
<!-- Configuracion del calendario -->
<!--Inicio Librerias grid-->	
	<link rel='stylesheet' type='text/css' href='{$PATH_CSS}grid/dhtmlxgrid.css'/>
	<link rel='stylesheet' type='text/css' href='{$PATH_CSS}grid/dhtmlxgrid_dhx_black.css'/>
	<script  src='{$PATH_JS}grid/dhtmlxcommon.js'></script>
	<script  src='{$PATH_JS}grid/dhtmlxgrid.js'></script>
	<script  src='{$PATH_JS}grid/dhtmlxgridcell.js'></script>
<!--Fin Librerias grid-->

<script type="text/javascript" src="../../../lib/xajax/xajax_js/xajax_uncompressed.js"></script>
<script type="text/javascript" src="{$PATH_JS}mootools-1.2.4-core-yc.js"></script>
<script type="text/javascript" src="{$PATH_JS}sexylightbox.v2.3.mootools.min.js"></script>

<!--	<script type='text/javascript' src='{$PATH_JS}menu.js'></script>-->
	<script type='text/javascript' src='{$PATH_JS}jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='{$PATH_JS}validar.js'></script>
	<!-- validaciones javascript -->
</head>
<body>

<div class="marco-principal">
<!--inicio marco-principal-->
	{include file="cabecera.tpl"}
	{include file="barra.tpl"}

	<div class="marco-contenido">
	<!--inicio marco-contenido-->
		<center>
		{if $desactivar != true}
			{include file=$PATH_MENU|cat:"menu.tpl"}
		{/if}
		<div class="marco-centro">
		<!--inicio marco-centro-->
			{include file="$pagina"}
		<!--fin marco-centro-->	
		</div>	
		</center><!--	
	marco-contenido
	--></div>
	{include file="pie.tpl"}
	<!--fin marco-principal-->
	</div>
	{literal}
	<script type="text/javascript">
  		window.addEvent('domready', function(){
	  		SexyLightbox = new SexyLightBox({color:'black', dir: 'sexyimages'});
  		});
	</script>	
	{/literal}
</body>
</html>