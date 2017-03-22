<?php
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

class CustomUploadHandler extends UploadHandler {
    protected function trim_file_name($file_path, $name, $size, $type, $error, $index, $content_range) {
            $name = 'img_' . microtime(true);
            $name = str_replace('.', '', $name);
            return $name;
        }
}


$name = '';
$path = $_GET['p'];
$dominio = $_GET["u"];
// echo "nom=".$_REQUEST['nom'];
//var_dump($files);
if (isset($_REQUEST['nom'])) {
//	$name = $_REQUEST['nom'].'.gif';
//	$name = $_REQUEST['nom'];
//	echo "aca con $name";
//	$options = array('upload_dir'=>$path,'upload_url'=>$dominio,'param_name'=>$name);
	$options = array('upload_dir'=>$path,'upload_url'=>$dominio);
	$upload_handler = new CustomUploadHandler($options);
}else{
//	echo "else aca con $name";
	$options = array('upload_dir'=>$path,'upload_url'=>$dominio);
	$upload_handler = new UploadHandler($options);
}
//$options = array('upload_dir'=>$path,'upload_url'=>$dominio);

