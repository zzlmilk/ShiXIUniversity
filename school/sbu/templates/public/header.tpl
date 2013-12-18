<link rel="stylesheet" type="text/css" href="public/css/header.css" media="all" />
<img src="{$URLController}public/image/logo.png" width="317" height="30"   style="position: absolute; left: 13%; top: 32px;" />
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