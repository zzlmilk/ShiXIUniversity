<?php

include '../include.php';

$action = $_REQUEST['action'];
switch ($action) {
    case 'insert':
        newsInsert($smarty);
        break;
    case 'edit':
        newsEdit($smarty);
        break;
    case 'delete':
        newsDelete($smarty);
        break;
    default :
        newsSearch($smarty);
}
$smarty->display('news_all.tpl');
?>
<?php
/**
 * 新闻查询
 * @param type $smarty
 */
function newsSearch($smarty) {
    $news = new news_all();
    if ($_REQUEST['begin'] != '' || $_REQUEST['end'] != '') {  //时间查询
        $time_array = array('begin', 'end');
        foreach ($time_array as $k_time => $v_time) {
            if ($_POST[$v_time] != '') {
                list ($y, $h, $d) = explode('-', $_POST[$v_time]);
                $$v_time = mktime(0, 0, 0, $h, $d, $y);
            } else {
                $$v_time = '';
            }
        }
        if ($begin == '' && $end != '') {  //判断起始日期是否为空
            $where .= ' and news_time <=' . $end;
        } else if ($begin != '' && $end != '') {
            $where .=' and news_time between ' . $begin . ' and ' . $end;
        } else if ($begin != '' && $end == '') {//判断结束日期是否为空
            $where .=' and news_time between ' . $begin . ' and ' . time();
        }
        $a = 1;
    }
    if (empty($_REQUEST['page']) || $_REQUEST['page'] < 0 || $_REQUEST['page'] == '') {  //判断传送的页码
        $page = 1;
    } else {
        $page = $_REQUEST['page'];
        $_SESSION['page_news'] = $page;
    }
    if ($_SESSION['page_news'] != '') {
        $page = $_SESSION['page_news'];
    } else {
        $_SESSION['page_news'] = $page;
    }
    $orderby = 'news_time DESC';
    $result = $news->page_2('news_all', 'news.php', $page, $where, $orderby, $_REQUEST);
    $count = count($result['data']);
    if ($count > 0) {
        $i = 0;
        foreach ($result['data'] as $k_news => $v_news) {
            $news_all[$i]['time'] = date('Y-m-d H:i:s', $v_news['news_time']);
            $news_all[$i]['news_delete'] = $v_news['news_delete'];
            $news_all[$i]['title'] = $v_news['news_title'];
            $news_all[$i]['news_id'] = $v_news['news_id'];
            $i++;
        }
        $smarty->assign('news', $news_all);
        $smarty->assign('news_number', $count);
        $smarty->assign('key', $result['key']);
        $smarty->assign('nodata', 0);
    } else {
        $smarty->assign('nodata', 1);
    }
    $_SESSION['begin_1'] = $_REQUEST['begin'];
    $_SESSION['end_1'] = $_REQUEST['end'];
    $smarty->assign('begin', $_SESSION['begin_1']);
    $smarty->assign('end', $_SESSION['end_1']);
}
/**
 * 新闻删除
 * @param type $smarty
 */
function newsDelete($smarty) {
    IF ($_REQUEST['action'] == 'delete' && $_REQUEST['news_id'] > 0) {  //删除数据
        $news = new news_all();
        $news->addCondition('news_id = ' . $_REQUEST['news_id'], 1);
        $news->initialize();
        if ($news->vars_number > 0) {
            $news->remove();
        }
        newsSearch($smarty);
    }
}

/**
 * 新闻插入
 * @param type $smarty
 */
function newsInsert($smarty) {
    if ($_REQUEST['action'] == 'insert') {
        $smarty->display('news_action.tpl');
        unset($_REQUEST['action']);
        die;
    }
}

/**
 * 新闻编辑
 * @param type $dir
 * @return boolean
 */
function newsEdit($smarty) {
    if ($_REQUEST['action'] == 'edit' && $_REQUEST['news_id'] > 0) {
        $news = new news_all($_REQUEST['news_id']);
        $smarty->assign('news', $news->vars);
        $smarty->assign('news_action', 1);
        $smarty->display('news_action.tpl');
        unset($_REQUEST['action'], $_REQUEST['news_id']);
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