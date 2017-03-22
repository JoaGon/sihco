<?php 

function obtenerCriteriosSeleccionados($arreglo, $separador=",") {
	if ($arreglo== null || count($arreglo)==0) {
		return "null";
	}
	
	$criterios = "";
	$i = 0;
	foreach ($arreglo as $valor) {
		if ($i==0) {
			$criterios = $valor;
		} else {
			$criterios = $criterios . $separador . $valor;		
		}
		$i++;
	}

	return $criterios;
}

function obtenerUniones($arreglo, $numeroUniones, $separador=",") {
	if ($arreglo== null || $numeroUniones==null) {
		return null;
	}
	
	$uniones = "";
	$i = 1;
	foreach ($arreglo as $clave=>$valor) {
		if ($i == 1) {
			$uniones = $separador=="," ? $clave: $valor;
		} else {
			$uniones = $uniones . $separador . ($separador=="," ? $clave: $valor);	
		}
		$i++;
		
		if ($i > $numeroUniones) {
			break;
		}
	}

	return $uniones;
}

function agregarUnionesCriterios($arreglo){
	if (count($arreglo) == 0) {
		return null;
	} elseif (count($arreglo)<2) {
		return $arreglo;
	}
	
	$arregloUniones = array();
	
	for ($i=2; $i<=count($arreglo); $i++) { 
		$arregloUniones[obtenerUniones($arreglo, $i)] = obtenerUniones($arreglo, $i, "u");
	}
	
	if (count($arregloUniones)>0) {
		foreach ($arregloUniones as $clave=>$valor) {
			$arreglo[$clave] = $valor;
		}
	}

	return $arreglo;
} 
	
?>