var REQUERIDO = 1;
var EMAIL = 2;
var URL = 3;
var PASSWORD = 4;
var LOGIN = 5;
var NOMBRE = 6;
var CEDULA = 7;
var RIF = 8;
var TELEFONO = 9;
var ENTERO = 10;
var REAL = 11;
var NOMBRETECNICO = 12;
var HORAMILITAR = 13;
var EMAILULA = 14;

var IGUALQUE = 101;
var MAYORIGUALQUE = 102;
var MAYORQUE = 103;
var FECHAMAYORIGUALQUE = 104;
var FECHAMAYORQUE = 105;

var campos = new Array();
var pares = new Array();
var rangos = new Array();
var errores = new Array();
var matCampos = new Array();

var MSG_SUPERIOR = "El formulario no ha sido llenado correctamente.";
var MSG_INFERIOR = "Por favor, corrija los errores e intente nuevamente.";
var ERROR_REQUERIDO = "El campo $1 es requerido.";
var ERROR_EMAIL =  "El campo $1 es una dirección de correo electrónico inválida";
var ERROR_EMAIL_ULA =  "El campo $1 debe ser correo ula (tuCorreo@ula.ve)";
var ERROR_URL =  "El campo $1 es una dirección Web inválida.";
var ERROR_LOGIN =  "El campo $1 es inválido. El campo debe contener más de 4 caracteres alfanuméricos (a-z A-Z 0-9 . _) sin espacios en blanco";
var ERROR_PASSWORD =  "El campo $1 es inválido. El campo debe contener al menos 6 caracteres (a-z A-Z) incluyendo al menos un caracter numérico (0-9)";
var ERROR_NOMBRE =  "El campo $1 es inválido. El campo debe contener solo caracteres (a-z A-Z)";
//var ERROR_CEDULA =  "El campo $1 es inválido. El campo debe contener solo números (0-9), con valores entre 100000 y 99999999";
var ERROR_CEDULA =  "El campo $1 es inválido. El campo debe iniciar con el caracter V o E seguido de 9 numeros (p.e. V013988745)";
var ERROR_RIF =  "El campo $1 es inválido. El campo debe ser de la forma L-01234567-8";
var ERROR_TELEFONO =  "El campo $1 es inválido. El campo debe ser de la forma 0123-0123456";
var ERROR_IGUALQUE =  "Los campos $1 y $2 no tienen el mismo valor.";
var ERROR_MAYORIGUALQUE =  "El campo $1 debe tener un valor mayor o igual que el campo $2.";
var ERROR_MAYORQUE =  "El campo $1 debe tener un valor mayor que el campo $2.";
var ERROR_ENTERO = "El campo $1 es inválido. El campo debe contener solo valores numéricos enteros";
var ERROR_REAL = "El campo $1 es inválido. El campo debe contener solo valores numéricos con el formato 123,00";
var ERROR_NOMBRETECNICO =  "El campo $1 es inválido. El campo debe contener solo caracteres alfanuméricos (a-z A-Z 0-9 +-/*()%., )";
var ERROR_RANGO =  "El campo $1 es inválido. El campo debe tener un valor entre $2 y $3.";
var ERROR_HORAMILITAR =  "El campo $1 es inválido. El campo debe estar expresado en horas y minutos con valores entre 00:00 y 23:59";

