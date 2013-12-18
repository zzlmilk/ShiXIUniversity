<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-21 16:59:49
         compiled from "/home/wwwroot//sbu/templates/team/right.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4705368285264ed059d3b41-94455843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37f33105366b970f6fa1c5587462c0e45b97c8c4' => 
    array (
      0 => '/home/wwwroot//sbu/templates/team/right.tpl',
      1 => 1382344065,
    ),
  ),
  'nocache_hash' => '4705368285264ed059d3b41-94455843',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="aboutRight" >
    <div class="teamArea">
        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('team')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
?>
        <div class="teamIntroduce">
            <div id="aaaaa" class="floatLeft" style="width:127px;height: 134px;">
                <img src="<?php echo $_smarty_tpl->getVariable('URLImageController')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['vo']->value['team_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['vo']->value['team_username_photo'];?>
">
            </div>
            <div class="floatLeft teamIntroduceText">
                <div style="margin-left:10px;">
                    <div class="teamIntroduceTextTitle"><a id="testPage" title="<?php echo $_smarty_tpl->tpl_vars['vo']->value['team_username'];?>
(<?php echo $_smarty_tpl->tpl_vars['vo']->value['team_type'];?>
)" class="titleValue" onclick="rightAdd('details', 'team', 'team', 'homePageContent', '<?php echo $_smarty_tpl->tpl_vars['vo']->value['team_id'];?>
')" href='javascript:void(0)'  style=" color: black;"><?php echo $_smarty_tpl->tpl_vars['vo']->value['team_username'];?>
(<?php echo $_smarty_tpl->tpl_vars['vo']->value['team_type'];?>
)</a></div>
                    <div class="teamIntroduceTextWords" >
                        <?php echo $_smarty_tpl->tpl_vars['vo']->value['team_username_introduction'];?>

                    </div>
                </div>
                <div class="teamIntroduceTextLink"><a style="color:#00b5e2"  onclick="rightAdd('details', 'team', 'team', 'homePageContent', '<?php echo $_smarty_tpl->tpl_vars['vo']->value['team_id'];?>
')" href="javascript:void(0)">more</a></div>
            </div>

        </div>
        <?php }} ?>
    </div>

</div>
<div style="width: 311px;height: 80px;padding-top: 25px; text-align: center; margin-left: 380px;">
    <?php echo $_smarty_tpl->getVariable('teamPage')->value;?>

</div>

<script>
                        $("#leader").removeClass("leader");
                        $("#leader").addClass("leaderActive");
                        $("#faculty").removeClass("facultyActive");
                        $("#faculty").addClass("faculty");
                        $("#student").removeClass("studentActive");
                        $("#student").addClass("student");
                        $("#faculty").hover(function() {
                            $("#faculty").removeClass("faculty");
                            $("#faculty").addClass("facultyActive");
                        }, function() {
                            $("#faculty").removeClass("facultyActive");
                            $("#faculty").addClass("faculty");
                        });
                        $("#student").hover(function() {
                            $("#student").removeClass("student");
                            $("#student").addClass("studentActive");
                        }, function() {
                            $("#student").removeClass("studentActive");
                            $("#student").addClass("student");
                        });

                        $(".teamIntroduceTextLink a").mousedown(function() {
                            $(this).css("color", "#484848");
                        })
                        $(".teamIntroduceTextLink a").mouseup(function() {
                            $(this).css("color", "#00b5e2");
                        })
                        $(".teamIntroduceTextLink a").mouseout(function() {
                            $(this).css("color", "#00b5e2");
                        })
            //-----------------------------------js截断字符--------------------
            $(".teamIntroduceTextWords").each(
                        function(){
                                if($(this).html().length>370){
                               $(this).html($(this).html().substring(0, 370)+"  ...");
                               }
                        });
            $(".titleValue").each(
                        function(){
                                if($(this).html().length>50){
                               $(this).html($(this).html().substring(0, 50)+"  ...");
                               }
                        });
//                        $(function(){
//                            $('.teamIntroduce').each(function(){
//                                var $nextTeamIntroduce = $(this).find('.teamIntroduceText').height();
//                                $(this).css('height',$nextTeamIntroduce+10+'px');
//                            })
//                        })
</script>