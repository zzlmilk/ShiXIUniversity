<?php

include $_SERVER['DOCUMENT_ROOT'] . '/webAdmin/include.php';
if ($_REQUEST['action'] == 'operators') {
    $operotoer_list = new operators_list();
    if ($_REQUEST['search_name'] == '' || $_REQUEST['search_name'] == 'undefined') {
        $where = ' version_language = ' . WEBLanguage;
    } else {
        $where = 'name like "%' . $_REQUEST['search_name'] . '%" ';
        $where.=' and version_language = ' . WEBLanguage;
    }
    $operotoer_list->initialize($where);
    $operotoer_list_result = $operotoer_list->vars_all;
    $str = "<table width='100%'>";
    if ($operotoer_list->vars_number > 0) {
        foreach ($operotoer_list_result as $k => $v) {
            if ($k % 5 == 0) {
                $str .= "<tr><td width=12%>";
            } else if ($k % 5 == 4) {
                $str .= "<td width=12%>";
            } else {
                $str .= "<td width=12%>";
            }
            if ($v['name'] == $_REQUEST['result']) {
                $str.='<input type="radio" name="operators_check" id="operators_check" checked="checked" class="selectGame"  value=' . $v['name'] . '>' . $v['name'];
            } else {
                $str.='<input type="radio" name="operators_check" id="operators_check" class="selectGame"  value=' . $v['name'] . '>' . $v['name'];
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
