<?php

include $_SERVER['DOCUMENT_ROOT'] . '/webAdmin/include.php';
if ($_REQUEST['action'] == 'game') {
    $game = new games();
    if ($_REQUEST['search_name'] == '' || $_REQUEST['search_name'] == 'undefined') {
        $where = 'version_language = ' . WEBLanguage;
    } else {
        $where = 'game_name like "%' . $_REQUEST['search_name'] . '%" and version_language = ' . WEBLanguage;
    }
    $game->initialize($where);
    $game_result = $game->vars_all;
    $str = "<table width='100%'>";
    if ($game->vars_number > 0) {
        foreach ($game_result as $k => $v) {
            if ($k % 5 == 0) {
                $str .= "<tr><td width=12%>";
            } else if ($k % 5 == 4) {
                $str .= "<td width=12%>";
            } else {
                $str .= "<td width=12%>";
            }
            if ($v['game_name'] == $_REQUEST['result']) {
                $str.='<input type="radio" name="game_check" id="game_check" checked="checked" class="selectGame"  value=' . $v['game_name'] . '>' . $v['game_name'];
            } else {
                $str.='<input type="radio" name="game_check" id="game_check" class="selectGame"  value=' . $v['game_name'] . '>' . $v['game_name'];
            }
            if ($k % 5 == 0) {
                $str .= "</td>";
            } else if ($k % 5 == 4) {
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
