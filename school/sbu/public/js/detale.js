/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
//    $(".newsTitle,.newsClick").click(function() {
//        $('#homePagePicDiv').css('display', 'none');
//        $poststring = {
//            rightName: 'right'
//        };
//        pageReditst('detail', 'detail', 'homePageContent', $poststring);
//    })
})

function newsDetail(id) {
    $('#homePagePicDiv').css('display', 'none');
    $poststring = {
        rightName: 'rightDetail',
        news_id:id,
    };
    pageReditst('news', 'news', 'homePageContent', $poststring);
}