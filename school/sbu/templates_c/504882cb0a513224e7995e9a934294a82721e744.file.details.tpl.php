<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-22 21:17:45
         compiled from "/home/wwwroot//sbu/templates/team/details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16739845652667af974b1a8-86926031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '504882cb0a513224e7995e9a934294a82721e744' => 
    array (
      0 => '/home/wwwroot//sbu/templates/team/details.tpl',
      1 => 1382088665,
    ),
  ),
  'nocache_hash' => '16739845652667af974b1a8-86926031',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="aboutRight">
    <div style="background: url('<?php echo $_smarty_tpl->getVariable('URLController')->value;?>
/public/image/smallBackgorunp.png') no-repeat;padding-left: 25px;">
        <p style="line-height:20px;font-family:Gautami,Sylfaen; word-break: break-all; word-spacing: 1px;font-size: 16px;  clear: right; padding-left:  10px;color: #373737;width: 660px; "><img style="float: left;margin-right: 20px;" src="<?php echo $_smarty_tpl->getVariable('URLImageController')->value;?>
/<?php echo $_smarty_tpl->getVariable('vo')->value['team_id'];?>
/<?php echo $_smarty_tpl->getVariable('vo')->value['team_username_photo'];?>
"  border="0" />
            <?php echo $_smarty_tpl->getVariable('vo')->value['team_username_introduction'];?>

        <div style="height: 60px;"></div>
        </p>
    </div>
</div>
<script>
    $("#faculty").hover(function() {
        $("#faculty").removeClass("faculty");
        $("#faculty").addClass("facultyActive");
    }, function() {
        $("#faculty").removeClass("facultyActive");
        $("#faculty").addClass("faculty");
    });
</script>