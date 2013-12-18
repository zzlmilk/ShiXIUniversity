<div class="nrightAction">
    <ul class="ulStyle">


        {foreach from=$news key=myId item=vo}
        <li class="liStyle">
            <div class="newsTitle" onclick="newsDetail('{$vo.news_id}');">
                <div class="newsTitleM" >
                    {$vo.news_title}
                </div>
                <div class="newsTime">
                    {$vo.news_time|date_format:"%m/%d/%Y"}
                  </div>
            </div>

        </li>
        <div class="newsContent">
          {$vo.news_text}
        </div>
        <div style="height: 50px;"></div>
        {/foreach}

    </ul>

    <!--                分页位置-->
    {$newsPage}
</div>