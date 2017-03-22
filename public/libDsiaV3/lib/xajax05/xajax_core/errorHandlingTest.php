<?php

require_once( "xajax.inc.php" );
$xajax=new xajax();
$xajax->configure( 'javascript URI', '../../../public/js/xajax05/' );
$xajax->configure( 'debug', true );

function myErrorRiddenFunction( )
{
	$value=$silly['nuts'];
	$objResponse=new xajaxResponse();
	//$objResponse->alert( "Bad array value: " );
	//include( "file_doesnt_exist.php" );
	return $objResponse;
}
$xajax->register( XAJAX_FUNCTION, "myErrorRiddenFunction" );
$xajax->processRequest();


$xajax->printJavascript();
?>

<input type="submit" value="Call Error Ridden Function" onclick="xajax_myErrorRiddenFunction(); return false;" />
