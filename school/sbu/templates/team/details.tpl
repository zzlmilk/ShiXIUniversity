<div id="aboutRight">
    <div style="background: url('{$URLController}/public/image/smallBackgorunp.png') no-repeat;padding-left: 25px;">
        <p style="line-height:20px;font-family:Gautami,Sylfaen; word-break: break-all; word-spacing: 1px;font-size: 16px;  clear: right; padding-left:  10px;color: #373737;width: 660px; "><img style="float: left;margin-right: 20px;" src="{$URLImageController}/{$vo.team_id}/{$vo.team_username_photo}"  border="0" />
            {$vo.team_username_introduction}
        <div style="height: 60px;"></div>
        </p>
    </div>
</div>
<script>
    $("#faculty").hover(function() {
        $("#faculty").removeClass("faculty");
        $("#faculty").addClass("facultyActive");
    }, function() {
        $("#faculty").removeClass("facultyActive");
        $("#faculty").addClass("faculty");
    });
</script>