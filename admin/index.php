<?php

/**
* $Id$
* Module: SmartQuiz
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("admin_header.php");
smart_xoops_cp_header();

smart_adminMenu(0, _AM_SMASK_INDEX);

smart_collapsableBar('smartmaskindex', _AM_SMASK_HOW_IT_WORKS, _AM_SMASK_HOW_IT_WORKS_DSC);

echo 'Coming soon...';

echo "<br />";
smart_close_collapsable('smartmaskindex');
echo "<br>";

smart_modFooter();
xoops_cp_footer();

?>