function comparar(id1, nombre1, id2, nombre2, validacion) {
	if (id1==null || nombre1==null || id2==null || nombre2==null || validacion==null){
		return;
	}
	
	pares.push(new TipoComparacion(id1, nombre1, id2, nombre2, validacion));	
}
function validar(id, nombre, validacion){
	if (id==null || nombre==null || validacion==null){
		return;
	}
	
	campos.push(new TipoCampo(id, nombre, validacion));
}
function rango(id, nombre, liminf, limsup) {
	if (id==null || nombre==null || liminf==null || limsup==null){
		return;
	}
	
	rangos.push(new TipoRango(id, nombre, liminf, limsup));	
}
function validarFormulario(){
	reiniciarColorFormulario();
	validarFormatoCampos();
	validarRangoCampos();
	compararCampos();
//	alert('validando formu');
	if (errores.length > 0) {
//		alert('con errores');
		mostrarErrores();
		return false;
	} else {
//		alert('sin errores');
		document.getElementById('errores').innerHTML = "";
	}
	
	mostrarBarraProgreso();
	return true;
}
function inicializarValidador(){
	campos = new Array();
	pares = new Array();
	rangos = new Array();
	errores = new Array();	
	matCampos = new Array();
}
function reiniciarColorFormulario(){
	matCampos = new Array();
	for(var i=0; i < campos.length; i++){
		document.getElementById(campos[i].id).style.backgroundColor = '#ffffff';
//		alert(campos[i].id);
//		document.getElementsByName(campos[i].id).style.backgroundColor = '#ffffff';
	}	
}
function mostrarBarraProgreso(){
	var div = document.getElementById("pb");
	if (div != null) {
		div.className = "visible";
		document.getElementById('ancla').focus();
	}
}
function mostrarErrores() {
		var div = document.createElement("div");
		//div.setAttribute("class","msg-red"); No soportado por iexplorer
		div.className = "msg-red";
//		div.className = "alert alert-danger";
		div.id = "msg-red";
		//var ancla = document.createElement("a");
		//ancla.setAttribute("id","ancla");
		var msgSup = document.createTextNode(MSG_SUPERIOR);
		var msgInf = document.createTextNode(MSG_INFERIOR);
		var br = document.createElement("br");
		var ul = document.createElement("ul");
		for (i=0; i<errores.length; i++){
			var li = document.createElement("li");
			var txt = document.createTextNode(errores[i]);
			li.appendChild(txt);
			ul.appendChild(li);
		}
		ul.appendChild(li);
		document.getElementById('errores').innerHTML = "";
		//div.appendChild(ancla);		
		div.appendChild(msgSup);
		div.appendChild(ul);
		div.appendChild(msgInf);
		document.getElementById('errores').appendChild(div);
		document.getElementById('ancla').focus();
		errores = new Array();
}

function mostrarMensaje(mensaje) {
		var div = document.createElement("div");
		div.className = "msg-green";		
		var msg = document.createTextNode(mensaje);		
		div.appendChild(msg);
		document.getElementById('errores').innerHTML = "";
		document.getElementById('errores').appendChild(div);
		document.getElementById('ancla').focus();
}
function mostrarMensajeError(mensaje) {
//	mensaje = unescape(mensaje);
	mensaje = decodeURIComponent(mensaje);
	var div = document.createElement("div");
	div.className = "msg-red";		
	var msg = document.createTextNode(mensaje);		
	div.appendChild(msg);
	document.getElementById('errores').innerHTML = "";
	document.getElementById('errores').appendChild(div);
	document.getElementById('ancla').focus();
}

function limpiarMensajes(){
	document.getElementById('errores').innerHTML = "";
	/*
	var olddiv = document.getElementById(divNum);
	d.removeChild(olddiv);
	*/
}
function setFocus(id) {
 		var campo = document.getElementById(id);
		if (campo != null) {
			campo.focus();
		}
}

function TipoCampo(id, nombre, validacion) {
	this.id = id;
	this.nombre = nombre;
	this.validacion = validacion;
}

function TipoComparacion(id1, nombre1, id2, nombre2, validacion) {
	this.id1 = id1;
	this.nombre1 = nombre1;
	this.id2 = id2;
	this.nombre2 = nombre2;	
	this.validacion = validacion;
}

function TipoRango(id, nombre, liminf, limsup) {
	this.id = id;
	this.nombre = nombre;
	this.liminf = liminf;
	this.limsup = limsup;
}

function readKeyboard(e){
  if(window.event){  // IE
    return e.keyCode;
  } else if(e.which){// Netscape/Firefox/Opera
    keynum = e.which;
  }
}

