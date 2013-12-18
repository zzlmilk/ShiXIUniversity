<?php

include '../include.php';

$action = $_REQUEST['action'];
switch ($action) {
    case 'insert':
        teamInsert($smarty);
        break;
    case 'edit':
        teamEdit($smarty);
        break;
    case 'delete':
        teamDelete($smarty);
        break;
    default :
        teamSearch($smarty);
}
$smarty->display('team.tpl');
?>
<?php
/**
 * 新闻查询
 * @param type $smarty
 */
function teamSearch($smarty) {
    $team = new team();
    $where = '1';
    if ($_REQUEST['username'] != '') {  //时间查询
        $where.=' and team_username like "%'.$_REQUEST['username'].'%"';
        $a = 1;
    }
    if (empty($_REQUEST['page']) || $_REQUEST['page'] < 0 || $_REQUEST['page'] == '') {  //判断传送的页码
        $page = 1;
    } else {
        $page = $_REQUEST['page'];
        $_SESSION['page_team'] = $page;
    }
    if ($_SESSION['page_team'] != '') {
        $page = $_SESSION['page_team'];
    } else {
        $_SESSION['page_team'] = $page;
    }
    $result = $team->page_2('team', 'team.php', $page, $where, $orderby, $_REQUEST);
    $count = count($result['data']);
    if ($count > 0) {
        $i = 0;
        $team_all = array();
        foreach ($result['data'] as $k_news => $v_news) {
            $team_all[$i]['team_username'] = $v_news['team_username'];
            $team_all[$i]['team_type'] = $v_news['team_type'];
            $team_all[$i]['team_id'] = $v_news['team_id'];
            $i++;
        }
        $smarty->assign('team', $team_all);
        $smarty->assign('team_number', $count);
        $smarty->assign('key', $result['key']);
        $smarty->assign('nodata', 0);
    } else {
        $smarty->assign('nodata', 1);
    }
    $_SESSION['team_username'] = $_REQUEST['username'];
    $smarty->assign('team_username', $_SESSION['team_username']);
}
/**
 * 新闻删除
 * @param type $smarty
 */
function teamDelete($smarty) {
    IF ($_REQUEST['action'] == 'delete' && $_REQUEST['team_id'] > 0) {  //删除数据
        $team = new team();
        $team->addCondition('team_id = ' . $_REQUEST['team_id'], 1);
        $team->initialize();
        if ($team->vars_number > 0) {
            $team->remove();
        }
        teamSearch($smarty);
    }
}

/**
 * 新闻插入
 * @param type $smarty
 */
function teamInsert($smarty) {
    if ($_REQUEST['action'] == 'insert') {
        $smarty->display('team_action.tpl');
        unset($_REQUEST['action']);
        die;
    }
}

/**
 * 新闻编辑
 * @param type $dir
 * @return boolean
 */
function teamEdit($smarty) {
    if ($_REQUEST['action'] == 'edit' && $_REQUEST['team_id'] > 0) {
        $team = new team($_REQUEST['team_id']);
        $smarty->assign('team', $team->vars);
        $smarty->display('team_action.tpl');
        unset($_REQUEST['action'], $_REQUEST['team_id']);
        die;
    }
}

function deldir($dir) {  //删除空文件夹
    $dh = @opendir($dir);
    while ($file = @readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (!is_dir($fullpath)) {
                @unlink($fullpath);
            } else {
                @deldir($fullpath);
            }
        }
    }
    @closedir($dh);
    if (@rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}

?>