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
        {literal}
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
                var array_ = ["team_username", "team_type","team_username_introduction"];
                var array_content = ["标题", '职位',"内容摘要"];
                for (var i = 0; i < array_.length; i++) {
                    var name = $('#' + array_[i]).val();
                    if (name == '') {
                        $('#' + array_[i] + '_error').html(array_content[i] + '必须填写');
                    } else {
                        able++;
                        $('#' + array_[i] + '_error').html('');
                    }
                }
                if (able >= 2) {
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
        {/literal}
    </head>
    <body style=" font-size: 12px;padding:0 0 80px 0;">
        <div style=" margin:18px 0 0 20px;">
            <h1 class="manager_title" style="margin:5px 0 20px 0;">成员编辑</h1>
            <form action="{$urlController}/team_action.php" method="post" id="form1" name="form1" class="form2" enctype="multipart/form-data">
                <input type="hidden" name="team_id" value="{$team.team_id}">
                <dl >
                    <dt>姓名</dt>
                    <dd><input type="text"  name="team_username"    id="team_username"  value="{$team.team_username}"/><span style=" margin-left: 12px; color: red;" id="team_username_error"></span></dd>
                    <!-- <dd><p style=" color: red; font-weight: bolder;" ></p></dd> -->
                </dl>
                <dl >
                    <dt>职位</dt>
                    <dd><input type="text"  name="team_type"    id="team_type"  value="{$team.team_type}"/><span style=" margin-left: 12px; color: red;" id="news_title_error"></span></dd>
                    <!-- <dd><p style=" color: red; font-weight: bolder;" ></p></dd> -->
                </dl>
                <dl >
                    <dt>照片</dt>
                    <dd>
                         {if $team.team_username_photo!=''}
                        <img src="{$rootPath}/uploadFile/team/{$team.team_id}/{$team.team_username_photo}" >
                        {/if}
                        <input type="file" name="photo"  id="photo" size="39" > <span style=" margin-left: 12px; color: red;" id="photo_error">（图片 宽为127  高为134 ）</span></dd>
                </dl>
                <dl >
                    <dt>基本介绍</dt>
                    <dd><textarea id="team_username_introduction" name="team_username_introduction" style="width:341px;height: 101px">{$team.team_username_introduction}</textarea><span style=" margin-left: 12px;  color: red;" id="team_username_introduction_error"></span></dd>
                </dl>
                <input type="button" value="保存" class="important_button" name="savetonext" id="savetonext" onclick="asd()">
            </form>
        </div>
    </body>
</html>