function validarLongitudMaxima(campo, longitudmaxima){
	if ( longitudmaxima > 0) {
		if (campo.value.length > longitudmaxima) {
			campo.value = campo.value.substring(0, longitudmaxima);
		}
	}
}

function validarEntero(campo, e) {
	var code = window.event ? e.keyCode : e.which;	
	var validchars = "0123456789" ;
	var charcode = String.fromCharCode(code);
	if (code == 0)
		return true;	
	if (code != 8){
		if (validchars.indexOf(charcode) != -1){
			return true;
		} 
		return false;
	}
	return true;
}

function validarCaracteres(campo, validchars, e) {
	var code = window.event ? e.keyCode : e.which;
	var charcode = String.fromCharCode(code);
	if (code == 0)
		return true;	
	if (code != 8){
		if (validchars.indexOf(charcode) != -1){
			return true;
		} 
		return false;
	}
	return true;
}

function validarHoraMilitar(campo, e) {
	var code = window.event ? e.keyCode : e.which;	
	var validchars = "0123456789:" ;
	var charcode = String.fromCharCode(code);
	if (code == 0)
		return true;	
	if (code != 8){
		if (validchars.indexOf(charcode) != -1){
			return true;
		} else {
			return false;
		}
	}
}

function validarReal(campo, e){
	var code = window.event ? e.keyCode : e.which;
	var validchars = "0123456789." ;
	var charcode = String.fromCharCode(code);
	if (code == 0)
		return true;
	if (code != 8){
		if ((campo.value.indexOf(".") != -1 )&& (charcode.indexOf(".") != -1)){
			return false;
		}		
		if (validchars.indexOf(charcode) != -1){
			return true;
		} else {
			return false;
		}
	}
}

function validarEspacios(campo, e) {
	var code = window.event ? e.keyCode : e.which;
	if (code == 32){
		return false;
	}
	return true;
}

function eliminarSeleccionados(arg_msg, fem){
	document.form.ids.value = "";
	if(arg_msg==''){
		arg_msg = 'elementos';
	}
	var chks = document.getElementsByName('chkdel');
	var ids = "";
	for (var i=0; i<chks.length; i++) {
		if (chks[i].checked==1) {
			if (ids == "") {
				ids = chks[i].id;
			} else {
				ids += "," + chks[i].id;
			}
		}
	}
	
	if (ids == "") {
		if (fem==true) {
//			alert("No existen "+ arg_msg +" seleccionadas para ser eliminadas");
			ventanaAlerta("No existen "+ arg_msg +" seleccionadas para ser eliminadas",'Alerta')
		} else {
//			alert("No existen "+ arg_msg +" seleccionados para ser eliminados");
			ventanaAlerta("No existen "+ arg_msg +" seleccionados para ser eliminados",'Alerta')
		}
		return false;
	}
	
	var confirmacion = "";
	if (fem==true) {
//		confirmacion = "¿Desea eliminar las "+ arg_msg +" seleccionadas?";
		confirmacion = "¿Desea eliminar los registros seleccionados?";
	} else {
//		confirmacion = "¿Desea eliminar los "+ arg_msg +" seleccionados?";
		confirmacion = "¿Desea eliminar los registros seleccionados?";
	}
	
	var resp = confirm(confirmacion);
	if (resp == true) {
		document.form.ids.value = ids;
		document.form.submit();
	}

	return resp;
}

function ltrim(str) { 
	for(var k = 0; k < str.length && isWhitespace(str.charAt(k)); k++);
	return str.substring(k, str.length);
}

function rtrim(str) {
	for(var j=str.length-1; j>=0 && isWhitespace(str.charAt(j)) ; j--) ;
	return str.substring(0,j+1);
}

function trim(str) {
	return ltrim(rtrim(str));
}

