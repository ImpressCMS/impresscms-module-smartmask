<?php
/**
* $Id$
* Module: SmartContent
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once('header.php');

$xoopsOption['template_main'] = 'smartmask_index.html';
include_once(XOOPS_ROOT_PATH . "/header.php");
include_once("footer.php");

include_once SMARTOBJECT_ROOT_PATH."class/smartobjecttable.php";

$criteria = new CriteriaCompo();
$criteria->add(new Criteria('status', SMARTMASK_QUIZ_STATUS_ONLINE));

$objectTable = new SmartObjectTable($smartmask_quiz_handler, $criteria, NULL, true);
$objectTable->addColumn(new SmartObjectColumn('title', 'left'));
$objectTable->addColumn(new SmartObjectColumn('date', 'center', 100));
$objectTable->addColumn(new SmartObjectColumn('credits', 'center', 100));


$objectTable->addQuickSearch(array('title', 'description'));

$objectTable->addPermissionCriteria('quiz_view');

$xoopsTpl->assign('smartmask_quiz_table', $objectTable->fetch());

$xoopsTpl->assign('module_home', smart_getModuleName(false, true));
$index_header = $myts->displayTarea($xoopsModuleConfig['index_header'], true);
$xoopsTpl->assign('index_header', $index_header);
$index_footer = $myts->displayTarea($xoopsModuleConfig['index_footer'], true);
$xoopsTpl->assign('index_footer', $index_footer);

include_once(XOOPS_ROOT_PATH . '/footer.php');
?>