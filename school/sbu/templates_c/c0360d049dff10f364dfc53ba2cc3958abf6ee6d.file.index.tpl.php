<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-24 20:34:56
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42240390526913f07bfb26-77252562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1382618037,
    ),
  ),
  'nocache_hash' => '42240390526913f07bfb26-77252562',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('URLController')->value;?>
public/js/about.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('URLController')->value;?>
public/js/changeDisplayArea.js"></script>
        <?php $_template = new Smarty_Internal_Template("public/website.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        
        <script>
            $(function() {
                pageReditst('homePage', 'homePage', 'homePageContent');
            })
        </script>
        
    </head>
    <body id="homePageBody">
        <div id="homePageHeader">
            <?php $_template = new Smarty_Internal_Template("public/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </div>
        <div id=" homePageBody" style=" width: 960px; margin: 0 auto;">
            <div id="homePagePicDiv">
                <img src="<?php echo $_smarty_tpl->getVariable('URLController')->value;?>
public/image/pic.png" width="100%" height="100%" />
                
            </div>
            <div style=" width: 100%; height: 26px;">&nbsp;</div>

            <!--内容-->
            <div id="homePageContent" style=" width: 960px; height: auto;">

            </div>
            <!--            顶部-->
            <div id="homePageFooter" style=" clear:both; width: 100%;">
                <?php $_template = new Smarty_Internal_Template("public/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            </div>
        </div>
    </body>
</html>
