function inicializarCombo(idcombo, texto){
	vaciarCombo(idcombo);
	agregarOpcion(idcombo, 0, texto , "", true, true);
}

function vaciarCombo(idcombo){
	if (document.getElementById(idcombo) != null) {
		document.getElementById(idcombo).length = null;
	}
}

function agregarOpcion(idcombo, indice, texto, valor, pordefecto, seleccionada){	
	document.getElementById(idcombo).options[indice] = new Option(texto, valor, pordefecto, seleccionada);
}