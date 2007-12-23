<?php

/**
* $Id$
* Module: SmartFAQ
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

function b_smartmask_cancel_masquerade_show($options)
{
	global $xoopsTpl;
	include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
	include_once(XOOPS_ROOT_PATH . "/modules/smartobject/include/functions.php");

	$smartmask_isAdmin = smart_userIsAdmin('smartmask');

	if (!isset($_SESSION['masquerade'])) {
		return false;
	}

	$smartmask_op = isset($_POST['smartmask_op']) ? $_POST['smartmask_op'] : false;

	if ($smartmask_op=='cancelmasquerade') {
		unset($_SESSION['masquerade']);
		$_SESSION['xoopsUserGroups'] = $_SESSION['groups_before_masquerade'];
		unset($_SESSION['groups_before_masquerade']);
		redirect_header(getenv("REQUEST_URI"), 3, _MB_SMASK_MASQUERADE_CANCELED);
		exit;

	}
	if ($_SESSION['masquerade']) {
		$form = new XoopsThemeForm(_MB_SMASK_MASQUERADE_CANCEL, "cancel_masquerade_form", xoops_getenv('PHP_SELF'));
		$form->setExtra( "enctype='multipart/form-data'" ) ;

		$form_button_tray = new XoopsFormElementTray('', '');
		$form_hidden = new XoopsFormHidden('smartmask_op', '');
		$form_button_tray->addElement($form_hidden);

		$form_butt_create = new XoopsFormButton('', '', _CANCEL, 'submit');
		$form_butt_create->setExtra('onclick="this.form.elements.smartmask_op.value=\'cancelmasquerade\'"');

		$form_button_tray->addElement($form_butt_create);

		$form->addElement($form_button_tray);

		$form->assign($xoopsTpl);

	}	$block = true;
	return $block;
}

/*function b_cancel_masquerade_edit($options)
{
    $form = "" . _MB_SF_DISP . "&nbsp;";
    $form .= "<input type='text' name='options[]' value='" . $options[0] . "' />&nbsp;" . _MB_SF_FAQS . "";
    return $form;
}
*/
?>