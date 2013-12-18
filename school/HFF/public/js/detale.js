/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
    $(".newsTitle,.newsClick").click(function() {
        $('#homePagePicDiv').css('display', 'none');
        $poststring = {
            rightName: 'right'
        };
        pageReditst('detail', 'detail', 'homePageContent', $poststring);
    })
})