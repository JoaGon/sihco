<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty money_format modifier plugin
 *
 * Type: modifier
 * Name: money_format
 * File: modifier.money_format.php
 * Purpose: format currency amount
 * @link http://www.php.net/money_format
 * @param float Value
 * @param string Locale information
 * @param string format 
 * @return string
 */


/**
 * Smarty money_format modifier plugin
 *
 * Type: modifier
 * Name: money_format
 * File: modifier.money_format.php
 * Purpose: format currency amount
 * @link http://www.php.net/money_format
 * @param string $string Money value 
 * @param string $decimals Number of decimal places 
 * @param string $dec_point Char for decimal point
 * @param string $thousands_sep Char for thousands separation 
 * @return string Money formated string
 */
function smarty_modifier_money_format($string, $decimals=2, $dec_point=",", $thousands_sep="."){
	if (is_numeric($string)) {
		return number_format($string, $decimals, $dec_point, $thousands_sep);
	} else {
		return $string;
	}
}

/* vim: set expandtab: */
?>