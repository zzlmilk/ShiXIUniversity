<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-22 22:54:44
         compiled from "/home/wwwroot//sbu/templates/news/right.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1674095733526691b47c2fa4-72712946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5046ff328a68e4c74fa0fa3bf6c7bac26f7f1e83' => 
    array (
      0 => '/home/wwwroot//sbu/templates/news/right.tpl',
      1 => 1381305337,
    ),
  ),
  'nocache_hash' => '1674095733526691b47c2fa4-72712946',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/sbu/Smarty/libs/plugins/modifier.date_format.php';
?><div class="nrightAction">
    <ul class="ulStyle">


        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
        <li class="liStyle">
            <div class="newsTitle" onclick="newsDetail('<?php echo $_smarty_tpl->tpl_vars['vo']->value['news_id'];?>
');">
                <div class="newsTitleM" >
                    <?php echo $_smarty_tpl->tpl_vars['vo']->value['news_title'];?>

                </div>
                <div class="newsTime">
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['news_time'],"%m/%d/%Y");?>

                  </div>
            </div>

        </li>
        <div class="newsContent">
          <?php echo $_smarty_tpl->tpl_vars['vo']->value['news_text'];?>

        </div>
        <div style="height: 50px;"></div>
        <?php }} ?>

    </ul>

    <!--                分页位置-->
    <?php echo $_smarty_tpl->getVariable('newsPage')->value;?>

</div>