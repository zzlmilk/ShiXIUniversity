<?php /* Smarty version Smarty-3.0-RC2, created on 2013-11-29 11:04:12
         compiled from "/home/wwwroot//HFF/templates/about/Organizationalright.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3694571355298042c67c9f3-34718682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be569a167878d1a136adedf59a929e3ac06138e3' => 
    array (
      0 => '/home/wwwroot//HFF/templates/about/Organizationalright.tpl',
      1 => 1385694235,
    ),
  ),
  'nocache_hash' => '3694571355298042c67c9f3-34718682',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $("#wordCEO").removeClass("wordCEOActive");
    $("#wordCEO").addClass("wordCEO");
    $("#institute").removeClass("instituteActive");
    $("#institute").addClass("institute");
    $("#organizationalStructure").removeClass("organizationalStructure");
    $("#organizationalStructure").addClass("organizationalStructureActive");
    $("#wordCEO").hover(function() {
        $("#wordCEO").removeClass("wordCEO");
        $("#wordCEO").addClass("wordCEOActive");
    }, function() {
        $("#wordCEO").removeClass("wordCEOActive");
        $("#wordCEO").addClass("wordCEO");
    });

    $("#institute").hover(function() {
        $("#institute").removeClass("institute");
        $("#institute").addClass("instituteActive");
    }, function() {
        $("#institute").removeClass("instituteActive");
        $("#institute").addClass("institute");
    });
</script>

<img src="<?php echo $_smarty_tpl->getVariable('URLController')->value;?>
public/image/organizational_structure.png" width="422" height="237"  style=" margin-left: 16px;"/>


