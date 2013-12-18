(Blank)

<script>
    $("#wordCEO").removeClass("wordCEOActive");
    $("#wordCEO").addClass("wordCEO");
    $("#institute").removeClass("institute");
    $("#institute").addClass("instituteActive");
    
                $("#wordCEO").hover(function(){
                $("#wordCEO").removeClass("wordCEO");
                $("#wordCEO").addClass("wordCEOActive");
            },function(){
        $("#wordCEO").removeClass("wordCEOActive");
        $("#wordCEO").addClass("wordCEO");
            });
</script>