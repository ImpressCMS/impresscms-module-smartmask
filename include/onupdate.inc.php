<?php

if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

global $modversion;
if( ! empty( $_POST['fct'] ) && ! empty( $_POST['op'] ) && $_POST['fct'] == 'modulesadmin' && $_POST['op'] == 'update_ok' && $_POST['dirname'] == $modversion['dirname'] ) {
	// referer check
	$ref = xoops_getenv('HTTP_REFERER');
	if( $ref == '' || strpos( $ref , XOOPS_URL.'/modules/system/admin.php' ) === 0 ) {
		/* module specific part */



		/* General part */

		// Keep the values of block's options when module is updated (by nobunobu)
		include dirname( __FILE__ ) . "/updateblock.inc.php" ;

	}
}

function xoops_module_update_smartmask($module) {

	include_once(XOOPS_ROOT_PATH . "/modules/" . $module->getVar('dirname') . "/include/functions.php");
	include_once(XOOPS_ROOT_PATH . "/modules/smartobject/class/smartdbupdater.php");

	$dbupdater = new SmartobjectDbupdater();

    ob_start();

    $dbVersion  = smart_GetMeta('version', 'smartmask');
    if (!$dbVersion) {
    	$dbVersion = 0;
    }

	$dbupdater = new SmartobjectDbupdater();

	echo "<code>" . _SDU_UPDATE_UPDATING_DATABASE . "<br />";


    // db migrate version = 1
    $newDbVersion = 1;

    if ($dbVersion < $newDbVersion) {
    	echo "Database migrate to version " . $newDbVersion . "<br />";

	    $table = new SmartDbTable('smartmask_quiz');
    	$table->addNewField('completed_message', "TEXT NOT NULL default ''");
	    if (!$dbupdater->updateTable($table)) {
	        /**
	         * @todo trap the errors
	         */
    	}
	}

    // db migrate version = 2
    $newDbVersion = 2;

    if ($dbVersion < $newDbVersion) {
    	echo "Database migrate to version " . $newDbVersion . "<br />";

	    $table = new SmartDbTable('smartmask_take');
    	$table->addAlteredField('date', "INT(11) NOT NULL default 0", 'take_date');
    	$table->addAlteredField('uid', "INT(11) NOT NULL default 0", 'take_uid');
    	$table->addNewField('next_question', "INT(11) NOT NULL default -1");
	    if (!$dbupdater->updateTable($table)) {
	        /**
	         * @todo trap the errors
	         */
    	}
	}

	echo "</code>";

    $feedback = ob_get_clean();
    if (method_exists($module, "setMessage")) {
        $module->setMessage($feedback);
    } else {
        echo $feedback;
    }
	smart_SetMeta("version", isset($newDbVersion) ? $newDbVersion : 0, "smartmask"); //Set meta version to current

	return true;
}

function xoops_module_install_smartmask($module) {

    ob_start();

	include_once(XOOPS_ROOT_PATH . "/modules/" . $module->getVar('dirname') . "/include/functions.php");

	//smartmask_create_upload_folders();

    $feedback = ob_get_clean();
    if (method_exists($module, "setMessage")) {
        $module->setMessage($feedback);
    }
    else {
        echo $feedback;
    }

	return true;
}


?>