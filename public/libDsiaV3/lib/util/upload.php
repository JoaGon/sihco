<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

//echo dirname($_SERVER['SCRIPT_FILENAME']).'/files/';die();
//$upload_handler = new UploadHandler();
$options = array('upload_dir'=>'/srv/josue/home/josue/pruebas/uploadArchivos/','upload_url'=>'http://lila.adm.ula.ve/josue/pruebas/uploadArchivos/');
$upload_handler = new UploadHandler($options);

/*

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
//$upload_handler = new UploadHandler();
$path = $_GET['p'];
$dominio = $_GET["u"];
//echo "[$dominio-$path]";
$options = array('upload_dir'=>'C:\web\htdocs\pruebas\uploadArchivos\\','upload_url'=>'http://localhost/pruebas/uploadArchivos/');
//$options = array('upload_dir'=>$path,'upload_url'=>$dominio);
$upload_handler = new UploadHandler($options);
 
 */