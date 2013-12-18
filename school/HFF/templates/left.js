/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var emailHoverArray = new Array('down', 'write', 'connectlist');
var unselectimgid = new Array('downimg', 'writeimg', 'connectimg');
var isShow = 0;

function selectEmailImg(ids) {
    switch (ids) {
        case 'getemail':
            name = 'downimg';
            break;
        case 'writeemail':
            name = 'writeimg';
            break;
        case 'personbook':
            name = 'connectimg';
            break;
    }
    return name;
}
$(document).ready(function() {
    var emailArray = new Array('getemail', 'writeemail', 'personbook');
    var emailEffectArray = new Array('downselect', 'writeselect', 'peopleselect');
    $(".upplate").click(function() {
        var name = '';
        var effectName = '';
        var imgValue = 0;
        var ids = $(this).attr('id');
        $(".upplate").css({
            "background-color": "",
            "color": "#4b4858"
        });
        $(".middleplate").css({
            "background-color": "",
            "color": "#5f5a70"
        });
        $('#' + ids).css({
            "background-color": "#ffd667",
            "color": "white"
        });
        for (var i = 0; i < emailArray.length; i++) {
            name = selectEmailImg(emailArray[i]);
            if (ids == emailArray[i]) {
                effectName = name;
                imgValue = i;
            } else {
                $('#' + name).attr('src', "public/image/leftImage/" + emailHoverArray[i] + '.png');
            }
        }
        $('#' + effectName).attr('src', "public/image/leftImage/" + emailEffectArray[imgValue] + '.png');
        $(".list").css({
            "background-color": "",
            "color": "#5f5a70"
        });
    });

    $(".middleplate").click(function() {
        var ids = $(this).attr('id');
        $(".middleplate").css({
            "background-color": "",
            "color": "#5f5a70"
        });
        $('#' + ids).css({
            "background-color": "#ffd667",
            "color": "white"
        });
        for (var i = 0; i <= 2; i++) {
            $('#' + unselectimgid[i]).attr('src', "public/image/leftImage/" + emailHoverArray[i] + '.png');
        }
        $(".upplate").css({
            "background-color": "",
            "color": "#4b4858"
        });
        $(".list").css({
            "background-color": "",
            "color": "#5f5a70"
        });
    })

    $(".list").click(function() {
        var ids = $(this).attr('id');
        $(".list").css({
            "background-color": "",
            "color": "#5f5a70"
        });
        $('#' + ids).css({
            "background-color": "#ffd667",
            "color": "white"
        });
        $(".middleplate").css({
            "background-color": "",
            "color": "#5f5a70"
        });
        for (var i = 0; i <= 2; i++) {
            $('#' + unselectimgid[i]).attr('src', "public/image/leftImage/" + emailHoverArray[i] + '.png');
        }
        ;
        $(".upplate").css({
            "background-color": "",
            "color": "#4b4858"
        });
    });
    $("#get_email,#write_email,#person_book,#newemail,#draftemails,#sendedemails").mouseover(function() {
        $(this).css({
            "background-color": "#ffd667"
        });
        $(this).css({
            "color": "#fff"
        });
    })
    $("#get_email,#write_email,#person_book,#newemail,#draftemails,#sendedemails").mouseout(function() {
        $(this).css({
            "background-color": ""
        });
        $(this).css({
            "color": "#5f5a70"
        });
    })
});
//写信
function writeEmail(obj) {
    writeEmailT();
//$("#centreBody").load("./templates/Email/writeEmail.tpl");
}
//通讯录
function personalBook(obj) {

}
//展开绑定邮箱列表
function getmorebindmailbox(obj) {
    if (isShow == 0) {
        $("#moreimg").attr("src", "./public/image/leftImage/less.png");
        isShow = 1;
    } else if (isShow == 1) {
        $("#moreimg").attr("src", "./public/image/leftImage/more.png");
        isShow = 0;
    }
    if (isShow == 1) {
        $poststring = {
            user_id: userid
        };
        apiFunction('email/show_user_email/', 'Email', $poststring);
    }
    $(".emaillist").slideToggle("show");
}

//点击单个绑定邮箱
function getSinglemailbox(i) {
    $('#userList_' + i).css({
        "background-color": "#ffd667",
        "color": "white"
    });
    $('#userList_' + i).mouseout(function() {
        $(this).css({
            "background-color": "#F9F9F9",
            "color": "#5F5A70"
        });
    })
    var emailType = $('#userBland_' + i).val();
    $poststring = {
        user_id: userid,
        email_type: emailType
    };
    EmailType = emailType;
    apiFunction('email/get_email/', 'getEmailListByType', $poststring);
}
//收信
function getEmail() {
    //载入邮件列表 页面
    pageReditst('public', 'centet', 'centet');
    Email.getEmailList(userid);
}
//草稿箱
function draftEmails() {
    $("#centreBody").hide();
$("#readEmailContent").hide();    $("#centreBodyCloud").load("./templates/Email/draftcarton.tpl");
    email_draft.get_email_draft_list();
}
//已发送
function sendedEmails() {
    $("#centreBody").load("./templates/Email/sentEmail.tpl");
    email_send.get_email_send_list();
}


