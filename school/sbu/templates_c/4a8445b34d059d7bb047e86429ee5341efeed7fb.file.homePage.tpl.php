<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-21 16:59:47
         compiled from "/home/wwwroot//sbu/templates/homePage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19774906705264ed038443f1-37672912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a8445b34d059d7bb047e86429ee5341efeed7fb' => 
    array (
      0 => '/home/wwwroot//sbu/templates/homePage.tpl',
      1 => 1381305336,
    ),
  ),
  'nocache_hash' => '19774906705264ed038443f1-37672912',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php $_template = new Smarty_Internal_Template("public/website.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <div id="homePage" style='width: 960px;'>
        <?php echo $_smarty_tpl->getVariable('left')->value;?>

        <?php echo $_smarty_tpl->getVariable('right')->value;?>

    </div>
</html>


