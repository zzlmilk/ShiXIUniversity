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