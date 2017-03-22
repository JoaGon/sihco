<?php
require_once('../../config.php');

function crearImagenDesdeArchivo($tipo, $archivo){
	$tipos_mime = array("image/jpg", "image/jpeg", "image/pjpeg", "image/gif", "image/x-png", "image/png");
	$imagen = null;
  switch($tipo) {
    case $tipos_mime[0]:
    case $tipos_mime[1]:
    case $tipos_mime[2]:
      $imagen = imagecreatefromjpeg($archivo);
      break;
    case $tipos_mime[3]:
      $imagen = imagecreatefromgif($archivo);
      break;
    case $tipos_mime[4]:
    case $tipos_mime[5]:
      $imagen = imagecreatefrompng($archivo);
      break;
  }
  return $imagen;
}


/**
 * Redimensiona y codifica una imagen como bytea
 *
 * @param integer $ancho Nuevo ancho de la imagen en pixeles
 * @param array $archivo_img Arreglo que contiene las propiedades de la imagen
 *        type, name, tmp_name y size
 * @return string Imagen codificada como bytea 
 */
function redimensionarImagen($ancho, $tipo, $nombre, $nombre_tmp, &$tamano=0, $logo=true){


  // Tipos mime permitidos
  $tipos_mime = array("image/jpg", "image/jpeg", "image/pjpeg", "image/gif", "image/x-png", "image/png");
  


  if(!in_array($tipo, $tipos_mime)) {
    //die("El archivo no es un archivo de imagen valido $tipo");
    return null;
  }
  
  // Se crea una imagen a partir del archivo original
	$imagen = crearImagenDesdeArchivo($tipo, $nombre_tmp);
  
  $dimension_img = getimagesize($nombre_tmp);  
  
  $alto = $ancho;
  if ($dimension_img[0] > $dimension_img[1]) {
  	$alto = round($ancho*($dimension_img[1]/$dimension_img[0]));
  } else {  	
  	$ancho = round($alto*($dimension_img[0]/$dimension_img[1]));
  }
  
  $imagen_redim = imagecreatetruecolor($ancho, $alto);
   
  imagealphablending($imagen_redim, TRUE);
  //imagesavealpha($imagen_redim, TRUE);   
  imagecopyresampled($imagen_redim, $imagen, 0, 0, 0, 0, $ancho, $alto, $dimension_img[0], $dimension_img[1]);  

  if ($logo) {
	  //Se crea la imagen del logo a mezclar
	  $archivo_logo = WEB . "/img/ve-img.png";
	  $logo = imagecreatefrompng($archivo_logo);
	  $dimension_logo = getimagesize($archivo_logo);
	  
	  $ancho_logo = $ancho * (1/6);
	  if ($dimension_img[0] > $dimension_img[1]) {
	  	$ancho_logo = $ancho * (1/8);
	  }
	  
	  $alto_logo = $ancho_logo;
	  if ($dimension_img[0] > $dimension_img[1]) {
	  	$alto_logo = round($ancho_logo*($dimension_logo[1]/$dimension_logo[0]));
	  } else {
	  	$ancho_logo = round($alto_logo*($dimension_logo[0]/$dimension_logo[1]));
	  }
	  
	  $logo_redim = imagecreatetruecolor($ancho_logo, $alto_logo);
	  
	  imagealphablending($logo_redim, FALSE);
	  //imagesavealpha($logo_redim, TRUE);  
	  imagecopyresampled($logo_redim, $logo, 0, 0, 0, 0, $ancho_logo, $alto_logo, $dimension_logo[0], $dimension_logo[1]);
	  
	  //Calculo de coordenadas
	  $x = $ancho - $ancho_logo;
	  $y = $alto - $alto_logo;
	  
	  //Mezcla  
	  imagecopy($imagen_redim, $logo_redim, $x, $y, 0, 0, $ancho_logo, $alto_logo);   	
  }

  $archivo_tmp = tempnam(IMG, $nombre);//Ruta de la imagen temporal 
  switch($tipo) {
    case $tipos_mime[0]:
    case $tipos_mime[1]:
    case $tipos_mime[2]:
      imagejpeg($imagen_redim, $archivo_tmp);
	  break;
    case $tipos_mime[3]:
      imagegif($imagen_redim, $archivo_tmp);
      break;
    case $tipos_mime[4]:
    case $tipos_mime[5]:
      imagepng($imagen_redim, $archivo_tmp);
      break;
  }

  $fp = fopen($archivo_tmp, "rb");
  $tamano = filesize($archivo_tmp);
  $data = fread($fp, $tamano);
  fclose($fp);

  @unlink($archivo_tmp);

  return $data;
}
?>