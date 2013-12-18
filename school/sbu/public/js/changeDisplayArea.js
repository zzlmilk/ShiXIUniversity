function rightAdd(RightName, page, functionname, pagename, team_id) {
    $poststring = {
        rightName: RightName,
        team_id: team_id
    };
    pageReditst(page, functionname, pagename, $poststring);
}
