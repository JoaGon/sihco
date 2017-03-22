var isNav = (navigator.appName.indexOf("Netscape") !=-1);
if (isNav){
	event = document.captureEvents(Event.MOUSEDOWN);
}
/**
* Visualiza los valores disponibles para el campo seleccionado
*/
function buscarValores(){
//	alert("entro")
//	document.getElementById('campo').value = campoSeleccionado;
//	capaTematica = document.getElementById('capa').value;
//	alert(capaTematica +","+ campoSeleccionado)
	xajax_buscarValores();
}
function xajax_buscarValores(){
	xajax.xajaxRequestUri="../../mod/comun/test1.xajax.php";
	return xajax.call("buscarValores", arguments);
}