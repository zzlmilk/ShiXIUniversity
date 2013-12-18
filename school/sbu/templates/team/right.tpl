<div id="aboutRight" >
    <div class="teamArea">
        {foreach from=$team  item=vo}
        <div class="teamIntroduce">
            <div id="aaaaa" class="floatLeft" style="width:127px;height: 134px;">
                <img src="{$URLImageController}/{$vo.team_id}/{$vo.team_username_photo}">
            </div>
            <div class="floatLeft teamIntroduceText">
                <div style="margin-left:10px;">
                    <div class="teamIntroduceTextTitle"><a id="testPage" title="{$vo.team_username}({$vo.team_type})" class="titleValue" onclick="rightAdd('details', 'team', 'team', 'homePageContent', '{$vo.team_id}')" href='javascript:void(0)'  style=" color: black;">{$vo.team_username}({$vo.team_type})</a></div>
                    <div class="teamIntroduceTextWords" >
                        {$vo.team_username_introduction}
                    </div>
                </div>
                <div class="teamIntroduceTextLink"><a style="color:#00b5e2"  onclick="rightAdd('details', 'team', 'team', 'homePageContent', '{$vo.team_id}')" href="javascript:void(0)">more</a></div>
            </div>

        </div>
        {/foreach}
    </div>

</div>
<div style="width: 311px;height: 80px;padding-top: 25px; text-align: center; margin-left: 380px;">
    {$teamPage}
</div>

<script>
                        $("#leader").removeClass("leader");
                        $("#leader").addClass("leaderActive");
                        $("#faculty").removeClass("facultyActive");
                        $("#faculty").addClass("faculty");
                        $("#student").removeClass("studentActive");
                        $("#student").addClass("student");
                        $("#faculty").hover(function() {
                            $("#faculty").removeClass("faculty");
                            $("#faculty").addClass("facultyActive");
                        }, function() {
                            $("#faculty").removeClass("facultyActive");
                            $("#faculty").addClass("faculty");
                        });
                        $("#student").hover(function() {
                            $("#student").removeClass("student");
                            $("#student").addClass("studentActive");
                        }, function() {
                            $("#student").removeClass("studentActive");
                            $("#student").addClass("student");
                        });

                        $(".teamIntroduceTextLink a").mousedown(function() {
                            $(this).css("color", "#484848");
                        })
                        $(".teamIntroduceTextLink a").mouseup(function() {
                            $(this).css("color", "#00b5e2");
                        })
                        $(".teamIntroduceTextLink a").mouseout(function() {
                            $(this).css("color", "#00b5e2");
                        })
            //-----------------------------------js截断字符--------------------
            $(".teamIntroduceTextWords").each(
                        function(){
                                if($(this).html().length>370){
                               $(this).html($(this).html().substring(0, 370)+"  ...");
                               }
                        });
            $(".titleValue").each(
                        function(){
                                if($(this).html().length>50){
                               $(this).html($(this).html().substring(0, 50)+"  ...");
                               }
                        });
//                        $(function(){
//                            $('.teamIntroduce').each(function(){
//                                var $nextTeamIntroduce = $(this).find('.teamIntroduceText').height();
//                                $(this).css('height',$nextTeamIntroduce+10+'px');
//                            })
//                        })
</script>