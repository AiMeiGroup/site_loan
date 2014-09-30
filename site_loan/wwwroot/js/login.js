$(function () {
    var clearInput = function () {
        $("#txtPassword").val("");
        $("#txtCheckCode").val("");
        $("#imgCaptcha").attr("src", "/captcha/captcha1.aspx?w=100&h=32&t=" + Math.random());
    }

    $("#form1").validate({
        errorPlacement: function (lable, element) {
            var inputEl = $("#" + lable.attr("for"));
            if (inputEl.attr("type") != "checkbox")
                inputEl.css({ "border": "1px solid red" });
            $("#label_" + lable.attr("for")).css({ "color": "red" });
            $("#label_" + lable.attr("for")).html(lable.html());
        },
        success: function (lable) {
            var inputEl = $("#" + lable.attr("for"));
            inputEl.css({ "border": "1px solid #B4B9BD" });
        }, submitHandler: function (form) {
            var username = $("#txtUserName").val();
            var password = $("#txtPassword").val();
            var checkcode = $("#txtCheckCode").val();
            var rember = "true";
            $.post("loginValidate.aspx", { username: username, password: password, checkcode: checkcode, rember: rember }, function (data) {
                if (data.status == -1) {
                    $("#errorMsg").html("验证码输入有误");
                    $("#checkcode").val("");
                    $("#imgCaptcha").attr("src", "/captcha/captcha1.aspx?w=100&h=32&t=" + Math.random());
                }
                else if (data.status == -2) {
                    $("#errorMsg").html("用户名或密码有误");
                    clearInput();
                }
                else if (data.status == -3) {
                    $("#errorMsg").html("该账号未被激活");
                    clearInput();
                }
                else if (data.status == -4) {
                    $("#errorMsg").html("该账号已被锁定");
                    clearInput();
                }
                else if (data.status == 1) {
                    $("#errorMsg").html("");
                    if (window.location.href.indexOf("backurl") > 0) {
                        window.location.href = window.location.href.substring(window.location.href.indexOf("backurl") + 8);
                    }
                    else {
                        window.location.href = "/member/";
                    }
                }
            }, "json");
        }

    });

    $("#imgCaptcha").click(function () {
        $("#txtCheckCode").val("");
        $(this).attr("src", "/captcha/captcha1.aspx?w=100&h=32&t=" + Math.random());
    });
});