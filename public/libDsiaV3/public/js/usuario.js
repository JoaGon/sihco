//************************************************* Inicio funciones comunes *************************************************
var isNav = (navigator.appName.indexOf("Netscape") !=-1);
if (isNav){
	event = document.captureEvents(Event.MOUSEDOWN);
}
/* Despliega la tabla pasada por parametro */
function mostrar_tablaIFN(nom_tabla)
{
	var tblBuscar = document.getElementById(nom_tabla);
	tblBuscar.className = "visible-Tbl";
//	x = "500px";
//	y = "10px";
	xpos = (screen.availWidth/3)
	ypos = (screen.availHeight/3)	
	tblBuscar.style.top = (document.documentElement.scrollTop+ypos) + 'px';
	tblBuscar.style.left = (document.documentElement.scrollLeft)+xpos + 'px';
		
//	tblBuscar.style.left = x;
//	tblBuscar.style.top =  y;
}
function mostrar_tabla(nom_tabla)
{
  var tblBuscar = document.getElementById(nom_tabla);
  y = "20%";
  x = "60%";
  tblBuscar.className = "visible-Tbl";
  tblBuscar.style.left = x;
  tblBuscar.style.top =  y;
}
/* Oculta la tabla pasada por parametro */
function ocultar_tabla(nom_tabla)
{
	document.getElementById(nom_tabla).className = "invisible-Tbl";
}
function xajax_modificarPassword()
{
	xajax.xajaxRequestUri="../../mod/comun/usuario.xajax.php";
	return xajax.call("modificarPassword", arguments);
}

function modificarPassword()
{
	password = document.getElementById('Act_Password').value;
	password1 = document.getElementById('Re_Act_Password').value;

	if(password==password1)
	{
		id = document.getElementById('usuarioid').value;
		document.getElementById('Act_Password').value = "";
		document.getElementById('Re_Act_Password').value = "";
		xajax_modificarPassword(id,password)
	}
	else
	{
		alert("passwords diferentes, por favor reingrese los passwords");
		document.getElementById('Act_Password').value = "";
		document.getElementById('Act_Password').focus;
	}
}