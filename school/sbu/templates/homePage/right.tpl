<div  id="homePageRightContnt" style=" width: 380px; height: 216px;" >
    <div style="margin-left: 10px; margin-top: 9px;">
        <p style="font-size: 16px; color: rgb(0, 181, 226); margin-left: 4px; margin-top: -8px;">News</p>
        <div style=" width: 100%; word-break: break-all; margin-top: 16px; margin-left: 21px; " id="homePageLeftContent">
            <ul style=" font-size: 14px; color: #656565; margin-left: 12px; *line-height: 26px;">
                {foreach from=$news key=myId item=vo}
                {if $myId == 0}
                     <li style="padding-top: 0px;">
                {else}
                     <li>
                {/if}
                    <a href="javascript:void(0)" class="newsClick" onclick="newsDetail('{$vo.news_id}');">{$vo.news_title}</a></li>
                {/foreach}
            </ul>
        </div>
    </div>
</div>