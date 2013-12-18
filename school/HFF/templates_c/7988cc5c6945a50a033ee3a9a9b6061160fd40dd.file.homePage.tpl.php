<?php /* Smarty version Smarty-3.0-RC2, created on 2013-11-29 10:53:00
         compiled from "/home/wwwroot//HFF/templates/homePage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18382537045298018c5e5630-73374199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7988cc5c6945a50a033ee3a9a9b6061160fd40dd' => 
    array (
      0 => '/home/wwwroot//HFF/templates/homePage.tpl',
      1 => 1385546786,
    ),
  ),
  'nocache_hash' => '18382537045298018c5e5630-73374199',
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


