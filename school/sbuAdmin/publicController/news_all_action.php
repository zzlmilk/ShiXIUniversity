<?php
if ($_POST['news_id'] > 0) {
    UpdateNews($_POST);
} else {
    InsertNews($_POST);
}
?>
<?php

function InsertNews($_POST) {
    include '../include.php';
    $news = new news_all();
    $array = array('news_title', 'news_text');
    foreach ($_POST as $k_post => $v_post) {
        if ($v_post != '') {
                foreach ($array as $k_array => $v_array) {
                    if ($v_array == $k_post) {
                        $insert[$v_array] = $v_post;
                    }
                    unset($v_array);
                }
        }
    }
    $insert['news_time'] = time();
    $news_id = $news->insert($insert);
    $news_ = new news_all($news_id);
    echo '<script>alert("添加成功");window.location.href="'.urlController.'/news.php";</script>';
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

function UpdateNews($_POST) {
    include '../include.php';
    $news = new news_all($_POST['news_id']);
 
    $array = array('news_title', 'news_text');
    //$images_size = array('1' => '300,225', '2' => '110,80', '3' => '110,80', '4' => '320,145', '5' => '200,150', '6' => '200,150', '7' => '200,150', '8' => '300,225');
    foreach ($_POST as $k_post => $v_post) {
        if ($v_post != '') {
                foreach ($array as $k_array => $v_array) {
                    if ($v_array == $k_post && $news->vars[$v_array] != $v_post) {
                        $update[$v_array] = $v_post;
                    }
                    unset($v_array);
            }
        }
    }
    $a = count($update);
    if ($a >= 1) {
        $news->update($update);
    }
    echo '<script>alert("修改成功");window.location.href="'.urlController.'/news.php";</script>';
}

function asd() {
    if (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE 8.0")) {
        $a = 1;
    } else if (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE 7.0"))
        $a = 1;
    else if (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE 6.0"))
        $a = 1;
    else if (strpos($_SERVER["HTTP_USER_AGENT"], "Firefox"))
        $a = 2;
    else if (strpos($_SERVER["HTTP_USER_AGENT"], "Firefox"))
        $a = 2;
    else if (strpos($_SERVER["HTTP_USER_AGENT"], "Chrome"))
        $a = 2;
    else if (strpos($_SERVER["HTTP_USER_AGENT"], "Safari"))
        $a = 2;
    else if (strpos($_SERVER["HTTP_USER_AGENT"], "Opera"))
        $a = 2;
    else {
        echo '<input type="hidden" value="1">';
    }
    return $a;
}

?>
