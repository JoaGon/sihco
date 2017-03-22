<?php
/**
 * Convierte una fecha con formato dd/mm/yyyy
 * a formato ISO yyyy-mm-dd
 *
 * @param unknown_type $fecha
 * @return unknown
 */
function european2iso($fecha) {
	if ($fecha == null || $fecha == "") {
		return null;
	}
	//	ECHO "--$fecha--";
	$fecha = str_replace ( '-', '/', $fecha );
	$fecha = str_replace ( '.', '/', $fecha );
	list ( $dia, $mes, $ano ) = split ( "/", $fecha );
	
	if ($dia > 31 && $mes > 12) {
		//Excepcion
		return null;
	}
	
	$fechaiso = $ano . "-" . $mes . "-" . $dia;
	
	return $fechaiso;
}

/**
 * Convierte una fecha con formato ISO yyyy-mm-dd
 * a formato european dd/mm/yyyy
 *
 * @param unknown_type $fecha
 * @return unknown
 */
function iso2european($fecha) {
	if ($fecha == null || $fecha == "") {
		return null;
	}
	$fecha = str_replace ( '-', '/', $fecha );
	$fecha = str_replace ( '.', '/', $fecha );
	//list($ano, $mes , $dia) = split("-", $fecha);
	list ( $ano, $mes, $dia ) = split ( "/", $fecha );
	
	if ($dia > 31 && $mes > 12) {
		//Excepcion
		return null;
	}
	
	$fechaeuropean = trim ( $dia ) . "/" . trim ( $mes ) . "/" . trim ( $ano );
	
	return $fechaeuropean;
}
function fechaSybase($fecha) {
	if ($fecha == null || $fecha == "") {
		return null;
	}
	$fecha = str_replace ( '-', '/', $fecha );
	list ( $dia, $mes, $ano ) = split ( "/", $fecha );
	if ($dia > 31 && $mes > 12) {
		//Excepcion
		return null;
	}
	$fechaeuropean = $mes . "/" . $dia . "/" . $ano;
	return $fechaeuropean;
}

/**
 * Permite sumar a una fecha cierta
 * cantidad de dias, meses y anos
 *
 * @param string $fecha
 * @param integer $dias
 * @param integer $meses
 * @param integer $anos
 * @return string Fecha
 */
function sumar2fecha($fecha, $dias, $meses, $anos) {
	list ( $ano, $mes, $dia ) = split ( "-", $fecha );
	return date ( 'Y-m-d', mktime ( 0, 0, 0, $mes + $meses, $dia + $dias, $ano + $anos ) );
}

/**
 * Permite convertir un tipo interval a double.
 *
 * @param string Valor interval
 * @return double Valor numerico convertido
 */
