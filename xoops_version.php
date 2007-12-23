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

$modversion['name'] = _MI_SMASK_MD_NAME;
$modversion['version'] = 1.0;
$modversion['description'] = _MI_SMASK_MD_DESC;
$modversion['author'] = "INBOX International";
$modversion['credits'] = "The SmartFactory";
$modversion['help'] = "";
$modversion['license'] = "GNU General Public License (GPL)";
$modversion['official'] = 0;
$modversion['image'] = "images/module_logo.gif";
$modversion['dirname'] = "smartmask";

// Added by marcan for the About page in admin section
$modversion['developer_website_url'] = "http://smartfactory.ca";
$modversion['developer_website_name'] = "The SmartFactory";
$modversion['developer_email'] = "info@smartfactory.ca";
$modversion['status_version'] = "Beta 1";
$modversion['status'] = "Beta";
$modversion['date'] = "unreleased";

$modversion['people']['developers'][] = "[url=http://smartfactory.ca/userinfo.php?uid=1]marcan[/url] (Marc-André Lanciault)";
$modversion['people']['developers'][] = "[url=http://smartfactory.ca/userinfo.php?uid=112]felix[/url] (Félix Tousignant)";

//$modversion['people']['testers'][] = "Rob Butterworth";

//$modversion['people']['translators'][] = "translator 1";

//$modversion['people']['documenters'][] = "documenter 1";

//$modversion['people']['other'][] = "other 1";

$modversion['warning'] = _CO_SOBJECT_WARNING_BETA;

$modversion['author_word'] = "";

$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Menu
//$modversion['hasMain'] = 1;

$modversion['blocks'][1]['file'] = "smartmask_do_masquerade.php";
$modversion['blocks'][1]['name'] = _MI_SMASK_DO_MASQUERADE;
$modversion['blocks'][1]['show_func'] = "b_smartmask_do_masquerade_show";
//$modversion['blocks'][1]['edit_func'] = "b_smartmask_do_masquerade_edit";
$modversion['blocks'][1]['template'] = "smartmask_do_masquerade.html";

$modversion['blocks'][2]['file'] = "smartmask_cancel_masquerade.php";
$modversion['blocks'][2]['name'] = _MI_SMASK_CANCEL_MASQUERADE;
$modversion['blocks'][2]['show_func'] = "b_smartmask_cancel_masquerade_show";
//$modversion['blocks'][2]['edit_func'] = "b_smartmask_cancel_masquerade_edit";
$modversion['blocks'][2]['template'] = "smartmask_cancel_masquerade.html";

/*
// Templates
$i = 0;

$i++;
$modversion['templates'][$i]['file'] = 'smartmask_index.html';
$modversion['templates'][$i]['description'] = 'Display Index page';
*/

?>