<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-09 16:21:17
         compiled from "/home/wwwroot//sbuAdmin//templates/news_action.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1227398377525511fd6a51f0-18997379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a08ee0742e00bf313127552f9f8a2e1c6f13959a' => 
    array (
      0 => '/home/wwwroot//sbuAdmin//templates/news_action.tpl',
      1 => 1381302217,
    ),
  ),
  'nocache_hash' => '1227398377525511fd6a51f0-18997379',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet/less" type="text/css" href="../css/manage.less" />
        <script type="text/javascript" src="../js/less-1.3.0.min.js"></script>
        <link type="text/css" href="../css/css_clear.css" rel="stylesheet" />
        <title></title>
        
            <style type="text/css">
                ul,li{margin: 0; padding: 0;width:100%;}
                .form2 dl{
                    padding:0 0 0 20px;margin:0 0 10px 0;
                }
                .form2 dt {
                    color: #333333;
                    float: left;
                    margin: 0;
                    padding: 8px 0 0;
                    text-align:left;
                    width: 100px;
                }
                .form2 dd {
                    margin-left: 100px;
                    padding: 5px 0 8px 10px;

                }
                .form2 dd input[type="text"]{border:1px solid #dddddd; width:290px;padding:3px 5px;border-radius:3px;}
                .form2 dd textarea{width:340px;height:91px;font-size:12px;border:1px solid #dddddd;padding:5px;}
                a{
                    margin-left: 12px;
                }
                .head_word {
                    color: #1E325C;
                    font-size: 14px;
                    font-weight: bold;
                    line-height: 40px;
                }
                #savetonext{margin:15px 0 0 127px;}
            </style>
            <script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
            <script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
            <script charset="utf-8" src="../js/jquery.js"></script>
            <script charset="utf-8" src="../js/window.js"></script>
            <link type="text/css" href="../js/jQuery/development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" />
            <script type="text/javascript" src="../js/jQuery/development-bundle/jquery-1.4.2.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/external/jquery.bgiframe-2.1.1.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.core.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.widget.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.mouse.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.button.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.draggable.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.position.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.resizable.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.dialog.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.ui.tabs.js"></script>
            <script type="text/javascript" src="../js/jQuery/development-bundle/ui/jquery.effects.core.js"></script>
            <link type="text/css" href="../js/jQuery/development-bundle/demos/demos.css" rel="stylesheet" />
            <script>
               // var editor;
               // KindEditor.ready(function(K) {
                   // editor = K.create('#news_text');
                //});
                function asd() {
                    var able = 0;
                    var array_ = ["news_title", "news_text"];
                    var array_content = ["标题", "内容摘要"];
                    for (var i = 0; i < array_.length; i++) {
                        var name = $('#' + array_[i]).val();
                        if (name == '') {
                            $('#' + array_[i] + '_error').html(array_content[i] + '必须填写');
                        } else {
                            if (array_[i] == 'news_title') {  //判断字数是否符合标准
                                var count = $('#news_title').val().length;
                                if (count > 100) {
                                    $('#' + array_[i] + '_error').html('请按照提示填写');
                                    return false;
                                }
                            }
                            able++;
                            $('#' + array_[i] + '_error').html('');
                        }
                    }
                    var html = document.getElementById('news_text').value; // 原生API
                    // 取得HTML内容
                   // html = editor.html();
                   // editor.sync();
                    if(html == ''){
                         $('#' + array_[i] + '_error').html(array_content[i] + '必须填写');
                    } else{
                        //html=html.replace(/\n/g,'<br />');
                        //$('#news_text').val(html);
                        able++;
                    }
                    if(able >= 2){
                        $('#form1').submit();
                    }
                }
                function checkNum(obj)
                {
                    var val = getInteger($(obj).val());
                    $(obj).val(val);
                }
                function getInteger(val)
                {
                    val = val + "";
                    var ret = val.replace(/\D/g, '');
                    return ret;
                }
            </script>
        
    </head>
    <body style=" font-size: 12px;padding:0 0 80px 0;">
        <div style=" margin:18px 0 0 20px;">
            <h1 class="manager_title" style="margin:5px 0 20px 0;">新闻插入</h1>
            <form action="<?php echo $_smarty_tpl->getVariable('urlController')->value;?>
/news_all_action.php" method="post" id="form1" name="form1" class="form2" enctype="multipart/form-data">
                <input type="hidden" name="news_id" value="<?php echo $_smarty_tpl->getVariable('news')->value['news_id'];?>
">
                <dl >
                    <dt>标题</dt>
                    <dd><input type="text"  name="news_title"    id="news_title"  value="<?php echo $_smarty_tpl->getVariable('news')->value['news_title'];?>
"/><span style=" margin-left: 12px; color: red;" id="news_title_error">（最多100个字符）</span></dd>
                    <!-- <dd><p style=" color: red; font-weight: bolder;" ></p></dd> -->
                </dl>
                <dl >
                    <dt>内容摘要</dt>
                    <dd><textarea id="news_text" name="news_text" style="width:341px;height: 101px"><?php echo $_smarty_tpl->getVariable('news')->value['news_text'];?>
</textarea><span style=" margin-left: 12px;  color: red;" id="news_text _error"></span></dd>
                </dl>
                <input type="button" value="保存" class="important_button" name="savetonext" id="savetonext" onclick="asd()">
            </form>
        </div>
    </body>
</html>
