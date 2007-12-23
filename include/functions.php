<?php

/**
* $Id$
* Module: SmartQuiz
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

function smartmask_lettersArray() {
	static $lettersArray = false;

	if (!$lettersArray) {
		$lettersArray = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j');
	}
	return $lettersArray;
}
?>