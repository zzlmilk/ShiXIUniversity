<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet/less" type="text/css" href="../css/manage.less" />
        <script type="text/javascript" src="../js/less-1.3.0.min.js"></script>
        <link type="text/css" href="../css/css_clear.css" rel="stylesheet" />
        <script type="text/javascript" src="../js/jquery.js"></script>
        <link type="text/css" href="../js/css/ui-lightness/jquery-ui-1.8.20.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.8.20.custom.min.js"></script>
        <link type="text/css" href="../css/css.css" rel="stylesheet" />
        <script type="text/javascript">
            var begin_time = '{$begin}';
            var end_time = '{$end}';
            {literal}
            $(function() {
                $( "#begin" ).datepicker({dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"],dateFormat: "yy-mm-dd", monthNames: ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"] });
                $( "#end" ).datepicker({dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"],dateFormat: "yy-mm-dd", monthNames: ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"] });
                $("#begin").val(begin_time);
                $("#end").val(end_time);
            });
             function show_able(id){
                $.ajax({
                    type: "POST",
                    url: "../process.php",
                    data:"&action=lock&id="+id,
                    success: function(mes){
                        alert(mes)
                        window.location.href='news.php' ;
                    }
                });
            }
            function changeUrl(id){
                $('#type').val(id);
                $('#search_form').append('<input type="hidden" name="action" value="select">');
                $("#search_form").submit();
            }
            {/literal}
        </script>
        <style type="text/css">
            {literal}
            form{margin: 0; padding: 0;}
            ul,li{margin: 0; padding: 0;width:100%;}
            body{margin: 20px;font-size: 13px;}
            #tabs{ font: 12px "Trebuchet MS", sans-serif;}
            .demoHeaders { margin-top: 2em; }
            ul li{
                list-style-type: none;
                cursor: default;
            }
            /*  #table11, #table12 {
                   -moz-border-bottom-colors: none;
                   -moz-border-image: none;
                   -moz-border-left-colors: none;
                   -moz-border-right-colors: none;
                   -moz-border-top-colors: none;
                   border-collapse: collapse;
                   border-color: #999999;
                   border-style: solid;
                   border-width: 1px 0 0 1px;
               }
               #table11 tr td, #table12 tr td {
                   -moz-border-bottom-colors: none;
                   -moz-border-image: none;
                   -moz-border-left-colors: none;
                   -moz-border-right-colors: none;
                   -moz-border-top-colors: none;
                   border-color: #999999;
                   border-style: solid;
                   border-width: 0 1px 1px 0;
               }*/

            {/literal}
        </style>
    </head>
    <body>
        <h1 class="manager_title" style="margin:5px 0 20px 0;">团队成员</h1>
        <div>
            <form  action="team.php" method="post" id="search_form" name="search_form">
                姓名：<input type="text" id="username" name ="username" value="{$team_username}">
                <input type="submit" name="search" id="search"  value="search">
            </form>
        </div>
          <div class="insert_newGame_news">
                <input type="button" value="添加成员" onclick="window.location.href='team.php?action=insert'" class="important_button">
            </div>
        <div>
            <table id="table11" class="manage_list" style="background:#f9f9f9;width:100%;font-size: 12px; margin-top: 10px; line-height: 24px;" >
                <thead>
                    <tr style=" background-color: #eaeaea;">
                        <th style="font-weight:bolder;text-align: center;">名称</th>
                        <!--                    <td style="font-weight:bolder;text-align: center;">点击次数</td>-->
                        <th style="font-weight:bolder;text-align: center;">职位</th>
                        <th colspan="4" style="font-weight:bolder;text-align: center;">操作</th>
                    </tr>
                </thead>
                {foreach from=$team item=team_all}
                <tr>
                    <td style='text-align: center;'>{$team_all.team_username}</td>
                    <td style='text-align: center;'>{$team_all.team_type}</td>
                    <td style='text-align: center;'><a href="team.php?action=edit&team_id={$team_all.team_id}">编辑</a></td>
                    <td style='text-align: center;'><a href="javascript:vold(0)" onclick="del('{$team_all.team_id}')">删除</a></td>
                </tr>
                {/foreach}
            </table>
            <table  width="100%" border="0" cellpadding="0" cellspacing="1"  style=" font-size: 14px;">
                <tr>
                    <td style="width: 90%">
                        {$key}   {if $news_number>0}<input type="button" name="deletSelect" id="deleteSelect_" value="选中删除"  class="important_button" onclick="deleteSelect()">{/if}
                    </td>
                </tr>
            </table>
            <table  width="100%" border="0" cellpadding="0" cellspacing="1"  style=" font-size: 14px;">
                <tr>

                </tr>
            </table>
        </div>
    </body>
</html>
{literal}
<script type="text/javascript">
    function del(id){
        if(confirm("确认删除吗？")){
            window.location.href='team.php?action=delete&team_id='+id;
        }
        else{
            return false;
        }
    }
    $("#selectAll").click(function(){
        if($(this).attr('checked')=='checked'){
            $('.selectAll').attr('checked','checked');
        } else{
            $('.selectAll').removeAttr("checked");
        }
    })
    function deleteSelect(){
        var str ='';
        $('.selectAll').each(function(){
            if($(this).attr('checked')=='checked'){
                str +=$(this).val()+',';
            }
        })
        $.ajax({
            type: "POST",
            url: "../process.php",
            data:"&action=deleteSelect&str="+str,
            success: function(mes){
                alert(mes)
                window.location.href='news.php' ;
            }
        });
    }
</script>
{/literal}