function isWhitespace(charToCheck) {
	var whitespaceChars = " \t\n\r\f";
	return (whitespaceChars.indexOf(charToCheck) != -1);
}
function prepararMsgError(tipoError,objeto){
	//alert(tipoError+".replace('$1',"+ objeto.nombre +")");
	document.getElementById(objeto.id).style.backgroundColor = '#FFEDE2';
//	alert('error capturado id = '+objeto.id+' tipoError '+tipoError);
	errores.push(eval(tipoError+".replace('$1','"+ objeto.nombre +"')"));
	matCampos.push(objeto.id);	
}
function validarCampoRequerido(campo){
	var valor = document.getElementById(campo.id).value;
	if ( trim(valor) == "" ) {
//			errores.push(ERROR_REQUERIDO.replace("$1", campo.nombre));
//			matCampos.push(campo.id);
			prepararMsgError('ERROR_REQUERIDO',campo);
	}
}

function validarCampoEmail(campo) {
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$");
	if ( !exp.test(valor) ) {
//		errores.push(ERROR_EMAIL.replace("$1", campo.nombre));
//		matCampos.push(campo.id);
		prepararMsgError('ERROR_EMAIL',campo);
	}
}
function validarCampoEmailUla(campo) {
	var valor = document.getElementById(campo.id).value;
//	var exp = new RegExp("^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$");
	var exp = new RegExp("^([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@(ula)\.ve(\W|$)");
	if ( !exp.test(valor) ) {
//		errores.push(ERROR_EMAIL.replace("$1", campo.nombre));
//		matCampos.push(campo.id);
		prepararMsgError('ERROR_EMAIL_ULA',campo);
	}
}

function validarCampoURL(campo){	
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^(ht|f)tp(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&amp;%\$#_]*)?$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_URL.replace("$1", campo.nombre));
		prepararMsgError('ERROR_URL',campo);
	}  
}

function validarCampoPassword(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,32})$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_PASSWORD.replace("$1", campo.nombre));
		prepararMsgError('ERROR_PASSWORD',campo);
	}
}

function validarCampoLogin(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^[A-Za-z0-9]{3,}[._]?[A-Za-z0-9]+$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_LOGIN.replace("$1", campo.nombre));
		prepararMsgError('ERROR_LOGIN',campo);
	}
}

function validarCampoNombre(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^[A-Za-z&aacute;&eacute;&iacute;&oacute;&uacute;ñÑ. ]+$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_NOMBRE.replace("$1", campo.nombre));
		prepararMsgError('ERROR_NOMBRE',campo);
	}
}

function validarCampoCedula(campo){
	var valor = document.getElementById(campo.id).value;
//	var exp = new RegExp("^[VvEe]-[1-9][0-9]{5,7}$");
	var exp = new RegExp("^[VvEe]{1}[0-9]{9}$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_CEDULA.replace("$1", campo.nombre));
		prepararMsgError('ERROR_CEDULA',campo);
	}
}

function validarCampoRIF(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^[A-Z]-[0-9]{6,8}-[0-9]$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_RIF.replace("$1", campo.nombre));
		prepararMsgError('ERROR_RIF',campo);
	}
}

function validarCampoTelefono(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^[0-9]{4}-[0-9]{6,7}$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_TELEFONO.replace("$1", campo.nombre));
		prepararMsgError('ERROR_TELEFONO',campo);
	}
}

function validarCampoEntero(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^[0-9]+$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_ENTERO.replace("$1", campo.nombre));
		prepararMsgError('ERROR_ENTERO',campo);
	}
}

function validarCampoReal(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^[0-9]+(\.[0-9]+)?$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_REAL.replace("$1", campo.nombre));
		prepararMsgError('ERROR_REAL',campo);
	}
}

