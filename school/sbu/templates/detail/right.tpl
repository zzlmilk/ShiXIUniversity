<link rel="stylesheet" type="text/css" href="public/css/detail.css" media="all" />
<div class="drightAction">
    <ul class="ulStyle">

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
        <div class="newsDetailContent">
            {$vo.news_text}
        </div>
        <div style="height: 50px;"></div>
    </ul>
    <!--                    <div class="pageWarp" style=" margin-top: 320px;">
                            <a class="pageStyle1">1</a><a class="pageStyle2">2</a>
                        </div>-->
</div>