function interval2double($interval) {
	if ($interval == null) {
		return null;
	}
	
	list ( $years, $tagyears, $months, $tagmonths, $days, $tagdays ) = split ( " ", $interval );
	
	if (! is_numeric ( $years ) || ! is_numeric ( $months ) || ! is_numeric ( $days )) {
		return null;
	}
	
	$result = $years + ($months / 12);
	$result = number_format ( $result, 2, '.', '' );
	return $result;
}
function comboMesTipo1() {
	return array (1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre' );
}
function comboMesTipo2() {
	return array ('Enero' => 'Enero', 'Febrero' => 'Febrero', 'Marzo' => 'Marzo', 'Abril' => 'Abril', 'Mayo' => 'Mayo', 'Junio' => 'Junio', 'Julio' => 'Julio', 'Agosto' => 'Agosto', 'Septiembre' => 'Septiembre', 'Octubre' => 'Octubre', 'Noviembre' => 'Noviembre', 'Diciembre' => 'Diciembre' );
}
function comboAnio() {
	$anioAct = date ( 'Y' );
	return array ($anioAct - 1 => $anioAct - 1, $anioAct => $anioAct, $anioAct + 1 => $anioAct + 1 );
}
/**
 * Permite completar una cadena con caracteres predefinidos
 * P.E. $valorAct = 2	$tam = 5	$caract = *
 * Devuelve $valor = ****2
 * @param String $valorAct
 * @param Integer $tam
 * @param String $caract
 * @return String
 */
function completarTamanioCon($valorAct, $tam, $caract = '0') {
	$aux = '';
	$valor = '';
	//	echo "Editando a ($valorAct,$tam,$caract)<br>";
	//	$tam = $tam + 1;
	$tamReal = strlen ( $valorAct );
	//	echo "$tamReal ($valorAct,$tam,$caract)<br>";
	if (strlen ( $valorAct ) == $tam) {
		return $valorAct;
	} else {
		for($i = $tamReal; $i < $tam + 1; $i ++) {
			$aux = $aux . $caract;
		
		//			echo "entro al ite {$aux} <br>";
		}
		$valor = $aux . $valorAct;
		//		echo "valor = $valor ****<br>";
		return $valor;
	}
}
function formatoCedula($ced) {
	//	$tam = strlen($ced);
	//	if ($tam!=10) {
	//		$n = 10 - $tam;
	//		$ced = completarTamanioCon($ced,$n,'0');
	//	}
	if (! strpos ( $ced, '-' )) {
		$ced = str_replace ( 'V', 'V-', $ced );
		$ced = str_replace ( 'J', 'J-', $ced );
		$ced = str_replace ( 'G', 'G-', $ced );
	}
	return $ced;
}
function formatoRif($rif) {
	//	$tam = strlen($rif);
	//	if ($tam!=10) {
	//		$n = 10 - $tam;
	//		$rif = completarTamanioCon($rif,$n,'0');
	//	}
	if (! strpos ( $rif, '-' )) {
		$rif = str_replace ( 'V', 'V-', $rif );
		$rif = str_replace ( 'J', 'J-', $rif );
		$rif = str_replace ( 'G', 'G-', $rif );
		$rif = str_replace ( 'L', 'L-', $rif );
	}
	if (strrpos ( $rif, '-' ) > 1) {
		$cad1 = substr ( $rif, 0, - 1 );
		$cad2 = substr ( $rif, - 1 );
		$rif = "$cad1-$cad2";
	}
	return $rif;
}

function obtenerAnio($nro_anio) {
	switch ($nro_anio) {
		case 2000 :
			$anio = "dos mil";
			break;
		case 2001 :
			$anio = "dos mil uno";
			break;
		case 2002 :
			$anio = "dos mil dos";
			break;
		case 2003 :
			$anio = "dos mil tres";
			break;
		case 2004 :
			$anio = "dos mil cuatro";
			break;
		case 2005 :
			$anio = "dos mil cinco";
			break;
		case 2006 :
			$anio = "dos mil seis";
			break;
		case 2007 :
			$anio = "dos mil siete";
			break;
		case 2008 :
			$anio = "dos mil ocho";
			break;
		case 2009 :
			$anio = "dos mil nueve";
			break;
		case 2010 :
			$anio = "dos mil diez";
			break;
		case 2011 :
			$anio = "dos mil once";
			break;
		case 2012 :
			$anio = "dos mil doce";
			break;
		case 2013 :
			$anio = "dos mil trece";
			break;
		case 2014 :
			$anio = "dos mil catorce";
			break;
		case 2015 :
			$anio = "dos mil quince";
			break;
		case 2016 :
			$anio = "dos mil dieciséis";
			break;
		case 2017 :
			$anio = "dos mil diecisiete";
			break;
		case 2018 :
			$anio = "dos mil dieciocho";
			break;
		case 2019 :
			$anio = "dos mil diecinueve";
			break;
		case 2020 :
			$anio = "dos mil veinte";
			break;
		case 2021 :
			$anio = "dos mil veintiuno";
			break;
	}
	return ($anio);
}
function obtenerMes($nro_mes) {
	$nro_mes = intval ( $nro_mes );
	if ($nro_mes > 0 and $nro_mes < 13) {
		//echo "entre con $nro_mes <br>";
		switch ($nro_mes) {
			case 1 :
				$mes = "Enero";
				break;
			case 2 :
				$mes = "Febrero";
				break;
			case 3 :
				$mes = "Marzo";
				break;
			case 4 :
				$mes = "Abril";
				break;
			case 5 :
				$mes = "Mayo";
				break;
			case 6 :
				$mes = "Junio";
				break;
			case 7 :
				$mes = "Julio";
				break;
			case 8 :
				$mes = "Agosto";
				break;
			case 9 :
				$mes = "Septiembre";
				break;
			case 10 :
				$mes = "Octubre";
				break;
			case 11 :
				$mes = "Noviembre";
				break;
			case 12 :
				$mes = "Diciembre";
				break;
		}
		//echo "entre con [$nro_mes] {$mes} <br>";
		return ($mes);
	} else {
		$msg = "ERROR: El valor de mes no es valido [$nro_mes]";
		return ($msg);
	}
}
function obtenerDia($nroDia) {
	$dia = '';
	//echo "[$nroDia]";
	$nroDia = intval ( $nroDia );
	switch ($nroDia) {
		case 1 :
			$dia = "un";
			break;
		case 2 :
			$dia = "dos";
			break;
		case 3 :
			$dia = "tres";
			break;
		case 4 :
			$dia = "cuatro";
			break;
		case 5 :
			$dia = "cinco";
			break;
		case 6 :
			$dia = "seis";
			break;
		case 7 :
			$dia = "siete";
			break;
		case 8 :
			$dia = "ocho";
			break;
		case 9 :
			$dia = "nueve";
			break;
		case 10 :
			$dia = "diez";
			break;
		case 11 :
			$dia = "once";
			break;
		case 12 :
			$dia = "doce";
			break;
		case 13 :
			$dia = "trece";
			break;
		case 14 :
			$dia = "catorce";
			break;
		case 15 :
			$dia = "quince";
			break;
		case 16 :
			$dia = "diecis&eacute;is";
			break;
		case 17 :
			$dia = "diecisiete";
			break;
		case 18 :
			$dia = "dieciocho";
			break;
		case 19 :
			$dia = "diecinueve";
			break;
		case 20 :
			$dia = "veinte";
			break;
		case 21 :
			$dia = "veintiuno";
			break;
		case 22 :
			$dia = "veintid&oacute;s";
			break;
		case 23 :
			$dia = "veintitr&eacute;s";
			break;
		case 24 :
			$dia = "veinticuatro";
			break;
		case 25 :
			$dia = "veinticinco";
			break;
		case 26 :
			$dia = "veintis&eacute;is";
			break;
		case 27 :
			$dia = "veintisiete";
			break;
		case 28 :
			$dia = "veintiocho";
			break;
		case 29 :
			$dia = "veintinueve";
			break;
		case 30 :
			$dia = "treinta";
			break;
		case 31 :
			$dia = "treinta y uno";
			break;
	}
	return ($dia);
}
function generarClaveAleatoria($numerodeletras = 6) {
	$cadena = '';
	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; // Caracteres a usar
	//		$numerodeletras=6; //numero de letras para generar el texto
	for($i = 0; $i < $numerodeletras; $i ++) {
		$cadena .= substr ( $caracteres, rand ( 0, strlen ( $caracteres ) ), 1 );
	}
	return $cadena;
}
function encriptar($string, $key) {
	//	echo "<br>($string, $key)<br>";
	$result = '';
	if ($key == '') {
		//		$key = date("Y-m-d");
		$key = SEM;
	}
	$string = $key . $string . $key;
	for($i = 0; $i < strlen ( $string ); $i ++) {
		$char = substr ( $string, $i, 1 );
		$keychar = substr ( $key, ($i % strlen ( $key )) - 1, 1 );
		$char = chr ( ord ( $char ) + ord ( $keychar ) );
		$result .= $char;
	}
	return base64_encode ( $result );
}
function desencriptar3($string, $key = '') {
	$result = '';
	if ($key == '') {
		//		$key = date("Y-m-d");
		$key = SEM;
	}
	$string = base64_decode ( $string );
	for($i = 0; $i < strlen ( $string ); $i ++) {
		$char = substr ( $string, $i, 1 );
		$keychar = substr ( $key, ($i % strlen ( $key )) - 1, 1 );
		$char = chr ( ord ( $char ) - ord ( $keychar ) );
		$result .= $char;
	}
	$result = str_replace ( $key, '', $result );
	return $result;
}
/*
function desencriptar($string, $key) {
	$result = '';
	$string = base64_decode($string);
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}

function encriptar2($string, $key = '') {
	$result = '';
	if ($key == '') {
		$key = date("Y-m-d");
	}
	$string = date("Y-m-d").$string.date("Y-m-d");
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return base64_encode($result);
}
function desencriptar2($string, $key = '') {
	$result = '';
	if ($key == '') {
		$key = date("Y-m-d");
	}	
	$string = base64_decode($string);
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}
*/
function dump($matDatos) {
	echo "<pre>";
	print_r ( $matDatos );
	echo "</pre>";
}
function imprimirGeneral($form, $pagina, $tituloPagina) {
	//	global $objResponse;
	//	$objResponse = new xajaxResponse ();	
	$buscar = $form ['nomPais'];
	//	$objResponse->alert("test [$pagina][$buscar]");
	$pagina = '../base/pais/imprimir?opt=&height=460&width=1050';
	$pagina = '../base/pais/imprimir?opt=';
	if ($buscar != '') {
		$pagina = '../base/pais/imprimir/' . $buscar;
	} else {
		$pagina = '../base/pais/imprimir';
	}
	//	$pagina = str_replace('opt=', 'opt='.$buscar, $pagina);
	//	$objResponse->alert("test [$pagina]");		
	//	$objResponse->call ( "ventanaAlerta('+++','Alerta')" );
	//	$objResponse->call ( "vntImprimir('$pagina','$tituloPagina','','')" );
	//	$objResponse->call ( "vntImprimir('$pagina','$tituloPagina','undefined','undefined')" );
	

	//	$objResponse->script ( "window.open ('$pagina','mywindow','target=_blank');");
	//	echo "window.open ('$pagina','mywindow','target=_blank')";
	eval ( "window.open ('$pagina','mywindow','target=_blank')" );

		//	window.open ("http://jsc.simfatic-solutions.com","mywindow","status=1");	
//	return $objResponse;
}
function formatoDecimal($dato) {
	$aux = str_replace ( ',', '.', $dato );
	if (strpos ( $aux, '.' ) === false) {
		$aux = $aux . '.00';
		}
		$aux = number_format($aux, 2,'.', ''); 
		return $aux;
	}
?>