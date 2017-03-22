<?php
/**
 * Carga un archivo FLASH
 *
 * @param string Tipo de archivo
 * @param string Nombre de archivo
 * @param string Nombre temporal de archivo
 * @param integer Tamano del archivo (out)
 * @return string True si la carga fue completada, false en otro caso
 */
function cargarBanner($tipo, $nombre, $nombre_tmp, &$tamano=0){

  // Tipos mime permitidos
  $tipos_mime = array("application/x-shockwave-flash", "application/futuresplash");
  

  if(!in_array($tipo, $tipos_mime)) {
    //die("El archivo no es un archivo FLASH valido");
    return false;
  }


  $uploadfile = SWF . basename($nombre);
	if (move_uploaded_file($nombre_tmp, $uploadfile)){
	  $tamano = filesize($uploadfile);
	  return true;		
	}
  
	return false;
}
?>