3333233
<script>
            $("#leader").removeClass("leaderActive");
        $("#leader").addClass("leader");
        $("#faculty").removeClass("faculty");
        $("#faculty").addClass("facultyActive");
        
                $("#leader").hover(function(){
                $("#leader").removeClass("leader");
                $("#leader").addClass("leaderActive");
            },function(){
        $("#leader").removeClass("leaderActive");
        $("#leader").addClass("leader");
            });
</script>