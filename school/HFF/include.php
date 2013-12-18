<?php

session_start();
defined('FOOT_') or define('FOOT_', $_SERVER['DOCUMENT_ROOT']);
//defined('FOOT_') or define('FOOT_', '/Users/Zoe/Sites');
defined('FOOT') or define('FOOT', FOOT_ . '/HFF/');
defined('FOOTBASIC') or define('FOOTBASIC', FOOT_ . '/HFF/basicClasses/');
defined('FOOTCLASS') or define('FOOTCLASS', FOOT_ . '/HFF/classes/');
defined('FOOTController') or define('FOOTController', FOOT_ . '/HFF/publicController/');
//defined('URLController') or define('URLController', 'http://localhost/HFF/');
defined('URLController') or define('URLController', 'http://112.124.25.155/HFF/');
//defined('URLController') or define('URLController', 'http://localhost/~Zoe/cloud/');
defined('WebsitePublic') or define('WebsitePublic', FOOT . 'public/');
require_once FOOT . 'public/js/smarty.php';
if ($handle = opendir(FOOTBASIC)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..' && $file != '.svn' && $file != ".DS_Store") {
            include_once(FOOTBASIC . $file);
        }
    }
    closedir($handle);
}
if ($handle = opendir(FOOTController)) {
    /* to include all files that in the class folder what a way to include classes!!! */
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..' && $file != '.svn' && $file != ".DS_Store") {
            include_once(FOOTController . $file);
        }
    }
    closedir($handle);
}
$smarty->assign('URLController', URLController);
$smarty->assign('WebsitePublic', WebsitePublic);
?>
