<?php

include $_SERVER['DOCUMENT_ROOT'] . '/webAdmin/include.php';
if ($_REQUEST['action'] == 'UploadImage') {
    //幻灯片尺寸
    if ($_FILES['upload']['name'] != '' && $_FILES['upload']['error'] == 0) {
        $info = @getimagesize($_FILES['upload']["tmp_name"]);
        $size = explode(',', '340,235');
        switch ($info['mime']) {
            case 'image/pjpeg': $ok = 1;
                $end = '.jpg';
                break;
            case 'image/jpeg': $ok = 1;
                $end = '.jpg';
                break;
            case 'image/gif': $ok = 1;
                $end = '.gif';
                break;
            case 'image/png': $ok = 1;
                $end = '.png';
                break;
            case 'image/jpg': $ok = 1;
                $end = '.jpg';
                break;
        }
        if ($ok != 1) {
            echo '图片格式不对,请选择gif,jpg,png等格式的图片';
            die;
        } else {
            if ($size[0] == $info[0] && $size[1] == $info[1]) {
                $image_name = time() . '_' . $_REQUEST['opstion'] . $end;
                if (move_uploaded_file($_FILES['upload']['tmp_name'], ToolPath . $image_name)) {
                    echo '1,' . $image_name;
                } else {
                    echo '-1';
                }
            } else {
                echo '图片大小错误,请按照要求,图片尺寸为' . $size[0] . '*' . $size[1] ;
                die;
            }
        }
    } else {
        echo '-1';
    }
}
?>
