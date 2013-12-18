<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-22 20:34:39
         compiled from "/home/wwwroot//sbu/templates/team/right2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198383691526670df564423-75194514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20c414c6ec213ca636441a20e2fb199a551b6257' => 
    array (
      0 => '/home/wwwroot//sbu/templates/team/right2.tpl',
      1 => 1382320161,
    ),
  ),
  'nocache_hash' => '198383691526670df564423-75194514',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="aboutRight" >
    (blank)  
</div>
<script>
    $("#leader").removeClass("leaderActive");
    $("#leader").addClass("leader");
    
    $("#faculty").removeClass("facultyActive");
    $("#faculty").addClass("faculty");
    $("#student").removeClass("student");
    $("#student").addClass("studentActive");

    $("#faculty").hover(function() {
    $("#faculty").removeClass("faculty");
    $("#faculty").addClass("facultyActive");
    }, function() {
    $("#faculty").removeClass("facultyActive");
    $("#faculty").addClass("faculty");
    });
        $("#leader").hover(function() {
    $("#leader").removeClass("leader");
    $("#leader").addClass("leaderActive");
    }, function() {
    $("#leader").removeClass("leaderActive");
    $("#leader").addClass("leader");
    });

</script>