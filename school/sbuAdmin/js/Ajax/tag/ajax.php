<?php

include $_SERVER['DOCUMENT_ROOT'] . '/webAdmin/include.php';
;
if ($_REQUEST['action'] == 'tag') {  //标签查询 与 面板显示
    $tagName = explode(',', $_REQUEST['result']);
    $news_tag = new news_tag();
    if ($_REQUEST['search_name'] == '' || $_REQUEST['search_name'] == 'undefined') {
        $where = ' version_language  = ' . WEBLanguage . ' and ';
    } else {
        $where = 'name like "%' . $_REQUEST['search_name'] . '%"  and version_language = ' . WEBLanguage . ' and ';
    }
    $where .= '   channel like "' . $_SESSION['news_name'] . '"';
    $news_tag->initialize($where);
    $tag_result = $news_tag->vars_all;
    $str = "<table width='100%'>";
    $selected_str = '';
    foreach ($tagName as $k => $v) {
        $tagName[$k] = trim($v);
    }
    if ($_REQUEST['searchResult'] != '' && $_REQUEST['searchResult'] != 'undefined') {
        $tagName_ = explode(',', $_REQUEST['searchResult']);
        $a = 1;
    } else {
        $a = 0;
    }
    if ($news_tag->vars_number > 0) {
        foreach ($tag_result as $k => $v) {
            $need = 0;
            if ($k % 7 == 0) {
                $str .= "<tr><td >";
            } else if ($k % 7 == 6) {
                $str .= "<td >";
            } else {
                $str .= "<td >";
            }
            if (count($tagName_) > 0) {
                if (in_array($v['name'], $tagName_)) {
                    $need = 1;
                } else {
                    $need = 0;
                }
            } else {
                if (count($tagName) > 0) {  //编辑编辑时  查找 已经选中的标签 默认选中
                    if (in_array($v['name'], $tagName)) {
                        $need = 1;
                    } else {
                        $need = 0;
                    }
                }
            }
            switch ($need) {
                case '1':
                    $str.='<input  onclick="selectTag(' . $v['id'] . ',this)"   type="checkbox" checked="checked" class="selectTags"  value=' . $v['name'] . ' id="tag_name_' . $v['id'] . '"><span id="tag_' . $v['id'] . '">' . $v['name'] . '</span>';
                    if ($a == 0) {
                        $selected_str.='<input onclick="TagOpenAndEnd(' . $v['id'] . ')"  type="checkbox" id="tag_name_' . $v['id'] . '" value="' . $v['name'] . '" class="selectTags" checked="checked">';
                        $selected_str.='<span id="tag_' . $v['id'] . '">' . $v['name'] . '</span>';
                    }
                    break;
                case '0':
                    $str.='<input onclick="selectTag(' . $v['id'] . ',this)"    type="checkbox"  class="selectTags" value=' . $v['name'] . ' id="tag_name_' . $v['id'] . '"><span id="tag_' . $v['id'] . '">' . $v['name'] . '</span>';
                    break;
            }

            if ($k % 7 == 0) {
                $str .= "</td>";
            } else if ($k % 7 == 6) {
                $str .= "</td></tr>";
            } else {
                $str .= "</td>";
            }
        }
    } else {
        $str .= "<tr><td>未找到与您查询相关的数据</td></tr>";
    }
    $str .= "</table>";
    $return_str[0] = $str;
    $return_str[1] = $selected_str;
    echo json_encode($return_str);
}
if ($_REQUEST['action'] == 'addtag') { //标签添加
    $tag_name = $_REQUEST['tag_name'];
    $news_tag = new news_tag();
    $news_tag->initialize('name like "' . $tag_name . '" and version_language = ' . WEBLanguage);
    if ($news_tag->vars_number > 0) {
        echo '标签已存在';
        die;
    } else {
        $insert['name'] = $tag_name;
        $insert['channel'] = $_SESSION['news_name'];
        $insert['version_language'] = WEBLanguage;
        $tag_id = $news_tag->insert($insert);
        if ($tag_id > 0) {
            echo '1';
            die;
        }
    }
}
if ($_REQUEST['action'] == 'insertTag') {  //标签输入
    $table = '请输入标签名称';
    $table = '标签名称:<input type=text name=tag_name id=tag_name>';
    echo $table;
}
?>
