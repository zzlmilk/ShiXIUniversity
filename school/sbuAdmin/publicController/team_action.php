<?php

include '../include.php';
if ($_POST['team_id'] > 0) {
    UpdateTeam($_POST);
} else {
    InsertTeam($_POST);
}
?>
<?php

function InsertTeam($_POST) {
    $team = new team();
    $array = array('team_type', 'team_username', 'team_username_introduction');
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
    if ($_FILES['photo']['name'] != '') {
        $info = @getimagesize($_FILES["photo"]["tmp_name"]);
        $images_size = '127,134 ';
        $size = explode(',', $images_size);
        if ($size[0] == $info[0] && $size[1] == $info[1]) {
            
        } else {
            $result = asd();
            if ($result == 1) {
                echo '<script>alert("图片大小错误,请按照要求");history.back();history.go(0);</script>';
            } else {
                echo '<script>alert("图片大小错误,请按照要求");history.back();</script>';
            }
            die;
        }
    }
    $team_id = $team->insert($insert);
    if ($team_id > 0) {
        $save_path =  $_SERVER['DOCUMENT_ROOT'] . '/sbuAdmin/uploadFile/team/' . $team_id;
        if (!file_exists($save_path)) {
            mkdir($save_path);
        }
    }
    $team_ = new team($team_id);
    if ($_FILES['photo']['name'] != '') {
        switch ($info['mime']) {
            case 'image/pjpeg': $ok = 1;
                $end = 'jpg';
                break;
            case 'image/jpeg': $ok = 1;
                $end = 'jpg';
                break;
            case 'image/gif': $ok = 1;
                $end = 'gif';
                break;
            case 'image/png': $ok = 1;
                $end = 'png';
                break;
            case 'image/jpg': $ok = 1;
                $end = 'jpg';
                break;
        }

        if ($ok == 1) {
            $name = time();
            @move_uploaded_file($_FILES['photo']["tmp_name"], $save_path . '/' . $name . '.' . $end);
            $update['team_orital_name'] = $_FILES['photo']['name'];
            $update['team_username_photo'] = $name . '.' . $end;
            $team_->update($update);
        }
    }
    echo '<script>alert("添加成功");window.location.href="'.urlController.'/team.php?team_id=' . $team_id . '";</script>';
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

function UpdateTeam($_POST) {
    $team = new team($_POST['team_id']);
    $array = array('team_type', 'team_username', 'team_username_introduction');
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
    if ($_FILES['photo']['name'] != '' && $_FILES['photo']['name'] != $team->vars['team_orital_name']) {
        $info = @getimagesize($_FILES["photo"]["tmp_name"]);
        switch ($info['mime']) {
            case 'image/pjpeg': $ok = 1;
                $end = 'jpg';
                break;
            case 'image/jpeg': $ok = 1;
                $end = 'jpg';
                break;
            case 'image/gif': $ok = 1;
                $end = 'gif';
                break;
            case 'image/png': $ok = 1;
                $end = 'png';
                break;
            case 'image/jpg': $ok = 1;
                $end = 'jpg';
                break;
        }
        $images_size = '127,134 ';
        $size = explode(',', $images_size);
        $save_path =  $_SERVER['DOCUMENT_ROOT'] . '/sbuAdmin/uploadFile/team/' . $_POST['team_id'];
        if ($size[0] == $info[0] && $size[1] && $info[1] && $ok == 1) {
            if (file_exists($save_path . '/' . $team->vars['team_username_photo'])) {
                unlink($save_path . '/' . $team->vars['team_username_photo']);
            }
            $name = time();
            move_uploaded_file($_FILES['photo']["tmp_name"], $save_path . '/' . $name . '.' . $end);
            $update['team_orital_name'] = $_FILES['photo']['name'];
            $update['team_username_photo'] = $name . '.' . $end;
        } else {
            $result = asd();
            if ($result == 1) {
                echo '<script>alert("图片大小错误,请按照要求");history.back();history.go(0);</script>';
            } else {
                echo '<script>alert("图片大小错误,请按照要求");history.back();</script>';
            }
            die;
        }
    }
    $a = count($update);
    if ($a >= 1) {
        $team->update($update);
    }
    echo '<script>alert("修改成功");window.location.href="'.urlController.'/team.php";</script>';
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
