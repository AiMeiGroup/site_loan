$(function () {
    SwitchLabel('CZ_Con', 0);
    $.validator.addMethod("notInput", function (value, element) {
        if (value != "未选择") {
            return true;
        }
        return false;
    }, "请选择付款银行");

    $(".ChongZhi_Kuang img").click(function () {
        var bankid = $(this).attr("bankid");
        var bankName = $(this).attr("name");
        $("#lbBankName").text(bankName);
        $("#hdBankId").val(bankid);
    });

    $("#czKuang1 img").click(function () {
        
    });

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
        }
    });
});