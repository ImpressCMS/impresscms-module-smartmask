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

function b_smartmask_do_masquerade_show($options)
{
	global $xoopsTpl;
	include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
	include_once(XOOPS_ROOT_PATH . "/modules/smartobject/include/functions.php");

	$smartmask_isAdmin = smart_userIsAdmin('smartmask');

	if (!$smartmask_isAdmin && !isset($_SESSION['masquerade'])) {
		return false;
	}

	$smartmask_op = isset($_POST['smartmask_op']) ? $_POST['smartmask_op'] : false;

	if ($smartmask_op=='start_masquerade') {
		$_SESSION['masquerade'] = true;
		$_SESSION['groups_before_masquerade'] = $_SESSION['xoopsUserGroups'];
		$_SESSION['xoopsUserGroups'] = $_POST['smartmask_groups'];
		redirect_header(getenv("REQUEST_URI"), 3, _MB_SMASK_MASQUERADE_STARTED);
		exit;
	}
	if (!isset($_SESSION['masquerade'])) {
		$form = new XoopsThemeForm(_MB_SMASK_FORM_TITLE, "do_masquerade_form", xoops_getenv('PHP_SELF'));
		$form->setExtra( "enctype='multipart/form-data'" ) ;

		$groups_select = new XoopsFormSelectGroup(_MB_SMASK_SELECT_GROUP, 'smartmask_groups', true, array(), 10, true);
		$form->addElement($groups_select);

		$form_button_tray = new XoopsFormElementTray('', '');
		$form_hidden = new XoopsFormHidden('smartmask_op', '');
		$form_button_tray->addElement($form_hidden);

		$form_butt_create = new XoopsFormButton('', '', _GO, 'submit');
		$form_butt_create->setExtra('onclick="this.form.elements.smartmask_op.value=\'start_masquerade\'"');

		$form_button_tray->addElement($form_butt_create);

		$form->addElement($form_button_tray);

		$form->assign($xoopsTpl);

	}
	$block = true;
	return $block;
}

/*function b_do_masquerade_edit($options)
{
    $form = "" . _MB_SF_DISP . "&nbsp;";
    $form .= "<input type='text' name='options[]' value='" . $options[0] . "' />&nbsp;" . _MB_SF_FAQS . "";
    return $form;
}
*/
?>