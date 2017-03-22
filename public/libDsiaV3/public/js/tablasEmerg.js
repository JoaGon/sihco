//************************************************* Inicio funciones comunes *************************************************
var isNav = (navigator.appName.indexOf("Netscape") !=-1);
if (isNav){
	event = document.captureEvents(Event.MOUSEDOWN);
}
/* Despliega la tabla pasada por parametro */
function mostrar_tabla_rel(nom_tabla)
{
	var tblBuscar = document.getElementById(nom_tabla);
	tblBuscar.className = "visible-Tbl";
//	x = "500px";
//	y = "10px";
	xpos = (screen.availWidth/3)
	ypos = (screen.availHeight/2.5);	
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