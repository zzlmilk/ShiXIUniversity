<?php
include $_SERVER['DOCUMENT_ROOT'] . '/webAdmin/include.php';
if ($_REQUEST['action'] == 'news' || $_REQUEST['action'] == 'main_news') {
    $news_all = new news_all();
    if ($_REQUEST['search_name'] != '' && $_REQUEST['search_name'] != 'undefined') {
        $where = 'title like "%' . $_REQUEST['search_name'] . '%"';
    } elseif($_REQUEST['action'] == 'news'){
	$where = 'news_type_channel like "' . $_SESSION['news_name'] . '"';
    }elseif($_REQUEST['action'] == 'main_news'){
	$where = 'news_type = 1 or news_type = 8';
    }
    if($_REQUEST['searchResult']!='' || $_REQUEST['search_name'] != 'undefined'){
        if($_REQUEST['searchResult']!=''){
	    if($_REQUEST['action'] == 'news'){
		$where.=' and news_type = '.$_REQUEST['searchResult'];
	    }else{
		$where ='news_type = '.$_REQUEST['searchResult'];
	    }
        }
    } 
    $where.= ' and version_language = ' . WEBLanguage;
    $news_all->addOrderBy('time DESC');
    $news_all->initialize($where);
    $news_result = $news_all->vars_all;
    $str = "<table width='100%'>";
    if ($news_all->vars_number > 0) {
        foreach ($news_result as $k => $v) {
            if ($k % 2 == 0) {
                $str .= "<tr><td width=12%>";
            } else if ($k % 2 == 1) {
                $str .= "<td width=12%>";
            } else {
                $str .= "<td width=12%>";
            }
            if ($v['title'] == $_REQUEST['result']) {
                $str.='<input type="radio" name="news_check" id="news_check" checked="checked" class="selectGame"  value=' . $v['id'] . '>' . '<span id="span'.$v['id'].'">'.$v['title'].'</span>';
            } else {
                $str.='<input type="radio" name="news_check" id="news_check" class="selectGame"  value=' . $v['id'] . '>' . '<span id="span'.$v['id'].'">'.$v['title'].'</span>';
            }
            if ($k % 2 == 0) {
                $str .= "</td>";
            } else if ($k % 2 == 1) {
                $str .= "</td></tr>";
            } else {
                $str .= "</td>";
            }
        }
    } else {
        $str .= "<tr><td>未找到与您查询相关的数据</td></tr>";
    }
    $str .= "</table>";
    echo $str;
}
?>
