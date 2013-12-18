<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-22 22:54:30
         compiled from "/home/wwwroot//sbu/templates/about/right1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31021754526691a6d10211-39869653%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6085e1b96ea4124ff832342d447fc3dd9461a652' => 
    array (
      0 => '/home/wwwroot//sbu/templates/about/right1.tpl',
      1 => 1382088667,
    ),
  ),
  'nocache_hash' => '31021754526691a6d10211-39869653',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
(Blank)

<script>
    $("#wordCEO").removeClass("wordCEOActive");
    $("#wordCEO").addClass("wordCEO");
    $("#institute").removeClass("institute");
    $("#institute").addClass("instituteActive");
    
                $("#wordCEO").hover(function(){
                $("#wordCEO").removeClass("wordCEO");
                $("#wordCEO").addClass("wordCEOActive");
            },function(){
        $("#wordCEO").removeClass("wordCEOActive");
        $("#wordCEO").addClass("wordCEO");
            });
</script>