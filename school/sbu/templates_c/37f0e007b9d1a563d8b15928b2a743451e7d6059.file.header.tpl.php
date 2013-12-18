<?php /* Smarty version Smarty-3.0-RC2, created on 2013-10-24 20:34:56
         compiled from "./templates/public/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1553818241526913f0856b89-22043289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37f0e007b9d1a563d8b15928b2a743451e7d6059' => 
    array (
      0 => './templates/public/header.tpl',
      1 => 1382618038,
    ),
  ),
  'nocache_hash' => '1553818241526913f0856b89-22043289',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<link rel="stylesheet" type="text/css" href="public/css/header.css" media="all" />
<img src="<?php echo $_smarty_tpl->getVariable('URLController')->value;?>
public/image/logo.png" width="317" height="30"   style="position: absolute; left: 13%; top: 32px;" />
<div id="headerDiv"  style=" ">
    <span class="headerBanner" ><a href="javascript:void(0)" class="fontA fontDefault"  onclick="$('.fontA').addClass('white');$('.fontA').removeClass('fontDefault');
            $(this).removeClass('white fontDefault');
            $(this).addClass('fontDefault');
            $('#homePagePicDiv').css('display', 'block');
            pageReditst('homePage', 'homePage', 'homePageContent');" >HOME</a></span>
    <span class="headerBanner"><a href="javascript:void(0)" class="fontA" onclick="$('.fontA').addClass('white');$('.fontA').removeClass('fontDefault');
            $(this).removeClass('white fontDefault');
            $(this).addClass('fontDefault');
            $('#homePagePicDiv').css('display', 'none');
            pageReditst('team', 'team', 'homePageContent');">OUR TEAM</a></span>
    <span class="headerBanner"><a href="javascript:void(0)" class="fontA" onclick="$('.fontA').addClass('white');$('.fontA').removeClass('fontDefault');
            $(this).removeClass('white fontDefault');
            $(this).addClass('fontDefault');
            $('#homePagePicDiv').css('display', 'none');
            pageReditst('about', 'about', 'homePageContent');">ABOUT US</a></span>
    <span class="headerBanner"><a href="javascript:void(0)" class="fontA" onclick="$('.fontA').addClass('white');$('.fontA').removeClass('fontDefault');
            $(this).removeClass('white fontDefault');
            $(this).addClass('fontDefault');
            $('#homePagePicDiv').css('display', 'none');
            pageReditst('research', 'research', 'homePageContent');">OUR RSEARCH</a></span>
    <span class="headerBanner" style=" margin-left: 10px; "><a href="javascript:void(0)"  class="fontA" onclick="$('.fontA').addClass('white');$('.fontA').removeClass('fontDefault');
            $(this).removeClass('white fontDefault');
            $(this).addClass('fontDefault');
            $('#homePagePicDiv').css('display', 'none');
            pageReditst('news', 'news', 'homePageContent');">RECENT NEWS</a></span>
    <span class="headerBanner"  style=" margin-left: 10px;"><a href="javascript:void(0)"class="fontA" onclick="$('.fontA').addClass('white');$('.fontA').removeClass('fontDefault');
            $(this).removeClass('white fontDefault');
            $(this).addClass('fontDefault');
            $('#homePagePicDiv').css('display', 'none');
            pageReditst('contact', 'contact', 'homePageContent');">CONTACT US</a></span>
</div>