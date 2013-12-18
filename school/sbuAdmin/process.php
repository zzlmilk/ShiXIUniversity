<?php

include 'include.php';
session_start();
if (isset($_GET['login'])) {
    session_unset();
    echo '<script type="text/javascript">window.location="login.html";</script>';
}
if ($_REQUEST['auth_1'] == 1) {
    require_once 'auth.php';
}
if (isset($_POST['user'])) {
    $admin = new admin();
    $ad['admin_username'] = $_POST['user'];
    $ad['admin_password'] = $_POST['password'];
    $admin->initialize($ad);
    if (count($admin->vars) > 0) {
        $admin->updateVars();
        $_SESSION['user_id'] = $admin->vars['admin_id'];
        $_SESSION['user_name'] = $admin->vars['admin_username'];
        echo '<script type="text/javascript">window.location="index.php";</script>';
    } else {
        echo '<script type="text/javascript">alert("用户名或密码错误！");window.location="login.html";</script>';
    }
}
if ($_POST['action'] == 'lock') {
    $news = new news_all($_POST['id']);
    if ($news->vars_number > 0) {
        $show = $news->vars['news_delete'] > 0 ? 0 : 1;
        $news->vars['news_delete'] = $show;
        $news->updateVars();
        echo '操作成功';
        die;
    }
}
if ($_REQUEST['action'] == 'deleteSelect') {
    $str = explode(',', $_REQUEST['str']);
    foreach ($str as $item_s) {
        if ($item_s > 0) {
            $news = new news_all($item_s);
            if ($news->vars['news_type'] == 7 || $news->vars['news_type'] == 8) {
                deldir(NEWSImagePath . $news->vars['news_id']);
            } else {
                deldir(NEWSImagePath . $news->vars['news_id']);
            }
            $news->remove();
        }
    }
    echo '操作成功';
    die;
}
if ($_REQUEST['action'] == 'news_image') {  //新游频道 删除图片
    $news = new news_all($_REQUEST['news_id']);
    $image_array = json_decode($news->vars['image_content']);
    $image_size = json_decode($news->vars['image_info']);
    $count_image = count($image_array);
    $count_size = count($image_size);
    $key = ($_SESSION['article_page'] - 1) * 4 + $_REQUEST['key'];
    if ($count_image > 0) {
        $i = 0;
        foreach ($image_array as $k_array => $v_array) {
            if ($key != $k_array) {
                $new_image_array[$i] = $v_array;
                $i++;
            } else {
                if ($news->vars['news_type'] == 7 || $news->vars['news_type'] == 8) {
                    @unlink(NEWSCentImagePath . $v_array);
                } else {
                    @unlink(NEWSImagePath . $v_array);
                }
            }
        }
        $news->vars['image_content'] = json_encode($new_image_array);
    } else {
        $news->vars['image_content'] = 0;
    }
    if ($count_size > 0) {
        $o = 0;
        foreach ($image_size as $k_size => $v_sizey) {
            if ($k_size != $key) {
                $new_image_size[$o] = $v_sizey;
                $o++;
            }
        }
        $news->vars['image_info'] = json_encode($new_image_size);
    } else {
        $news->vars['image_info'] = 0;
    }
    $news->updateVars();
    echo '删除成功';
    die;
}
if ($_REQUEST['action'] == 'tool_image') {  //新游频道 删除图片
    $tool = new tool($_REQUEST['tool_id']);
    $image_array = json_decode($tool->vars['tool_shot']);

    $count_image = count($image_array);
    $key = ($_SESSION['tool_article_page'] - 1) * 4 + $_REQUEST['key'];

    if ($count_image > 0) {
        $i = 0;
        foreach ($image_array as $k_array => $v_array) {
            if ($key != $k_array) {
                $new_image_array[$i] = $v_array;
                $i++;
            } else {
                @unlink(TOOLShotPath . $v_array);
            }
        }
        $tool->vars['tool_shot'] = json_encode($new_image_array);
    } else {
        $tool->vars['tool_shot'] = 0;
    }
    $tool->updateVars();
    echo '删除成功';
    die;
}
if ($_REQUEST['action'] == 'server_action') {
    $game = new games();
    $game->addCondition('game_name like "' . $_REQUEST['game_name'] . '" and version_language = ' . WEBLanguage, 1);
    $game->initialize();
    if ($game->vars_number > 0) {
        $game_id = $game->vars['id'];
    } else {
        echo '游戏不存在,请去游戏列表添加';
        die;
    }
    $game_operators = new game_operators();
    $game_operators->addCondition('game_id = ' . $game_id . ' and operator_name like "' . $_REQUEST['operator_name'] . '" and version_language = ' . WEBLanguage . ' and whether_cooperation = ' . $_SESSION['cooperation'], 1);
    $game_operators->initialize();
    if ($game_operators->vars_number <= 0) {
        if ($_SESSION['cooperation'] == 1) {
            $insert_['game_id'] = $game_id;
            $insert_['operator_name'] = HEZUO;
            $insert_['operator_id'] = 19;
            $insert_['operator_state'] = '运营';
            $insert_['operator_url'] = rootPaths;
            $insert_['operators_time'] = time();
            $insert_['version_language'] = WEBLanguage;
            $insert_['whether_cooperation'] = $_SESSION['cooperation'];
            $game_operators->insert($insert_);
        } else {
            echo '运营商不存在,请去运营商列表添加';
            die;
        }
    }
    //检查是否 数据 重复
    if ($_REQUEST['server_id'] > 0) {
        $game_server = new game_server();
        $game_server->addCondition('id = ' . $_REQUEST['server_id'] . ' and version_language = ' . WEBLanguage, 1);
        $game_server->initialize();
        if ($game_server->vars_number > 0) {
            if ($game_server->vars['server_name'] != $_REQUEST['server_name']) {
                $check = 1;
            }
        }
    } else {
        $check = 1;
    }
    if ($check == 1) {
        $game_server = new game_server();
        $game_server->addCondition('server_name like  "' . $_REQUEST['server_name'] . '" and operator_name like "' . $_REQUEST['operator_name'] . '" and game_id = ' . $game_id . ' and version_language = ' . WEBLanguage . ' and whether_cooperation = ' . $_SESSION['cooperation'], 1);
        $game_server->initialize();
        if ($game_server->vars_number > 0) {
            echo '服务器重复,请重新输入';
            die;
        }
    }
    $time_list = explode(',', $_REQUEST['open_time']);
    $open_time = mktime($time_list[3], $time_list[4], 0, $time_list[1], $time_list[2], $time_list[0]);
    if ($_REQUEST['server_id'] > 0) {
        $game_server = new game_server();
        $game_server->addCondition('id = ' . $_REQUEST['server_id'], 1);
        $game_server->initialize();
        if ($game_server->vars_number > 0) {
            $game_server->vars['game_id'] = $game_id;
            $game_server->vars['operator_name'] = $_REQUEST['operator_name'];
            $game_server->vars['open_time'] = $open_time;
            $game_server->vars['server_name'] = $_REQUEST['server_name'];
            $game_server->vars['server_url'] = $_REQUEST['server_url'];
            $game_server->vars['server_time'] = time();
            $game_server->vars['able_test'] = $_REQUEST['able_test'];
            $game_server->vars['able_pay'] = $_REQUEST['able_pay'];
            $game_server->updateVars();
            $game_server->operatorsAction($_SESSION['operators_auth'], $_SESSION['user_id'], $_SESSION['operatiors'], $_REQUEST['server_id']);
            echo '1:修改成功';
            die;
        }
    } else {
        $insert['game_id'] = $game_id;
        $insert['server_url'] = $_REQUEST['server_url'];
        $insert['operator_name'] = $_REQUEST['operator_name'];
        $insert['open_time'] = $open_time;
        $insert['server_name'] = $_REQUEST['server_name'];
        $insert['server_time'] = time();
        $insert['version_language'] = WEBLanguage;
        $insert['whether_cooperation'] = $_SESSION['cooperation'];
        $insert['able_test'] = $_REQUEST['able_test'];
        $insert['able_pay'] = $_REQUEST['able_pay'];
        $game_server_id = $game_server->insert($insert);
        if ($game_server_id > 0) {
            if ($_SESSION['cooperation'] == 1) {  //如合作游戏 添加服务器的时  查看合作游戏 排列列表 如没有该游戏 则添加
                $system = new system(6);
                $soft_game = explode(',', $system->vars['content']);
                if (count($soft_game) > 0) {
                    foreach ($soft_game as $soft_v) {
                        if ($soft_v == $game_id) {
                            $soft_check = 1;
                            break;
                        } else {
                            $soft_check = 0;
                        }
                    }
                }
                if ($soft_check == 0) {
                    if (count($soft_game) > 0) {
                        if ($system->vars['content'] != '') {
                            $str = $game_id . ',' . $system->vars['content'];
                        } else {
                            $str = $game_id;
                        }
                    } else {
                        $str = $game_id;
                    }
                }
                $update['content'] = $str;
                $system->update($update);
            }
        }
        $game_server->operatorsAction($_SESSION['operators_auth'], $_SESSION['user_id'], $_SESSION['operatiors'], $game_server_id);
        echo '1:添加成功';
        die;
    }
}
if ($_REQUEST['action'] == 'operators_List') { //运营商添加 与编辑
    $operotoer_list = new operators_list();
    $operotoer_list->initialize('name like "' . $_REQUEST['operations_name'] . '" and version_language = ' . WEBLanguage);
    if ($operotoer_list->vars_number > 0) {
        echo '运营商已存在';
        die;
    } else {
        if ($_REQUEST['operators_id'] > 0) {
            $operotoer_list = new operators_list($_REQUEST['operators_id']);
            $old_name = $operotoer_list->vars['name'];
            $update['name'] = $_REQUEST['operations_name'];
            $operotoer_list->update($update);
            $game_operators = new game_operators();
            $game_operators->initialize('operator_id = ' . $_REQUEST['operators_id'] . ' and version_language = ' . WEBLanguage);
            if ($game_operators->vars_number > 0) {
                $update_operators['operator_name'] = $_REQUEST['operations_name'];
                $game_operators->update($update_operators);
            }
            $game_server = new game_server();
            $game_server->initialize('operator_name like "' . $old_name . '" and version_language = ' . WEBLanguage);
            if ($game_server->vars_number > 0) {
                $updatename['operator_name'] = $_REQUEST['operations_name'];
                $game_server->update($updatename);
            }
            $game_server->operatorsAction($_SESSION['operators_auth'], $_SESSION['user_id'], $_SESSION['operatiors'], $_REQUEST['operators_id']);
            echo '1:修改成功';
            die;
        } else {
            $insert['name'] = $_REQUEST['operations_name'];
            $insert['version_language'] = WEBLanguage;
            $id = $operotoer_list->insert($insert);
            $operotoer_list->operatorsAction($_SESSION['operators_auth'], $_SESSION['user_id'], $_SESSION['operatiors'], $id);
            if ($id > 0) {
                echo '1:添加成功';
                die;
            }
        }
    }
}
if ($_REQUEST['action'] == 'search_game') {
    $game = new games();
    $game->initialize('game_name like "' . $_REQUEST['game_name'] . '" and version_language = ' . WEBLanguage);
    if ($game->vars_number > 0) {
        echo '1:' . $game->vars['id'];
        die;
    } else {
        echo '游戏不存在,请重新输入';
        die;
    }
}
if ($_REQUEST['action'] == 'search_operator') {
    $operlist = new operators_list();
    $operlist->initialize('name like "' . $_REQUEST['operator_name'] . '" and version_language = ' . WEBLanguage);
    if ($operlist->vars_number > 0) {
        echo '1:' . $operlist->vars['name'];
        die;
    } else {
        echo '运营商不存在,请重新输入';
        die;
    }
}
if ($_REQUEST['action'] == 'search_area') {
    switch ($_REQUEST['action_name']) {
        case '1':$searchId = $_REQUEST['ids'];
            break;
        case '2':$searchId = $_REQUEST['cityId'];
            break;
    }
    $company_area = new company_area();
    $company_area->initialize('pid = ' . $searchId);
    if ($company_area->vars_number > 0) {
        $result = json_encode($company_area->vars_all);
        echo $result;
        die;
    }
}
if ($_REQUEST['action'] == 'company_delete') {
    $company_info = new company_info($_REQUEST['company_id']);
    if ($company_info->vars_number > 0) {
        deldir(NEWSIndustryCompanyPath . $company_info->vars['company_info_id']);
        $company_info->remove();
    }
}
if ($_REQUEST['action'] == 'ImageUpload') {
    if ($_FILES["photo"]["tmp_name"] != '') {
        $info = @getimagesize($_FILES["photo"]["tmp_name"]);
        $size = explode(',', '110,80');
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
        if ($ok != 1) {
            echo '图片格式不对,请选择gif,jpg,png等格式的图片';
            die;
        } else {
            if ($size[0] == $info[0] && $size[1] == $info[1]) {
                $name = time();
                $image_name = $name . '.' . $end;
                @move_uploaded_file($_FILES['photo']["tmp_name"], NEWSIndustryCompanyIndustryPath . $image_name);
                @chmod(NEWSIndustryCompanyIndustryPath . $image_name, 0777);
                echo '1-' . $image_name;
                die;
            } else {
                echo '图片大小错误,请按照要求';
                die;
            }
        }
    } else {
        $name = '图片未上传，请上传图片';
        echo '2-' . $name;
    }
    die;
}
if ($_REQUEST['action'] == 'Upload') {
    $upload_name = $_REQUEST['name'];
    $upload_size = $_REQUEST['size'];
    $imageSize = imageSize($upload_size);
    $count = count($_FILES["photo"]["tmp_name"]);
    if ($_FILES[$upload_name]["tmp_name"] != '') {
        $info = @getimagesize($_FILES[$upload_name]["tmp_name"]);
        $size = explode(',', $imageSize);
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
        if ($ok != 1) {
            echo '图片格式不对,请选择gif,jpg,png等格式的图片|' . $upload_name;
            die;
        } else {
            if ($size[0] == $info[0] && $size[1] == $info[1]) {
                $name = time();
                $image_name = $name . '.' . $end;
                @move_uploaded_file($_FILES[$upload_name]["tmp_name"], NEWSIndustryCompanyPath . $image_name);
                @chmod(NEWSIndustryCompanyPath . $image_name, 0777);
                echo '1|'.$image_name;
            } else {
                echo '图片大小错误,请按照要求,图片尺寸为' . $size[0] . '*' . $size[1] . '|' . $upload_name;
                die;
            }
        }
    } else {
        if ($_REQUEST['company_id'] > 0) {
            $company = new company_info($_REQUEST['company_id']);
            if ($company->vars['feimian'] != '') {
                echo '1|'.$company->vars['feimian'];
            } else {
                echo '-1';
            }
        } else {
            echo '-1';
        }
    }
}
if ($_REQUEST['action'] == 'operation_delete') {
    $game_operations_id = $_REQUEST['game_operation_id'];
    $game_operators = new game_operators();
    $game_operators->addCondition('id = ' . $game_operations_id, 1);
    $game_operators->initialize();
    if ($game_operators->vars_number > 0) {
        $game_operators->remove();
    }
    echo '1:操作成功';
    die;
}
?>
<?php

function imageSize($key) {
    $company_size['company_photo'] = '110,80';
    return $company_size[$key];
}

function deldir1() {  //删除图片
    $dh = opendir(NEWSIndustryCompanyIndustryPath);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = NEWSIndustryCompanyIndustryPath . $file;
            if (!is_dir($fullpath)) {
                @unlink($fullpath);
            }
        }
    }
    @closedir($dh);
    return 1;
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