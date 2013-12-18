/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 * @param {type} page 是 当前处理的哪个模块
 * @param {type} functionname 是 模块中的 哪个方法
 * @param {type} pagename 是 ajax 返回后 替换在那个页面
 */
var webSite = '';
var ApiList = '';
var apiurl = 0;
var userid = 0;
var userAction;
function pageReditst(page, functionname, pagename, $var) {
    userAction = functionname;
    var url = webSite + "pageredirst.php?action=" + page + "&functionname=" + functionname;
    $("#" + pagename).html('loading.....');
    $.ajax({
        type: "post",
        url: url,
        data: $var,
        success: function(res) {
            $("#" + pagename).html(res);
        }
    })
}
function dataPage(page,modelName) {
    $('#homePagePicDiv').css('display', 'none');
    $poststring = {
        rightName: 'right',
        page: page,
    };
    pageReditst(modelName, modelName, 'homePageContent', $poststring);
}
