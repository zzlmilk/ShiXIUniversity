<?php

include $_SERVER['DOCUMENT_ROOT'] . '/webAdmin/include.php';
if ($_REQUEST['action'] == 'tool') {
    $tool = new tool();
    if ($_REQUEST['search_name'] != '' && $_REQUEST['search_name'] != 'undefined') {
        $where = 'tool_name like "%' . $_REQUEST['search_name'] . '%"';
    } else{
        $where = '1 ';
    }
    if ($_REQUEST['searchResult'] != '' || $_REQUEST['search_name'] != 'undefined') {
        if ($_REQUEST['searchResult'] != '') {
            $where.=' and tool_type = ' . $_REQUEST['searchResult'];
        }
    }
    $where.= ' and version_language = ' . WEBLanguage;
    $tool->addOrderBy('tool_time DESC');
    $tool->initialize($where);
    $news_result = $tool->vars_all;
    $str = "<table width='100%'>";
    if ($tool->vars_number > 0) {
        foreach ($news_result as $k => $v) {
            if ($k % 2 == 0) {
                $str .= "<tr><td width=12%>";
            } else if ($k % 2 == 1) {
                $str .= "<td width=12%>";
            } else {
                $str .= "<td width=12%>";
            }
            if ($v['id'] == $_REQUEST['result']) {
                $str.='<input type="radio" name="tool_check" id="tool_check" checked="checked" class="selectTool"  value=' . $v['id'] . '>' . '<span id="tools' . $v['id'] . '">' . $v['tool_name'] . '</span>';
            } else {
                $str.='<input type="radio" name="tool_check" id="tool_check" class="selectTool"  value=' . $v['id'] . '>' . '<span id="tools' . $v['id'] . '">' . $v['tool_name'] . '</span>';
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