function validarCampoNombreTecnico(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^[A-Za-z0-9�����������+-/*()%., ]+$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_NOMBRETECNICO.replace("$1", campo.nombre));
		prepararMsgError('ERROR_NOMBRETECNICO',campo);
	}
}

function validarCampoHoraMilitar(campo){
	var valor = document.getElementById(campo.id).value;
	var exp = new RegExp("^(0[0-9]|1[0-9]|2[0-3]):([0-5][0-9])$");
	if (trim(valor)!="" && !exp.test(valor) ) {
//		errores.push(ERROR_HORAMILITAR.replace("$1", campo.nombre));
		prepararMsgError('ERROR_HORAMILITAR',campo);
	}
}

function compararIgualQue(par){
	var valor1 = document.getElementById(par.id1).value;
	var valor2 = document.getElementById(par.id2).value;
	if (valor1 != valor2){
		errores.push(ERROR_IGUALQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
	}
}

function compararMayorIgualQue(par){	
	var valor1 = document.getElementById(par.id1).value;
	var valor2 = document.getElementById(par.id2).value;
	if (valor1!=null && valor2!=null && valor1 < valor2){
		errores.push(ERROR_MAYORIGUALQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
	}
}

function compararMayorQue(par){
	var valor1 = document.getElementById(par.id1).value;
	var valor2 = document.getElementById(par.id2).value;
	if (valor1!=null && valor2!=null && valor1 <= valor2){
		errores.push(ERROR_MAYORQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
	}
}

function compararFechaMayorIgualQue(par){
	var valor1 = (document.getElementById(par.id1).value).split("/"); //fecha fin
	var valor2 = (document.getElementById(par.id2).value).split("/"); //fecha ini 
	if (valor1=="" && valor2==""){
		return;
	}
	
	var day1 = parseInt(valor1[0], 10);
	var month1 = parseInt(valor1[1], 10);
	var year1 = parseInt(valor1[2], 10);
	
	var day2 = parseInt(valor2[0], 10);
	var month2 = parseInt(valor2[1], 10);
	var year2 = parseInt(valor2[2], 10);

	if (year1<year2){
		errores.push(ERROR_MAYORIGUALQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
	} else if (year1==year2) {
		if (month1<month2){
			errores.push(ERROR_MAYORIGUALQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
		} else if (month1==month2) {
			if (day1<day2) {
				errores.push(ERROR_MAYORIGUALQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
			}
		}
	}
}

function compararFechaMayorQue(par){
	var valor1 = (document.getElementById(par.id1).value).split("/"); //fecha fin
	var valor2 = (document.getElementById(par.id2).value).split("/"); //fecha ini 
	if (valor1=="" && valor2==""){
		return;
	}
	
	var day1 = parseInt(valor1[0], 10);
	var month1 = parseInt(valor1[1], 10);
	var year1 = parseInt(valor1[2], 10);
	
	var day2 = parseInt(valor2[0], 10);
	var month2 = parseInt(valor2[1], 10);
	var year2 = parseInt(valor2[2], 10);

	if (year1<year2){
		errores.push(ERROR_MAYORQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
	} else if (year1==year2) {
		if (month1<month2){
			errores.push(ERROR_MAYORQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
		} else if (month1==month2) {
			if (day1<=day2) {
				errores.push(ERROR_MAYORQUE.replace("$1", par.nombre1).replace("$2", par.nombre2));
			}
		}
	}
}

function validarFormatoCampos(){
	for(var i=0; i < campos.length; i++){
		if (document.getElementById(campos[i].id) == null) {
			alert("El campo " + campos[i].id + " no existe en el tpl");
			return false;
		}
		//document.getElementById(campos[i].id).style.borderColor = '#000';
//		document.getElementById(campos[i].id).style.backgroundColor = '#ffffff';
		
		switch(campos[i].validacion){
			case REQUERIDO:
				//requerido
			  validarCampoRequerido(campos[i]);
			  break;    
			case EMAIL:
				//email
				validarCampoEmail(campos[i]);
				break;
			case EMAILULA:
				//email
				validarCampoEmailUla(campos[i]);
			  break;
			case URL:
				//url
				validarCampoURL(campos[i]);
				break;
			case PASSWORD:
				validarCampoPassword(campos[i]);
				break;
			case LOGIN:
				//login
			  validarCampoLogin(campos[i]);
			  break;
			case NOMBRE:
				//nombre
			  validarCampoNombre(campos[i]);			  
			  break;
			case CEDULA:
				//cedula de identidad
			  validarCampoCedula(campos[i]);
			  break;
			case RIF:
			  //rif
			  validarCampoRIF(campos[i]);
			  break;
			case TELEFONO:
			  //telefonos
			  validarCampoTelefono(campos[i]);	
			  break;
			case ENTERO:
			  //enteros
			  validarCampoEntero(campos[i]);
			  break;
			case REAL:
			  //reales
			  validarCampoReal(campos[i]);
			  break;
			case NOMBRETECNICO:
				//nombre tecnico
			  validarCampoNombreTecnico(campos[i]);			  
			  break;	
			case HORAMILITAR:
				//hora militar
			  validarCampoHoraMilitar(campos[i]);			  
			  break;			  		  		  			  			  		  
		}
	}	
}

function compararCampos(){
	for(var i=0; i < pares.length; i++){
		if (document.getElementById(pares[i].id1) == null) {
			alert("El campo " + pares[i].id1 + " no existe en el tpl");
			return false;
		}
		
		if (document.getElementById(pares[i].id2) == null) {
			alert("El campo " + pares[i].id2 + " no existe en el tpl");
			return false;
		}		
		
		switch(pares[i].validacion){
			case IGUALQUE:
				//igual que
			  compararIgualQue(pares[i]);
			  break;
			case MAYORIGUALQUE:
			  //mayor igual que
			  compararMayorIgualQue(pares[i]);
			  break;  
			case MAYORQUE:
			  //mayor que
			  compararMayorQue(pares[i]);
			  break;		
			case FECHAMAYORIGUALQUE:
			  //fecha mayor igual que
			  compararFechaMayorIgualQue(pares[i]);
			  break;		
			case FECHAMAYORQUE:
			  //fecha mayor que
			  compararFechaMayorQue(pares[i]);
			  break;			  
		}
	}	
}

function validarRango(rango){
	var valor = parseFloat(document.getElementById(rango.id).value);
	
	if (valor!=null){
		if (valor < rango.liminf || valor > rango.limsup) {
			errores.push(ERROR_RANGO.replace("$1", rango.nombre).replace("$2", rango.liminf).replace("$3", rango.limsup));
		}
	}
}

function validarRangoCampos(){
	for(var i=0; i < rangos.length; i++){
		if (document.getElementById(rangos[i].id) == null) {
			alert("El campo " + rangos[i].id + " no existe en el tpl");
			return false;
		}
				
		validarRango(rangos[i]);
	}		
}



function radioActivo(nombreRadio){
	opciones = document.getElementsByName(nombreRadio);
	var seleccionado = false;
	for(var i=0; i<opciones.length; i++) {
		if(opciones[i].checked) {
			seleccionado = opciones[i].value;
			break;
		}
	}
	return seleccionado;
}
function valorCombo(idCombo){
	lista = document.getElementById(idCombo);
	var indiceSeleccionado = lista.selectedIndex;
	var opcionSeleccionada = lista.options[indiceSeleccionado];
//	var textoSeleccionado = opcionSeleccionada.text;	
	var valorSeleccionado = opcionSeleccionada.value;
	return valorSeleccionado;
}
function asignarValorCombo(idCombo,valorAsignar){
	i = 0;
	asignar = 0;
//	alert("id = "+idCombo + " val= " +valorAsignar);
	lista = document.getElementById(idCombo);
	tam = lista.length;
    for (var i=1; i<tam; i++) {
    	valor = lista.options[i].value;
//    	alert("if("+valor+"=="+valorAsignar+")";
//    	alert(valor + "==" + valorAsignar);

    	if(valor==valorAsignar){ 
//    		alert('Encontrado en el index: ' + i);
//    		break;
    		asignar=i;
    	}
	}
//    document.getElementById(idCombo).selectedIndex = i; 
    document.getElementById(idCombo).selectedIndex = asignar; 
}