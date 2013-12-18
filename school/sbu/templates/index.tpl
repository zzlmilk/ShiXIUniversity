<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="{$URLController}public/js/about.js"></script>
        <script type="text/javascript" src="{$URLController}public/js/changeDisplayArea.js"></script>
        {include file="public/website.tpl"}
        {literal}
        <script>
            $(function() {
                pageReditst('homePage', 'homePage', 'homePageContent');
            })
        </script>
        {/literal}
    </head>
    <body id="homePageBody">
        <div id="homePageHeader">
            {include file="public/header.tpl"}
        </div>
        <div id=" homePageBody" style=" width: 960px; margin: 0 auto;">
            <div id="homePagePicDiv">
                <img src="{$URLController}public/image/pic.png" width="100%" height="100%" />
                
            </div>
            <div style=" width: 100%; height: 26px;">&nbsp;</div>

            <!--内容-->
            <div id="homePageContent" style=" width: 960px; height: auto;">

            </div>
            <!--            顶部-->
            <div id="homePageFooter" style=" clear:both; width: 100%;">
                {include file="public/footer.tpl"}
            </div>
        </div>
    </body>
</html>
