<script type="text/javascript">
    $("#wordCEO").removeClass("wordCEOActive");
    $("#wordCEO").addClass("wordCEO");
    $("#institute").removeClass("instituteActive");
    $("#institute").addClass("institute");
    $("#organizationalStructure").removeClass("organizationalStructure");
    $("#organizationalStructure").addClass("organizationalStructureActive");
    $("#wordCEO").hover(function() {
        $("#wordCEO").removeClass("wordCEO");
        $("#wordCEO").addClass("wordCEOActive");
    }, function() {
        $("#wordCEO").removeClass("wordCEOActive");
        $("#wordCEO").addClass("wordCEO");
    });

    $("#institute").hover(function() {
        $("#institute").removeClass("institute");
        $("#institute").addClass("instituteActive");
    }, function() {
        $("#institute").removeClass("instituteActive");
        $("#institute").addClass("institute");
    });
</script>

<img src="{$URLController}public/image/organizational_structure.png" width="422" height="237"  style=" margin-left: 16px;"/>


