<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-21 16:59:47
         compiled from "/home/wwwroot//sbu/templates/homePage/right.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6890855785264ed038151b6-83712335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf6d018a2895c8899c0c9c6a67f92d9027fe5098' => 
    array (
      0 => '/home/wwwroot//sbu/templates/homePage/right.tpl',
      1 => 1381305337,
    ),
  ),
  'nocache_hash' => '6890855785264ed038151b6-83712335',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div  id="homePageRightContnt" style=" width: 380px; height: 216px;" >
    <div style="margin-left: 10px; margin-top: 9px;">
        <p style="font-size: 16px; color: rgb(0, 181, 226); margin-left: 4px; margin-top: -8px;">News</p>
        <div style=" width: 100%; word-break: break-all; margin-top: 16px; margin-left: 21px; " id="homePageLeftContent">
            <ul style=" font-size: 14px; color: #656565; margin-left: 12px; *line-height: 26px;">
                <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['myId']->value==0){?>
                     <li style="padding-top: 0px;">
                <?php }else{ ?>
                     <li>
                <?php }?>
                    <a href="javascript:void(0)" class="newsClick" onclick="newsDetail('<?php echo $_smarty_tpl->tpl_vars['vo']->value['news_id'];?>
');"><?php echo $_smarty_tpl->tpl_vars['vo']->value['news_title'];?>
</a></li>
                <?php }} ?>
            </ul>
        </div>
    </div>
</div>