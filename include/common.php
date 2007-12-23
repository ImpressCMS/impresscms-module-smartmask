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

if( !defined("SMARTMASK_DIRNAME") ){
	define("SMARTMASK_DIRNAME", 'smartmask');
}

if( !defined("SMARTMASK_URL") ){
	define("SMARTMASK_URL", XOOPS_URL.'/modules/'.SMARTMASK_DIRNAME.'/');
}
if( !defined("SMARTMASK_ROOT_PATH") ){
	define("SMARTMASK_ROOT_PATH", XOOPS_ROOT_PATH.'/modules/'.SMARTMASK_DIRNAME.'/');
}

if( !defined("SMARTMASK_IMAGES_URL") ){
	define("SMARTMASK_IMAGES_URL", SMARTMASK_URL.'images/');
}

if( !defined("SMARTMASK_ADMIN_URL") ){
	define("SMARTMASK_ADMIN_URL", SMARTMASK_URL.'admin/');
}

/** Include SmartObject framework **/
include_once XOOPS_ROOT_PATH.'/modules/smartobject/class/smartloader.php';

/*
 * Including the common language file of the module
 */
$fileName = SMARTMASK_ROOT_PATH . 'language/' . $GLOBALS['xoopsConfig']['language'] . '/common.php';
if (!file_exists($fileName)) {
	$fileName = SMARTMASK_ROOT_PATH . 'language/english/common.php';
}

include_once($fileName);

include_once(SMARTMASK_ROOT_PATH . "include/functions.php");

// Creating the SmartModule object
$smartmaskModule =& smart_getModuleInfo(SMARTMASK_DIRNAME);

// Find if the user is admin of the module
$smartmask_isAdmin = smart_userIsAdmin(SMARTMASK_DIRNAME);

$myts = MyTextSanitizer::getInstance();
if(is_object($smartmaskModule)){
	$smartmask_moduleName = $smartmaskModule->getVar('name');
}

// Creating the SmartModule config Object
$smartmaskConfig =& smart_getModuleConfig(SMARTMASK_DIRNAME);

?>