<?php

session_start();
//ini_set("display_errors", "Off");
defined('FOOT_') or define('FOOT_', $_SERVER['DOCUMENT_ROOT']);
defined('FOOT') or define('FOOT', FOOT_ . '/sbuAdmin/');
defined('FOOTBASIC') or define('FOOTBASIC', FOOT_ . '/sbuAdmin/basicClasses/');
defined('FOOTCLASS') or define('FOOTCLASS', FOOT_ . '/sbuAdmin/classes/');
defined('rootPath') or define('rootPath', 'http://112.124.25.155/sbuAdmin/');
defined('urlController') or define('urlController', rootPath.'publicController');
require_once FOOT . 'js/smarty.php';
if ($handle = opendir(FOOTBASIC)) {
    /* to include all files that in the class folder what a way to include classes!!! */
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..' && $file != '.svn') {
            include_once(FOOTBASIC . $file);
        }
    }
    closedir($handle);
}
if ($handle = opendir(FOOTCLASS)) {
    /* to include all files that in the class folder what a way to include classes!!! */
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..' && $file != '.svn') {
            include_once(FOOTCLASS . $file);
        }
    }
    closedir($handle);
}
if ($_REQUEST['action'] == 'clear') {
    foreach ($_SESSION as $k => $v) {
        if ($k != 'user_id') {
            unset($_SESSION[$k]);
        }
    }
}
$smarty->assign('rootPath', rootPath);
$smarty->assign('urlController', urlController);
?>
