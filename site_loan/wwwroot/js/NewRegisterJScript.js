
$(function () {
    $('.tips').poshytip({
        className: 'tip-yellowsimple',
        showOn: 'focus',
        alignTo: 'target',
        alignX: 'right',
        alignY: 'center',
        offsetX: 14,
        showTimeout: 100
    });

    //点击换一张来切换图片
    $("#aChangeImage").click(function () {
        $("#imgCaptcha").attr("src", "/captcha/captcha1.aspx?w=100&h=32&t=" + new Date());
        return false;
    });

    //input获取焦点时错误提示消失
    $("input[class*=tips]").focus(function () {
        $(this).parent().next("i").hide().text("");
    });

    $("#userName").blur(function () {
        checkUserName();
    });

    $("#phone").blur(function () {
        checkPhone();
    });

    $("#email").blur(function () {
        checkEmail();
    });

    $("#password").blur(function () {
        checkPwd();
    });

    $("#rePassword").blur(function () {
        checkRePwd();
    });

    $("#validateCode").blur(function () {
        checkValidateCode();
    }).focus(function () {
        $(this).parent().next().next("i").hide().text("");
    });
});

//检查用户名
function checkUserName() {
    var userName = $("#userName").val();
    var reg = /^[a-z0-9.]{6,20}$/gi;
    if (!reg.test(userName)) {
        showError(0, "6-20个字母或数字（可用手机号码）");
        return false;
    }

    if (!ajaxCheck('uname', userName)) {
        showError(0, "该用户名已经注册");
        return false;
    }

    return true;
}

//手机号码
function checkPhone() {
    var phone = $("#phone").val();
    var reg = /^(1[358][0-9])\d{8}$/;
    if (!reg.test(phone)) {
        showError(1, "请输入正确的手机号码");
        return false;
    }
    if (!ajaxCheck('phone', phone)) {
        showError(1, "该手机号码已经注册");
        return false;
    }
    return true;
}

//邮箱
function checkEmail() {
    var email = $("#email").val();
    var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!reg.test(email)) {
        showError(2, "请输入正确的邮箱");
        return false;
    }

    if (!ajaxCheck('email', email)) {
        showError(2, "该邮箱已经注册");
        return false;
    }
    return true;
}

//密码
function checkPwd() {
    var pwd = $("#password").val();
    var reg = /^.{6,20}$/gi;
    if (!reg.test(pwd)) {
        showError(3, "6-20个字符，请注意区分大小写");
        return false;
    }
    return true;
}

//重复密码
function checkRePwd() {
    var rePwd = $("#rePassword").val();
    var reg = /^.{6,20}$/gi;
    if (!reg.test(rePwd)) {
        showError(4, "6-20个字符，请注意区分大小写");
        return false;
    }

    var pwd = $("#password").val();
    if (pwd != rePwd) {
        showError(4, "两次密码不一致");
        return false;
    }
    return true;
}

//验证码
function checkValidateCode() {
    var validateCode = $("#validateCode").val();
    if (!validateCode) {
        showError(5, "请输入验证码");
        return false;
    }

    if (!ajaxCheck('validateCode', validateCode)) {
        showError(5, "验证码不正确");
        return false;
    }
    return true;
}

//表单校验
function fromCheck() {
    if ((!checkUserName()) || (!checkPhone()) || (!checkEmail()) || (!checkPwd()) || (!checkRePwd()) || (!checkValidateCode())) {
        return false;
    }

    var ckAgree = $("#ckAgree").attr("checked");
    if (!ckAgree) {
        alert("您必须同意《安信聚贷注册协议》");
        return false;
    }
    return true;
}

//校验数据是否存在
function ajaxCheck(flag, text) {
    var result = false;
    $.ajax({
        url: 'RegCheckInfo.ashx',
        type: 'post',
        async: false,
        data: { flag: flag, text: text },
        success: function (data) {
            if (data == "0") {
                result = true;
            }
        },
        error: function () {
            alert("网络不稳定，请稍后再试。");
        }
    });
    return result;
}

//显示错误提示
function showError(index, msg) {
    $(".errorTips:eq("+index+")").show().text(msg);
}
